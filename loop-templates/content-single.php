<?php
/**
 * Single post partial template
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="post-header text-center">
	<?php the_title('<h1 class="h2">', '</h1>'); ?>
	<div class="post-meta h5 mb-2 mb-md-3"><?php echo get_the_author(); ?><span class="date"><?php echo get_the_date() ?></span></div>
	<?php
	if (has_post_thumbnail()) {
	    the_post_thumbnail();
	}
	?>
    </div>
    <div class="entry-content mt-2">
	<?php
	echo wpautop($post->post_content);
	?>
	<?php
	wp_link_pages(
		array(
		    'before' => '<div class="page-links">' . __('Pages:', 'vitacodis'),
		    'after' => '</div>',
		)
	);
	?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
