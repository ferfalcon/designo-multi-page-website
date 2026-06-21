<?php
/**
 * Title: Contact Page Starter Content
 * Slug: designo/contact-page
 * Categories: designo
 *
 * @package Designo
 */
?>

<!-- wp:group {"align":"wide","className":"designo-section designo-page-hero","backgroundColor":"peach","textColor":"white","style":{"spacing":{"padding":{"top":"clamp(4.5rem, 8vw, 5.625rem)","right":"clamp(1.5rem, 8vw, 5.875rem)","bottom":"clamp(4.5rem, 8vw, 5.625rem)","left":"clamp(1.5rem, 8vw, 5.875rem)"}}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
<div class="wp-block-group alignwide designo-section designo-page-hero has-white-color has-peach-background-color has-text-color has-background" style="padding-top:clamp(4.5rem, 8vw, 5.625rem);padding-right:clamp(1.5rem, 8vw, 5.875rem);padding-bottom:clamp(4.5rem, 8vw, 5.625rem);padding-left:clamp(1.5rem, 8vw, 5.875rem)">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":1,"textColor":"white"} -->
		<h1 class="wp-block-heading has-white-color has-text-color">Contact us</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Ready to take it to the next level? Let's talk about your project or idea and find out how we can help your business grow. If you are looking for unique digital experiences that are relatable to your users, drop us a line.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<form class="designo-contact-form" action="#" method="post">
		<p><label for="designo-contact-name">Name</label><br><input id="designo-contact-name" name="name" type="text" autocomplete="name" required></p>
		<p><label for="designo-contact-email">Email Address</label><br><input id="designo-contact-email" name="email" type="email" autocomplete="email" required></p>
		<p><label for="designo-contact-phone">Phone</label><br><input id="designo-contact-phone" name="phone" type="tel" autocomplete="tel"></p>
		<p><label for="designo-contact-message">Your Message</label><br><textarea id="designo-contact-message" name="message" rows="5" required></textarea></p>
		<p><button type="submit">Submit</button></p>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"designo/location-links"} /-->
