<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'main' => array(
	'type' => 'box',
	'options' => array(
	    'location' => array(
		'type' => 'text',
		'label' => __('Location', 'vitacodis'),
	    ),
	    'date' => array(
		'type' => 'text',
		'label' => __('Date', 'vitacodis'),
	    ),
	),
	'title' => __('Main data', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
);
