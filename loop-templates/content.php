<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article  <?php post_class('mb-2 mb-lg-3 post-card'); ?>>
    <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail($post->ID, 'medium-crop', array("class" => "mb-1")); ?></a>
    <div class="text mb-1">
	<h3 class="h5"><?php the_title() ?></h3>
	<div class="excerpt">
	    <?php the_excerpt(); ?>
	</div>
    </div>
    <p class="read-more"><a href="<?php the_permalink() ?>">Read More</a></p>
</article>