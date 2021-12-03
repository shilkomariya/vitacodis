<?php
/**
 * The template for displaying all single posts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<section class="content-section py-4 py-md-5">
    <div class="container">
	<div class="row justify-content-between flex-md-row-reverse gx-2 justify-content-between">

	    <div class="col-12 col-lg-6 col-md-6">
		<div class="img-box round-image ms-auto">
		    <?php echo wp_get_attachment_image(14103, 'full', false, array("class" => 'img-fluid')); ?>
		</div>
	    </div>
	    <div class="col-12 col-lg-6 col-md-6 align-self-center">
		<?php
		while (have_posts()) {
		    the_post();
		    ?>
    		<div class="fw-heading fw-heading-h3">
    		    <h3 class="fw-special-title text-primary"><?php the_title() ?></h3>
    		</div>
    		<div class="text-block ">
			<?php the_content(); ?>
    		</div>
		<?php } ?>
	    </div>
	</div>
</section>
<?php
get_footer();
