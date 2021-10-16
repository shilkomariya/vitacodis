<?php
/**
 * Partial template for content in page.php
 *
 * @package Beach-Sweat
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="container py-3">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

	    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

	<div class="entry-content">

	    <?php the_content(); ?>

	    <?php
	    wp_link_pages(
		    array(
			'before' => '<div class="page-links">' . __('Pages:', 'vitacodis'),
			'after' => '</div>',
		    )
	    );
	    ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	    <?php edit_post_link(__('Edit', 'vitacodis'), '<span class="edit-link">', '</span>'); ?>

	</footer><!-- .entry-footer -->

    </article><!-- #post-## -->
</div>