<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'general' => array(
	'title' => __('General', 'unyson'),
	'type' => 'tab',
	'options' => array(
	    'insta' => array(
		'label' => __('Instagram link', 'aesthetix'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'fb' => array(
		'label' => __('Facebook link', 'aesthetix'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'tw' => array(
		'label' => __('Twitter link', 'aesthetix'),
		'type' => 'text',
		'value' => '#'
	    ),
	    'email' => array(
		'label' => __('Email', 'aesthetix'),
		'type' => 'text',
		'value' => 'info@email.com'
	    ),
	)
    )
);
