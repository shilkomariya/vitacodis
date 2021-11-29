<?php
/**
 * LearnDash LD30 Displays a lesson.
 *
 * Available Variables:
 *
 * $course_id                  : (int) ID of the course
 * $course                     : (object) Post object of the course
 * $course_settings            : (array) Settings specific to current course
 * $course_status              : Course Status
 * $has_access                 : User has access to course or is enrolled.
 *
 * $courses_options            : Options/Settings as configured on Course Options page
 * $lessons_options            : Options/Settings as configured on Lessons Options page
 * $quizzes_options            : Options/Settings as configured on Quiz Options page
 *
 * $user_id                    : (object) Current User ID
 * $logged_in                  : (true/false) User is logged in
 * $current_user               : (object) Currently logged in user object
 *
 * $quizzes                    : (array) Quizzes Array
 * $post                       : (object) The lesson post object
 * $topics                     : (array) Array of Topics in the current lesson
 * $all_quizzes_completed      : (true/false) User has completed all quizzes on the lesson Or, there are no quizzes.
 * $lesson_progression_enabled : (true/false)
 * $show_content               : (true/false) true if lesson progression is disabled or if previous lesson is completed.
 * $previous_lesson_completed  : (true/false) true if previous lesson is completed
 * $lesson_settings            : Settings specific to the current lesson.
 *
 * @since 3.0.0
 *
 * @package LearnDash\Templates\LD30
 */
if (!defined('ABSPATH')) {
    exit;
}

$in_focus_mode = LearnDash_Settings_Section::get_section_setting('LearnDash_Settings_Theme_LD30', 'focus_mode_enabled');

add_filter('comments_array', 'learndash_remove_comments', 1, 2);
?>



