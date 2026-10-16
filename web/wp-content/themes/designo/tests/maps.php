<?php
/** Read-only map security/render/migration checks: wp eval-file <this file>. */
defined( 'WP_CLI' ) && WP_CLI || exit;
$assert = static function ( $condition, $message ) {
	if ( ! $condition ) { WP_CLI::error( $message ); }
};
$valid = 'https://www.google.com/maps/embed?pb=!1m18!2d1!3d2';
$assert( $valid === designo_map_embed_url( $valid ), 'Share embed rejected.' );
foreach ( array( 'javascript:alert(1)', 'https://www.google.com.evil.test/maps/embed?pb=x', 'http://www.google.com/maps/embed?pb=x', 'https://user@www.google.com/maps/embed?pb=x', 'https://www.google.com:444/maps/embed?pb=x', 'https://www.google.com/maps/embed?pb[]=x', 'https://www.google.com/maps?output=embed', 'https://evil.test/maps/embed?pb=x' ) as $bad ) {
	$assert( '' === designo_map_embed_url( $bad ), 'Untrusted URL accepted: ' . $bad );
}
$block = array( 'blockName' => 'designo/google-map', 'attrs' => array( 'placeLabel' => 'Test <script>alert(1)</script>', 'address' => 'Toronto, Canada' ), 'innerBlocks' => array(), 'innerHTML' => '', 'innerContent' => array() );
$html = render_block( $block );
$assert( str_contains( $html, 'src="https://www.google.com/maps?' ), 'Address search embed missing.' );
$assert( 1 === substr_count( $html, '<iframe' ) && str_contains( $html, 'loading="lazy"' ), 'Map must render automatically with native lazy loading.' );
$assert( ! str_contains( $html, '<script>' ), 'Map title was not escaped.' );
$assert( str_contains( $html, 'rel="noopener noreferrer"' ), 'External link missing protections.' );
$assert( ! str_contains( $html, '<button' ) && ! str_contains( $html, 'data-map-url' ), 'No load/hide button or JS activation should remain.' );
$assert( ! wp_script_is( 'designo-map-view', 'enqueued' ), 'Automatic maps must not require frontend JavaScript.' );
$block['attrs']['address'] = 'A & B, Montréal, Canada';
$encoded = render_block( $block );
preg_match( '/<iframe src="([^"]+)"/', $encoded, $match );
parse_str( wp_parse_url( html_entity_decode( $match[1], ENT_QUOTES, 'UTF-8' ), PHP_URL_QUERY ), $query );
$assert( $block['attrs']['address'] === $query['q'], 'Special characters changed the address query.' );
$block['attrs']['embedUrl'] = $valid;
$assert( str_contains( render_block( $block ), 'src="' . $valid . '"' ), 'Exact embed override missing.' );
$block['attrs']['embedUrl'] = 'https://evil.test/maps/embed?pb=x';
$assert( ! str_contains( render_block( $block ), 'evil.test' ), 'Untrusted iframe URL leaked.' );
$block['attrs']['address'] = '';
$assert( '' === render_block( $block ), 'Unconfigured block should not render a fake map.' );

$pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( 'designo/location' );
$rows = array_values( array_filter( parse_blocks( $pattern['content'] ), static fn( $b ) => 'core/group' === $b['blockName'] ) );
$panel = $rows[0]['innerBlocks'][0];
$assert( 'location-panel' === $panel['attrs']['className'], 'Office pattern fixture missing.' );
$before = serialize_block( $panel );
$added = 0;
$after = designo_maps_upgrade_blocks( array( $panel ), $added );
$assert( 1 === $added, 'Should add exactly one map.' );
$assert( str_contains( serialize_blocks( $after ), $before ), 'Existing office content changed.' );
$map = $after[0]['innerBlocks'][1];
$assert( '3886 Wellington Street, Toronto, Ontario M9C 3J5' === $map['attrs']['address'], 'Address extraction incorrect.' );
$assert( 'Canada' === $map['attrs']['placeLabel'], 'Map label extraction incorrect.' );
$added = 0;
$again = designo_maps_upgrade_blocks( $after, $added );
$assert( 0 === $added && $again === $after, 'Migration must be idempotent.' );
$heading = parse_blocks( '<!-- wp:heading {"level":1} --><h1 class="wp-block-heading">Our locations</h1><!-- /wp:heading -->' );
$fixture = array_merge( $heading, $after );
$changed = 0;
$compact = designo_maps_compact_heading( $fixture, $changed );
$assert( 1 === $changed && str_contains( serialize_block( $compact[0] ), 'class="wp-block-heading screen-reader-text"' ), 'Accessible H1 update missing.' );
$assert( wp_strip_all_tags( $compact[0]['innerHTML'] ) === 'Our locations', 'H1 text must be preserved.' );
$assert( array_slice( $compact, 1 ) === $after, 'Office content changed during layout update.' );
$changed = 0;
$assert( designo_maps_compact_heading( $compact, $changed ) === $compact && 0 === $changed, 'Heading update must be idempotent.' );
WP_CLI::success( 'Map URL security, automatic render, content-preservation, and layout idempotency checks passed.' );
