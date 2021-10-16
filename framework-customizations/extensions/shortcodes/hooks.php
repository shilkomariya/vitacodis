<?php

if (!defined('FW'))
    die('Forbidden');

/** @internal */
function _filter_disable_default_shortcodes($to_disable) {
    // disable the shortcodes you want like this
    $to_disable[] = 'accordion';
    $to_disable[] = 'calendar';
    $to_disable[] = 'call_to_action';
    $to_disable[] = 'icon';
    $to_disable[] = 'icon_box';
    $to_disable[] = 'map';
    $to_disable[] = 'notification';
    $to_disable[] = 'table';
    $to_disable[] = 'tabs';
    $to_disable[] = 'team_member';
    $to_disable[] = 'widget_area';
    return $to_disable;
}

add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_default_shortcodes');
