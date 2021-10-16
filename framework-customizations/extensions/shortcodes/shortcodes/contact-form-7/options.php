<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'cf7' => array(
	'label' => 'Select Contact Form',
	'type' => 'multi-select',
	'population' => 'posts',
	'source' => 'wpcf7_contact_form',
	'limit' => 1
    ),
);
