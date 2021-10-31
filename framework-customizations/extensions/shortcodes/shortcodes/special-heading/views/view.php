<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$class = ($atts['ttu']) ? ' text-uppercase' : '';
$class .= ($atts['heading_color']) ? ' ' . $atts['heading_color'] : '';
$class .= ($atts['heading_weight']) ? ' ' . $atts['heading_weight'] : '';
$margin_class = "";
switch ($atts['margin_bottom']) {
    case 0:
	$margin_class .= ' mb-0';
	break;
    case 1:
	break;
    case 2:
	$margin_class .= ' mb-1 mb-md-2';
	break;
    case 3:
	$margin_class .= ' mb-2 mb-md-3';
	break;
    case 4:
	$margin_class .= ' mb-2 mb-md-4';
	break;
    case 5:
	$margin_class .= ' mb-3 mb-md-5';
	break;
}
if ($atts['subtitle'] == "") {
    $class .= $margin_class;
}
$style = '';
if ($atts['mw'] > 0) {
    $style = 'style = "max-width: ' . $atts['mw'] / 15 . 'rem;"';
}
?>
<div class="fw-heading fw-heading-<?php echo esc_attr($atts['heading']); ?><?php echo!empty($atts['centered']) ? ' text-center' : ''; ?>" <?= $style ?>>
    <?php $heading = "<{$atts['heading']} class='fw-special-title{$class}'>{$atts['title']}</{$atts['heading']}>"; ?>
    <?php echo $heading; ?>
    <?php if (!empty($atts['subtitle'])): ?>
        <div class="fw-special-subtitle h3<?php echo $margin_class; ?>"><?php echo $atts['subtitle']; ?></div>
    <?php endif; ?>
</div>