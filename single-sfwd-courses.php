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
if (fw_get_db_post_option(get_the_ID(), 'banner_image')) {
    $bg = ' style="background-image: url(' . fw_get_db_post_option(get_the_ID(), 'banner_image')['url'] . ');"';
} elseif (has_post_thumbnail()) {
    $bg = ' style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'full') . ');"';
}
$instructor = fw_get_db_post_option(get_the_ID(), 'instructor')[0];
$woo_product = fw_get_db_post_option(get_the_ID(), 'woo_product')[0];

if (fw_get_db_post_option(get_the_ID(), 'popup_video')) {
    echo '<script>let courseVideoUrl = "' . fw_get_db_post_option(get_the_ID(), 'popup_video') . '?autoplay=1"</script>';
}

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
	    <?php
	    if (isset($_GET['freecourses'])) {
		echo '<div class="course-price row"><h4>Free</h4></div>';
	    } else {
		course_price();
	    }
	    ?>
	    <?php if (isset($_GET['freecourses'])) { ?>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singUpModal">Sign up</button>
	    <?php } elseif (sfwd_lms_has_access(get_the_ID())) { ?>
		<a class="btn btn-primary" href="<?php echo course_get_started_link(get_the_ID()); ?>" >Get Started</a>
	    <?php } else { ?>
		<a class="btn btn-primary" href="/checkout/?add-to-cart=<?php echo $woo_product; ?>" >Buy Now</a>
	    <?php } ?>
        </div>
    </div>
    <div class="container single-course py-3">
        <div class="row">
    	<div class="col-lg-8">
		<?php the_content() ?>
    	    <div class="ld-section-heading mt-3 mb-2"><h2>Course Instructor</h2></div>
		<?php
		get_template_part('template-parts/instructor', null, array(
		    'instructor_id' => $instructor)
		);
		?>
    	    <div class="ld-section-heading mt-3 mb-2"><h2>Featured Reviews from Trustpilot</h2></div>
		<?php
		get_template_part('template-parts/course-reviews');
		?>
    	</div>
    	<div class="col-lg-4">
    	    <div class="card card-course sticky-top">
    		<a id="playCourseVideo" class="card-img-top" data-fancybox href="<?php echo fw_get_db_post_option(get_the_ID(), 'popup_video'); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium-crop', array('class' => '')); ?></a>
    		<div class="card-body">
    		    <h4><?php the_title() ?></h4>
    		    <ul class="features">
			    <?php foreach (fw_get_db_post_option(get_the_ID(), 'features') as $value) { ?>
				<li><svg class="icon"><use xlink:href="#check"></use></svg> <?php echo $value ?></li>
			    <?php } ?>
    		    </ul>
			<?php if (sfwd_lms_has_access(get_the_ID())) { ?>
			    <a class="btn btn-primary" href="<?php echo course_get_started_link(get_the_ID()); ?>" >Get Started</a>
			<?php } else { ?>
			    <a class="btn btn-primary" href="/checkout/?add-to-cart=<?php echo $woo_product; ?>" >Buy Now</a>
			<?php } ?>
    		</div>
    	    </div>
    	</div>
        </div>
    </div>
    <?php
}
get_template_part('template-parts/more-courses', null, array(
    'current_id' => get_the_ID())
);
if (isset($_GET['freecourses'])) {
    ?>
    <div class="modal fade" id="singUpModal" tabindex="-1" aria-labelledby="singUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
    	<div class="modal-content">
    	    <div class="modal-header">
    		<h4 class="modal-title" id="singUpModalLabel">Sign Up and Start Learning <br> <span class="text-primary">for FREE</span></h4>
    		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    	    </div>
    	    <div class="modal-body">
		    <?php echo do_shortcode('[wc_reg_form_vitacodis]') ?>
    	    </div>
    	</div>
        </div>
    </div>
    <?php
}
get_footer();