<div class="<?php echo esc_attr(learndash_the_wrapper_class()); ?>">

    <?php
    /**
     * Fires before the lesson.
     *
     * @since 3.0.0
     *
     * @param int $post_id   Post ID.
     * @param int $course_id Course ID.
     * @param int $user_id   User ID.
     */
    do_action('learndash-lesson-before', get_the_ID(), $course_id, $user_id);



    learndash_get_template_part(
	    'modules/infobar.php', array(
	'context' => 'lesson',
	'course_id' => $course_id,
	'user_id' => $user_id,
	    ), true
    );

    /**
     * If the user needs to complete the previous lesson display an alert
     *
     */
    if (@$lesson_progression_enabled && !@$previous_lesson_completed) :

	//$previous_item = learndash_get_previous( $post );
	$previous_item_id = learndash_user_progress_get_previous_incomplete_step($user_id, $course_id, $post->ID);
	if (!empty($previous_item_id)) {
	    learndash_get_template_part(
		    'modules/messages/lesson-progression.php', array(
		'previous_item' => get_post($previous_item_id),
		'course_id' => $course_id,
		'context' => 'topic',
		'user_id' => $user_id,
		    ), true
	    );
	}
    endif;

    if ($show_content) :

	/**
	 * Content and/or tabs
	 */
	learndash_get_template_part(
		'modules/tabs.php', array(
	    'course_id' => $course_id,
	    'post_id' => get_the_ID(),
	    'user_id' => $user_id,
	    'content' => $content,
	    'materials' => $materials,
	    'context' => 'lesson',
		), true
	);

	/**
	 * Display Lesson Assignments
	 */
	$bypass_course_limits_admin_users = learndash_can_user_bypass($user_id, 'learndash_lesson_assignment');
	if (learndash_lesson_hasassignments($post) && !empty($user_id)) :
	    if (( learndash_lesson_progression_enabled() && learndash_lesson_topics_completed($post->ID) ) || !learndash_lesson_progression_enabled() || $bypass_course_limits_admin_users) :
		/**
		 * Fires before the lesson assignment.
		 *
		 * @since 3.0.0
		 *
		 * @param int $post_id   Post ID.
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-lesson-assignment-before', get_the_ID(), $course_id, $user_id);

		learndash_get_template_part(
			'assignment/listing.php', array(
		    'course_step_post' => $post,
		    'user_id' => $user_id,
		    'course_id' => $course_id,
			), true
		);

		/**
		 * Fires after the lesson assignment.
		 *
		 * @since 3.0.0
		 *
		 * @param int $post_id   Post ID.
		 * @param int $course_id Course ID.
		 * @param int $user_id   User ID.
		 */
		do_action('learndash-lesson-assignment-after', get_the_ID(), $course_id, $user_id);

	    endif;
	endif;

	/**
	 * Lesson Topics or Quizzes
	 */
	if (!empty($topics) || !empty($quizzes)) :

	    $lesson_Id = $topics[0]->ID;
	    if ($lesson_Id) {
		wp_safe_redirect(get_the_permalink($lesson_Id));
	    }

	    /**
	     * Fires before the course certificate link
	     *
	     * @since 3.0.0
	     *
	     * @param int $post_id   Post ID.
	     * @param int $course_id Course ID.
	     * @param int $user_id   User ID.
	     */
	    do_action('learndash-lesson-content-list-before', get_the_ID(), $course_id, $user_id);

	    global $post;
	    $lesson = array(
		'post' => $post,
	    );
	    ?>

	    <div class="ld-lesson-topic-list">
		<?php
		learndash_get_template_part(
			'lesson/listing.php', array(
		    'course_id' => $course_id,
		    'lesson' => $lesson,
		    'topics' => $topics,
		    'quizzes' => $quizzes,
		    'user_id' => $user_id,
			), true
		);
		?>
	    </div>

	    <?php
	    /**
	     * Fires before the course certificate link
	     *
	     * @since 3.0.0
	     *
	     * @param int $post_id   Post ID.
	     * @param int $course_id Course ID.
	     * @param int $user_id   User ID.
	     */
	    do_action('learndash-lesson-content-list-after', get_the_ID(), $course_id, $user_id);

	endif;

    endif; // end $show_content

    /**
     * Set a variable to switch the next button to complete button
     * @var $can_complete [bool] - can the user complete this or not?
     */
    $can_complete = false;

    if ($all_quizzes_completed && $logged_in && !empty($course_id)) :

	/**
	 * Filters whether a user can complete the lesson or not.
	 *
	 * @since 3.0.0
	 *
	 * @param boolean $can_complete Whether user can complete lesson or not.
	 * @param int     $post_id      Lesson ID/Topic ID.
	 * @param int     $course_id    Course ID.
	 * @param int     $user_id      User ID.
	 */
	$can_complete = apply_filters('learndash-lesson-can-complete', true, get_the_ID(), $course_id, $user_id);
    endif;

    if ((get_the_title() != "Course Feedback") && (get_the_title() != "Feedback Thank You")) {

	learndash_get_template_part(
		'modules/course-steps.php', array(
	    'course_id' => $course_id,
	    'course_step_post' => $post,
	    'user_id' => $user_id,
	    'course_settings' => isset($course_settings) ? $course_settings : array(),
	    'can_complete' => $can_complete,
	    'context' => 'lesson',
		), true
	);
    }
    /**
     * Fires after the lesson
     *
     * @since 3.0.0
     *
     * @param int $post_id   Post ID.
     * @param int $course_id Course ID.
     * @param int $user_id   User ID.
     */
    do_action('learndash-lesson-after', get_the_ID(), $course_id, $user_id);
    learndash_load_login_modal_html();
    ?>

    <div class="modal fade" id="nextModulePopup" tabindex="-1" aria-labelledby="nextModulePopupLabel" aria-hidden="true">
	<div class="modal-dialog">
	    <div class="modal-content">
		<div class="modal-body">
		    <span id="nextModulePopupClose"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.995 511.995" fill="#272727">
			    <path d="M437.126,74.939c-99.826-99.826-262.307-99.826-362.133,0C26.637,123.314,0,187.617,0,256.005s26.637,132.691,74.993,181.047c49.923,49.923,115.495,74.874,181.066,74.874s131.144-24.951,181.066-74.874C536.951,337.226,536.951,174.784,437.126,74.939z M409.08,409.006c-84.375,84.375-221.667,84.375-306.042,0c-40.858-40.858-63.37-95.204-63.37-153.001s22.512-112.143,63.37-153.021c84.375-84.375,221.667-84.355,306.042,0C493.435,187.359,493.435,324.651,409.08,409.006z"/>
			    <path d="M341.525,310.827l-56.151-56.071l56.151-56.071c7.735-7.735,7.735-20.29,0.02-28.046c-7.755-7.775-20.31-7.755-28.065-0.02l-56.19,56.111l-56.19-56.111c-7.755-7.735-20.31-7.755-28.065,0.02c-7.735,7.755-7.735,20.31,0.02,28.046l56.151,56.071l-56.151,56.071c-7.755,7.735-7.755,20.29-0.02,28.046c3.868,3.887,8.965,5.811,14.043,5.811s10.155-1.944,14.023-5.792l56.19-56.111l56.19,56.111c3.868,3.868,8.945,5.792,14.023,5.792c5.078,0,10.175-1.944,14.043-5.811C349.28,331.117,349.28,318.562,341.525,310.827z"/>
			</svg>
		    </span>
		    <div class="nextModulePopupContent">
			<p class="paragraph-one">This module includes the quiz with several multiple-choice questions that help to understand the lessons better.</p>
			<p class="paragraph-two">The quiz is not mandatory, you can skip it and proceed to the next module of the course.</p>
		    </div>
		    <div class="nextModulePopupButtons">
			<a href="#" id="take_the_quiz">Take the Quiz</a>
			<a href="#" id="take_next_module">Next Module</a>
		    </div>
		</div>
	    </div>
	</div>
    </div>

</div> <!--/.learndash-wrapper-->
