<?php if (!defined('FW')) die('Forbidden'); ?>
<?php $color_class = !empty($atts['color']) ? "{$atts['color']}" : ''; ?>
<?php $size_class = !empty($atts['size']) ? " {$atts['size']}" : ''; ?>

<div class="btn-wrp">
    <a href="<?php echo do_shortcode($atts['link']) ?>" target="<?php echo esc_attr($atts['target']) ?>" class="<?php echo esc_attr($color_class); ?><?php echo $size_class; ?>">
	<span><?php echo $atts['label']; ?></span>
    </a>
</div>