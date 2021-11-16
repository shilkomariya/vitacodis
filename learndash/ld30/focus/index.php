<?php
if (have_posts()) :
    while (have_posts()) :
	the_post();

	$cuser = wp_get_current_user();
	$course_id = learndash_get_course_id();
	$user_id = ( is_user_logged_in() ? $cuser->ID : false );

	/**
	 * Fires before the header in the focus template.
	 *
	 * @param int $course_id Course ID.
	 * @param int $user_id   User ID.
	 */
	do_action('learndash-focus-header-before', $course_id, $user_id);

	learndash_get_template_part(
		'focus/header.php', array(
	    'course_id' => $course_id,
	    'user_id' => $user_id,
	    'context' => 'focus',
		), true
	);

	/**
	 * Fires before the sidebar in the focus template.
	 *
	 * @param int $course_id Course ID.
	 * @param int $user_id   User ID.
	 */
	do_action('learndash-focus-sidebar-before', $course_id, $user_id);

	learndash_get_template_part(
		'focus/sidebar.php', array(
	    'course_id' => $course_id,
	    'user_id' => $user_id,
	    'context' => 'focus',
		), true
	);
	?>

	<div class="ld-focus-main">

	    <?php
	    /**
	     * Fires before the masthead in the focus template.
	     *
	     * @param int $course_id Course ID.
	     * @param int $user_id   User ID.
	     */
	    do_action('learndash-focus-masthead-before', $course_id, $user_id);

	    learndash_get_template_part(
		    'focus/masthead.php', array(
		'course_id' => $course_id,
		'user_id' => $user_id,
		'context' => 'focus',
		    ), true
	    );

	    /**
	     * Fires after the masthead in the focus template.
	     *
	     * @param int $course_id Course ID.
	     * @param int $user_id   User ID.
	     */
	    do_action('learndash-focus-masthead-after', $course_id, $user_id);
	    ?>

	    <div class="ld-focus-content">
		<a href="<?php the_permalink(learndash_get_course_steps($course_id)[0]) ?>" class="close-course"><svg xmlns="http://www.w3.org/2000/svg"	viewBox="0 0 50 50" width="25px"><path fill="currentColor" d="M9.016,40.837c0.195,0.195,0.451,0.292,0.707,0.292c0.256,0,0.512-0.098,0.708-0.293l14.292-14.309l14.292,14.309c0.195,0.196,0.451,0.293,0.708,0.293c0.256,0,0.512-0.098,0.707-0.292c0.391-0.39,0.391-1.023,0.001-1.414L26.153,25.129L40.43,10.836c0.39-0.391,0.39-1.024-0.001-1.414c-0.392-0.391-1.024-0.391-1.414,0.001L24.722,23.732L10.43,9.423c-0.391-0.391-1.024-0.391-1.414-0.001c-0.391,0.39-0.391,1.023-0.001,1.414l14.276,14.293L9.015,39.423C8.625,39.813,8.625,40.447,9.016,40.837z"/></svg>
		</a>
		<?php
		/**
		 * Fires before the title in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-focus-content-title-before', $course_id, $user_id);
		?>
		<?php
		/*
		  <h1><?php the_title(); ?></h1>
		 */
		?>

		<?php
		/**
		 * Fires before the content in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-focus-content-content-before', $course_id, $user_id);
		?>

		<?php the_content(); ?>



		<?php
		/**
		 * Fires after the content in the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-focus-content-content-after', $course_id, $user_id);
		?>

		<?php
		wp_link_pages(
			array(
			    'before' => '<div class="page-links">' . esc_html__('Pages:', 'learndash'),
			    'after' => '</div>',
			)
		);
		?>

		<?php
		/**
		 * Filters whether to load comments in focus mode or not.
		 *
		 * @param boolean $load_focus_comments Whether to comments in focus mode or not.
		 */
		if (apply_filters('learndash_focus_mode_can_view_comments', comments_open())) :
		    learndash_get_template_part(
			    'focus/comments.php', array(
			'course_id' => $course_id,
			'user_id' => $user_id,
			'context' => 'focus',
			    ), true
		    );
		endif;
		?>

		<?php
		/**
		 * Fires at the focus mode content end.
		 *
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-focus-content-end', $course_id, $user_id);
		?>
	    </div> <!--/.ld-focus-content-->

	</div> <!--/.ld-focus-main-->

	<?php
	/**
	 * Fires before the footer in the focus template.
	 *
	 * @param int $course_id Course ID.
	 * @param int $user_id   User ID.
	 */
	do_action('learndash-focus-content-footer-before', $course_id, $user_id);

	learndash_get_template_part(
		'focus/footer.php', array(
	    'course_id' => $course_id,
	    'user_id' => $user_id,
	    'context' => 'focus',
		), true
	);

	/**
	 * Fires after the footer in the focus template.
	 *
	 * @param int $course_id Course ID.
	 * @param int $user_id   User ID.
	 */
	do_action('learndash-focus-content-footer-after', $course_id, $user_id);

    endwhile;
else :

    learndash_get_template_part(
	    'modules/alert.php', array(
	'type' => 'warning',
	'icon' => 'alert',
	'message' => esc_html__('No content found at this address', 'learndash'),
	    ), true
    );

endif;
?>
