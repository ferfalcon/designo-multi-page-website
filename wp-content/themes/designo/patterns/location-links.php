<?php
/**
 * Title: Location Links
 * Slug: designo/location-links
 * Categories: designo
 *
 * @package Designo
 */

$theme_uri = get_template_directory_uri();
?>

<!-- wp:columns {"align":"wide","className":"designo-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"},"blockGap":{"left":"2rem"}}}} -->
<div class="wp-block-columns alignwide designo-section" style="margin-top:var(--wp--preset--spacing--80)">
	<!-- wp:column {"className":"designo-location-card"} -->
	<div class="wp-block-column designo-location-card"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/shared/desktop/illustration-canada.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">Canada</h3><!-- /wp:heading --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"peach","textColor":"white"} --><div class="wp-block-button"><a class="wp-block-button__link has-white-color has-peach-background-color has-text-color has-background wp-element-button" href="/locations/">See location</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"designo-location-card"} -->
	<div class="wp-block-column designo-location-card"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/shared/desktop/illustration-australia.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">Australia</h3><!-- /wp:heading --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"peach","textColor":"white"} --><div class="wp-block-button"><a class="wp-block-button__link has-white-color has-peach-background-color has-text-color has-background wp-element-button" href="/locations/">See location</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"designo-location-card"} -->
	<div class="wp-block-column designo-location-card"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/shared/desktop/illustration-united-kingdom.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">United Kingdom</h3><!-- /wp:heading --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"peach","textColor":"white"} --><div class="wp-block-button"><a class="wp-block-button__link has-white-color has-peach-background-color has-text-color has-background wp-element-button" href="/locations/">See location</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
