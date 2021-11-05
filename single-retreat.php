<?php
/**
 * The template for displaying all single posts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$bg = '';
if (has_post_thumbnail()) {
    $bg = ' style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'full') . ');"';
}
while (have_posts()) {
    the_post();
    ?>
    <div class="retreat-header py-5"<?php echo $bg ?>>
        <div class="container">
	    <?php the_title('<h1 class="h2">', '</h1>'); ?>
    	<div class="data mb-1">
    	    <div class="item">
    		<div class="icon-wrp">
    		    <svg class="icon"><use xlink:href="#retreat-location"></use></svg>
    		</div>
    		<strong><?php echo fw_get_db_post_option(get_the_ID(), 'location') ?></strong>
    	    </div>
    	    <div class="item">
    		<div class="icon-wrp">
    		    <svg class="icon"><use xlink:href="#retreat-date"></use></svg>
    		</div>
    		<strong><?php echo fw_get_db_post_option(get_the_ID(), 'date') ?></strong>
    	    </div>
    	</div>
    	<div class="mt-3">
    	    <a class="btn btn-primary" href="#enquire-now" >Enquire now</a>
    	</div>
        </div>
    </div>
    <div class="container single-retreat py-3" id="content" tabindex="-1">
        <div class="container single-course py-3">
    	<div class="row">
    	    <div class="col-lg-8">
		    <?php
		    if (fw_get_db_post_option(get_the_ID(), 'cf7')) {
			?>
			<div id="enquire-now" class="">
			    <h2 class="h4">Wellbeing Retreat Enquiry</h2>
			    <?php
			    echo do_shortcode('[contact-form-7 id="' . fw_get_db_post_option(get_the_ID(), 'cf7')[0] . '" title="Contact form"]');
			    ?>
			</div>
			<?php
		    }
		    ?>
    	    </div>
    	    <div class="col-lg-4"></div>
    	</div>
        </div>
    </div>
    <?php
}
get_footer();
