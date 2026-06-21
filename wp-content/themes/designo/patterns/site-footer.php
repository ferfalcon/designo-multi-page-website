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

<!-- wp:group {"align":"full","backgroundColor":"black","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-black-background-color has-text-color has-background">
	<!-- wp:group {"align":"wide","className":"designo-site-footer","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide designo-site-footer">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:image {"width":"202px","height":"27px","scale":"contain","sizeSlug":"full","linkDestination":"custom"} -->
			<figure class="wp-block-image size-full is-resized"><a href="/"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/shared/desktop/logo-light.png' ); ?>" alt="<?php esc_attr_e( 'Designo Agency', 'designo' ); ?>" style="object-fit:contain;width:202px;height:27px"/></a></figure>
			<!-- /wp:image -->

			<!-- wp:navigation {"textColor":"white","overlayMenu":"never","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"2.625rem"}}} -->
				<!-- wp:navigation-link {"label":"Our Company","url":"/about/"} /-->
				<!-- wp:navigation-link {"label":"Locations","url":"/locations/"} /-->
				<!-- wp:navigation-link {"label":"Contact","url":"/contact/"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"backgroundColor":"dark-grey","className":"is-style-wide"} -->
		<hr class="wp-block-separator has-text-color has-dark-grey-color has-alpha-channel-opacity has-dark-grey-background-color has-background is-style-wide"/>
		<!-- /wp:separator -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"2rem"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph -->
				<p><strong>Designo Central Office</strong><br>3886 Wellington Street<br>Toronto, Ontario M9C 3J5</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph -->
				<p><strong>Contact Us (Central Office)</strong><br><a href="tel:+12538638967">P : +1 253-863-8967</a><br><a href="mailto:contact@designo.co">M : contact@designo.co</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"bottom"} -->
			<div class="wp-block-column is-vertically-aligned-bottom">
				<!-- wp:social-links {"iconColor":"peach","iconColorValue":"#E7816B","openInNewTab":true,"showLabels":false,"size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
				<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"youtube"} /-->
					<!-- wp:social-link {"url":"#","service":"twitter"} /-->
					<!-- wp:social-link {"url":"#","service":"pinterest"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
