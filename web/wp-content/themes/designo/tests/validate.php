<?php
/** Run with: ddev wp eval-file web/wp-content/themes/designo/tests/validate.php > /tmp/designo-validation.html
 * Open the output through the local web server; inspect window.designoValidation.
 * Loads WordPress's actual JavaScript block parsers/save functions, not a mock serializer.
 */
defined( 'WP_CLI' ) && WP_CLI || exit;
$_SERVER['SERVER_NAME'] = wp_parse_url( home_url(), PHP_URL_HOST );
wp_enqueue_script( 'wp-block-library' );
wp_add_inline_script( 'wp-block-library', 'wp.blockLibrary.registerCoreBlocks();', 'after' );
wp_enqueue_script( 'wp-blocks' );
// WP-CLI has no HTTPS request context; avoid a mixed-content custom-script URL.
wp_scripts()->registered['designo-map-editor']->src = set_url_scheme( wp_scripts()->registered['designo-map-editor']->src, wp_parse_url( home_url(), PHP_URL_SCHEME ) );
wp_enqueue_script( 'designo-map-editor' );
$cases = array();
foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $pattern ) {
	if ( str_starts_with( $pattern['name'], 'designo/' ) ) {
		$cases[ $pattern['name'] ] = $pattern['content'];
	}
}
foreach ( get_posts( array( 'post_type' => 'page', 'posts_per_page' => -1 ) ) as $page ) {
	$cases[ 'page/' . $page->post_name ] = $page->post_content;
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Designo block validation</title><?php wp_head(); ?></head><body><h1>Designo block validation</h1><pre id="results"></pre><?php wp_footer(); ?>
<script>
const cases = <?php echo wp_json_encode( $cases ); ?>;
// Exercise editor-style attribute edits and a save/reopen round trip for the custom block.
const editedMap = wp.blocks.createBlock('designo/google-map', {placeLabel:'Edited office', address:'A longer address & Unicode: Montréal, Canada', directionsLabel:'Visit this office'});
cases['editor/map-round-trip'] = wp.blocks.serialize([editedMap]);
const failures = [];
const reopened = wp.blocks.parse(cases['editor/map-round-trip'])[0];
if (reopened.attributes.address !== editedMap.attributes.address || reopened.attributes.directionsLabel !== 'Visit this office') failures.push({path:'editor/map-round-trip', errors:['Edited map attributes did not survive serialization']});
let count = 0;
function check(blocks, path) {
 for (const block of blocks) {
  count++;
  if (!block.isValid) failures.push({path, name:block.name, errors:block.validationIssues.map(issue => issue.args.filter(arg => typeof arg === 'string'))});
  check(block.innerBlocks || [], path);
 }
}
for (const [path, content] of Object.entries(cases)) check(wp.blocks.parse(content), path);
window.designoValidation = {cases:Object.keys(cases).length, blocks:count, failures};
document.querySelector('#results').textContent = JSON.stringify(window.designoValidation, null, 2);
</script></body></html>
