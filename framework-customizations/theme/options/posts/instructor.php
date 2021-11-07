<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'instructor-info' => array(
	'type' => 'box',
	'options' => array(
	    'location' => array(
		'type' => 'text',
		'label' => __('Location', 'vitacodis'),
	    ),
	    'description' => array(
		'type' => 'text',
		'label' => __('Short Description', 'vitacodis'),
	    ),
	    'instagramm' => array(
		'type' => 'text',
		'label' => __('Instagramm Link', 'vitacodis'),
	    ),
	    'facebook' => array(
		'type' => 'text',
		'label' => __('Facebook Link', 'vitacodis'),
	    ),
	    'linkedin' => array(
		'type' => 'text',
		'label' => __('Linked Link', 'vitacodis'),
	    ),
	    'twitter' => array(
		'type' => 'text',
		'label' => __('Twitter Link', 'vitacodis'),
	    ),
	    'youtube' => array(
		'type' => 'text',
		'label' => __('YouTube Link', 'vitacodis'),
	    ),
	    'site' => array(
		'type' => 'text',
		'label' => __('Site Link', 'vitacodis'),
	    ),
	    'specification' => array(
		'type' => 'addable-option',
		'label' => __('Specification', 'vitacodis'),
		'option' => array('type' => 'text'),
		'add-button-text' => __('Add', 'vitacodis'),
		'sortable' => true
	    ),
	    'rate' => array(
		'type' => 'text',
		'label' => __('Rate', 'vitacodis'),
	    ),
	),
	'title' => __('Additional info', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    ),
);
