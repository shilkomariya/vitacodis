<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'posts_per_page' => array(
	'label' => __('Posts per page', 'fw'),
	'value' => '1',
	'type' => 'text'
    ),
    'post_in' => array(
	'label' => 'Select',
	'type' => 'multi-select',
	'population' => 'posts',
	'source' => 'sfwd-courses',
	'limit' => 99
    ),
);

