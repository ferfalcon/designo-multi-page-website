<?php
/**
 * Title: Locations page
 * Slug: designo/locations
 * Categories: designo
 */
ob_start();
?>
<!-- wp:heading {"level":1,"className":"screen-reader-text"} --><h1 class="wp-block-heading screen-reader-text">Our locations</h1><!-- /wp:heading -->
<!-- wp:group {"className":"location-panel","layout":{"type":"default"}} --><div class="wp-block-group location-panel"><!-- wp:heading {"level":2} --><h2 class="wp-block-heading">Canada</h2><!-- /wp:heading -->
<!-- wp:group {"className":"location-details","layout":{"type":"default"}} --><div class="wp-block-group location-details"><!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Designo Central Office</strong><br>3886 Wellington Street<br>Toronto, Ontario M9C 3J5</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Contact</strong><br><a href="tel:+12538638967">P : +1 253-863-8967</a><br><a href="mailto:contact@designo.co">M : contact@designo.co</a></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"location-panel","layout":{"type":"default"}} --><div class="wp-block-group location-panel"><!-- wp:heading {"level":2} --><h2 class="wp-block-heading">Australia</h2><!-- /wp:heading -->
<!-- wp:group {"className":"location-details","layout":{"type":"default"}} --><div class="wp-block-group location-details"><!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Designo AU Office</strong><br>19 Balonne Street<br>New South Wales 2443</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Contact</strong><br><a href="tel:0267209092">P : (02) 6720 9092</a><br><a href="mailto:contact@designo.au">M : contact@designo.au</a></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"location-panel","layout":{"type":"default"}} --><div class="wp-block-group location-panel"><!-- wp:heading {"level":2} --><h2 class="wp-block-heading">United Kingdom</h2><!-- /wp:heading -->
<!-- wp:group {"className":"location-details","layout":{"type":"default"}} --><div class="wp-block-group location-details"><!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Designo UK Office</strong><br>13 Colorado Way<br>Rhyd-y-fro SA8 9GA</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
<!-- wp:group {"className":"office","layout":{"type":"default"}} --><div class="wp-block-group office"><!-- wp:paragraph --><p><strong>Contact</strong><br><a href="tel:07831151400">P : 078 3115 1400</a><br><a href="mailto:contact@designo.uk">M : contact@designo.uk</a></p><!-- /wp:paragraph -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
<?php
$added = 0;
echo serialize_blocks( designo_maps_upgrade_blocks( parse_blocks( ob_get_clean() ), $added ) );
