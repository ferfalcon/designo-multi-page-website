<?php
/**
 * Title: Graphic Design Projects
 * Slug: designo/graphic-design-projects
 * Categories: designo
 *
 * @package Designo
 */

$theme_uri = get_template_directory_uri();
?>

<!-- wp:group {"align":"wide","className":"designo-section designo-page-hero","backgroundColor":"peach","textColor":"white","style":{"spacing":{"padding":{"top":"4rem","right":"1.5rem","bottom":"4rem","left":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide designo-section designo-page-hero has-white-color has-peach-background-color has-text-color has-background" style="padding-top:4rem;padding-right:1.5rem;padding-bottom:4rem;padding-left:1.5rem"><!-- wp:heading {"textAlign":"center","level":1,"textColor":"white"} --><h1 class="wp-block-heading has-text-align-center has-white-color has-text-color">Graphic design</h1><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">We deliver eye-catching branding materials that are tailored to meet your business objectives.</p><!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","className":"designo-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"},"blockGap":{"left":"2rem"}}}} -->
<div class="wp-block-columns alignwide designo-section" style="margin-top:var(--wp--preset--spacing--80)">
	<!-- wp:column --><div class="wp-block-column"><!-- wp:image {"sizeSlug":"full"} --><figure class="wp-block-image size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/graphic-design/desktop/image-change.jpg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":2,"textColor":"peach"} --><h2 class="wp-block-heading has-text-align-center has-peach-color has-text-color">Tim Brown</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">A book cover designed for Tim Brown's new release, Change</p><!-- /wp:paragraph --></div><!-- /wp:column -->
	<!-- wp:column --><div class="wp-block-column"><!-- wp:image {"sizeSlug":"full"} --><figure class="wp-block-image size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/graphic-design/desktop/image-boxed-water.jpg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":2,"textColor":"peach"} --><h2 class="wp-block-heading has-text-align-center has-peach-color has-text-color">Boxed water</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">A simple packaging concept made for Boxed Water</p><!-- /wp:paragraph --></div><!-- /wp:column -->
	<!-- wp:column --><div class="wp-block-column"><!-- wp:image {"sizeSlug":"full"} --><figure class="wp-block-image size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/graphic-design/desktop/image-science.jpg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":2,"textColor":"peach"} --><h2 class="wp-block-heading has-text-align-center has-peach-color has-text-color">Science!</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">A poster made in collaboration with the Federal Art Project</p><!-- /wp:paragraph --></div><!-- /wp:column -->
</div>
<!-- /wp:columns -->
