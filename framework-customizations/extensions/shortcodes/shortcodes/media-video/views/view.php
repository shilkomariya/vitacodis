<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
global $wp_embed;

$iframe = $wp_embed->run_shortcode('[embed class="embed-responsive-item"]' . trim($atts['url']) . '[/embed]');
?>
<div class="ratio ratio-<?php echo $atts['ratio']; ?>">
    <?php echo do_shortcode($iframe); ?>
</div>
