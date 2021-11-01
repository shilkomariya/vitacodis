<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
$description = fw_get_db_post_option(get_the_ID(), 'description');
$instructor = fw_get_db_post_option(get_the_ID(), 'instructor')[0];
$duration = fw_get_db_post_option(get_the_ID(), 'duration');
$woo_product = fw_get_db_post_option(get_the_ID(), 'woo_product')[0];
$product = wc_get_product($woo_product);
$currency = get_woocommerce_currency_symbol();
if ($product->get_sale_price() != '') {
    $price = '<h4 class="col-auto">' . $currency . $product->get_sale_price() . '</h4><small class="col-auto">' . $currency . $product->get_regular_price() . "</small>";
} else {
    $price = "<h4>" . $currency . $product->get_price() . "</h4>";
}
?>
<div class="card">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'card-img-top')); ?>
    <div class="card-header">
	<h5 class="card-title"><?php the_title(); ?></h5>
	<?php if ($description != '') { ?><p class="card-text"><?php echo $description ?></p><?php } ?>
    </div>
    <div class="card-body">
	<div class="price row"><?php echo $price; ?></div>
	<?php if ($instructor) { ?>
    	<div class="instructor">
		<?php echo get_the_post_thumbnail($instructor, array(24, 24), array('class' => 'instructor-avatar')); ?>
    	    <strong><?php echo get_the_title($instructor) ?></strong>
    	</div>
	<?php } ?>
	<div class="info row">
	    <?php if ($duration != "") { ?>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#duration"></use></svg><strong><?php echo $duration; ?></strong></div>
	    <?php } ?>
	    <div class="col-auto"><svg class="icon"><use xlink:href="#learners"></use></svg><strong>400 learners</strong></div>
	</div>
	<a href="<?php the_permalink() ?>" class="btn btn-sm btn-primary">LEARN MORE</a>
    </div>
</div>