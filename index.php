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
<div class="container py-3 blog" id="content" tabindex="-1">
    <h3 class="mb-2 fw-normal blog-header"><?php
	if (is_category()) {
	    echo get_queried_object()->name;
	} else {
	    echo 'Wellbeing Journal';
	}
	?></h3>
    <div class="row">
	<div class="col-md-9 main">
	    <?php
	    if (have_posts()) {
		// Start the Loop.
		?>
    	    <div class="row">
		    <?php
		    while (have_posts()) {
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			echo '<div class="col-sm-6">';
			get_template_part('loop-templates/content', get_post_format());
			echo '</div>';
		    }
		    ?>
    	    </div><!-- .row -->
		<?php
	    } else {
		get_template_part('loop-templates/content', 'none');
	    }
	    ?>
	    <div class="mb-2">
		<?php vitacodis_pagination(); ?>
	    </div>
	</div>
	<div class="col-md-3 aside">
	    <ul class="cats-widget">
		<li<?php if (is_home()) echo ' class="current-cat"'; ?>><a href="<?php echo get_post_type_archive_link('post'); ?>">All Articles</a></li>
		<?php wp_list_categories('orderby=name&hide_empty=1&title_li='); ?>
	    </ul>
	</div>
    </div>
</div>
<?php
get_footer();
