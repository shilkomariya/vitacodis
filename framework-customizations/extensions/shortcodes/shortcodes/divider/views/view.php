<?php
if (!defined('FW')) {
    die('Forbidden');
}

if ('line' === $atts['style']['ruler_type']):
    ?>
    <div class="fw-divider-line"><hr/></div>
<?php endif; ?>

<?php if ('space' === $atts['style']['ruler_type']): ?>
    <div class="fw-divider-space <?php echo $atts['style']['space']['height']; ?>"></div>
<?php endif; ?>