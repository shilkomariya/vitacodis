<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="course-resources">
    <svg width="0" height="0" class="d-none">
	<symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="pdf" fill="currentColor">
	    <path d="M187.7,329h-11.4v51.3h11.4c5.6,0,10.1-1.9,13.4-5.7c3.3-3.8,5-8.7,5-14.6v-10.7c0-5.9-1.7-10.7-5-14.5   C197.8,330.9,193.3,329,187.7,329z"></path>
	    <path d="M365.6,285.9H40.3v133.9h276.3L365.6,285.9z M143.9,357.2c-4.4,4-10.4,5.9-18.1,5.9h-15.1v26.5H99v-70h26.8   c7.7,0,13.8,2,18.1,6c4.4,4,6.6,9.2,6.6,15.7C150.5,348,148.3,353.2,143.9,357.2z M217.7,360c0,8.8-2.8,15.9-8.3,21.4   c-5.6,5.5-12.8,8.3-21.7,8.3h-23.1v-70h23.1c8.9,0,16.1,2.8,21.7,8.3c5.6,5.5,8.3,12.7,8.3,21.4V360z M278.3,329h-33.1v21.4h28.2   v9.4h-28.2v29.9h-11.7v-70h44.8V329z"></path>
	    <path d="M125.8,329h-15.1v24.7h15.1c4.3,0,7.6-1.2,9.8-3.5c2.2-2.3,3.3-5.2,3.3-8.8s-1.1-6.5-3.3-8.9   C133.4,330.2,130.1,329,125.8,329z"></path>
	    <path d="M352.9,6L352.9,6L107.4,6c-7.3,0-13.3,6-13.3,13.3v256.8h26.6V32.6h232.2v92.2h92.2v354.6H120.7v-49.8H94.1   v63.1c0,7.3,6,13.3,13.3,13.3h351c7.3,0,13.3-6,13.3-13.3V124.8L352.9,6z"></path>
	    <rect height="19.6" width="253.4" x="156.2" y="171.4"></rect>
	    <rect height="19.6" width="213.3" x="156.2" y="209.5"></rect>
	</symbol>
	<symbol xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" id="link">
	    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
	    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
	</symbol>
    </svg>
    <h2 class="h5">Course Resources</h2>
    <?php
    $arr = $atts['resources'];
    foreach ($arr as $key => $value) {
	?>
	<?php
	if ($value['image']):
	    ?>
	    <div class="resource">
		<div class="icon-wrp">
		    <a href="<?php echo $value['image']["url"] ?>" target="_blank"><svg class="icon"><use xlink:href="#pdf"></use></svg></a>
		</div>
		<div class="info-wrp">
		    <h3 class="h6"><a href="<?php echo $value['image']["url"] ?>" target="_blank"><?php echo $value['heading']; ?></a></h3>
		    <div class="descr"><?php echo $value['description']; ?></div>
		</div>
	    </div>
	<?php endif; ?>
	<?php
	if ($value['link'] != ''):
	    ?>
	    <div class="resource">
		<div class="icon-wrp">
		    <a href="<?php echo $value['link'] ?>" target="_blank"><svg class="icon"><use xlink:href="#link"></use></svg></a>
		</div>
		<div class="info-wrp">
		    <h3 class="h6"><a href="<?php echo $value['link'] ?>" target="_blank"><?php echo $value['heading']; ?></a></h3>
		    <div class="descr"><?php echo $value['description']; ?></div>
		</div>
	    </div>
	<?php endif; ?>
	<?php
    }
    ?>
</div>