<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="row card-rows">
    <?php
    if ($atts['post_in']) {
	$args = array(
	    'posts_per_page' => $atts['posts_per_page'],
	    'post_type' => 'sfwd-courses',
	    'post__in' => $atts['post_in']
	);
    } else {
	$args = array(
	    'posts_per_page' => $atts['posts_per_page'],
	    'post_type' => 'sfwd-courses',
	);
    }

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