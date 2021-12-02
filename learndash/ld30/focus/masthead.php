<?php
if (!defined('ABSPATH')) {
    exit;
}

global $post;
$header = array(
    'logo_alt' => '',
    'logo_url' => '',
    'text' => '',
    'text_url' => '',
);
$header['logo'] = LearnDash_Settings_Section::get_section_setting('LearnDash_Settings_Theme_LD30', 'login_logo');
if (!empty($header['logo'])) {
    $header['logo_alt'] = get_post_meta($header['logo'], '_wp_attachment_image_alt', true);
    /**
     * Filters Focus mode header logo alternative text.
     * This filter will be called only if there is a logo set in LearnDash plugin settings.
     *
     * @param string $logo_alt Header logo alternative text.
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    $header['logo_alt'] = apply_filters('learndash_focus_header_logo_alt', $header['logo_alt'], $course_id, $user_id);
    /**
     * Filters Focus mode header logo URL.
     * This filter will be called only if there is a logo set in LearnDash plugin settings.
     *
     * @param string $logo_url Header logo URL.
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    $header['logo_url'] = apply_filters('learndash_focus_header_logo_url', get_home_url(), $course_id, $user_id);
} else {
    /**
     * Filters Focus mode header text. This text is used to display in place of the logo.
     * This filter will be called only if there is no logo set in LearnDash plugin settings.
     *
     * @param string $header_text Focus mode header text.
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    $header['text'] = apply_filters('learndash_focus_header_text', '', $course_id, $user_id);
    if (!empty($header['text'])) {
	/**
	 * Filters Focus mode header text URL.
	 * This filter will be called only if there is no logo set in LearnDash plugin settings.
	 *
	 * @param string $header_text_url Header Text URL
	 * @param int $course_id Course ID.
	 * @param int $user_id User ID.
	 */
	$header['text_url'] = apply_filters('learndash_focus_header_text_url', '', $course_id, $user_id);
    }
}
?>
<div data-child="1" class="ld-focus-header">
    <?php
    /**
     * Fires before the header mobile nav in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-mobile-nav-before', $course_id, $user_id);
    ?>
    <div class="ld-mobile-nav">
        <a href="#" class="ld-trigger-mobile-nav" aria-label="<?php esc_attr_e('Menu', 'learndash'); ?>">
            <span class="bar-1"></span>
            <span class="bar-2"></span>
            <span class="bar-3"></span>
        </a>
    </div>

    <div class="arrow-mobile-nav">
	<?php
	$pageurl = $_SERVER['REQUEST_URI'];

	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	// echo $url;

	if (strpos($url, "introduction") !== false) {
	    ?>
    	<a href="<?php the_permalink($course_id); ?><?php
	    if (isset($_GET['freecourses'])) {
		echo '?freecourses=true';
	    }
	    ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
	   <?php } else if (strpos($url, "lessons") !== false) {
	       ?>
    	<a href="<?php the_permalink($course_id); ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>

	<?php } else { ?>

    	<a href="<?php echo esc_url(get_the_permalink($course_id)); ?>"><i class="fa fa-chevron-left"
    									   aria-hidden="true"></i></a>
	    <?php }
	    ?>

    </div>

    <?php
    /**
     * Fires before the header logo in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-logo-before', $course_id, $user_id);
    ?>

    <div class="ld-brand-logo ct-logo">
	<?php
	$header_element = '';
	if (!empty($header['logo'])) {
	    if (!empty($header['logo_url'])) {
		$header_element .= '<a href="' . esc_url($header['logo_url']) . '">';
	    }
	    $header_element .= '<img src="' . esc_url(wp_get_attachment_url($header['logo'])) . '" alt="' . esc_html($header['logo_alt']) . '" />';
	    if (!empty($header['logo_url'])) {
		$header_element .= '</a>';
	    }
	} else {
	    if (!empty($header['text'])) {
		if (!empty($header['text_url'])) {
		    $header_element .= '<a href="' . esc_url($header['text_url']) . '">';
		}
		$header_element .= esc_html($header['text']);
		if (!empty($header['text_url'])) {
		    $header_element .= '</a>';
		}
	    } else {
		?>
		<h3 class="course-heading h5">
		    <a href="<?php echo esc_url(get_the_permalink($course_id)); ?><?php
		    if (isset($_GET['freecourses'])) {
			echo '?freecourses=true';
		    }
		    ?>" id="ld-focus-mode-course-heading">
		       <?php echo esc_html(get_the_title($course_id)); ?>
		    </a>
		</h3>
		<?php
	    }
	}

	/**
	 * Filters Focus mode Header element markup.
	 *
	 * @param string $header_element Focus mode header element markup.
	 * @param array $header Array of header element details keyed logo_alt, logo_url, text, text_url.
	 * @param int $course_id Course ID.
	 * @param int $user_id User ID.
	 */
	$header_element = apply_filters('learndash_focus_header_element', $header_element, $header, $course_id, $user_id);
	echo $header_element; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Outputs HTML for the header element
	?>
    </div>

    <?php
    /**
     * Fires after the header logo in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-logo-after', $course_id, $user_id);

    if (is_user_logged_in()) {
	learndash_get_template_part(
		'modules/progress.php', array(
	    'course_id' => $course_id,
	    'user_id' => $user_id,
	    'context' => 'focus',
		), true
	);
    }

    /**
     * Fires before the header nav in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-nav-before', $course_id, $user_id);

    /**
      $can_complete = learndash_30_focus_mode_can_complete();

      learndash_get_template_part(
      'modules/course-steps.php', array(
      'course_id' => $course_id,
      'course_step_post' => $post,
      'user_id' => $user_id,
      'course_settings' => isset($course_settings) ? $course_settings : array(),
      'can_complete' => $can_complete,
      'context' => 'focus',
      ), true
      );

      /**
     * Fires after the header nav in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-nav-after', $course_id, $user_id);
    ?>
    <script>
	function toggleFullScreen(elem) {
	    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
	    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
		if (elem.requestFullScreen) {
		    elem.requestFullScreen();
		} else if (elem.mozRequestFullScreen) {
		    elem.mozRequestFullScreen();
		} else if (elem.webkitRequestFullScreen) {
		    elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
		} else if (elem.msRequestFullscreen) {
		    elem.msRequestFullscreen();
		}
	    } else {
		if (document.cancelFullScreen) {
		    document.cancelFullScreen();
		} else if (document.mozCancelFullScreen) {
		    document.mozCancelFullScreen();
		} else if (document.webkitCancelFullScreen) {
		    document.webkitCancelFullScreen();
		} else if (document.msExitFullscreen) {
		    document.msExitFullscreen();
		}
	    }
	}
    </script>

    <div class="wrap_icon_fullscreen-mode" id="swither-fullscreen">
        <span class="ld-settings-mode" onclick="toggleFullScreen(document.body)">
	    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.3 595.3"> <path fill="currentColor" d="M297.4,0.2c82.2,0,156.6,33.3,210.5,87.2c53.9,53.9,87.2,128.3,87.2,210.5s-33.3,156.6-87.2,210.5c-53.9,53.9-128.3,87.2-210.5,87.2S140.8,562.2,87,508.3C33.1,454.4-0.2,380-0.2,297.8S33.1,141.2,87,87.4C140.8,33.5,215.2,0.2,297.4,0.2L297.4,0.2z M496.9,98.4c-51-51-121.6-82.6-199.4-82.6S149,47.4,98,98.4S15.4,220,15.4,297.8S46.9,446.2,98,497.3c51,51,121.6,82.6,199.4,82.6s148.4-31.6,199.4-82.6s82.6-121.6,82.6-199.4S547.9,149.4,496.9,98.4L496.9,98.4z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M463.7,138c-0.6-1.4-1.5-2.8-2.5-3.9c-1.2-1.1-2.5-1.9-3.9-2.5c-1.4-0.6-3-0.9-4.5-1l-95.6,0c-6.6,0-11.9,5.3-11.9,11.9c0,6.6,5.3,11.9,11.9,11.9h66.8l-99.1,99c-2.3,2.2-3.5,5.3-3.5,8.5s1.3,6.2,3.5,8.5c2.2,2.3,5.3,3.5,8.5,3.5c3.2,0,6.2-1.3,8.5-3.5l99-99.1v66.8c0,6.6,5.3,11.9,11.9,11.9c6.6,0,11.9-5.3,11.9-11.9v-95.6C464.6,141,464.3,139.5,463.7,138L463.7,138L463.7,138z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M170.9,154.5h66.8c6.6,0,11.9-5.3,11.9-11.9c0-6.6-5.3-11.9-11.9-11.9h-95.6c-1.6,0-3.1,0.3-4.5,1c-1.4,0.6-2.8,1.5-3.9,2.5c-1.1,1.2-1.9,2.5-2.5,3.9c-0.6,1.4-0.9,3-1,4.5v95.6c0,6.6,5.3,11.9,11.9,11.9c6.6,0,11.9-5.3,11.9-11.9l0-66.8l99,99.1c2.2,2.3,5.3,3.5,8.5,3.5c3.2,0,6.2-1.3,8.5-3.5c2.3-2.2,3.5-5.3,3.5-8.5s-1.3-6.2-3.5-8.5L170.9,154.5L170.9,154.5z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M452.7,345.6c-6.6,0-11.9,5.3-11.9,11.9v66.8l-99-99.1c-2.2-2.2-5.3-3.5-8.5-3.5c-6.6,0-12,5.4-12,12c0,3.2,1.3,6.2,3.5,8.5l99.1,99h-66.8c-6.6,0-11.9,5.3-11.9,11.9c0,6.6,5.3,11.9,11.9,11.9l95.6,0c1.6,0,3.1-0.3,4.5-1c3-1.1,5.4-3.5,6.4-6.5c0.6-1.4,0.9-3,1-4.5l0-95.6C464.7,351,459.3,345.6,452.7,345.6L452.7,345.6L452.7,345.6z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M253.1,325.2l-99,99.1v-66.8c0-6.6-5.3-11.9-11.9-11.9c-6.6,0-11.9,5.3-11.9,11.9v95.6c0,1.6,0.3,3.1,1,4.5c0.6,1.4,1.5,2.8,2.5,3.9c1.2,1.1,2.5,1.9,3.9,2.5c1.4,0.6,3,0.9,4.5,1l95.6,0c6.6,0,11.9-5.3,11.9-11.9s-5.3-11.9-11.9-11.9l-66.8,0l99.1-99c2.2-2.2,3.5-5.3,3.5-8.5c0-6.6-5.4-12-12-12C258.4,321.7,255.4,322.9,253.1,325.2L253.1,325.2L253.1,325.2z"/></svg>
	</span>
    </div>
    <div class="wrap_icon_settings-mode" id="swither-panel-darkmode-fullscreen">
        <span class="ld-settings-mode">
	    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.3 595.3" class="day"><path fill="currentColor" d="M297.4,0.2c82.2,0,156.6,33.3,210.5,87.2c53.9,53.9,87.2,128.3,87.2,210.5s-33.3,156.6-87.2,210.5c-53.9,53.9-128.3,87.2-210.5,87.2S140.8,562.2,87,508.3C33.1,454.4-0.2,380-0.2,297.8S33.1,141.2,87,87.4C140.8,33.5,215.2,0.2,297.4,0.2L297.4,0.2z M496.9,98.4c-51-51-121.6-82.6-199.4-82.6S149,47.4,98,98.4S15.4,220,15.4,297.8S46.9,446.2,98,497.3c51,51,121.6,82.6,199.4,82.6s148.4-31.6,199.4-82.6s82.6-121.6,82.6-199.4S547.9,149.4,496.9,98.4L496.9,98.4z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M297.4,170.1c-35.6,0-67.5,14.1-90.6,37.2s-37.2,55-37.2,90.6c0,71.2,56.6,127.8,127.8,127.8c71.2,0,127.8-56.6,127.8-127.8c0-35.6-14.1-67.5-37.2-90.6C365,184.2,333,170.1,297.4,170.1z M301.4,226.7v10.8c15.5,0.9,29.1,7.3,39.1,17.3c10,10,16.4,23.6,17.3,39.1l10.8,0c-1-18-8.8-34.3-20.8-46.4C335.7,235.5,319.5,227.7,301.4,226.7z M178.5,396l-38.3,38.3c-3,3-4.5,6.7-4.5,10.3s1.5,7.4,4.5,10.3c3,3,6.7,4.5,10.3,4.5c3.7,0,7.4-1.5,10.3-4.5l38.3-38.3c-3.3-2.8-8.4-7.1-11.9-10.6v0C184.9,403.7,181.1,399.2,178.5,396z M282.6,451.6v53.3c0,4.5,1.5,8.3,4,10.8c2.5,2.5,6.3,4,10.8,4c4.5,0,8.3-1.5,10.8-4c2.5-2.5,4-6.3,4-10.8v-53.8c-4.5,0.6-11.1,1.3-14.8,1.3C293.8,452.4,287.6,452.4,282.6,451.6z M416.4,396.4c-3.1,3.9-6.3,7.2-10.7,11.6l0,0c-2.6,2.6-7.5,7.5-11.7,10.9l38.1,38.1c3,3,6.7,4.5,10.3,4.5s7.4-1.5,10.3-4.5c3-3,4.5-6.7,4.5-10.3s-1.5-7.4-4.5-10.3L416.4,396.4L416.4,396.4z M504.5,283h-54.1c0.2,1.6,0.4,3.2,0.6,4.9c0.5,3.5,1,6.9,1,10c0,3.6,0,9.8-0.9,14.8h53.3c4.5,0,8.3-1.5,10.8-4s4-6.3,4-10.8c0-4.5-1.5-8.3-4-10.8C512.8,284.5,509,283,504.5,283z M416.3,199.6l38.3-38.3c3-3,4.5-6.7,4.5-10.3c0-3.7-1.5-7.4-4.5-10.3c-3-3-6.7-4.5-10.3-4.5s-7.4,1.5-10.3,4.5l-38.1,38.1c4,3.1,7.3,6.4,11.7,10.8l0,0v0C410,192,413.7,196.5,416.3,199.6L416.3,199.6z M312.3,144.1V90.8c0-4.5-1.5-8.3-4-10.8c-2.5-2.5-6.3-4-10.8-4c-4.5,0-8.3,1.5-10.8,4c-2.5,2.5-4,6.3-4,10.8v53.3c1.7-0.3,3.4-0.5,5.1-0.6c3.5-0.3,6.8-0.3,9.7-0.3C301.1,143.2,307.2,143.2,312.3,144.1L312.3,144.1z M178.3,199.4c3.1-4,6.4-7.3,10.8-11.7l0,0c2.8-2.8,5.2-5.2,7.7-7.4c1.3-1.1,2.5-2.2,3.9-3.3L161,140.7c-3-3-6.7-4.5-10.3-4.5c-3.7,0-7.4,1.5-10.3,4.5c-3,3-4.5,6.7-4.5,10.3c0,3.7,1.5,7.4,4.5,10.3L178.3,199.4L178.3,199.4z M142.8,297.8c0-4.3,0-9.8,0.8-14.8H90.4c-4.5,0-8.3,1.5-10.8,4c-2.5,2.5-4,6.3-4,10.8c0,4.5,1.5,8.3,4,10.8c2.5,2.5,6.3,4,10.8,4h53.3C142.8,307.6,142.8,302.2,142.8,297.8z M297.4,396c-27.5,0-52-10.8-69.7-28.5c-17.7-17.7-28.5-42.2-28.5-69.7c0-27.5,10.8-52,28.5-69.7c17.7-17.7,42.2-28.5,69.7-28.5c27.5,0,52,10.8,69.7,28.5c17.7,17.7,28.5,42.2,28.5,69.7s-10.8,52-28.5,69.7C349.4,385.2,324.9,396,297.4,396z"/></svg>
	    <svg class="night" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.3 595.3"> <path fill="currentColor" d="M297.4,0.2c82.2,0,156.6,33.3,210.5,87.2c53.9,53.9,87.2,128.3,87.2,210.5s-33.3,156.6-87.2,210.5c-53.9,53.9-128.3,87.2-210.5,87.2S140.8,562.2,87,508.3C33.1,454.4-0.2,380-0.2,297.8S33.1,141.2,87,87.4C140.8,33.5,215.2,0.2,297.4,0.2L297.4,0.2z M496.9,98.4c-51-51-121.6-82.6-199.4-82.6S149,47.4,98,98.4S15.4,220,15.4,297.8S46.9,446.2,98,497.3c51,51,121.6,82.6,199.4,82.6s148.4-31.6,199.4-82.6s82.6-121.6,82.6-199.4S547.9,149.4,496.9,98.4L496.9,98.4z"/> <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M403.7,399.4v1.2c9.9,0,17.9,7.9,17.9,17.7l1.3,0c0-9.8,8-17.7,17.9-17.7v-1.2c-9.9,0-17.9-7.9-17.9-17.7l-1.3,0C421.6,391.5,413.6,399.4,403.7,399.4L403.7,399.4z M361.7,118.9c-18-5.6-37.2-8.6-57.1-8.6c-104.9,0-189.9,84-189.9,187.6s85,187.6,189.9,187.6c19.9,0,39.1-3,57.1-8.6c-77-24-132.8-95-132.8-178.9C228.9,213.9,284.8,142.8,361.7,118.9L361.7,118.9z M387.3,320.5v-2.6c-20.7,0-37.4-16.5-37.4-36.9l-2.6,0c0,20.4-16.7,36.9-37.4,36.9v2.6c20.7,0,37.4,16.5,37.4,36.9h2.6C349.9,337,366.6,320.5,387.3,320.5L387.3,320.5z M411,181.9v-1.4c-11.2,0-20.3-9-20.3-20h-1.4c0,11.1-9.1,20-20.3,20v1.4c11.2,0,20.3,9,20.3,20.1l1.4,0C390.7,190.9,399.8,181.9,411,181.9L411,181.9z M480.1,257.7v-2.2c-17.3,0-31.2-13.8-31.2-30.9l-2.2,0c0,17-14,30.9-31.2,30.9v2.2c17.3,0,31.2,13.8,31.2,30.9l2.2,0C448.9,271.5,462.9,257.7,480.1,257.7z"/></svg>
        </span>
    </div>

    <?php if (is_user_logged_in()) : ?>
        <div class="ld-user-menu">
	    <?php
	    /**
	     * Fires before the user menu in the focus template.
	     *
	     * @param int $course_id Course ID.
	     * @param int $user_id User ID.
	     */
	    do_action('learndash-focus-header-user-menu-before', $course_id, $user_id);
	    ?>
    	<span class="ld-profile-avatar">
		<?php
		/**
		 * Fires before the user avatar in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id User ID.
		 */
		do_action('learndash-focus-header-avatar-before', $course_id, $user_id);
		?>
    	    <i class="fa fa-user" aria-hidden="true"></i>
		<?php
		//echo get_avatar($user_id);
		/**
		 * Fires after the user avatar in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id User ID.
		 */
		do_action('learndash-focus-header-avatar-after', $course_id, $user_id);
		?>
    	</span> <!--/.ld-profile-avatar-->

	    <?php
	    /**
	     * Fires before the header user dropdown in the focus template.
	     *
	     * @param int $course_id Course ID.
	     * @param int $user_id User ID.
	     */
	    do_action('learndash-focus-header-user-dropdown-before', $course_id, $user_id);
	    ?>

    	<span class="ld-user-menu-items">
		<?php
		$custom_menu_items = learndash_30_get_custom_focus_menu_items();

		$menu_items = array(
		    'course-home' => array(
			'url' => get_the_permalink($course_id),
			'label' => sprintf(
				// translators: Placeholder for course home link.
				esc_html_x('%s Home', 'Placeholder for course home link', 'learndash'), LearnDash_Custom_Label::get_label('course')
			),
		    ),
		);

		if ($custom_menu_items) :
		    foreach ($custom_menu_items as $menu_item) :
			$menu_items[$menu_item->post_name] = array(
			    'url' => $menu_item->url,
			    'label' => $menu_item->title,
			    'classes' => esc_attr('ld-focus-menu-link ld-focus-menu-' . $menu_item->post_name),
			    'target' => '',
			    'attr_title' => '',
			    'xfn' => '',
			);

			if ((property_exists($menu_item, 'classes')) && (is_array($menu_item->classes))) {
			    $classes = array_filter($menu_item->classes, 'strlen');
			    if (!empty($classes)) {
				$menu_items[$menu_item->post_name]['classes'] .= ' ' . implode(' ', $classes);
			    }
			}

			if ((property_exists($menu_item, 'target')) && (!empty($menu_item->target))) {
			    $menu_items[$menu_item->post_name]['target'] = esc_attr($menu_item->target);
			}

			if ((property_exists($menu_item, 'attr_title')) && (!empty($menu_item->attr_title))) {
			    $menu_items[$menu_item->post_name]['attr_title'] = esc_attr($menu_item->attr_title);
			}
			if ((property_exists($menu_item, 'xfn')) && (!empty($menu_item->xfn))) {
			    $menu_items[$menu_item->post_name]['xfn'] = esc_attr($menu_item->xfn);
			}

		    endforeach;
		endif;

		$menu_items['logout'] = array(
		    'url' => wp_logout_url(get_the_permalink($course_id)),
		    'label' => __('Logout', 'learndash'),
		);

		if ($menu_items && !empty($menu_items)) :
		    foreach ($menu_items as $slug => $item) :
			?>
	    	    <a <?php if (!empty($item['classes'])) { ?>
				class="<?php echo esc_attr($item['classes']); ?>"
			    <?php } ?> <?php if (!empty($item['target'])) { ?>
				target="<?php echo esc_attr($item['target']); ?>"
			    <?php } ?> <?php if (!empty($item['xfn'])) { ?>
				rel="<?php echo esc_attr($item['xfn']); ?>"
			    <?php } ?> <?php if (!empty($item['attr_title'])) { ?>
				title="<?php echo esc_attr($item['attr_title']); ?>"
			    <?php } ?> href="<?php echo esc_url($item['url']); ?>"><?php echo apply_filters('the_title', $item['label'], 0); ?></a>
			    <?php
			endforeach;
		    endif;
		    ?>
    	</span> <!--/.ld-user-menu-items-->

	    <?php
	    /**
	     * Fires before the header user dropdown in the focus template.
	     *
	     * @param int $course_id Course ID.
	     * @param int $user_id User ID.
	     */
	    do_action('learndash-focus-header-user-dropdown-after', $course_id, $user_id);
	    ?>

        </div>
    <?php else: ?>
        <div class="ld-user-menu">
    	<span class="ld-profile-avatar">
    	    <i class="fa fa-user" aria-hidden="true"></i>
    	</span> <!--/.ld-profile-avatar-->

    	<span class="ld-user-menu-items">
    	    <a href="/my-account/">Login</a>
    	</span>

        </div>

    <?php
    endif;
    /**
     * Fires after the header user dropdown in the focus template.
     *
     * @param int $course_id Course ID.
     * @param int $user_id User ID.
     */
    do_action('learndash-focus-header-usermenu-after', $course_id, $user_id);
    ?>
</div> <!--/.ld-focus-header-->