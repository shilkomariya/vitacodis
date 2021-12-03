<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'main' => array(
	'type' => 'box',
	'options' => array(
	    'banner_image' => array(
		'type' => 'upload',
		'label' => __('Banner Image', 'fw'),
		'desc' => __('Either upload a new, or choose an existing image from your media library', 'fw')
	    ),
	    'banner_style' => array(
		'type' => 'switch',
		'label' => __('Banner Style', 'fw'),
		'value' => 'light-style',
		'left-choice' => array(
		    'value' => 'dark-style',
		    'label' => __('Dark', '{domain}'),
		),
		'right-choice' => array(
		    'value' => 'light-style',
		    'label' => __('Light', '{domain}'),
		),
	    ),
	    'location' => array(
		'type' => 'text',
		'label' => __('Location', 'vitacodis'),
	    ),
	    'date' => array(
		'type' => 'text',
		'label' => __('Date', 'vitacodis'),
	    ),
	    'cf7' => array(
		'label' => 'Select Contact Form',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'wpcf7_contact_form',
		'limit' => 1
	    ),
	    'features' => array(
		'type' => 'addable-option',
		'label' => __('Features', 'vitacodis'),
		'option' => array('type' => 'text'),
		'add-button-text' => __('Add', 'vitacodis'),
		'sortable' => true
	    ),
	    'instructors' => array(
		'label' => 'Instructors',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'instructor',
		'limit' => 99
	    ),
	    'location_full' => array(
		'label' => __('Location Tab', 'vitacodis'),
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'location',
		'limit' => 1
	    ),
	),
	'title' => __('Main data', 'vitacodis'),
    ),
    'program' => array(
	'type' => 'box',
	'options' => array(
	    'program_content' => array(
		'type' => 'wp-editor',
		'label' => __('Content', 'vitacodis'),
	    ),
	),
	'title' => __('Program', 'vitacodis'),
    ),
    'additional' => array(
	'type' => 'box',
	'options' => array(
	    'additional_heading' => array(
		'type' => 'text',
		'value' => 'Additional',
		'label' => __('Heading', 'vitacodis'),
	    ),
	    'additional_content' => array(
		'type' => 'wp-editor',
		'label' => __('Content', 'vitacodis'),
	    ),
	),
	'title' => __('Additional', 'vitacodis'),
    ),
);
