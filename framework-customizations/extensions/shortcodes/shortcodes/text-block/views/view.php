<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
$style = '';
if ($atts['mw'] != 100) {
    $style = 'style="max-width: ' . 1330 / 100 * $atts['mw'] / 19 . 'rem;"';
}
$custome_class = ( isset($atts['class']) && $atts['class'] ) ? ' ' . $atts['class'] . '' : '';
$custome_class .= ($atts['centered']) ? ' mx-auto' : '';
?>
<div class="text-block <?php echo $custome_class ?>" <?= $style ?>>
    <?php
    echo do_shortcode($atts['text']);
    ?>
</div>