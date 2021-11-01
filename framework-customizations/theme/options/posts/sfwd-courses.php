<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'info' => array(
	'type' => 'box',
	'options' => array(
	    'descroption' => array(
		'type' => 'text',
		'label' => __('Short Description', 'vitacodis'),
	    ),
	    'instructor' => array(
		'label' => 'Instructor',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'instructor',
		'limit' => 1
	    ),
	    'woo_product' => array(
		'label' => 'Select Product',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'product',
		'limit' => 1
	    ),
	    'duration' => array(
		'type' => 'text',
		'label' => __('Duration', 'vitacodis'),
	    ),
	),
	'title' => __('Additional info', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
);
