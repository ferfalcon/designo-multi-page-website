<?php
/**
 * Title: Site Footer
 * Slug: designo/site-footer
 * Categories: designo
 * Inserter: no
 *
 * @package Designo
 */
?>

<!-- wp:group {"align":"full","className":"designo-footer","backgroundColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull designo-footer has-black-background-color has-background">
	<!-- wp:group {"align":"wide","className":"designo-site-footer","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide designo-site-footer">
		<!-- wp:group {"className":"designo-footer-top"} -->
		<div class="wp-block-group designo-footer-top">
			<!-- wp:image {"width":"202px","height":"27px","scale":"contain","sizeSlug":"full","linkDestination":"custom","className":"designo-footer-logo"} -->
			<figure class="wp-block-image size-full is-resized designo-footer-logo"><a href="/"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/shared/desktop/logo-light.png' ); ?>" alt="<?php esc_attr_e( 'Designo Agency', 'designo' ); ?>" style="object-fit:contain;width:202px;height:27px"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:navigation {"textColor":"white","overlayMenu":"never","className":"designo-footer-nav","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"2.625rem"}}} -->
				<!-- wp:navigation-link {"label":"Our Company","url":"/about/"} /-->
				<!-- wp:navigation-link {"label":"Locations","url":"/locations/"} /-->
				<!-- wp:navigation-link {"label":"Contact","url":"/contact/"} /-->
			<!-- /wp:navigation -->

			<!-- wp:separator {"backgroundColor":"dark-grey","className":"designo-footer-rule is-style-wide"} -->
			<hr class="wp-block-separator has-text-color has-dark-grey-color has-alpha-channel-opacity has-dark-grey-background-color has-background designo-footer-rule is-style-wide"/>
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"designo-footer-bottom","layout":{"type":"constrained"}} -->
		<div class="wp-block-group designo-footer-bottom">
			<!-- wp:group {"className":"designo-footer-office","layout":{"type":"constrained"}} -->
			<div class="wp-block-group designo-footer-office">
				<!-- wp:paragraph -->
				<p><strong>Designo Central Office</strong><br>3886 Wellington Street<br>Toronto, Ontario M9C 3J5</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"designo-footer-contact","layout":{"type":"constrained"}} -->
			<div class="wp-block-group designo-footer-contact">
				<!-- wp:paragraph -->
				<p><strong>Contact Us (Central Office)</strong><br><a href="tel:+12538638967">P : +1 253-863-8967</a><br><a href="mailto:contact@designo.co">M : contact@designo.co</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:social-links {"iconColor":"peach","iconColorValue":"#E7816B","openInNewTab":true,"showLabels":false,"size":"has-normal-icon-size","className":"designo-footer-socials is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
			<ul class="wp-block-social-links has-normal-icon-size has-icon-color designo-footer-socials is-style-logos-only">
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
				<!-- wp:social-link {"url":"#","service":"youtube"} /-->
				<!-- wp:social-link {"url":"#","service":"twitter"} /-->
				<!-- wp:social-link {"url":"#","service":"pinterest"} /-->
				<!-- wp:social-link {"url":"#","service":"instagram"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
