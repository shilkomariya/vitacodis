<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'section_title' => array(
	'label' => __('Section Title', 'beachsweat'),
	'type' => 'text',
    ),
    'is_fullwidth' => array(
	'label' => __('Full Width', 'beachsweat'),
	'type' => 'switch',
    ),
    'section_type' => array(
	'type' => 'select',
	'label' => __('Section Type', 'beachsweat'),
	'choices' => array(
	    '' => 'Default',
	    'img-section' => 'Image left',
	    'img-section invert' => 'Image right',
	)
    ),
    'type' => array(
	'label' => __('Wrapper Type', 'beachsweat'),
	'type' => 'switch',
	'left-choice' => array(
	    'value' => 'section',
	    'label' => __('Section', '{domain}'),
	),
	'right-choice' => array(
	    'value' => 'div',
	    'label' => __('Div', '{domain}'),
	),
    ),
    'width' => array(
	'type' => 'select',
	'label' => __('Max Width', 'beachsweat'),
	'choices' => array(
	    '' => '---',
	    'w-990' => '990px',
	)
    ),
    'justify_content' => array(
	'type' => 'select',
	'label' => __('Justify content', 'fw'),
	'choices' => array(
	    '' => '',
	    'justify-content-center' => 'Center',
	    'justify-content-end' => 'End',
	    'justify-content-around' => 'Around',
	    'justify-content-between' => 'Between',
	)
    ),
    'reverse' => array(
	'type' => 'select',
	'label' => __('Row reverse', 'beachsweat'),
	'choices' => array(
	    '' => '---',
	    'flex-lg-row-reverse' => 'Up Large',
	    'flex-md-row-reverse' => 'Up Md',
	)
    ),
    'bgc' => array(
	'type' => 'select',
	'label' => __('Background Color', 'beachsweat'),
	'choices' => array(
	    '' => 'None',
	    'bg-gray' => 'Gray',
	    'bg-primary' => 'Orange',
	)
    ),
    'gutters' => array(
	'label' => __('Horizontal gutters', 'beachsweat'),
	'type' => 'slider',
	'value' => 2,
	'properties' => array(
	    'min' => 0,
	    'max' => 5,
	    'step' => 1, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'padding_top' => array(
	'label' => __('Top Padding size', 'beachsweat'),
	'type' => 'slider',
	'value' => 3,
	'properties' => array(
	    'min' => 0,
	    'max' => 5,
	    'step' => 1, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'padding_bottom' => array(
	'label' => __('Padding Bottom', 'beachsweat'),
	'type' => 'slider',
	'value' => 3,
	'properties' => array(
	    'min' => 0,
	    'max' => 5,
	    'step' => 1, // Set slider step. Always > 0. Could be fractional.
	),
    ),
    'background_image' => array(
	'label' => __('Background Image', 'beachsweat'),
	'desc' => __('Please select the background image', 'beachsweat'),
	'type' => 'background-image',
	'choices' => array(//	in future may will set predefined images
	)
    ),
    'custome_class' => array(
	'label' => __('Custome section class', 'beachsweat'),
	'desc' => __('Insert Custome section class', 'beachsweat'),
	'type' => 'text',
    ),
);
