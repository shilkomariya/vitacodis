<?php
if (!defined('FW')) {
    die('Forbidden');
}

$bg_color = '';
if (!empty($atts['background_color'])) {
    $bg_color = 'background-color:' . $atts['background_color'] . ';';
}

$bg_image = '';
if (!empty($atts['background_image']) && !empty($atts['background_image']['data']['icon'])) {
    $bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
}



$section_style = ( $bg_color || $bg_image ) ? '' . esc_attr($bg_color . $bg_image) . '' : '';

$container_class = ( isset($atts['is_fullwidth']) && $atts['is_fullwidth'] ) ? 'container-fluid' : 'container';
$container_class .= ( isset($atts['width']) && $atts['width'] ) ? ' ' . $atts['width'] . '' : '';
$custome_class = ( isset($atts['custome_class']) && $atts['custome_class'] ) ? ' ' . $atts['custome_class'] . '' : '';
$custome_class .= ( isset($atts['bgc']) && $atts['bgc'] ) ? ' ' . $atts['bgc'] . '' : '';
$custome_class .= ( isset($atts['section_type']) && $atts['section_type'] ) ? ' ' . $atts['section_type'] . '' : '';
$row_class = ( isset($atts['justify_content']) && $atts['justify_content'] ) ? ' ' . $atts['justify_content'] . '' : '';
$row_class .= ( isset($atts['reverse']) && $atts['reverse'] ) ? ' ' . $atts['reverse'] . '' : '';
$row_class .= ( isset($atts['gutters']) && $atts['gutters'] ) ? ' gx-' . $atts['gutters'] . '' : ' g-0';
$row_class .= ( isset($atts['justify_content']) && $atts['justify_content'] ) ? ' ' . $atts['justify_content'] . '' : '';

if ($atts['padding_top'] === $atts['padding_bottom']) {
    switch ($atts['padding_top']) {
	case 0:
	    break;
	case 1:
	    $custome_class .= ' py-1';
	    break;
	case 2:
	    $custome_class .= ' py-1 py-md-2';
	    break;
	case 3:
	    $custome_class .= ' py-2 py-md-3';
	    break;
	case 4:
	    $custome_class .= ' py-3 py-md-4';
	    break;
	case 5:
	    $custome_class .= ' py-4 py-md-5';
	    break;
    }
} else {
    switch ($atts['padding_top']) {
	case 0:
	    break;
	case 1:
	    $custome_class .= ' pt-1';
	    break;
	case 2:
	    $custome_class .= ' pt-1 pt-md-2';
	    break;
	case 3:
	    $custome_class .= ' pt-2 pt-md-3';
	    break;
	case 4:
	    $custome_class .= ' pt-3 pt-md-4';
	    break;
	case 5:
	    $custome_class .= ' pt-4 pt-md-5';
	    break;
    }
    switch ($atts['padding_bottom']) {
	case 0:
	    break;
	case 1:
	    $custome_class .= ' pb-1';
	    break;
	case 2:
	    $custome_class .= ' pb-1 pb-md-2';
	    break;
	case 3:
	    $custome_class .= ' pb-2 pb-md-3';
	    break;
	case 4:
	    $custome_class .= ' pb-3 pb-md-4';
	    break;
	case 5:
	    $custome_class .= ' pb-4 pb-md-5';
	    break;
    }
}

$type = ( isset($atts['type']) && $atts['type'] ) ? '' . $atts['type'] . '' : 'section';


$id = strtolower(( isset($atts['section_title']) && $atts['section_title'] ) ? $atts['section_title'] : '');
$id = str_replace(' ', '-', $id);
?>
<<?php echo $type ?><?php echo $id ? ' id="' . $id . '"' : ''; ?> class="content-section<?php echo $custome_class; ?>" <?php if ($section_style) echo'style="' . $section_style . '"'; ?>>
<div class="<?php echo esc_attr($container_class); ?>">
    <div class="row<?php echo $row_class ?>">
	<?php echo do_shortcode($content); ?>
    </div>
</div>
</<?php echo $type ?>>
