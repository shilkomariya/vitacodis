<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'resources' => array(
	'type' => 'addable-popup',
	'label' => __('Resource', '{domain}'),
	'size' => 'large',
	'popup-options' => array(
	    'image' => array(
		'type' => 'upload',
		'label' => __('Resource Upload', 'fw'),
		'files_ext' => array('doc', 'pdf', 'zip')
	    ),
	    'heading' => array(
		'type' => 'text',
		'label' => __('Title', 'fw'),
	    ),
	    'description' => array(
		'type' => 'text',
		'label' => __('Description', 'fw'),
	    ),
	    'icon' => array(
		'type' => 'select',
		'label' => __('Icon', 'fw'),
		'choices' => array(
		    'pdf' => 'Pdf',
		)
	    ),
	),
	'limit' => 0, // limit the number of boxes that can be added
	'add-button-text' => __('Add', '{domain}'),
	'sortable' => true,
	'template' => '{{- heading }}', // box title
    ),
);

