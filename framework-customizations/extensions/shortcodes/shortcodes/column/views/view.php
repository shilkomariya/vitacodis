<?php
if (!defined('FW'))
    die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
$class = str_replace('fw-', '', $class);
$class = str_replace('xs-', '', $class);
$col_class = '';
$col_class .= ( isset($atts['col_md']) && $atts['col_md'] ) ? ' ' . $atts['col_md'] : '';
$col_class .= ( isset($atts['col_sm']) && $atts['col_sm'] ) ? ' ' . $atts['col_sm'] : '';
$col_class .= ( isset($atts['is_two_col']) && $atts['is_two_col'] ) ? ' divide' : '';
$col_class .= ( isset($atts['is_cetered_col']) && $atts['is_cetered_col'] ) ? ' align-self-center' : '';
$col_class .= ( isset($atts['cetered_content_col']) && $atts['cetered_content_col'] ) ? ' text-center' : '';
$col_class .= ( isset($atts['class']) && $atts['class'] ) ? ' ' . $atts['class'] : '';
switch ($atts['margin_bottom']) {
    case 0:
	break;
    case 1:
	$col_class .= ' mb-1';
	break;
    case 2:
	$col_class .= ' mb-1 mb-md-2';
	break;
    case 3:
	$col_class .= ' mb-2 mb-md-3';
	break;
    case 4:
	$col_class .= ' mb-3 mb-md-4';
	break;
    case 5:
	$col_class .= ' mb-4 mb-md-5';
	break;
}
?>
<div class="<?php echo esc_attr($class); ?><?php echo $col_class; ?>">
    <?php echo do_shortcode($content); ?>
</div>