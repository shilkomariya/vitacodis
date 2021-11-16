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
	<?php the_title('<h1 class="h3">', '</h1>'); ?>
	<div class="post-meta h6 mb-2 mb-md-3"><?php echo get_the_author(); ?><span class="date"><?php echo get_the_date() ?></span></div>
	<?php
	if (has_post_thumbnail()) {
	    the_post_thumbnail();
	}
	?>
    </div>
    <div class="entry-content mt-2">
	<div class="social-top mb-2"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
	<?php
	echo wpautop($post->post_content);
	?>
	<div class="my-3 social-bottom"><?php echo do_shortcode('[Sassy_Social_Share]'); ?></div>
	<div class="mb-2">
	    <h4>Do not miss another post</h4>
	    <?php echo do_shortcode('[mailpoet_form id="1"]') ?>
	</div>
    </div>
</article>
