<?php
/** Automatically displayed, editor-managed Google Maps. No API key or geocoding service. */
defined( 'ABSPATH' ) || exit;

/** Accept only Google's public Share → Embed a map URLs, never arbitrary iframes. */
function designo_map_embed_url( $url ) {
	$parts = wp_parse_url( $url );
	if ( ! is_array( $parts ) || 'https' !== ( $parts['scheme'] ?? '' ) ||
		! in_array( strtolower( $parts['host'] ?? '' ), array( 'www.google.com', 'google.com' ), true ) ||
		'/maps/embed' !== ( $parts['path'] ?? '' ) ||
		isset( $parts['user'] ) || isset( $parts['pass'] ) || isset( $parts['port'] ) ) {
		return '';
	}
	parse_str( $parts['query'] ?? '', $query );
	return ! empty( $query['pb'] ) && is_string( $query['pb'] ) ? esc_url_raw( $url, array( 'https' ) ) : '';
}

function designo_render_google_map( $attributes ) {
	$address = trim( $attributes['address'] ?? '' );
	$label   = trim( $attributes['placeLabel'] ?? '' ) ?: __( 'Office location', 'designo' );
	$embed   = designo_map_embed_url( $attributes['embedUrl'] ?? '' );
	if ( ! $address ) {
		return ''; // No fake map for an unconfigured block.
	}
	// Public address-search embed. Editors may replace it with an exact Share embed.
	if ( ! $embed ) {
		$embed = add_query_arg( array( 'q' => rawurlencode( $address ), 'output' => 'embed' ), 'https://www.google.com/maps' );
	}
	$directions = add_query_arg( array( 'api' => '1', 'query' => rawurlencode( $address ) ), 'https://www.google.com/maps/search/' );

	ob_start();
	?>
	<div <?php echo get_block_wrapper_attributes( array( 'class' => 'designo-map' ) ); ?>>
		<div class="designo-map__viewport">
			<iframe src="<?php echo esc_url( $embed ); ?>" title="<?php echo esc_attr( $label ); ?>" width="350" height="300" loading="lazy" referrerpolicy="no-referrer" allowfullscreen></iframe>
		</div>
		<div class="designo-map__actions">
			<a href="<?php echo esc_url( $directions ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( trim( $attributes['directionsLabel'] ) ?: __( 'Open in Google Maps', 'designo' ) ); ?><span class="screen-reader-text"> <?php esc_html_e( '(opens in a new tab)', 'designo' ); ?></span></a>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

add_action( 'init', function () {
	$base = 'blocks/google-map/';
	wp_register_script( 'designo-map-editor', get_theme_file_uri( $base . 'editor.js' ), array( 'wp-blocks', 'wp-block-editor', 'wp-components', 'wp-element', 'wp-i18n' ), filemtime( get_theme_file_path( $base . 'editor.js' ) ), true );
	wp_add_inline_script( 'designo-map-editor', 'window.designoMapBlockMetadata = ' . wp_json_encode( wp_json_file_decode( get_theme_file_path( $base . 'block.json' ), array( 'associative' => true ) ) ) . ';', 'before' );
	register_block_type( get_theme_file_path( 'blocks/google-map' ), array( 'render_callback' => 'designo_render_google_map' ) );
} );

/** Wrap existing office panels without replacing their text, images, or links. */
function designo_maps_upgrade_blocks( $blocks, &$added ) {
	foreach ( $blocks as &$block ) {
		if ( 'core/group' !== $block['blockName'] ) {
			continue;
		}
		$classes = preg_split( '/\s+/', $block['attrs']['className'] ?? '' );
		if ( in_array( 'location-row', $classes, true ) ) {
			continue; // Already upgraded, including intentional editor removals.
		}
		if ( ! in_array( 'location-panel', $classes, true ) ) {
			$block['innerBlocks'] = designo_maps_upgrade_blocks( $block['innerBlocks'], $added );
			continue;
		}
		if ( has_block( 'designo/google-map', serialize_block( $block ) ) ) {
			continue; // Preserve maps inserted manually by an editor.
		}
		$label = '';
		$address = '';
		$find = static function ( $children ) use ( &$find, &$label, &$address ) {
			foreach ( $children as $child ) {
				if ( ! $label && 'core/heading' === $child['blockName'] ) {
					$label = html_entity_decode( wp_strip_all_tags( $child['innerHTML'] ), ENT_QUOTES, 'UTF-8' );
				}
				if ( ! $address && 'core/paragraph' === $child['blockName'] ) {
					$html = preg_replace( '/<strong\b[^>]*>.*?<\/strong>/is', '', $child['innerHTML'] );
					$html = preg_replace( '/<br\s*\/?\s*>/i', ', ', $html );
					$address = trim( html_entity_decode( wp_strip_all_tags( $html ), ENT_QUOTES, 'UTF-8' ), " ,\n\r\t" );
				}
				$find( $child['innerBlocks'] );
			}
		};
		$find( $block['innerBlocks'] );
		if ( ! $address ) {
			continue;
		}
		$map = array( 'blockName' => 'designo/google-map', 'attrs' => array( 'placeLabel' => $label, 'address' => $address ), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() );
		$block = array(
			'blockName' => 'core/group',
			'attrs' => array( 'className' => 'location-row', 'layout' => array( 'type' => 'default' ) ),
			'innerBlocks' => array( $block, $map ),
			'innerHTML' => '<div class="wp-block-group location-row">\n\n</div>',
			'innerContent' => array( '<div class="wp-block-group location-row">', null, "\n", null, '</div>' ),
		);
		++$added;
	}
	return $blocks;
}

/** Keep an accessible, editable H1 without the extra visible heading in the mockup. */
function designo_maps_compact_heading( $blocks, &$changed ) {
	foreach ( $blocks as &$block ) {
		if ( 'core/heading' !== $block['blockName'] || 1 !== ( $block['attrs']['level'] ?? 2 ) ) {
			continue;
		}
		$classes = preg_split( '/\s+/', $block['attrs']['className'] ?? '' );
		if ( ! in_array( 'screen-reader-text', $classes, true ) ) {
			$block['attrs']['className'] = trim( ( $block['attrs']['className'] ?? '' ) . ' screen-reader-text' );
			$update = static function ( $html ) {
				if ( ! is_string( $html ) ) { return $html; }
				$tags = new WP_HTML_Tag_Processor( $html );
				if ( $tags->next_tag( 'H1' ) ) { $tags->add_class( 'screen-reader-text' ); }
				return $tags->get_updated_html();
			};
			$block['innerHTML'] = $update( $block['innerHTML'] );
			$block['innerContent'] = array_map( $update, $block['innerContent'] );
			++$changed;
		}
		break;
	}
	return $blocks;
}

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'designo maps-layout', function ( $args, $assoc_args ) {
		$page = get_page_by_path( 'locations', OBJECT, array( 'page' ) );
		if ( ! $page ) { WP_CLI::error( 'Locations page not found.' ); }
		$changed = 0;
		$blocks = designo_maps_compact_heading( parse_blocks( $page->post_content ), $changed );
		if ( isset( $assoc_args['dry-run'] ) ) {
			WP_CLI::success( "Would visually hide {$changed} Locations heading; text and office content preserved." );
			return;
		}
		if ( $changed ) {
			$result = wp_update_post( wp_slash( array( 'ID' => $page->ID, 'post_content' => serialize_blocks( $blocks ) ) ), true );
			if ( is_wp_error( $result ) ) { WP_CLI::error( $result->get_error_message() ); }
		}
		WP_CLI::success( "Updated {$changed} Locations heading; still available to screen readers." );
	} );
	WP_CLI::add_command( 'designo maps', function ( $args, $assoc_args ) {
		$page = get_page_by_path( 'locations', OBJECT, array( 'page' ) );
		if ( ! $page ) {
			WP_CLI::error( 'Locations page not found. No content was changed.' );
		}
		$added = 0;
		$blocks = designo_maps_upgrade_blocks( parse_blocks( $page->post_content ), $added );
		if ( isset( $assoc_args['dry-run'] ) ) {
			WP_CLI::success( "Would add {$added} maps. No content changed." );
			return;
		}
		if ( $added ) {
			$result = wp_update_post( wp_slash( array( 'ID' => $page->ID, 'post_content' => serialize_blocks( $blocks ) ) ), true );
			if ( is_wp_error( $result ) ) {
				WP_CLI::error( $result->get_error_message() );
			}
		}
		WP_CLI::success( "Added {$added} maps; existing office content preserved." );
	} );
}
