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
<div class="container py-3" id="content" tabindex="-1">
    <h2 class="mb-2 mb-md-3 fw-normal page-header text-center">Wellbeing Retreats</h2>
    <?php
    if (have_posts()) {
	?>
        <div class="row">
	    <?php
	    while (have_posts()) {
		the_post();
		get_template_part('loop-templates/content-retreat');
	    }
	    ?>
        </div><!-- .row -->
	<?php
    } else {
	get_template_part('loop-templates/content', 'none');
    }
    ?>
</div>
<?php
get_template_part('template-parts/featured-courses');
get_footer();
