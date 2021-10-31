<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<div class="table-of-contents">
    <h5 class="h3">Table of Contents</h5>
    <<?php echo $atts['type'] ?> class="nav flex-column" data-toc="div#content" data-toc-headings="h2,h3,h4"></<?php echo $atts['type'] ?>>
</div>