<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="container py-3 pb-lg-5" id="content" tabindex="-1">
    <h2 class="mb-2 mb-md-3 fw-normal page-header text-center"><?php
	if (isset($_GET['freecourses'])) {
	    echo "Select <strong>Free</strong> Course";
	} else {
	    echo "Wellbeing Courses";
	}
	?></h2>
    <div class="row card-rows">
	<?php
	$args = array(
	    'posts_per_page' => -1,
	    'post_type' => 'sfwd-courses',
	    'post_type' => 'sfwd-courses',
	    'orderby' => 'rand',
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
	    while ($query->have_posts()) {
		$query->the_post();
		echo '<div class="col">';
		get_template_part('loop-templates/content', 'course');
		echo '</div>';
	    }
	}
	wp_reset_postdata();
	?>
    </div>
</div>
<?php
get_footer();
