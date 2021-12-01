<?php
/**
 * The template for displaying all single posts
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="container single-post py-3" id="content" tabindex="-1">
    <?php
    while (have_posts()) {
	the_post();
	get_template_part('loop-templates/content', 'single');
    }
    ?>
</div>
<div class="py-3 py-lg-5 bg-gray more-articles">
    <div class="container">
	<div class="text-center"><h2 class="mb-2 mb-md-3">More <span class="fw-normal">Articles</span></h2></div>
	<div class="row cards-row">
	    <?php
	    $args = array(
		'posts_per_page' => 3,
		'post_type' => 'post',
		'orderby' => 'rand',
		'post__not_in' => array(get_the_ID())
	    );

	    $query = new WP_Query($args);

	    if ($query->have_posts()) {
		while ($query->have_posts()) {
		    $query->the_post();
		    echo '<div class="col-md-4">';
		    get_template_part('loop-templates/content');
		    echo '</div>';
		}
	    }
	    wp_reset_postdata();
	    ?>
	</div>
    </div>
</div>
<?php
get_footer();
