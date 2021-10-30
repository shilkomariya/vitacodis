<?php

/**
 * Declaring widgets
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('widgets_init', 'vitacodis_widgets_init');

if (!function_exists('vitacodis_widgets_init')) {

    /**
     * Initializes themes widgets.
     */
    function vitacodis_widgets_init() {
	register_sidebar(
		array(
		    'name' => __('Single Post', 'loyaltybrokers'),
		    'id' => 'single-post',
		    'before_widget' => '<div class="widget">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4 class="widget-title">',
		    'after_title' => '</h4>',
		)
	);
    }

} // End of function_exists( 'vitacodis_widgets_init' ).
