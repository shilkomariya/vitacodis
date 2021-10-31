<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'text' => array(
	'type' => 'wp-editor',
	'size' => 'large',
	'label' => __('Content', 'fw'),
	'desc' => __('Enter some content for this texblock', 'fw')
    ),
    'mw' => array(
	'label' => __('Max Width in %', 'fw'),
	'type' => 'slider',
	'value' => 100,
	'properties' => array(
	    'min' => 0,
	    'max' => 100,
	    'step' => 5, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'centered' => array(
	'type' => 'switch',
	'label' => __('Centered', 'fw'),
    ),
    'margin_bottom' => array(
	'label' => __('Margin Bottom', 'fw'),
	'type' => 'slider',
	'value' => 0,
	'properties' => array(
	    'min' => 0,
	    'max' => 5,
	    'step' => 1, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'class' => array(
	'type' => 'text',
	'label' => __('Block class', 'fw'),
    ),
);
