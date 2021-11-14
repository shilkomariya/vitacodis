<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<div <?php bbp_reply_class(); ?>>
  <div class="bbp-reply-left">
    <?php bbp_reply_author_link( array( 'show_role' => false ) ); ?>
  </div>
	<div class="bbp-reply-right">

    <div class="bbp-reply-author-name"><?php echo '<a href="' . bp_core_get_userlink(bbp_get_reply_author_id(), false, true) . '">' . _vitacodis_user_full_name(bbp_get_reply_author_id()) . '</a>'; ?></div>
    <div class="bbp-reply-date-val">
      <ul>
        <!--<li><?php bbp_reply_author_link( array( 'show_role' => true ) ); ?></li>-->
      <?php
        $post_date = bbp_get_reply_post_date('', false, false);
        echo '<li>' . $post_date . '</li>';
      ?>
      </ul>
      <div style="clear:both;"></div>
    </div>
    <div class="bbp-reply-content-val">
      <?php bbp_reply_content(); ?>
    </div>

	</div><!-- .bbp-reply-author -->

</div><!-- .reply -->
