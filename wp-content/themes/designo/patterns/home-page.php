<?php
/**
 * Title: Home Page Starter Content
 * Slug: designo/home-page
 * Categories: designo
 *
 * @package Designo
 */

$theme_uri = get_template_directory_uri();
?>

<!-- wp:group {"align":"wide","className":"designo-section designo-hero","backgroundColor":"peach","textColor":"white","style":{"spacing":{"padding":{"top":"clamp(3.75rem, 8vw, 9rem)","right":"clamp(1.5rem, 8vw, 5.875rem)","bottom":"0","left":"clamp(1.5rem, 8vw, 5.875rem)"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide designo-section designo-hero has-white-color has-peach-background-color has-text-color has-background" style="padding-top:clamp(3.75rem, 8vw, 9rem);padding-right:clamp(1.5rem, 8vw, 5.875rem);padding-bottom:0;padding-left:clamp(1.5rem, 8vw, 5.875rem)">
	<!-- wp:group {"style":{"layout":{"selfStretch":"fixed","flexSize":"33.75rem"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"3rem","lineHeight":"1"}},"textColor":"white"} -->
		<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:3rem;line-height:1">Award-winning custom designs and digital branding solutions</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"lead"} -->
		<p class="has-lead-font-size">With over 10 years in the industry, we are experienced in creating fully responsive websites, app design, and engaging brand experiences. Find out more about our services.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/about/">Learn more</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:image {"width":"284px","height":"573px","scale":"contain","sizeSlug":"full"} -->
	<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-hero-phone.png' ); ?>" alt="" style="object-fit:contain;width:284px;height:573px"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"designo-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
<div class="wp-block-group alignwide designo-section" style="margin-top:var(--wp--preset--spacing--80)">
	<!-- wp:group {"className":"designo-design-card","layout":{"type":"constrained"}} -->
	<div class="wp-block-group designo-design-card">
		<!-- wp:cover {"url":"<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-web-design-large.jpg' ); ?>","dimRatio":50,"overlayColor":"black","minHeight":640,"contentPosition":"center center","isDark":false,"style":{"border":{"radius":"15px"}}} -->
		<div class="wp-block-cover is-light" style="border-radius:15px;min-height:640px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-web-design-large.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} --><h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Web Design</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"letterSpacing":"0.3125em","textTransform":"uppercase"}}} --><p class="has-text-align-center has-white-color has-text-color" style="letter-spacing:0.3125em;text-transform:uppercase"><a href="/web-design/">View Projects</a></p><!-- /wp:paragraph --></div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:cover {"url":"<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-app-design.jpg' ); ?>","dimRatio":50,"overlayColor":"black","minHeight":308,"contentPosition":"center center","isDark":false,"style":{"border":{"radius":"15px"}}} -->
		<div class="wp-block-cover is-light" style="border-radius:15px;min-height:308px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-app-design.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} --><h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">App Design</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"letterSpacing":"0.3125em","textTransform":"uppercase"}}} --><p class="has-text-align-center has-white-color has-text-color" style="letter-spacing:0.3125em;text-transform:uppercase"><a href="/app-design/">View Projects</a></p><!-- /wp:paragraph --></div></div>
		<!-- /wp:cover -->

		<!-- wp:cover {"url":"<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-graphic-design.jpg' ); ?>","dimRatio":50,"overlayColor":"black","minHeight":308,"contentPosition":"center center","isDark":false,"style":{"border":{"radius":"15px"}}} -->
		<div class="wp-block-cover is-light" style="border-radius:15px;min-height:308px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/image-graphic-design.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","textColor":"white"} --><h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Graphic Design</h2><!-- /wp:heading --><!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"letterSpacing":"0.3125em","textTransform":"uppercase"}}} --><p class="has-text-align-center has-white-color has-text-color" style="letter-spacing:0.3125em;text-transform:uppercase"><a href="/graphic-design/">View Projects</a></p><!-- /wp:paragraph --></div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","className":"designo-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"},"blockGap":{"left":"2rem"}}}} -->
<div class="wp-block-columns alignwide designo-section" style="margin-top:var(--wp--preset--spacing--80)">
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/illustration-passionate.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">Passionate</h3><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Each project starts with an in-depth brand research to ensure we only create products that serve a purpose. We merge art, design, and technology into exciting new solutions.</p><!-- /wp:paragraph --></div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/illustration-resourceful.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">Resourceful</h3><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Everything that we do has a strategic purpose. We use an agile approach in all of our projects and value customer collaboration. It guarantees superior results that fulfill our clients' needs.</p><!-- /wp:paragraph --></div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","align":"center"} --><figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url( $theme_uri . '/assets/home/desktop/illustration-friendly.svg' ); ?>" alt=""/></figure><!-- /wp:image --><!-- wp:heading {"textAlign":"center","level":3} --><h3 class="wp-block-heading has-text-align-center">Friendly</h3><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">We are a group of enthusiastic folks who know how to put people first. Our success depends on our customers, and we strive to give them the best experience a company can provide.</p><!-- /wp:paragraph --></div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:pattern {"slug":"designo/cta"} /-->
