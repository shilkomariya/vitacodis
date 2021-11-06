<?php

/**
 * The sidebar containing the main widget area
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!is_active_sidebar('shop-sidebar')) {
    return;
}

dynamic_sidebar('shop-sidebar');
?>

