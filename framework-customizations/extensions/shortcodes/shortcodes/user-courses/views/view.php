<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="row card-rows">
    <?php
    $user_id = get_current_user_id();
    $courses = learndash_user_get_enrolled_courses($user_id, array(), true);

    $args = array(
	'posts_per_page' => -1,
	'post_type' => 'sfwd-courses',
	'post__in' => $courses,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
	while ($query->have_posts()) {
	    $query->the_post();
	    echo '<div class="col">';
	    get_template_part('loop-templates/content', 'course-small');
	    echo '</div>';
	}
    }
    wp_reset_postdata();
    ?>
</div>