<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'info' => array(
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
	    'description' => array(
		'type' => 'text',
		'label' => __('Short Description', 'vitacodis'),
	    ),
	    'instructor' => array(
		'label' => 'Instructor',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'instructor',
		'limit' => 1
	    ),
	    'woo_product' => array(
		'label' => 'Select Product',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'product',
		'limit' => 1
	    ),
	    'duration' => array(
		'type' => 'text',
		'label' => __('Duration', 'vitacodis'),
	    ),
	    'learners' => array(
		'type' => 'text',
		'value' => '87',
		'label' => __('Learners add to counter', 'vitacodis'),
	    ),
	    'features' => array(
		'type' => 'addable-option',
		'label' => __('Features', 'vitacodis'),
		'option' => array('type' => 'text'),
		'add-button-text' => __('Add', 'vitacodis'),
		'sortable' => true
	    ),
	    'popup_video' => array(
		'type' => 'text',
		'label' => __('Popup Video Link', 'vitacodis'),
	    ),
	    'reviews' => array(
		'type' => 'addable-popup',
		'label' => __('Reviews', 'vitacodis'),
		'template' => '{{- author }}',
		'popup-title' => null,
		'size' => 'medium',
		'limit' => 0,
		'add-button-text' => __('Add', 'vitacodis'),
		'sortable' => true,
		'popup-options' => array(
		    'author' => array(
			'type' => 'text',
			'label' => __('Author', 'fw'),
		    ),
		    'quote' => array(
			'type' => 'wp-editor',
			'label' => __('Quote', 'fw'),
		    ),
		    'date' => array(
			'type' => 'text',
			'label' => __('Date', 'fw'),
		    ),
		    'stars' => array(
			'type' => 'select',
			'label' => __('Stars', 'fw'),
			'choices' => array(
			    '' => '5 stars',
			    'four' => '4 stars'
			)
		    ),
		),
	    ),
	),
	'title' => __('Additional info', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    )
);
