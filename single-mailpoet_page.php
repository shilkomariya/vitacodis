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
<div class="container single-post py-3" id="content" tabindex="-1">
    <?php
    while (have_posts()) {
	the_post();
	?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    	<div class="post-header text-center">
		<?php the_title('<h1 class="h2">', '</h1>'); ?>
    	</div>
    	<div class="entry-content mt-2">
		<?php
		the_content();
		?>
    	</div>
        </article>
    <?php } ?>
</div>
<?php
get_footer();
