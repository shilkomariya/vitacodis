<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="col-md-6 col-lg-4 mb-2">
    <article  <?php post_class('card h-100 text-center'); ?>>
	<?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array("class" => "card-img-top")); ?>
	<div class="card-body">
	    <h3 class="card-title"><?php the_title() ?></h3>
	    <?php the_excerpt(); ?>
	    <p class=""><a href="<?php the_permalink() ?>">Read More</a></p>
	</div>
    </article>
</div>