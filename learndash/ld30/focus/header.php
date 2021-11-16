<?php
if (!defined('ABSPATH')) {
    exit;
}

$isDarkMode = false;

if (!empty($_COOKIE['darkmode'])) {
    $darkmode = $_COOKIE['darkmode'] != 'null' ? true : false;
    if ($darkmode) {
	// Dark Mode on
	$isDarkMode = true;
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<?php if ($isDarkMode): ?>
    	<link rel="preload" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/darkmode-enabled.css"
    	      as="style">
	      <?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/darkmode-enabled.css">
	<?php
	wp_head();
	/**
	 * Fires in the head tag in focus mode.
	 */
	do_action('learndash-focus-head');
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    </head>
    <?php if ($isDarkMode): ?>
        <body id="darkmode" <?php body_class(); ?>>
	<?php else: ?>
        <body <?php body_class(); ?>>
	<?php endif; ?>
	<?php
	global $post;
	$wrapper_class = str_replace(' ', '-', strtolower($post->post_title));
	?>
	<div class="<?php echo esc_attr(learndash_the_wrapper_class()); ?> <?php echo $wrapper_class; ?>">
	    <?php
	    /**
	     * Filter Focus Mode sidebar collpases.
	     *
	     * @param bool false Wether to collapse Focus Mode sidebar. Default false.
	     * @since 3.0.0
	     *
	     */
	    ?>
	    <div class="ld-focus <?php echo esc_attr(apply_filters('learndash_focus_mode_collapse_sidebar', false) ? 'ld-focus-sidebar-collapsed ld-focus-sidebar-filtered' : ''); ?>">
		<?php
		/**
		 * Fires at the start of the focus template.
		 *
		 * @param int $course_id Course ID.
		 * @since 3.0.0
		 *
		 */
		do_action('learndash-focus-template-start', $course_id);
		?>
