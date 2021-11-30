<?php
/**
 * Cookies
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
if (!isset($_COOKIE['CookiesAgreed'])) {
    ?>
    <div class="cookies">
        <div class="container">
    	<div class="row">
    	    <div class="col-md-auto">
		    <?php echo wp_get_attachment_image(11614, array(61, 61), false, array("class" => 'img-fluid')) ?>
    	    </div>
    	    <div class="col-md-auto">We use cookies to ensure the best website experience. For more information, please review our <a href="<?php the_permalink(12317); ?>">cookie policy</a>.</div>
    	    <div class="col-md-auto"><button id="cookieIagree" class="btn btn-primary">I agree</button></div>
    	</div>
        </div>
    </div>
    <?php
}