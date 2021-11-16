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
    'ratio' => array(
	'type' => 'select',
	'label' => __('Aspect ratio', 'fw'),
	'choices' => array(
	    '1x1' => '1:1',
	    '4x3' => '4:3',
	    '16x9' => '16:9',
	    '21x9' => '21:9',
	)
    ),
);
