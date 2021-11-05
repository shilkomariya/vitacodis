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
    <div class="entry-content mt-2">
	<?php
	echo wpautop($post->post_content);
	?>
    </div>
</article>
