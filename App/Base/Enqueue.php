<?php

namespace App\Base;

final class Enqueue
{
    protected $no_async_css = array(
        'oceanwp-style',
        'elementor-post-2214',
        'elementor-frontend',
        'osh-styles',
        'post-11',
        'learndash-front',
        'post-13',
        'elementor-post-433',
        'elementor-pro',
        'elementor-frontend-legacy',
        'child-style');

    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueStyles'), 10 );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts'), 10 );
        add_filter('style_loader_tag', array($this, 'addAsyncLoadToStyles'), 10, 2);
    }

    /**
     * Enqueue styles to frontend
     */
    public function enqueueStyles()
    {
        wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css' );
        wp_enqueue_style( 'responsive-styles', get_stylesheet_directory_uri() . '/assets/css/adaptive.css' );
        wp_enqueue_style( 'darkmode-fullscreen', get_stylesheet_directory_uri() . '/assets/css/darkmode-fullscreen.css' );
        wp_enqueue_style( 'custom-front', get_stylesheet_directory_uri() . '/assets/css/custom-front.css' );
        wp_enqueue_style( 'comments', get_stylesheet_directory_uri() . '/assets/css/comments.css');
    }

    /**
     * Enqueue scripts to frontend
     */
    public function enqueueScripts()
    {
        wp_enqueue_script('quiz-model', get_stylesheet_directory_uri() . '/assets/js/quiz-model.js',array('jquery'));
        wp_enqueue_script( 'course-feedback', get_stylesheet_directory_uri() . '/assets/js/course-feedback.js', array( 'jquery' ), false );
        wp_enqueue_script( 'comments', get_stylesheet_directory_uri() . '/assets/js/comments.js', array( 'jquery' ), false );

        wp_dequeue_script('comment-reply');
    }

    /**
     * Add async loading to styles
     * @param $html
     * @param $handle
     * @return string|string[]
     */
    public function addAsyncLoadToStyles($html, $handle)
    {
        if (is_admin())
            return $html;

        if (empty($this->no_async_css))
            return str_replace(' media=\'all\'', ' media="print" onload="this.media=\'all\'"', $html);

        if (in_array($handle, $this->no_async_css)) {
            return $html;
        } else {
            return str_replace(' media=\'all\'', ' media="print" onload="this.media=\'all\'"', $html);
        }

    }
}