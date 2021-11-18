<?php

namespace App\Learndash;

class CourseButtonsLabels {

    public function __construct() {
	add_filter('learndash_get_label_course_step_previous', array($this, 'learndash_set_default_value_to_prev'), 10, 2);
	add_filter('learndash_get_label_course_step_next', array($this, 'learndash_set_default_value_to_next'), 10, 2);
	add_filter('learndash_next_step_id', array($this, 'learndash_next_step'), 10, 4);
	add_filter('learndash_show_next_link', array($this, 'learndash_show_next_link_or_not'), 10, 3);
    }

    /**
     * Set default button to "Prev" label no matter if it is a Course, etc.
     *
     * @param string $step_post_type The post_type slug of the post to return label for.
     * @return string label
     */
    public function learndash_set_default_value_to_prev($step_label, $step_post_type) {
	// let's check if it is not a Congratulations for completing the course! page (sfwd-lessons)
	$step_label = esc_html_x('Back', 'placeholder: Default Prev', 'learndash');

	if (self::learndash_post_type() == 'feedback-thank-you') {
	    $step_label = '';
	}

	return $step_label;
    }

    /**
     * Set default button to "Next" label no matter if it is a Course, etc.
     *
     * @return string label
     */
    public function learndash_set_default_value_to_next($step_label) {

	$step_label = esc_html_x('Next', 'placeholder: Default Next', 'learndash');
	return $step_label;
    }

    /**
     * If we are on course discussion get next lesson link on "Next" button
     *
     * @return string $learndash_next_step_id
     */
    public function learndash_next_step($learndash_next_step_id, $course_step_post, $course_id, $user_id) {
	// if there is a next lesson, get it's id by key
	$new_learndash_next_step_id = key(learndash_course_get_topics($course_id, $learndash_next_step_id, $query_args = array()));
	if ($new_learndash_next_step_id) {
	    $learndash_next_step_id = $new_learndash_next_step_id;
	}
	return $learndash_next_step_id;
    }

    /**
     * Checks post type
     *
     * @return string "course-introduction", "lesson", "quiz", "course-feedback",
     * "course-discussion", "feedback-thank-you"
     */
    public static function learndash_post_type() {
	global $post;
	$title = $post->post_name;
	if (strpos($title, 'course-feedback') !== false) {
	    $postType = 'course-feedback';
	} else if (strpos($title, 'feedback-thank-you') !== false) {
	    $postType = 'feedback-thank-you';
	} else if (strpos($title, 'course-discussion') !== false) {
	    $postType = 'course-discussion';
	} else if (strpos($title, 'course-introduction') !== false) {
	    $postType = 'course-introduction';
	} else if ($post->post_type == 'sfwd-topic') {
	    $postType = 'lesson';
	} else if ($post->post_type == 'sfwd-quiz') {
	    $postType = 'quiz';
	} else if ($post->post_type == 'sfwd-lessons') {
	    $postType = 'module';
	} else {
	    $postType = '';
	}
	return $postType;
    }

    /**
     * Hides Next link on some pages
     *
     * @return boolean
     */
    public function learndash_show_next_link_or_not($show_next_link, $user_id = 0, $post_id = 0) {

	if (
		self::learndash_post_type() == 'course-feedback' ||
		self::learndash_post_type() == 'feedback-thank-you'
	) {
	    $show_next_link = false;
	}
	return $show_next_link;
    }

}
