<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="row">
    <?php
    if ($atts['post_in']) {
	$args = array(
	    'posts_per_page' => $atts['posts_per_page'],
	    'post_type' => 'retreat',
	    'post__in' => $atts['post_in']
	);
    } else {
	$args = array(
	    'posts_per_page' => $atts['posts_per_page'],
	    'post_type' => 'retreat',
	);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
	while ($query->have_posts()) {
	    $query->the_post();
	    get_template_part('loop-templates/content-retreat');
	}
    }
    wp_reset_postdata();
    ?>
</div>