<?php
/**
 * The template for displaying all single posts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="page-header" style="background-image: url(<?php echo wp_get_attachment_image_url(37, 'full'); ?>);">
    <div class="container">
	<h2 class="fw-special-title"><?php the_title(); ?></h2>
    </div>
</div>
<div class="container single-container py-3" id="content" tabindex="-1">
    <div class="row">
	<div class="col-lg-9">
	    <?php
	    while (have_posts()) {
		the_post();
		get_template_part('loop-templates/content', 'single');
	    }
	    ?>
	    <div class="post-footer">
		<?php
		echo do_shortcode('[Sassy_Social_Share]');
		?>
	    </div>
	</div>
	<div class="col-lg-3 aside">
	    <?php if (is_active_sidebar('single-post')) : ?>
		<?php dynamic_sidebar('single-post'); ?>
	    <?php endif; ?>
	</div>
    </div>
</div><!-- #content -->
<?php
get_footer();
