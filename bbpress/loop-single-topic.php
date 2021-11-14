<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div id="bbp-topic-<?php bbp_topic_id(); ?>" class="topic-item">
	<div class="bbp-topic-avatar">
		<?php
			$user_avatar = bp_core_fetch_avatar(
			 array(
				 'item_id' => bbp_get_topic_author_id(),
				 'type' => 'full'
			 )
			);
			echo $user_avatar;
		?>
	</div>
	<div class="bbp-topic-right">
		<div class="topic-head">
			<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
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
					if(!empty($replies) && $replies != 0) {
						echo '<li>' . $replies . ' Replies</li>';
					}
				?>
			</ul>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>
