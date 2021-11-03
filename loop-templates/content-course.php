<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="card">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'card-img-top')); ?>
    <div class="card-header pb-0">
	<h5 class="card-title"><?php the_title(); ?></h5>
    </div>
    <div class="card-header pt-0">
	<?php if (fw_get_db_post_option(get_the_ID(), 'description') != '') { ?><p class="card-text"><?php echo fw_get_db_post_option(get_the_ID(), 'description') ?></p><?php } ?>
    </div>
    <div class="card-body">
	<?php course_price() ?>
	<?php course_instructor() ?>
	<div class="course-info row">
	    <?php if (fw_get_db_post_option(get_the_ID(), 'duration') != "") { ?>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#duration"></use></svg><strong><?php echo fw_get_db_post_option(get_the_ID(), 'duration'); ?></strong></div>
	    <?php } ?>
	    <div class="col-auto"><svg class="icon"><use xlink:href="#learners"></use></svg><strong><?php course_learners_count() ?></strong></div>
	</div>
	<a href="<?php the_permalink() ?>" class="btn btn-sm btn-primary">LEARN MORE</a>
    </div>
</div>