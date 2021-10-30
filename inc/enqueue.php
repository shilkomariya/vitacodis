<?php

/**
 * Vitacodis-theme enqueue scripts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('vitacodis_scripts')) {

    /**
     * Load theme's JavaScript and CSS sources.
     */
    function vitacodis_scripts() {
	// Get the theme data.
	wp_enqueue_style('fonts-styles', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap', [], null);
	$the_theme = wp_get_theme();
	$theme_version = $the_theme->get('Version');
	$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');

	wp_enqueue_style('real-estate-monster-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version);

	$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.js');
	wp_enqueue_script('jquery');

	wp_enqueue_script('fancybox-scripts', get_template_directory_uri() . '/js/fancybox.umd.js', array(), '4.0', true);
	wp_enqueue_script('vitacodis-scripts', get_template_directory_uri() . '/js/theme.js', array(), $js_version, true);
    }

} // End of if function_exists( 'vitacodis_scripts' ).

add_action('wp_enqueue_scripts', 'vitacodis_scripts');

add_action('wp_print_styles', 'deregister_styles', 100);

function deregister_styles() {
    wp_deregister_style('frontend_inline_style');
}
