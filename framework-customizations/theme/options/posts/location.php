<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'location-info' => array(
	'type' => 'box',
	'options' => array(
	    'address' => array(
		'type' => 'text',
		'label' => __('Address', 'vitacodis'),
	    ),
	    'map_link' => array(
		'type' => 'text',
		'label' => __('Google map link', 'vitacodis'),
	    ),
	    'phone' => array(
		'type' => 'text',
		'label' => __('Phone', 'vitacodis'),
	    ),
	    'link_url' => array(
		'type' => 'text',
		'label' => __('Site Url', 'vitacodis'),
	    ),
	    'link_text' => array(
		'type' => 'text',
		'label' => __('Site Text', 'vitacodis'),
	    ),
	    'images' => array(
		'type' => 'multi-upload',
		'label' => __('Images', 'vitacodis'),
		'images_only' => true
	    )
	),
	'title' => __('Info', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
);
