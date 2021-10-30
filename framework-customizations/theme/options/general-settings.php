<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'general' => array(
	'title' => __('Contacts', 'vitacodis'),
	'type' => 'tab',
	'options' => array(
	    'insta' => array(
		'label' => __('Instagram link', 'vitacodis'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'fb' => array(
		'label' => __('Facebook link', 'vitacodis'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'in' => array(
		'label' => __('Linkedin link', 'vitacodis'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'tw' => array(
		'label' => __('Twitter link', 'vitacodis'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'yt' => array(
		'label' => __('Youtube link', 'vitacodis'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'address' => array(
		'label' => __('Address', 'vitacodis'),
		'type' => 'text'
	    ),
	    'phone' => array(
		'label' => __('Phone', 'vitacodis'),
		'type' => 'text'
	    ),
	)
    )
);
