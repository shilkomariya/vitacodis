<?php do_action( 'youzer_account_before_content' ); ?>

<?php
	$action = bp_current_action();
	$is_avatar_page = FALSE;
	if ($action == 'change-avatar' || $action == 'change-cover-image'){
		$is_avatar_page = TRUE;
	}
?>

<div id="youzer">

	<div id="<?php echo apply_filters( 'yz_account_template_id', 'yz-bp' ); ?>" class="youzer yz-page yz-account-page">

		<?php do_action( 'youzer_account_before_main' ); ?>

		<main class="yz-page-main-content <?php echo $is_avatar_page ? 'avatar-pages' : 'non-avatar-pages'; ?>">

			<?php
				if (!$is_avatar_page) {
			?>

				<aside class="youzer-sidebar yz-settings-sidebar">

					<?php do_action( 'youzer_settings_menus' ); ?>

				</aside>

			<?php } ?>

			<div class="youzer-main-content settings-main-content">

				<?php do_action( 'bp_before_member_settings_template' ); ?>

				<div id="template-notices" role="alert" aria-atomic="true">
					<?php

					/**
					 * Fires towards the top of template pages for notice display.
					 *
					 * @since 1.0.0
					 */
					do_action( 'template_notices' ); ?>

				</div>

				<div class="youzer-inner-content settings-inner-content">

	                <?php do_action( 'youzer_account_before_form'); ?>

	                <?php do_action( 'youzer_profile_settings' ); ?>

	                <?php do_action( 'youzer_account_after_form' ); ?>

				</div>

			</div>

			<?php
			//if ($is_avatar_page) {
				$Youzer_Profile = new Youzer_Profile();
			?>
				<div class="yz-sidebar-column grid-column yz-profile-sidebar yz-right-sidebar"><?php $Youzer_Profile->sidebar_widgets( 'right', yz_option( 'yz_profile_sidebar_widgets', array(
						'login'           => 'visible',
								'user_balance'    => 'visible',
								'user_badges'     => 'visible',
								'about_me'        => 'visible',
								'wall_media'      => 'visible',
								'social_networks' => 'visible',
								'friends'         => 'visible',
								'flickr'          => 'visible',
								'groups'          => 'visible',
								'recent_posts'    => 'visible',
								'user_tags'       => 'visible',
								'email'           => 'visible',
								'address'         => 'visible',
								'website'         => 'visible',
								'phone'           => 'visible'
						) ) ); ?></div>
			<?php //} ?>

		</main>

		<?php do_action( 'youzer_account_footer'); ?>

	</div>

</div>
