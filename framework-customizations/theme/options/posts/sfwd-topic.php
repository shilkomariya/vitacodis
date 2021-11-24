<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'info' => array(
	'type' => 'box',
	'options' => array(
	    'video_duration' => array(
		'type' => 'text',
		'label' => __('Video duration', 'vitacodis'),
	    ),
	),
	'title' => __('Lesson info', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    )
);
