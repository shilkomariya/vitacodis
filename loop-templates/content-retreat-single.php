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
    <div class="retreat-header">
	<?php the_title('<h1 class="h2">', '</h1>'); ?>
	<div class="data row mb-1">
	    <div class="item col-auto">
		<svg class="icon"><use xlink:href="#retreat-location"></use></svg>
		<strong><?php echo fw_get_db_post_option(get_the_ID(), 'location') ?></strong>
	    </div>
	    <div class="item col-auto">
		<svg class="icon"><use xlink:href="#retreat-date"></use></svg>
		<strong><?php echo fw_get_db_post_option(get_the_ID(), 'date') ?></strong>
	    </div>
	</div>
    </div>
    <div class="entry-content mt-2">
	<?php
	echo wpautop($post->post_content);
	?>
    </div>
</article>
