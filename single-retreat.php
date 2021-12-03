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
if (fw_get_db_post_option(get_the_ID(), 'banner_image')) {
    $bg = ' style="background-image: url(' . fw_get_db_post_option(get_the_ID(), 'banner_image')['url'] . ');"';
} elseif (has_post_thumbnail()) {
    $bg = ' style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(), 'full') . ');"';
}
$instructors = fw_get_db_post_option(get_the_ID(), 'instructors');
$program = fw_get_db_post_option(get_the_ID(), 'program_content');
$location_tab = false;
if (fw_get_db_post_option(get_the_ID(), 'location_full')) {
    $location_tab = fw_get_db_post_option(get_the_ID(), 'location_full')[0];
}
$additional = fw_get_db_post_option(get_the_ID(), 'additional_content');

while (have_posts()) {
    the_post();
    if (fw_ext_page_builder_is_builder_post(get_the_ID())) :
	the_content();
    else:
	?>
	<div class="retreat-header py-5 <?php echo fw_get_db_post_option(get_the_ID(), 'banner_style') ?>"<?php echo $bg ?>>
	    <div class="container">
		<h1 class="h2"><?php echo str_replace(' | ', '<br>', get_the_title()); ?></h1>
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
	<div class="retreat-tabs">
	    <div class="container">
		<ul class="nav" id="retreatTab" role="tablist">
		    <li class="nav-item" role="presentation">
			<a href="#overview-tab" class="scrollTo nav-link active">Overview</a>
		    </li>
		    <?php if ($instructors) { ?>
	    	    <li class="nav-item" role="presentation">
	    		<a href="#instructors-tab" class="scrollTo nav-link">Instructors</a>
	    	    </li>
		    <?php } ?>
		    <?php if ($program) { ?>
	    	    <li class="nav-item" role="presentation">
	    		<a href="#program-tab" class="scrollTo nav-link" >Program</a>
	    	    </li>
		    <?php } ?>
		    <?php if ($location_tab) { ?>
	    	    <li class="nav-item" role="presentation">
	    		<a href="#location-tab" class="scrollTo nav-link" >Location</a>
	    	    </li>
		    <?php } ?>
		    <?php if ($additional) { ?>
	    	    <li class="nav-item" role="presentation">
	    		<a href="#additional-tab" class="scrollTo nav-link"><?php echo fw_get_db_post_option(get_the_ID(), 'additional_heading') ?></a>
	    	    </li>
		    <?php } ?>
		</ul>
	    </div>
	</div>
	<div class="container single-retreat pb-3" id="content" tabindex="-1">
	    <div class="row">
		<div class="col-lg-8">
		    <div class="tab-content" id="retreatTabContent">
			<div id="overview-tab" >
			    <h2 class="h4 mb-2">Overview</h2>
			    <?php echo do_shortcode(wpautop($post->post_content)); ?>
			</div>
			<?php if ($instructors) { ?>
	    		<div class="pt-2">
	    		    <div id="instructors-tab">
	    			<h2 class="h4 mb-2">Instructors</h2>
				    <?php
				    foreach ($instructors as $value) {
					get_template_part('template-parts/instructor', null, array(
					    'instructor_id' => $value)
					);
				    }
				    ?>
	    		    </div>
	    		</div>
			<?php } ?>
			<?php if ($program) { ?>
	    		<div class="pt-2">
	    		    <div id="program-tab">
	    			<h2 class="h4 mb-2">Program</h2>
	    			<div class="program-content">
					<?php echo $program; ?>
	    			</div>
	    		    </div>
	    		</div>
			<?php } ?>
			<?php if ($location_tab) { ?>
	    		<div class="pt-2">
	    		    <div id="location-tab">
	    			<h2 class="h4 mb-2">Location</h2>
	    			<div class="location-content">
					<?php
					get_template_part('template-parts/location-tab', null, array(
					    'location_id' => $location_tab)
					);
					?>
	    			</div>
	    		    </div>
	    		</div>
			<?php } ?>
			<?php if ($additional) { ?>
	    		<div class="pt-2">
	    		    <div id="additional-tab">
	    			<h2 class="h4 mb-2"><?php echo fw_get_db_post_option(get_the_ID(), 'additional_heading') ?></h2>
	    			<div class="additional-content">
					<?php echo $additional; ?>
	    			</div>
	    		    </div>
	    		</div>
			<?php } ?>
		    </div>
		    <?php
		    if (fw_get_db_post_option(get_the_ID(), 'cf7')) {
			?>
	    	    <div id="enquire-now" class="mt-3">
	    		<h2 class="h4 mb-2">Wellbeing Retreat Enquiry</h2>
			    <?php
			    echo do_shortcode('[contact-form-7 id="' . fw_get_db_post_option(get_the_ID(), 'cf7')[0] . '" title="Contact form"]');
			    ?>
	    	    </div>
			<?php
		    }
		    ?>
		</div>
		<div class="col-lg-4">
		    <div class="card card-course sticky-top">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'medium-crop', array('class' => 'card-img-top')); ?>
			<div class="card-body">
			    <h4><?php echo str_replace(' | ', '<br>', get_the_title()); ?></h4>
			    <ul class="features">
				<?php foreach (fw_get_db_post_option(get_the_ID(), 'features') as $value) { ?>
	    			<li><svg class="icon"><use xlink:href="#check"></use></svg> <?php echo $value ?></li>
				<?php } ?>
			    </ul>
			    <a class="btn btn-primary" href="#enquire-now" >Enquire now</a>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    <?php
    endif;
}
get_footer();
