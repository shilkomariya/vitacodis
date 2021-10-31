<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'type' => array(
	'label' => __('List Type', 'beachsweat'),
	'type' => 'switch',
	'left-choice' => array(
	    'value' => 'ul',
	    'label' => __('UL', '{domain}'),
	),
	'right-choice' => array(
	    'value' => 'ol',
	    'label' => __('OL', '{domain}'),
	),
    ),
);
