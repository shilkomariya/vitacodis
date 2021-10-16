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
);
