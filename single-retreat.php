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
$instructors = fw_get_db_post_option(get_the_ID(), 'instructors');
$program = fw_get_db_post_option(get_the_ID(), 'program_content');
$location_tab = fw_get_db_post_option(get_the_ID(), 'location_full')[0];

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
    <div class="retreat-tabs">
        <div class="container">
    	<ul class="nav" id="retreatTab" role="tablist">
    	    <li class="nav-item" role="presentation">
    		<a href="#" class="nav-link active" id="Overview-tab" data-bs-toggle="tab" data-bs-target="#Overview" role="tab" aria-controls="Overview" aria-selected="true">Overview</a>
    	    </li>
		<?php if ($instructors) { ?>
		    <li class="nav-item" role="presentation">
			<a href="#" class="nav-link" id="instructors-tab" data-bs-toggle="tab" data-bs-target="#instructors" type="button" role="tab" aria-controls="instructors" aria-selected="false">Instructors</a>
		    </li>
		<?php } ?>
		<?php if ($program) { ?>
		    <li class="nav-item" role="presentation">
			<a href="#" class="nav-link" id="program-tab" data-bs-toggle="tab" data-bs-target="#program" type="button" role="tab" aria-controls="program" aria-selected="false">Program</a>
		    </li>
		<?php } ?>
		<?php if ($location_tab) { ?>
		    <li class="nav-item" role="presentation">
			<a href="#" class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="program" aria-selected="false">Location</a>
		    </li>
		<?php } ?>
    	</ul>
        </div>
    </div>
    <div class="container single-retreat pb-3" id="content" tabindex="-1">
        <div class="row">
    	<div class="col-lg-8">
    	    <div class="tab-content" id="retreatTabContent">
    		<div class="tab-pane fade show active" id="Overview" role="tabpanel" aria-labelledby="Overview-tab">
    		    <h2 class="h4 mb-2">Overview</h2>
			<?php echo do_shortcode(wpautop($post->post_content)); ?>
    		</div>
		    <?php if ($instructors) { ?>
			<div class="tab-pane fade" id="instructors" role="tabpanel" aria-labelledby="instructors-tab">
			    <h2 class="h4 mb-2">Instructors</h2>
			    <?php
			    foreach ($instructors as $value) {
				get_template_part('template-parts/instructor', null, array(
				    'instructor_id' => $value)
				);
			    }
			    ?>
			</div>
		    <?php } ?>
		    <?php if ($program) { ?>
			<div class="tab-pane fade" id="program" role="tabpanel" aria-labelledby="program-tab">
			    <h2 class="h4 mb-2">Program</h2>
			    <div class="program-content">
				<?php echo $program; ?>
			    </div>
			</div>
		    <?php } ?>
		    <?php if ($location_tab) { ?>
			<div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
			    <h2 class="h4 mb-2">Location</h2>
			    <div class="location-content">
				<?php
				get_template_part('template-parts/location-tab', null, array(
				    'location_id' => $location_tab)
				);
				?>
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
    		    <h4><?php the_title() ?></h4>
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
}
get_footer();
