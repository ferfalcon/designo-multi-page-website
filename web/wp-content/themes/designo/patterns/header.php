<?php
/**
 * Title: Site header
 * Slug: designo/header
 * Categories: hidden
 */
?>
<!-- wp:group {"className":"designo-header","layout":{"type":"default"}} --><div class="wp-block-group designo-header"><!-- wp:site-logo {"width":202} /--><!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"},"ariaLabel":"Primary navigation"} -->
<!-- wp:navigation-link {"label":"Our company","url":"<?php echo esc_url( home_url( '/about/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Locations","url":"<?php echo esc_url( home_url( '/locations/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Contact","url":"<?php echo esc_url( home_url( '/contact/' ) ); ?>","kind":"custom"} /-->
<!-- /wp:navigation --></div><!-- /wp:group -->
