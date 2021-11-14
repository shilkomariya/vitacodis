<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

$status = learndash_course_status(get_the_ID(), get_current_user_id());
switch ($status) {
    case 'Not Started':
	$status_text = '<span class="badge bg-green">Start Course</span>';
	break;
    case 'In Progress':
	$status_text = '<span class="badge bg-primary">In Progress</span>';
	break;
    default:
	$status_text = '<span class="badge bg-info">' . $status . '</span>';
}
?>

<div class="card">
    <a href="<?php the_permalink() ?>" class="card-img-top">
	<?php echo $status_text ?>
	<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => '')); ?>
    </a>
    <div class="card-header pb-1">
	<h5 class="card-title"><?php the_title(); ?></h5>
    </div>
    <div class="card-body">
	<?php course_instructor() ?>
	<div class="course-info row">
	    <?php if (fw_get_db_post_option(get_the_ID(), 'duration') != "") { ?>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#duration"></use></svg><strong><?php echo fw_get_db_post_option(get_the_ID(), 'duration'); ?></strong></div>
	    <?php } ?>
	    <div class="col-auto"><svg class="icon"><use xlink:href="#learners"></use></svg><strong><?php course_learners_count() ?></strong></div>
	</div>
    </div>
</div>