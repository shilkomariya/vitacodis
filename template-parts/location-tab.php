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
    <a href="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" data-fancybox="gallery" class="mb-1 d-block">
	<?php echo get_the_post_thumbnail($id, array(950, 950), array('class' => '')); ?>
    </a>
    <div class="location-images owl-carousel owl-theme mb-2">
	<?php
	$arr = fw_get_db_post_option($id, 'images');
	foreach ($arr as $key => $value) {
	    ?>
	    <a href="<?php echo wp_get_attachment_image_url($value["attachment_id"], 'full'); ?>" data-fancybox="gallery">
		<img class="owl-lazy" data-src="<?php echo wp_get_attachment_image_url($value["attachment_id"], 'thumbnail'); ?>" alt="">
	    </a>
	<?php } ?>
    </div>
    <h5><?php echo $location->post_title; ?></h5>
    <div class="location-info row mb-1">
	<?php if (fw_get_db_post_option($id, 'address') != "") { ?>
	    <div class="col-auto">
		<div class="icon-wrp">
		    <svg class="icon"><use xlink:href="#retreat-location"></use></svg>
		    <?php if (fw_get_db_post_option($id, 'map_link') != "") { ?>
	    	    <a href="<?php echo fw_get_db_post_option($id, 'map_link') ?>" target="_blank"><?php echo fw_get_db_post_option($id, 'address') ?></a>
		    <?php } else { ?>
			<?php echo fw_get_db_post_option($id, 'address') ?>
		    <?php } ?>
		</div>
	    </div>
	<?php } ?>
	<?php if (fw_get_db_post_option($id, 'phone') != "") { ?>
	    <div class="col-auto">
		<div class="icon-wrp">
		    <svg class="icon"><use xlink:href="#phone"></use></svg>
		    <a href="tel:<?php echo fw_get_db_post_option($id, 'phone') ?>"><?php echo fw_get_db_post_option($id, 'phone') ?></a>
		</div>
	    </div>
	<?php } ?>
	<?php if (fw_get_db_post_option($id, 'link_url') != "") { ?>
	    <div class="col-auto">
		<div class="icon-wrp">
		    <svg class="icon"><use xlink:href="#site"></use></svg>
		    <a href="<?php echo fw_get_db_post_option($id, 'link_url') ?>" target="_blamk"><?php echo fw_get_db_post_option($id, 'link_text') ?></a>
		</div>
	    </div>
	<?php } ?>
    </div>
    <?php
    echo do_shortcode(wpautop($location->post_content));
    ?>
<?php } ?>
