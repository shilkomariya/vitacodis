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
}
?>
<div id="product-<?php the_ID(); ?>" class="single-consulting container py-3">
    <div class="row">
	<div class="col-lg-8">

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

