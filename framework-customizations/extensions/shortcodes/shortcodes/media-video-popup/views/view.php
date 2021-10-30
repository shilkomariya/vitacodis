<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<p><a class="video-link caps" href="<?php echo trim($atts['url']) ?>" data-fancybox><svg class="icon"><use xlink:href="#play"></use></svg><?php echo $atts['text'] ?></a></p>