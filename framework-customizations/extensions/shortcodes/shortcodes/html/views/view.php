<?php

if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>

<?php

if ($atts['shortcode']) {
    echo do_shortcode($atts['shortcode']);
}
?>