<?php
/**
 * The template for displaying search results pages
 *
 * @package Beach-Sweat
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<div class="container py-5" id="content" tabindex="-1">
    <div class="fw-heading fw-heading-h2 text-center mb-3">
        <h2 class="fw-special-title text-uppercase"><?php echo 'Search'; ?></h2>
    </div>

    <?php if (have_posts()) : ?>
        <h3 class="page-title text-center">
	    <?php
	    printf(
		    /* translators: %s: query term */
		    esc_html__('Search Results for: %s', 'vitacodis'), '<span>' . get_search_query() . '</span>'
	    );
	    ?>
        </h3>
        <div class="mb-2">
	    <?php get_search_form(); ?>
        </div>
	<?php /* Start the Loop */ ?>
	<?php
	while (have_posts()) :
	    the_post();

	    /*
	     * Run the loop for the search to output the results.
	     * If you want to overload this in a child theme then include a file
	     * called content-search.php and that will be used instead.
	     */
	    get_template_part('loop-templates/content', 'search');
	endwhile;
	?>

    <?php else : ?>
	<?php get_template_part('loop-templates/content', 'none'); ?>

    <?php endif; ?>

    <!-- The pagination component -->
    <?php vitacodis_pagination(); ?>

</div>
<?php
get_footer();
