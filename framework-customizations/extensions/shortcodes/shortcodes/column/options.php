<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'is_cetered_col' => array(
	'label' => __('Vertical alignment Center', 'fw'),
	'type' => 'switch',
    ),
    'cetered_content_col' => array(
	'label' => __('Content alignment Center', 'fw'),
	'type' => 'switch',
    ),
    'margin_bottom' => array(
	'label' => __('Margin Bottom', 'fw'),
	'type' => 'slider',
	'value' => 0,
	'properties' => array(
	    'min' => 0,
	    'max' => 5,
	    'step' => 1, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'class' => array(
	'label' => __('Custom Class', 'fw'),
	'type' => 'text',
    ),
    'col_md' => array(
	'type' => 'select',
	'label' => __('Medium', 'fw'),
	'choices' => array(
	    '' => '----',
	    'col-md-2' => '2/12',
	    'col-md-3' => '3/12',
	    'col-md-4' => '4/12',
	    'col-md-5' => '5/12',
	    'col-md-6' => '6/12',
	    'col-md-7' => '7/12',
	    'col-md-8' => '8/12',
	    'col-md-9' => '9/12',
	    'col-md-10' => '10/12',
	    'col-md-11' => '11/12',
	    'col-md-12' => '12/12'
	)
    ),
    'col_sm' => array(
	'type' => 'select',
	'label' => __('Small', 'fw'),
	'choices' => array(
	    '' => '----',
	    'col-sm-1' => '1/12',
	    'col-sm-2' => '2/12',
	    'col-sm-3' => '3/12',
	    'col-sm-4' => '4/12',
	    'col-sm-5' => '5/12',
	    'col-sm-6' => '6/12',
	    'col-sm-7' => '7/12',
	    'col-sm-8' => '8/12',
	    'col-sm-9' => '9/12',
	    'col-sm-10' => '10/12',
	    'col-sm-11' => '11/12',
	    'col-sm-12' => '12/12'
	)
    ),
);
