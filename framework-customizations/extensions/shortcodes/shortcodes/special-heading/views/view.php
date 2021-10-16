<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$class = ($atts['ttu']) ? ' text-uppercase' : '';
$class .= ($atts['heading_color']) ? ' ' . $atts['heading_color'] : '';
$class .= ($atts['heading_weight']) ? ' ' . $atts['heading_weight'] : '';
switch ($atts['margin_bottom']) {
    case 0:
	$class .= ' mb-0';
	break;
    case 1:
	break;
    case 2:
	$class .= ' mb-1 mb-md-2';
	break;
    case 3:
	$class .= ' mb-2 mb-md-3';
	break;
    case 4:
	$class .= ' mb-2 mb-md-4';
	break;
    case 5:
	$class .= ' mb-3 mb-md-5';
	break;
}
$style = '';
if ($atts['mw'] > 0) {
    $style = 'style = "max-width: ' . $atts['mw'] / 16 . 'rem;"';
}
?>
<div class="fw-heading fw-heading-<?php echo esc_attr($atts['heading']); ?><?php echo!empty($atts['centered']) ? ' text-center' : ''; ?>" <?= $style ?>>
    <?php if (!empty($atts['subtitle'])): ?>
        <div class="fw-special-subtitle"><?php echo $atts['subtitle']; ?></div>
    <?php endif; ?>
    <?php $heading = "<{$atts['heading']} class='fw-special-title{$class}'>{$atts['title']}</{$atts['heading']}>"; ?>
    <?php echo $heading; ?>
</div>