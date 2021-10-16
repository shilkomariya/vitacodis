<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="page-header" style="background-image: url(<?php echo wp_get_attachment_image_url(37, 'full'); ?>);">
    <div class="container">
	<h2 class="fw-special-title text-uppercase">404</h2>
    </div>
</div>
<div class="container py-3" id="content" tabindex="-1">
    <section class="error-404 not-found py-5">
	<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'vitacodis'); ?></h1>
	<p><?php esc_html_e('It looks like nothing was found at this location. ', 'vitacodis'); ?></p>
    </section><!-- .error-404 -->
</div><!-- #content -->
<?php
get_footer();
