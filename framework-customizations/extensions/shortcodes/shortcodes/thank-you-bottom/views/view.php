<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<div class="row">
    <div class="col-md-4">
	<a href="/courses">
	    <h3 class="h6">Explore more Courses</h3>
	    <?php echo wp_get_attachment_image(7432, 'medium-crop', false, array("class" => 'img-fluid')); ?>
	</a>
    </div>
    <div class="col-md-4">
	<a href="/retreats/">
	    <h3 class="h6">Wellbeing Retreats</h3>
	    <?php echo wp_get_attachment_image(13903, 'medium-crop', false, array("class" => 'img-fluid')); ?>
	</a>
    </div>
    <div class="col-md-4">
	<a href="/product-category/consulting/">
	    <h3 class="h6">Personalised Consulting</h3>
	    <?php echo wp_get_attachment_image(7433, 'medium-crop', false, array("class" => 'img-fluid')); ?>
	</a>
    </div>
</div>
<div class="ld-content-actions">
    <div class="ld-content-action ">
	<a class="ld-button " href="<?php echo learndash_get_course_url() ?>">
	    <span class="ld-icon ld-icon-arrow-left"></span>
	    <span class="ld-text">Course Home</span>
	</a>
    </div>
    <div class="ld-content-action ">
	<a class="ld-button " href="/members/me">
	    <span class="ld-text">My Profile</span>
	    <span class="ld-icon ld-icon-arrow-right"></span>
	</a>
    </div>

</div>