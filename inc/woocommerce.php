<?php

/**
 * Add WooCommerce support
 *
 * @package Pocket-Monster
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'pocketmonster_woocommerce_support');
if (!function_exists('pocketmonster_woocommerce_support')) {

    /**
     * Declares WooCommerce theme support.
     */
    function pocketmonster_woocommerce_support() {
	add_theme_support('woocommerce');

	// Add Product Gallery support.
	add_theme_support('wc-product-gallery-lightbox');
	//add_theme_support('wc-product-gallery-zoom');
	//add_theme_support('wc-product-gallery-slider');
	// Add Bootstrap classes to form fields.
	add_filter('woocommerce_form_field_args', 'pocketmonster_wc_form_field_args', 10, 3);
	add_filter('woocommerce_quantity_input_classes', 'pocketmonster_quantity_input_classes');
    }

}

