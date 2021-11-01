<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="card">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'card-img-top')); ?>
    <div class="card-body">
	<h5 class="card-title"><?php the_title(); ?></h5>
	<div class="card-text">
	    <a href="<?php the_permalink() ?>" class="btn btn-primary">LEARN MORE</a>
	</div>
    </div>
</div>