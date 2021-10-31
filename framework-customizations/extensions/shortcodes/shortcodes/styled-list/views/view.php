<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
$class = '';

switch ($atts['margin_bottom']) {
    case 0:
	break;
    case 1:
	$class .= ' mb-1';
	break;
    case 2:
	$class .= ' mb-1 mb-md-2';
	break;
    case 3:
	$class .= ' mb-2 mb-md-3';
	break;
    case 4:
	$class .= ' mb-2 mb-md-4';
	break;
    case 5:
	$class .= ' mb-3 mb-md-5';
	break;
}
?>
<ul class="styled<?php echo $class ?>">
    <?php
    $arr = $atts['list'];
    foreach ($arr as $key => $value) {
	?>
        <li><svg class="icon"><use xlink:href="#check"></use></svg> <span class="text"><?php echo $value; ?></span></li>
	    <?php
	}
	?>
</ul>