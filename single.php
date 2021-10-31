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
<?php
get_footer();
