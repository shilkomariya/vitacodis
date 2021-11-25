<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="">
    <?php
    $args = array(
	'orderby' => 'rand',
	'posts_per_page' => 1,
	'post_type' => 'sfwd-courses',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
	while ($query->have_posts()) {
	    $query->the_post();
	    echo '<div class="item">';
	    get_template_part('loop-templates/content', 'course-small');
	    echo '</div>';
	}
    }
    wp_reset_postdata();
    ?>
</div>