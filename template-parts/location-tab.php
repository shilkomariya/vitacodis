<?php
/**
 * Location tab
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
?>
<?php
if ($args['location_id']) {
    $id = $args['location_id'];
    $location = get_post($id);
    ?>
    <?php echo get_the_post_thumbnail($id, array(950, 950), array('class' => 'mb-2')); ?>
    <div class="location-images owl-carousel owl-theme">
	<?php
	$arr = fw_get_db_post_option($id, 'images');
	foreach ($arr as $key => $value) {
	    ?>
	    <a href="<?php echo wp_get_attachment_image_url($value["attachment_id"], 'full'); ?>" data-fancybox="gallery">
		<img class="owl-lazy" data-src="<?php echo wp_get_attachment_image_url($value["attachment_id"], 'thumbnail'); ?>" alt="">
	    </a>
	<?php } ?>
    </div>
    <?php
    echo do_shortcode(wpautop($location->post_content));
    ?>
<?php } ?>
