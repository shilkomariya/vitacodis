<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="col-md-6">
    <article  <?php post_class('mb-2 mb-lg-3'); ?>>
	<a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail($post->ID, 'medium-crop', array("class" => "mb-1")); ?></a>
	<div class="text mb-1">
	    <h3 class="h5"><?php the_title() ?></h3>
	    <?php the_excerpt(); ?>
	</div>
	<p class="read-more"><a href="<?php the_permalink() ?>" class="fw-bold">Read More</a></p>
    </article>
</div>