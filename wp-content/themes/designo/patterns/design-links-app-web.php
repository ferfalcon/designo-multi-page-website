<?php
/**
 * Title: Design Links: App and Web
 * Slug: designo/design-links-app-web
 * Categories: designo
 *
 * @package Designo
 */

$theme_uri = get_template_directory_uri();
?>

<!-- wp:group {"align":"wide","className":"designo-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
<div class="wp-block-group alignwide designo-section" style="margin-top:var(--wp--preset--spacing--80)">
	<!-- wp:cover {"url":"<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-app-design.jpg' ); ?>","dimRatio":50,"overlayColor":"black","minHeight":308,"contentPosition":"center center","isDark":false,"style":{"border":{"radius":"15px"}}} -->
	<div class="wp-block-cover is-light" style="border-radius:15px;min-height:308px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-app-design.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} --><h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">App Design</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"letterSpacing":"0.3125em","textTransform":"uppercase"}}} --><p class="has-text-align-center has-white-color has-text-color" style="letter-spacing:0.3125em;text-transform:uppercase"><a href="/app-design/">View Projects</a></p><!-- /wp:paragraph --></div></div>
	<!-- /wp:cover -->
	<!-- wp:cover {"url":"<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-web-design-small.jpg' ); ?>","dimRatio":50,"overlayColor":"black","minHeight":308,"contentPosition":"center center","isDark":false,"style":{"border":{"radius":"15px"}}} -->
	<div class="wp-block-cover is-light" style="border-radius:15px;min-height:308px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-web-design-small.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} --><h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Web Design</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"letterSpacing":"0.3125em","textTransform":"uppercase"}}} --><p class="has-text-align-center has-white-color has-text-color" style="letter-spacing:0.3125em;text-transform:uppercase"><a href="/web-design/">View Projects</a></p><!-- /wp:paragraph --></div></div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->
