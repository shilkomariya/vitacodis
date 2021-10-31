<?php

/**
 * Vitacodis-theme functions and definitions
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

$vitacodis_includes = array(
    '/theme-settings.php', // Initialize theme default settings.
    '/setup.php', // Theme setup and custom theme supports.
    '/cpt.php',
    '/enqueue.php', // Enqueue scripts and styles.
    '/template-tags.php', // Custom template tags for this theme.
    '/pagination.php', // Custom pagination for this theme.
    '/hooks.php', // Custom hooks.
    '/extras.php', // Custom functions that act independently of the theme templates.
    '/class-wp-bootstrap-navwalker.php', // Load custom WordPress nav walker.
    '/editor.php', // Load Editor functions.
    '/widgets.php',
    '/woocommerce.php'
);

foreach ($vitacodis_includes as $file) {
    require_once get_template_directory() . '/inc' . $file;
}