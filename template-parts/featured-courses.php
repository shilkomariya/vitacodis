<?php
/**
 * More courses you might like
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
?>
<div class="bg-gray py-3 py-lg-5">
    <div class="container">
	<h3 class="mb-2 text-center"><span class="fw-normal">Featured</span> Courses</h3>
	<div class="row card-rows">
	    <?php
	    $args = array(
		'posts_per_page' => 4,
		'post_type' => 'sfwd-courses'
	    );

	    $query = new WP_Query($args);

	    if ($query->have_posts()) {
		while ($query->have_posts()) {
		    $query->the_post();
		    echo '<div class="col">';
		    get_template_part('loop-templates/content', 'course');
		    echo '</div>';
		}
	    }
	    wp_reset_postdata();
	    ?>
	</div>
	<div class="mt-2 text-center"><a href="<?php echo get_post_type_archive_link('sfwd-courses'); ?>" class="btn btn-outline-primary">more courses</a></div>
    </div>
</div>