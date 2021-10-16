<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'steps' => array(
	'type' => 'addable-popup',
	'label' => __('Step', '{domain}'),
	'size' => 'large',
	'popup-options' => array(
	    'name' => array(
		'type' => 'text',
		'label' => __('Name', 'fw'),
	    ),
	    'heading' => array(
		'type' => 'text',
		'label' => __('Text', 'fw'),
	    ),
	),
	'limit' => 6, // limit the number of boxes that can be added
	'add-button-text' => __('Add', '{domain}'),
	'sortable' => true,
	'template' => '{{- heading }}', // box title
    ),
);

