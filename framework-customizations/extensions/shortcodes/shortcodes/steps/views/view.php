<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="steps">
    <?php
    $arr = $atts['steps'];
    foreach ($arr as $key => $value) {
	?>
        <div class="step">
    	<h3 class="h3"><?php echo $value['name']; ?></h3>
    	<h4 class="h4"><?php echo $value['heading']; ?></h3>
        </div>
	<?php
    }
    ?>
</div>