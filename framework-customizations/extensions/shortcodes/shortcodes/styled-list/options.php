<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'list' => array(
	'type' => 'addable-option',
	'label' => __('Item', '{domain}'),
	'option' => array('type' => 'text'),
	'add-button-text' => __('Add', '{domain}'),
	'sortable' => true,
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
);
