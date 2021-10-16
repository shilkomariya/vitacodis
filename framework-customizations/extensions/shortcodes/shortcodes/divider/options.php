<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'style' => array(
	'type' => 'multi-picker',
	'label' => false,
	'desc' => false,
	'picker' => array(
	    'ruler_type' => array(
		'type' => 'select',
		'label' => __('Ruler Type', 'fw'),
		'desc' => __('Here you can set the styling and size of the HR element', 'fw'),
		'choices' => array(
		    'line' => __('Line', 'fw'),
		    'space' => __('Whitespace', 'fw'),
		)
	    )
	),
	'choices' => array(
	    'space' => array(
		'height' => array(
		    'label' => __('Height', 'fw'),
		    'type' => 'select',
		    'choices' => array(
			'pt-4 pt-md-5' => 'Normal',
			'pt-3 pt-md-4' => 'Medium',
			'pt-2 pt-md-3' => 'Small',
			'pt-0' => 'None',
		    )
		)
	    )
	)
    )
);
