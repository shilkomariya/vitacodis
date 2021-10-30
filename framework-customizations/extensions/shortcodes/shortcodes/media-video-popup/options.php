<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'url' => array(
	'type' => 'text',
	'label' => __('Insert Video URL', 'fw'),
	'desc' => __('Insert Video URL to embed this video', 'fw')
    ),
    'text' => array(
	'type' => 'text',
	'label' => __('Link Text', 'fw'),
	'value' => 'Vitacodis video'
    ),
);
