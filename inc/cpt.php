<?php

add_action('init', 'register_vitacodis_post_type');

function register_vitacodis_post_type() {
    register_post_type('retreat', array(
	'labels' => array(
	    'name' => 'Retreats',
	    'singular_name' => 'Retreat',
	    'menu_name' => 'Retreats',
	    'all_items' => 'All Retreats',
	    'add_new' => 'Add Retreat',
	    'add_new_item' => 'Add New Retreat',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Retreat',
	    'new_item' => 'New Retreat',
	),
	'description' => '',
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_rest' => false,
	'rest_base' => '',
	'show_in_menu' => true,
	'exclude_from_search' => false,
	'rewrite' => array('slug' => 'retreats', 'with_front' => false),
	'has_archive' => true,
	'capability_type' => 'post',
	'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
	'hierarchical' => false,
	'query_var' => true
    ));
    register_post_type('instructor', array(
	'labels' => array(
	    'name' => 'Instructors',
	    'singular_name' => 'Instructor',
	    'menu_name' => 'Instructors',
	    'all_items' => 'All Instructors',
	    'add_new' => 'Add Instructor',
	    'add_new_item' => 'Add New Instructor',
	    'edit' => 'Edit',
	    'edit_item' => 'Edit Instructor',
	    'new_item' => 'New Instructor',
	),
	'description' => '',
	'public' => false,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_rest' => false,
	'rest_base' => '',
	'show_in_menu' => true,
	'exclude_from_search' => true,
	'capability_type' => 'post',
	'supports' => array('title', 'editor', 'thumbnail'),
	'hierarchical' => false,
	'query_var' => true
    ));
}
