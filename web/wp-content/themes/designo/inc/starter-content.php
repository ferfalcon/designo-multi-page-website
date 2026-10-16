<?php
/** Optional, repeatable starter-content import. Never called by an HTTP request. */
defined( 'ABSPATH' ) || exit;

/**
 * Create editable Designo starter pages and import bundled images into Media Library.
 *
 * ## OPTIONS
 *
 * [--configure-site]
 * : Set the newly created Home as static front page, install the logo, and use a readable site title.
 *
 * [--dry-run]
 * : Report page actions without modifying the database or files.
 *
 * ## EXAMPLES
 *
 *     wp designo starter-content --dry-run
 *     wp designo starter-content --configure-site
 */
WP_CLI::add_command( 'designo starter-content', function ( $args, $assoc ) {
	if ( 'designo' !== get_stylesheet() ) {
		WP_CLI::error( 'Activate the Designo theme first.' );
	}
	$pages = array( 'home' => 'Home', 'web-design' => 'Web Design', 'app-design' => 'App Design', 'graphic-design' => 'Graphic Design', 'about' => 'Our Company', 'locations' => 'Locations', 'contact' => 'Contact' );
	$registry = WP_Block_Patterns_Registry::get_instance();
	$ids = array();
	foreach ( $pages as $slug => $title ) {
		$existing = get_page_by_path( $slug, OBJECT, array( 'page' ) );
		if ( $existing ) {
			WP_CLI::log( "Skip existing page: {$slug}" );
			$ids[ $slug ] = $existing->ID;
			continue;
		}
		if ( isset( $assoc['dry-run'] ) ) {
			WP_CLI::log( "Would create: {$slug}" );
			continue;
		}
		$pattern = $registry->get_registered( 'designo/' . $slug );
		if ( ! $pattern ) {
			WP_CLI::error( "Missing starter pattern: {$slug}" );
		}
		$content = designo_import_pattern_images( $pattern['content'] );
		if ( 'contact' === $slug && class_exists( 'WPCF7_ContactForm' ) ) {
			$form = designo_starter_contact_form();
			$content = preg_replace( '~<!-- wp:paragraph --><p><a href="mailto:contact@designo.co">.*?</p><!-- /wp:paragraph -->~s', '<!-- wp:shortcode -->[contact-form-7 id="' . absint( $form ) . '"]<!-- /wp:shortcode -->', $content );
		}
		$id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => $slug, 'post_content' => wp_slash( $content ) ), true );
		if ( is_wp_error( $id ) ) {
			WP_CLI::error( $id->get_error_message() );
		}
		update_post_meta( $id, '_wp_page_template', 'contact' === $slug ? 'page-contact' : 'page-landing' );
		$ids[ $slug ] = $id;
		WP_CLI::log( "Created {$slug}: {$id}" );
	}
	if ( isset( $assoc['configure-site'] ) && ! isset( $assoc['dry-run'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
		if ( ! get_option( 'site_logo' ) ) {
			$logo = designo_import_image( 'shared/desktop/logo-dark.png' );
			update_option( 'site_logo', $logo );
		}
		update_option( 'blogname', 'Designo' );
	}
	WP_CLI::success( isset( $assoc['dry-run'] ) ? 'Dry run complete; nothing changed.' : 'Starter content ready. Existing pages were not overwritten.' );
} );

/** Only files shipped inside this theme may be imported, including our trusted SVG illustrations. */
function designo_import_image( $relative ) {
	$base = realpath( get_theme_file_path( 'assets/images' ) );
	$source = realpath( $base . '/' . $relative );
	if ( ! $source || ! str_starts_with( $source, $base . DIRECTORY_SEPARATOR ) ) {
		WP_CLI::error( 'Invalid bundled image path.' );
	}
	$found = get_posts( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'meta_key' => '_designo_source', 'meta_value' => $relative, 'fields' => 'ids', 'posts_per_page' => 1 ) );
	if ( $found ) {
		return $found[0];
	}
	// This CLI-only import has already restricted the path to our bundled assets.
	$allow_svg = static function ( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	};
	add_filter( 'upload_mimes', $allow_svg );
	try {
		$upload = wp_upload_bits( 'designo-' . basename( $source ), null, file_get_contents( $source ) );
	} finally {
		remove_filter( 'upload_mimes', $allow_svg );
	}
	if ( $upload['error'] ) {
		WP_CLI::error( $upload['error'] );
	}
	$type = wp_check_filetype( $source );
	$mime = 'svg' === pathinfo( $source, PATHINFO_EXTENSION ) ? 'image/svg+xml' : $type['type'];
	$id = wp_insert_attachment( array( 'post_mime_type' => $mime, 'post_name' => 'designo-asset-' . md5( $relative ), 'post_title' => ucwords( str_replace( array( '-', 'image ', 'illustration ' ), ' ', pathinfo( $source, PATHINFO_FILENAME ) ) ), 'post_status' => 'inherit' ), $upload['file'], 0, true );
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id->get_error_message() );
	}
	require_once ABSPATH . 'wp-admin/includes/image.php';
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $upload['file'] ) );
	update_post_meta( $id, '_designo_source', $relative );
	return $id;
}

