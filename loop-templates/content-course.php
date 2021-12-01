<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
$video_class = "";
if (isset($_GET['freecourses'])) {
    $link = get_the_permalink() . '?freecourses=true';
    if (fw_get_db_post_option(get_the_ID(), 'popup_video') !== '') {
	$thumb_link = get_the_permalink() . '?freecourses=true&video=show';
	$video_class = " play-video";
    }
} else {
    $link = get_the_permalink();
    if (fw_get_db_post_option(get_the_ID(), 'popup_video') !== '') {
	$thumb_link = get_the_permalink() . '?video=show';
	$video_class = " play-video";
    }
}
?>
<div class="card">
    <a class="card-img-top<?php echo $video_class ?>" href="<?php echo $thumb_link ?>">
	<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => '')); ?>
    </a>
    <div class="card-header pb-0">
	<h5 class="card-title"><a class="title" href="<?php echo $link; ?>"><?php the_title(); ?></a></h5>
    </div>
    <div class="card-header pt-0">
	<?php if (fw_get_db_post_option(get_the_ID(), 'description') != '') { ?><p class="card-text"><?php echo fw_get_db_post_option(get_the_ID(), 'description') ?></p><?php } ?>
    </div>
    <div class="card-body">
	<?php
	if (isset($_GET['freecourses'])) {
	    course_price_free();
	} else {
	    course_price();
	}
	?>
	<?php course_instructor() ?>
	<div class="course-info row">
	    <?php if (fw_get_db_post_option(get_the_ID(), 'duration') != "") { ?>
    	    <div class="col-auto"><svg class="icon"><use xlink:href="#duration"></use></svg><strong><?php echo fw_get_db_post_option(get_the_ID(), 'duration'); ?></strong></div>
	    <?php } ?>
	    <div class="col-auto"><svg class="icon"><use xlink:href="#learners"></use></svg><strong><?php course_learners_count() ?></strong></div>
	</div>
	<a href="<?php echo $link; ?>" class="btn btn-sm btn-primary">LEARN MORE</a>
    </div>
</div>