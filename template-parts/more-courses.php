<?php
/**
 * More courses you might like
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.

if ($args['current_id']) {
    $id = $args['current_id'];
}
?>
<div class="bg-gray py-3 py-lg-5">
    <div class="container">
	<h3 class="mb-2">More courses <span class="fw-normal">you might like</span></h3>
	<div class="row card-rows">
	    <?php
	    $args = array(
		'posts_per_page' => 4,
		'post_type' => 'sfwd-courses',
		'post__not_in' => [$id]
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
    </div>
</div>