<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'image' => array(
	'type' => 'upload',
	'label' => __('Choose Image', 'fw'),
	'desc' => __('Either upload a new, or choose an existing image from your media library', 'fw')
    ),
    'img_class' => array(
	'type' => 'text',
	'label' => __('Image Class', 'fw'),
    ),
    'image_size' => array(
	'type' => 'select',
	'label' => __('Image Size', 'fw'),
	'choices' => array(
	    'full' => 'Full',
	    'medium' => 'Medium',
	    'large' => 'Large',
	)
    ),
    'text' => array(
	'type' => 'wp-editor',
	'size' => 'large',
	'label' => __('Description', 'fw'),
    ),
);

