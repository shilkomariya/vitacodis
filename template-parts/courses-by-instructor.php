<?php
/**
 * More courses you might like
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.

$args = array(
    'posts_per_page' => 4,
    'post_type' => 'sfwd-courses',
    'post__in' => fw_get_db_post_option(get_the_ID(), 'p_courses'),
);
$query = new WP_Query($args);

if ($query->have_posts()) {
    ?>
    <div class="bg-gray py-3 py-lg-4">
        <div class="container">
    	<h2 class="mb-2 mb-md-3 fw-normal text-center"><strong>Courses</strong> by <?php echo get_the_title(fw_get_db_post_option(get_the_ID(), 'instructor')[0]) ?></h2>
    	<div class="row card-rows">
		<?php
		while ($query->have_posts()) {
		    $query->the_post();
		    echo '<div class="col">';
		    get_template_part('loop-templates/content', 'course');
		    echo '</div>';
		}
		?>
    	</div>
        </div>
    </div>
    <?php
}
wp_reset_postdata();
?>