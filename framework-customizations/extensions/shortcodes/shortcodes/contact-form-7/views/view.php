<?php

if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>

<?php

echo do_shortcode('[contact-form-7 id="' . $atts['cf7'][0] . '" title="Contact form"]')
?>