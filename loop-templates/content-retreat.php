<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<article  <?php post_class('mb-2 mb-lg-3'); ?>>
    <div class="row">
	<div class="col-md-6">
	    <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail($post->ID, 'large-crop', array("class" => "mb-1")); ?></a>
	</div>
	<div class="col-md-6">
	    <div class="text mb-1">
		<h3 class="h3"><?php the_title() ?></h3>
		<div class="data row mb-1">
		    <div class="item col-auto">
			<svg class="icon"><use xlink:href="#retreat-location"></use></svg>
			<strong><?php echo fw_get_db_post_option(get_the_ID(), 'location') ?></strong>
		    </div>
		    <div class="item col-auto">
			<svg class="icon"><use xlink:href="#retreat-date"></use></svg>
			<strong><?php echo fw_get_db_post_option(get_the_ID(), 'date') ?></strong>
		    </div>
		</div>
		<?php the_excerpt(); ?>
	    </div>
	    <p class="read-more"><a href="<?php the_permalink() ?>" class="fw-bold">Read More</a></p>
	</div>
    </div>
</article>