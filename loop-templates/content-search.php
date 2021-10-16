<?php
/**
 * Search results partial template
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<article <?php post_class('mb-2'); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header">
	<?php
	the_title(
		sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'
	);
	?>
	<?php if ('post' === get_post_type()) : ?>
    	<div class="entry-meta mb-1">
		<?php vitacodis_posted_on(); ?>
    	</div><!-- .entry-meta -->
	<?php endif; ?>
    </header><!-- .entry-header -->
    <div class="entry-summary">
	<?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
</article><!-- #post-## -->
