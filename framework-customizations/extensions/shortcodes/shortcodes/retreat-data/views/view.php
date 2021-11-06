<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<div class="retreat-data row mb-1">
    <div class="item col-auto">
	<svg class="icon"><use xlink:href="#retreat-location"></use></svg>
	<strong><?php echo fw_get_db_post_option(get_the_ID(), 'location') ?></strong>
    </div>
    <div class="item col-auto">
	<svg class="icon"><use xlink:href="#retreat-date"></use></svg>
	<strong><?php echo fw_get_db_post_option(get_the_ID(), 'date') ?></strong>
    </div>
</div>