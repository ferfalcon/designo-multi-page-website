<?php
/**
 * Title: Office details
 * Slug: designo/location
 * Categories: designo
 */
ob_start();
?>
<!-- wp:group {"className":"location-panel","layout":{"type":"default"}} --><div class="wp-block-group location-panel"><!-- wp:heading {"level":2} --><h2 class="wp-block-heading">Canada</h2><!-- /wp:heading -->
<!-- wp:group {"className":"location-details","layout":{"type":"default"}} --><div class="wp-block-group location-details"><!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Designo Central Office</strong><br>3886 Wellington Street<br>Toronto, Ontario M9C 3J5</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Contact</strong><br><a href="tel:+12538638967">P : +1 253-863-8967</a><br><a href="mailto:contact@designo.co">M : contact@designo.co</a></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
<?php
$added = 0;
echo serialize_blocks( designo_maps_upgrade_blocks( parse_blocks( ob_get_clean() ), $added ) );
