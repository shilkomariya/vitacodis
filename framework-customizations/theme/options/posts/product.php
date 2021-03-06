<?php

if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'instructor_box' => array(
	'type' => 'box',
	'options' => array(
	    'instructor' => array(
		'label' => 'Instructor',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'instructor',
		'limit' => 1
	    ),
	    'p_courses' => array(
		'label' => 'Show courses',
		'type' => 'multi-select',
		'population' => 'posts',
		'source' => 'sfwd-courses',
		'limit' => 4
	    ),
	),
	'title' => __('Instructor', 'vitacodis'),
	'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
    )
);
