<?php

/**
 * Custom hooks
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_filter('fw_ext_page_builder_output_content_wrapper', '__return_false');


remove_filter('the_content', 'wpautop');
//add_filter('the_content', 'wpautop', 99);
add_filter('the_content', 'shortcode_unautop', 100);
