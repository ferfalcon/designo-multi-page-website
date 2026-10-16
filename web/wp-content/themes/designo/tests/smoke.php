<?php
/** Read-only checks after starter import. Run with wp eval-file. */
defined( 'WP_CLI' ) && WP_CLI || exit;
$assert = static function ( $condition, $message ) {
	if ( ! $condition ) {
		WP_CLI::error( $message );
	}
};
$assert( wp_is_block_theme() && 'designo' === get_stylesheet(), 'Designo must be the active block theme.' );
$json = json_decode( file_get_contents( get_theme_file_path( 'theme.json' ) ), true );
$assert( JSON_ERROR_NONE === json_last_error() && 3 === $json['version'], 'Invalid theme.json.' );
$assert( is_readable( get_theme_file_path( 'assets/fonts/jost-latin.ttf' ) ), 'Bundled font missing.' );
$walk = static function ( $blocks ) use ( &$walk, $assert ) {
	foreach ( $blocks as $block ) {
		$assert( ! $block['blockName'] || WP_Block_Type_Registry::get_instance()->is_registered( $block['blockName'] ), 'Unknown block: ' . $block['blockName'] );
		$assert( empty( $block['attrs']['templateLock'] ) && empty( $block['attrs']['lock'] ), 'Starter content must remain unlocked.' );
		$walk( $block['innerBlocks'] );
	}
};
foreach ( array( 'home', 'about', 'web-design', 'app-design', 'graphic-design', 'locations', 'contact' ) as $slug ) {
	$page = get_page_by_path( $slug, OBJECT, array( 'page' ) );
	$assert( $page && 'publish' === $page->post_status, 'Missing starter page: ' . $slug );
	$assert( ! empty( $page->post_content ), 'Empty starter page: ' . $slug );
	$assert( ( 'contact' === $slug ? 'page-contact' : 'page-landing' ) === get_page_template_slug( $page ), 'Incorrect page template: ' . $slug );
	$walk( parse_blocks( $page->post_content ) );
	WP_CLI::log( 'OK: ' . $slug );
}
foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
	if ( str_starts_with( $pattern['name'], 'designo/' ) ) {
		$walk( parse_blocks( $pattern['content'] ) );
	}
}
WP_CLI::success( 'Designo structural checks passed.' );
