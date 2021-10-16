<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'page-header' => array(
	'type' => 'box',
	'options' => array(
	    'banner_enable' => array(
		'type' => 'switch',
		'value' => false,
		'label' => __('Enable Header', 'vitacodis'),
	    ),
	),
	'title' => __('Page Header', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
);
