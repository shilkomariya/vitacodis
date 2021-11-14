<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

//do_action( 'bbp_template_before_topics_loop' ); ?>


<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php
	/*if (bp_is_my_profile()) {
		$component = bp_current_component();
		$forum_slug = $component == 'news' ? 'news' : 'discussions';
		echo '<a class="new-discussion" href="/forums/forum/' . $forum_slug . '">NEW DISCUSSION </a>';
	}*/
?>

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
