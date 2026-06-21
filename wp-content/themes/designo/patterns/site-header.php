<?php
/**
 * Title: Site Header
 * Slug: designo/site-header
 * Categories: designo
 * Inserter: no
 *
 * @package Designo
 */
?>

<!-- wp:group {"align":"wide","className":"designo-site-header","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide designo-site-header">
	<!-- wp:image {"width":"202px","height":"27px","scale":"contain","sizeSlug":"full","linkDestination":"custom"} -->
	<figure class="wp-block-image size-full is-resized"><a href="/"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/shared/desktop/logo-dark.png' ); ?>" alt="<?php esc_attr_e( 'Designo Agency', 'designo' ); ?>" style="object-fit:contain;width:202px;height:27px"/></a></figure>
	<!-- /wp:image -->

	<!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"2.625rem"}}} -->
		<!-- wp:navigation-link {"label":"Our Company","url":"/about/"} /-->
		<!-- wp:navigation-link {"label":"Locations","url":"/locations/"} /-->
		<!-- wp:navigation-link {"label":"Contact","url":"/contact/"} /-->
	<!-- /wp:navigation -->
</div>
<!-- /wp:group -->
