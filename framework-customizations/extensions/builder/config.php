<?php

if (!defined('FW'))
    die('Forbidden');

$cfg = array();

/**
 * Default item widths for all builders
 *
 * It is better to use fw_ext_builder_get_item_width() function to retrieve the item widths
 * because it has a filter and users will be able to customize the widths for a specific builder
 *
 * @see fw_ext_builder_get_item_width()
 * @since 1.2.0
 *
 * old $cfg['default_item_widths'] https://github.com/ThemeFuse/Unyson-Builder-Extension/issues/8
 * https://github.com/ThemeFuse/Unyson-Builder-Extension/blob/v1.1.17/config.php#L13
 */
$cfg['grid.columns'] = array(
    '1_12' => array(
	'title' => '01/12',
	'backend_class' => 'fw-col-sm-1',
	'frontend_class' => 'col-12 col-lg-1',
    ),
    '2_12' => array(
	'title' => '02/12',
	'backend_class' => 'fw-col-sm-2',
	'frontend_class' => 'col-12 col-lg-2',
    ),
    '3_12' => array(
	'title' => '03/12',
	'backend_class' => 'fw-col-sm-3',
	'frontend_class' => 'col-12 col-lg-3',
    ),
    '4_12' => array(
	'title' => '04/12',
	'backend_class' => 'fw-col-sm-4',
	'frontend_class' => 'col-12 col-lg-4',
    ),
    '5_12' => array(
	'title' => '05/12',
	'backend_class' => 'fw-col-sm-5',
	'frontend_class' => 'col-12 col-lg-5',
    ),
    '6_12' => array(
	'title' => '06/12',
	'backend_class' => 'fw-col-sm-6',
	'frontend_class' => 'col-12 col-lg-6',
    ),
    '7_12' => array(
	'title' => '07/12',
	'backend_class' => 'fw-col-sm-7',
	'frontend_class' => 'col-12 col-lg-7',
    ),
    '8_12' => array(
	'title' => '08/12',
	'backend_class' => 'fw-col-sm-8',
	'frontend_class' => 'col-12 col-lg-8',
    ),
    '9_12' => array(
	'title' => '09/12',
	'backend_class' => 'fw-col-sm-9',
	'frontend_class' => 'col-12 col-lg-9',
    ),
    '10_12' => array(
	'title' => '10/12',
	'backend_class' => 'fw-col-sm-10',
	'frontend_class' => 'col-12 col-lg-10',
    ),
    '12_12' => array(
	'title' => '12/12',
	'backend_class' => 'fw-col-sm-12',
	'frontend_class' => 'col-12 col-lg-12',
    ),
);

/**
 * @since 1.2.0
 */
$cfg['grid.row.class'] = 'fw-row';

/**
 * @deprecated since 1.2.0
 * if this is empty fw_ext_builder_get_item_width() will use $cfg['grid.columns']
 */
$cfg['default_item_widths'] = false;

