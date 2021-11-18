<?php

namespace App\Learndash;

class CourseFeedbackCustomize
{
    public function __construct()
    {
        add_filter( 'learndash_process_mark_complete',
            function( $mark_complete, $post, $current_user ) {
                $access = get_field('access', $post->ID);
                if(!is_null($access) && $access != false && !wp_doing_ajax()){
                    $mark_complete = false;
                }

                return $mark_complete;
            },
            10, 3
        );

        add_action('wp_ajax_course-feedback', array($this, 'checkModuleForComplete') );
        add_action('wp_ajax_nopriv_course-feedback', array($this, 'checkModuleForComplete') );
    }

    /**
     * Check feedback module for complete
     */
    public function checkModuleForComplete()
    {
        if(!wp_doing_ajax()){
            return;
        }
        $post_id = $_POST['post-id'];
        $access = get_field('access', $post_id);
        if(!is_null($access) && $access != false){
            if(!learndash_process_mark_complete(get_current_user_id(), $post_id,false, $_POST['course-id'])){
                wp_send_json_error();
            }
        }

        wp_send_json_success();
    }

    public static function getNextUrl($post_id, $course_id){
        $next_url = learndash_next_post_link('', true);
        if(!$next_url){
            $lessons = learndash_course_get_lessons($course_id, array());
            $find = false;
            $next_lesson = array();
            foreach($lessons as $lesson){
                if($find === true){
                    $next_lesson = $lesson;
                    break;
                }
                if($lesson->ID === $post_id){
                    $find = true;
                }
            }
            if($next_lesson){
                $next_url = get_post_permalink($next_lesson->ID);
            }
        }
        return $next_url;
    }
}