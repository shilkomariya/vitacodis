<?php
/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
// Exit if accessed directly
defined('ABSPATH') || exit;

do_action('bbp_template_before_replies_loop');
?>

<div class="bbp-news">
    <div class="bbp-topic-info">
	<div class="topic-head">
	    <a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
	</div>
    </div>
    <div class="topic-info">
	<ul>
	    <li>
		<?php echo '<a href="' . bp_core_get_userlink(bbp_get_topic_author_id(), false, true) . '">' . _vitacodis_user_full_name(bbp_get_topic_author_id()) . '</a>'; ?>
	    </li>
	    <li>
		<?php
		$post_date = bbp_get_topic_post_date('', false, false);
		$post_date2 = explode(" at ", $post_date);
		echo $post_date2[0];
		?>
	    </li>
	    <?php
	    $replies = bbp_get_topic_reply_count('', TRUE);
	    if (!empty($replies) && $replies != 0) {
		echo '<li>' . $replies . ' Replies</li>';
	    }
	    ?>
	</ul>
	<div style="clear:both;"></div>
    </div>
</div>

<div id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

    <div class="bbp-body">

	<?php if (bbp_thread_replies()) : ?>

	    <?php bbp_list_replies(); ?>

	<?php else : ?>

	    <?php while (bbp_replies()) : bbp_the_reply(); ?>

		<?php bbp_get_template_part('loop', 'single-reply'); ?>

	    <?php endwhile; ?>

	<?php endif; ?>

    </div><!-- .bbp-body -->

</div><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php
if (bbp_get_forum_id() != '3473') {
    ?>
    <style type="text/css">
        body.single-topic .bbp-reply-form{ display: none; }
        body.single-topic #bbpress-forums .bbp-replies li.bbp-body > div {border: none;}
    </style>
<?php } ?>
<?php
do_action('bbp_template_after_replies_loop');
