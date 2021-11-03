<?php
/**
 * The template for displaying all single posts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$bg = '';
if (has_post_thumbnail()) {
    $bg = ' style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'full') . ');"';
}
$instructor = fw_get_db_post_option(get_the_ID(), 'instructor')[0];
$woo_product = fw_get_db_post_option(get_the_ID(), 'woo_product')[0];
$product = wc_get_product($woo_product);
$currency = get_woocommerce_currency_symbol();
if ($product->get_sale_price() != '') {
    $price = '<h4 class="col-auto">' . $currency . $product->get_sale_price() . '</h4><small class="col-auto">' . $currency . $product->get_regular_price() . "</small>";
} else {
    $price = "<h4>" . $currency . $product->get_price() . "</h4>";
}

$units_sold = get_post_meta($woo_product, 'total_sales', true);

while (have_posts()) {
    the_post();
    ?>
    <div class="course-header py-5"<?php echo $bg ?>>
        <div class="container">
    	<h1 class="h2"><?php the_title() ?></h1>
    	<div class="course-info row h5">
		<?php if (fw_get_db_post_option(get_the_ID(), 'duration') != "") { ?>
		    <div class="col-auto"><svg class="icon"><use xlink:href="#duration"></use></svg><strong><?php echo fw_get_db_post_option(get_the_ID(), 'duration'); ?></strong></div>
		<?php } ?>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#lessons-count"></use></svg><strong><?php course_lessons_count() ?></strong></div>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#learners"></use></svg><strong><?php course_learners_count() ?></strong></div>
    	</div>
	    <?php course_instructor() ?>
	    <?php course_price() ?>
	    <?php if (sfwd_lms_has_access(get_the_ID())) { ?>
		<a class="btn btn-primary" href="" >Get Started</a>
	    <?php } else { ?>
		<a class="btn btn-primary" href="/checkout/?add-to-cart=<?php echo $woo_product; ?>" >Buy Now</a>
	    <?php } ?>
        </div>
    </div>
    <div class="container single-post py-3" id="content" tabindex="-1">
    </div>
    <?php
}
get_footer();