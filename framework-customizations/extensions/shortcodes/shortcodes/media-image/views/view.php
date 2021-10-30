<?php

if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
if (empty($atts['image'])) {
    return;
}
echo '<div class="img-box ' . $atts['img_class'] . '">';
echo wp_get_attachment_image($atts['image']["attachment_id"], $atts['image_size'], false, array("class" => 'img-fluid'));
echo '</div>';
