<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
$instructor_id = false;
if (fw_get_db_post_option(get_the_ID(), 'instructor')) {
    $instructor_id = fw_get_db_post_option(get_the_ID(), 'instructor')[0];
    $instructor = get_post($instructor_id);
}
?>
<div id="product-<?php the_ID(); ?>" class="single-consulting container py-3">
    <div class="row">
	<div class="col-lg-8">
	    <div class="instructor-info">
		<svg width="0" height="0" class="hidden"> <symbol fill="currentColor" id="i-facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"> <path d="M11.8,19.5v-8.2h2.8L15,8.1h-3.2V6c0-0.9,0.3-1.6,1.6-1.6h1.7V1.6c-0.8-0.1-1.6-0.1-2.5-0.1c-2.4,0-4.1,1.5-4.1,4.2v2.4H5.8v3.2h2.8v8.2H11.8z"></path> </symbol> <symbol fill="currentColor" id="i-instagramm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"> <path d="M6.8,1.6c1,0,1.3-0.1,3.7-0.1c2.4,0,2.8,0,3.7,0.1s1.6,0.2,2.2,0.4C17,2.2,17.5,2.6,18,3c0.5,0.4,0.8,1,1,1.6 c0.2,0.6,0.4,1.2,0.4,2.2c0,1,0.1,1.3,0.1,3.7c0,2.4,0,2.8-0.1,3.7c0,1-0.2,1.6-0.4,2.2c-0.2,0.6-0.6,1.1-1,1.6 c-0.4,0.5-1,0.8-1.6,1c-0.6,0.2-1.2,0.4-2.2,0.4c-1,0-1.3,0.1-3.7,0.1c-2.4,0-2.8,0-3.7-0.1c-1,0-1.6-0.2-2.2-0.4 C4,18.8,3.5,18.4,3,18c-0.5-0.4-0.8-1-1-1.6c-0.2-0.6-0.4-1.2-0.4-2.2c0-1-0.1-1.3-0.1-3.7c0-2.4,0-2.8,0.1-3.7c0-1,0.2-1.6,0.4-2.2 C2.2,4,2.6,3.5,3,3c0.4-0.5,1-0.8,1.6-1C5.2,1.8,5.8,1.6,6.8,1.6L6.8,1.6z M14.1,3.2c-0.9,0-1.2-0.1-3.6-0.1s-2.7,0-3.6,0.1 C6,3.2,5.5,3.4,5.2,3.5c-0.4,0.2-0.7,0.4-1,0.7c-0.3,0.3-0.5,0.6-0.7,1C3.4,5.5,3.2,6,3.2,6.9c0,0.9-0.1,1.2-0.1,3.6s0,2.7,0.1,3.6 c0,0.9,0.2,1.4,0.3,1.7c0.1,0.4,0.4,0.7,0.7,1c0.3,0.3,0.6,0.5,1,0.7c0.3,0.1,0.8,0.3,1.7,0.3c0.9,0,1.2,0.1,3.6,0.1 c2.4,0,2.7,0,3.6-0.1c0.9,0,1.4-0.2,1.7-0.3c0.4-0.2,0.7-0.4,1-0.7c0.3-0.3,0.5-0.6,0.7-1c0.1-0.3,0.3-0.8,0.3-1.7 c0-0.9,0.1-1.2,0.1-3.6s0-2.7-0.1-3.6c0-0.9-0.2-1.4-0.3-1.7c-0.2-0.4-0.4-0.7-0.7-1c-0.3-0.3-0.6-0.5-1-0.7 C15.5,3.4,15,3.2,14.1,3.2z M9.4,13.3c0.6,0.3,1.4,0.3,2,0.1c0.7-0.2,1.2-0.6,1.6-1.2c0.4-0.6,0.6-1.3,0.5-2 c-0.1-0.7-0.4-1.3-0.9-1.8c-0.3-0.3-0.7-0.6-1.1-0.7c-0.4-0.1-0.9-0.2-1.3-0.2C9.8,7.6,9.3,7.7,9,7.9C8.6,8.2,8.3,8.5,8,8.8 c-0.2,0.4-0.4,0.8-0.5,1.2c-0.1,0.4,0,0.9,0.1,1.3c0.1,0.4,0.4,0.8,0.6,1.1C8.6,12.8,8.9,13.1,9.4,13.3z M7.2,7.2 c0.4-0.4,0.9-0.8,1.5-1C9.3,6,9.9,5.9,10.5,5.9s1.2,0.1,1.8,0.4c0.6,0.2,1.1,0.6,1.5,1c0.4,0.4,0.8,0.9,1,1.5 c0.2,0.6,0.4,1.2,0.4,1.8s-0.1,1.2-0.4,1.8s-0.6,1.1-1,1.5c-0.9,0.9-2,1.4-3.3,1.4s-2.4-0.5-3.3-1.4c-0.9-0.9-1.4-2-1.4-3.3 S6.4,8.1,7.2,7.2z M16.2,6.6c0.1-0.1,0.2-0.2,0.3-0.4c0.1-0.1,0.1-0.3,0.1-0.4c0-0.1,0-0.3-0.1-0.4c-0.1-0.1-0.1-0.3-0.2-0.4 s-0.2-0.2-0.4-0.2c-0.1-0.1-0.3-0.1-0.4-0.1c-0.1,0-0.3,0-0.4,0.1c-0.1,0.1-0.3,0.1-0.4,0.3c-0.2,0.2-0.3,0.5-0.3,0.8 c0,0.3,0.1,0.6,0.3,0.8c0.2,0.2,0.5,0.3,0.8,0.3S15.9,6.8,16.2,6.6z"></path> </symbol> <symbol fill="currentColor" id="i-linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"> <path d="M4.7,6.4c1.1,0,1.9-0.9,1.9-1.9S5.7,2.5,4.7,2.5c-1.1,0-1.9,0.9-1.9,1.9S3.6,6.4,4.7,6.4z"></path> <path d="M8.4,7.8v10.7h3.3v-5.3c0-1.4,0.3-2.7,2-2.7c1.7,0,1.7,1.6,1.7,2.8v5.2h3.3v-5.9c0-2.9-0.6-5.1-4-5.1 c-1.6,0-2.7,0.9-3.1,1.7h0V7.8H8.4z M3,7.8h3.3v10.7H3V7.8z"></path> </symbol> <symbol fill="currentColor" id="i-twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"> <path d="M17.3,7c0,0.2,0,0.3,0,0.5c0,4.7-3.5,10.1-9.9,10.1c-2,0-3.8-0.6-5.4-1.6c0.3,0,0.6,0,0.8,0 c1.6,0,3.1-0.5,4.3-1.5c-0.7,0-1.4-0.3-2-0.7c-0.6-0.4-1-1.1-1.2-1.8c0.2,0,0.4,0.1,0.7,0.1c0.3,0,0.6,0,0.9-0.1 c-0.8-0.2-1.5-0.6-2-1.2S2.7,9.3,2.7,8.5v0c0.5,0.3,1,0.4,1.6,0.4C3.8,8.5,3.4,8.1,3.1,7.6S2.7,6.5,2.7,5.9c0-0.7,0.2-1.3,0.5-1.8 c0.9,1.1,2,2,3.2,2.6c1.2,0.6,2.6,1,4,1.1c-0.1-0.3-0.1-0.5-0.1-0.8c0-0.5,0.1-0.9,0.3-1.4c0.2-0.4,0.4-0.8,0.8-1.1 c0.3-0.3,0.7-0.6,1.1-0.8c0.4-0.2,0.9-0.3,1.3-0.3c1,0,1.9,0.4,2.5,1.1c0.8-0.2,1.5-0.4,2.2-0.9c-0.3,0.8-0.8,1.5-1.5,1.9 c0.7-0.1,1.4-0.3,2-0.5C18.5,5.9,17.9,6.5,17.3,7z"></path> </symbol> <symbol fill="currentColor" id="i-youtube" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"> <path d="M20.1,5.7c-0.1-0.4-0.3-0.8-0.6-1.1c-0.3-0.3-0.7-0.5-1.1-0.6c-1.6-0.4-7.8-0.4-7.8-0.4s-6.3,0-7.8,0.4 C2.3,4,1.9,4.2,1.6,4.6C1.3,4.9,1,5.3,0.9,5.7c-0.4,1.6-0.4,4.8-0.4,4.8s0,3.3,0.4,4.8c0.2,0.9,0.9,1.5,1.8,1.8 c1.6,0.4,7.8,0.4,7.8,0.4s6.3,0,7.8-0.4c0.4-0.1,0.8-0.3,1.1-0.6c0.3-0.3,0.5-0.7,0.6-1.1c0.4-1.6,0.4-4.8,0.4-4.8 S20.5,7.3,20.1,5.7z M8.5,13.5l0-6l5.2,3L8.5,13.5z"></path> </symbol> </svg>
		<div class="row">
		    <div class="col-lg-4">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'woocommerce_thumbnail', array("class" => "mb-1")); ?>
		    </div>
		    <div class="col-lg-8">
			<div class="location"><?php echo fw_get_db_post_option($instructor_id, 'location') ?></div>
			<h1 class="h3 name"><?php echo $instructor->post_title ?></h1>
			<div class="description"><?php echo fw_get_db_post_option($instructor_id, 'description') ?></div>
			<div class="h5"><?php echo fw_get_db_post_option($instructor_id, 'rate') ?></div>
			<ul class="social nav">
			    <?php if (fw_get_db_post_option($instructor_id, 'instagramm') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'instagramm') ?>"><svg class="icon"><use xlink:href="#i-instagramm"></use></svg></a></li><?php } ?>
			    <?php if (fw_get_db_post_option($instructor_id, 'facebook') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'facebook') ?>"><svg class="icon"><use xlink:href="#i-facebook"></use></svg></a></li><?php } ?>
			    <?php if (fw_get_db_post_option($instructor_id, 'linkedin') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'linkedin') ?>"><svg class="icon"><use xlink:href="#i-linkedin"></use></svg></a></li><?php } ?>
			    <?php if (fw_get_db_post_option($instructor_id, 'twitter') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'twitter') ?>"><svg class="icon"><use xlink:href="#i-twitter"></use></svg></a></li><?php } ?>
			    <?php if (fw_get_db_post_option($instructor_id, 'youtube') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'youtube') ?>"><svg class="icon"><use xlink:href="#i-youtube"></use></svg></a></li><?php } ?>
			    <?php if (fw_get_db_post_option($instructor_id, 'site') != "") { ?><li><a target="_blank" href="<?php echo fw_get_db_post_option($instructor_id, 'site') ?>"><svg class="icon"><use xlink:href="#site"></use></svg></a></li><?php } ?>
			</ul>
		    </div>
		</div>
		<ul class="spec">
		    <?php foreach (fw_get_db_post_option($instructor_id, 'specification') as $value) { ?>
    		    <li><svg class="icon"><use xlink:href="#check"></use></svg> <?php echo $value ?></li>
		    <?php } ?>
		</ul>

		<div class="content">
		    <?php echo do_shortcode(wpautop($instructor->post_content)); ?>
		</div>
	    </div>
	</div>
	<div class="col-lg-4">
	    <div class="card card-consulting sticky-top">
		<div class="card-body">
		    <?php echo wpautop($post->post_content); ?>
		</div>
	    </div>
	</div>
    </div>
</div>