function designo_import_pattern_images( $content ) {
	$prefix = get_theme_file_uri( 'assets/images/' );
	preg_match_all( '~' . preg_quote( $prefix, '~' ) . '([^"<>]+)~', $content, $matches );
	foreach ( array_unique( $matches[1] ) as $relative ) {
		$id = designo_import_image( $relative );
		$content = str_replace( $prefix . $relative, wp_get_attachment_url( $id ), $content );
	}
	$blocks = parse_blocks( $content );
	$attach = function ( &$blocks ) use ( &$attach ) {
		foreach ( $blocks as &$block ) {
			if ( in_array( $block['blockName'], array( 'core/image', 'core/cover' ), true ) ) {
				preg_match( '/<img[^>]+src="([^"]+)"/', $block['innerHTML'], $match );
				$id = isset( $match[1] ) ? attachment_url_to_postid( $match[1] ) : 0;
				if ( $id ) {
					$block['attrs']['id'] = $id;
					$replace = 'core/image' === $block['blockName']
						? fn( $html ) => str_replace( '<img ', '<img class="wp-image-' . $id . '" ', $html )
						: fn( $html ) => str_replace( 'class="wp-block-cover__image-background"', 'class="wp-block-cover__image-background wp-image-' . $id . '"', $html );
					$block['innerHTML'] = $replace( $block['innerHTML'] );
					$block['innerContent'] = array_map( fn( $html ) => is_string( $html ) ? $replace( $html ) : $html, $block['innerContent'] );
				}
			}
			$attach( $block['innerBlocks'] );
		}
	};
	$attach( $blocks );
	return serialize_blocks( $blocks );
}

/** Keep form functionality in a maintained plugin rather than tying submissions to the theme. */
function designo_starter_contact_form() {
	$existing = get_posts( array( 'post_type' => 'wpcf7_contact_form', 'name' => 'designo-contact', 'posts_per_page' => 1 ) );
	if ( $existing ) {
		return $existing[0]->ID;
	}
	$form = WPCF7_ContactForm::get_template( array( 'title' => 'Designo contact', 'locale' => get_locale() ) );
	$properties = $form->get_properties();
	$properties['form'] = '<p><label>Name (required)<br>[text* your-name autocomplete:name maxlength:120]</label></p>
<p><label>Email address (required)<br>[email* your-email autocomplete:email maxlength:254]</label></p>
<p><label>Phone<br>[tel your-phone autocomplete:tel maxlength:40]</label></p>
<p><label>Your message (required)<br>[textarea* your-message maxlength:5000]</label></p>
<p>[submit "Submit"]</p>';
	$properties['mail']['recipient'] = get_option( 'admin_email' );
	$host = wp_parse_url( home_url(), PHP_URL_HOST );
	$properties['mail']['sender'] = 'Designo <wordpress@' . $host . '>';
	$properties['mail']['subject'] = 'Designo website enquiry from [your-name]';
	$properties['mail']['additional_headers'] = 'Reply-To: [your-email]';
	$properties['mail']['body'] = "Name: [your-name]\nEmail: [your-email]\nPhone: [your-phone]\n\n[your-message]";
	$form->set_properties( $properties );
	$form->save();
	wp_update_post( array( 'ID' => $form->id(), 'post_name' => 'designo-contact' ) );
	WP_CLI::warning( 'Contact form sends to the site admin email. Review Contact > Contact Forms and configure delivery/spam protection before launch.' );
	return $form->id();
}
