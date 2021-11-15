<?php
/**
 * Partial template for content in page.php
 *
 * @package Beach-Sweat
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="youzer">
    <?php
    _vitacodis_ocean_page_header();
    echo do_shortcode(wpautop($post->post_content));
    _vitacodis_ocean_after_content_wrap()
    ?>
</div>