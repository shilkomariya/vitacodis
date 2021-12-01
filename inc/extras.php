<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_filter('body_class', 'vitacodis_body_classes');

if (!function_exists('vitacodis_body_classes')) {

    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     *
     * @return array
     */
    function vitacodis_body_classes($classes) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
	    $classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
	    $classes[] = 'hfeed';
	}

	return $classes;
    }

}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter('body_class', 'vitacodis_adjust_body_class');

if (!function_exists('vitacodis_adjust_body_class')) {

    /**
     * Setup body classes.
     *
     * @param string $classes CSS classes.
     *
     * @return mixed
     */
    function vitacodis_adjust_body_class($classes) {

	foreach ($classes as $key => $value) {
	    if ('tag' === $value) {
		unset($classes[$key]);
	    }
	}

	return $classes;
    }

}

if (!function_exists('vitacodis_post_nav')) {

    /**
     * Display navigation to next/previous post when applicable.
     */
    function vitacodis_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
	$next = get_adjacent_post(false, '', false);

	if (!$next && !$previous) {
	    return;
	}
	?>
	<nav class="container navigation post-navigation">
	    <h2 class="sr-only"><?php esc_html_e('Post navigation', 'vitacodis'); ?></h2>
	    <div class="row nav-links justify-content-between">
		<?php
		if (get_previous_post_link()) {
		    previous_post_link('<span class="nav-previous">%link</span>', _x('<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link', 'vitacodis'));
		}
		if (get_next_post_link()) {
		    next_post_link('<span class="nav-next">%link</span>', _x('%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link', 'vitacodis'));
		}
		?>
	    </div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
    }

}

if (!function_exists('vitacodis_pingback')) {

    /**
     * Add a pingback url auto-discovery header for single posts of any post type.
     */
    function vitacodis_pingback() {
	if (is_singular() && pings_open()) {
	    echo '<link rel="pingback" href="' . esc_url(get_bloginfo('pingback_url')) . '">' . "\n";
	}
    }

}
add_action('wp_head', 'vitacodis_pingback');

if (!function_exists('vitacodis_mobile_web_app_meta')) {

    /**
     * Add mobile-web-app meta.
     */
    function vitacodis_mobile_web_app_meta() {
	echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
	echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
	echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr(get_bloginfo('name')) . ' - ' . esc_attr(get_bloginfo('description')) . '">' . "\n";
    }

}
add_action('wp_head', 'vitacodis_mobile_web_app_meta');

if (!function_exists('vitacodis_default_body_attributes')) {

    /**
     * Adds schema markup to the body element.
     *
     * @param array $atts An associative array of attributes.
     * @return array
     */
    function vitacodis_default_body_attributes($atts) {
	$atts['itemscope'] = '';
	$atts['itemtype'] = 'http://schema.org/WebSite';
	return $atts;
    }

}
add_filter('vitacodis_body_attributes', 'vitacodis_default_body_attributes');

// Escapes all occurances of 'the_archive_description'.
add_filter('get_the_archive_description', 'vitacodis_escape_the_archive_description');

if (!function_exists('vitacodis_escape_the_archive_description')) {

    /**
     * Escapes the description for an author or post type archive.
     *
     * @param string $description Archive description.
     * @return string Maybe escaped $description.
     */
    function vitacodis_escape_the_archive_description($description) {
	if (is_author() || is_post_type_archive()) {
	    return wp_kses_post($description);
	} else {
	    /*
	     * All other descriptions are retrieved via term_description() which returns
	     * a sanitized description.
	     */
	    return $description;
	}
    }

} // End of if function_exists( 'vitacodis_escape_the_archive_description' ).
// Escapes all occurances of 'the_title()' and 'get_the_title()'.
add_filter('the_title', 'vitacodis_kses_title');

// Escapes all occurances of 'the_archive_title' and 'get_the_archive_title()'.
add_filter('get_the_archive_title', 'vitacodis_kses_title');

if (!function_exists('vitacodis_kses_title')) {

    /**
     * Sanitizes data for allowed HTML tags for post title.
     *
     * @param string $data Post title to filter.
     * @return string Filtered post title with allowed HTML tags and attributes intact.
     */
    function vitacodis_kses_title($data) {
	// Tags not supported in HTML5 are not allowed.
	$allowed_tags = array(
	    'abbr' => array(),
	    'aria-describedby' => true,
	    'aria-details' => true,
	    'aria-label' => true,
	    'aria-labelledby' => true,
	    'aria-hidden' => true,
	    'b' => array(),
	    'bdo' => array(
		'dir' => true,
	    ),
	    'blockquote' => array(
		'cite' => true,
		'lang' => true,
		'xml:lang' => true,
	    ),
	    'cite' => array(
		'dir' => true,
		'lang' => true,
	    ),
	    'dfn' => array(),
	    'em' => array(),
	    'i' => array(
		'aria-describedby' => true,
		'aria-details' => true,
		'aria-label' => true,
		'aria-labelledby' => true,
		'aria-hidden' => true,
		'class' => true,
	    ),
	    'code' => array(),
	    'del' => array(
		'datetime' => true,
	    ),
	    'ins' => array(
		'datetime' => true,
		'cite' => true,
	    ),
	    'kbd' => array(),
	    'mark' => array(),
	    'pre' => array(
		'width' => true,
	    ),
	    'q' => array(
		'cite' => true,
	    ),
	    's' => array(),
	    'samp' => array(),
	    'span' => array(
		'dir' => true,
		'align' => true,
		'lang' => true,
		'xml:lang' => true,
	    ),
	    'small' => array(),
	    'strong' => array(),
	    'sub' => array(),
	    'sup' => array(),
	    'u' => array(),
	    'var' => array(),
	);
	$allowed_tags = apply_filters('vitacodis_kses_title', $allowed_tags);

	return wp_kses($data, $allowed_tags);
    }

} // End of if function_exists( 'vitacodis_kses_title' ).

if (!function_exists('load_custom_wp_admin_style')) {

    function load_custom_wp_admin_style() {
	wp_register_style('custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.1');
	wp_enqueue_style('custom_wp_admin_css');
    }

} // End of if function_exists( 'load_custom_wp_admin_style' ).

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

function svg_icon_shortcode($atts) {

    extract(shortcode_atts(
		    array(
	'id' => 0,
	'class' => '',
		    ), $atts)
    );
    $html = '<svg class="icon"><use xlink:href="#' . $id . '"></use></svg>';

    return $html;
}

add_shortcode('svg', 'svg_icon_shortcode');

function the_svg($id) {
    $html = '<svg class="icon"><use xlink:href="#' . $id . '"></use></svg>';

    echo $html;
}

function get_the_svg($id) {
    $html = '<svg class="icon"><use xlink:href="#' . $id . '"></use></svg>';

    return $html;
}

function the_img_url($id) {
    $uri = get_template_directory_uri();
    $url = $uri . '/img/' . $id;

    echo $url;
}

// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action('wp_enqueue_scripts', 'remove_block_css', 100);

function remove_block_css() {
    wp_dequeue_style('wp-block-library'); // WordPress core
    wp_dequeue_style('wp-block-library-theme'); // WordPress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Remove from TinyMCE
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
	return array_diff($plugins, array('wpemoji'));
    } else {
	return array();
    }
}

add_filter('wpseo_breadcrumb_separator', function( $separator ) {
    return '<span class="breadcrumb-separator">' . $separator . '</span>';
});

function shortcode_permalinks($atts) {

    extract(shortcode_atts(
		    array(
	'id' => 0,
	'anchor' => 0,
		    ), $atts)
    );

    if ($id):
	$url = (!empty($params) ? get_permalink($id) . '?' . $params : get_permalink($id) );
    endif;
    if ($anchor):
	$url .= '#' . $anchor;
    endif;

    return $url;
}

add_shortcode('permalink', 'shortcode_permalinks');


if (!function_exists('course_lessons_count')) {

    function course_lessons_count() {
	$args = array(
	    'post_type' => 'sfwd-topic',
	    'meta_query' => [[
	    'key' => 'course_id',
	    'value' => get_the_ID(),
		]],
	);
	$the_query = new WP_Query($args);
	echo $the_query->found_posts . ' lessons';
    }

}
if (!function_exists('course_price')) {

    function course_price() {
	$woo_product = fw_get_db_post_option(get_the_ID(), 'woo_product')[0];
	$product = wc_get_product($woo_product);
	$currency = get_woocommerce_currency_symbol();
	if ($product->get_sale_price() != '') {
	    $price = '<h4>' . $currency . $product->get_sale_price() . '<span>' . $currency . $product->get_regular_price() . "</span></h4>";
	} else {
	    $price = "<h4>" . $currency . $product->get_price() . "</h4>";
	}
	echo '<div class="course-price">' . $price . '</div>';
    }

}
if (!function_exists('course_price_free')) {

    function course_price_free() {
	$woo_product = fw_get_db_post_option(get_the_ID(), 'woo_product')[0];
	$product = wc_get_product($woo_product);
	$currency = get_woocommerce_currency_symbol();
	if ($product->get_sale_price() != '') {
	    $price = '<h4>Free <span>' . $currency . $product->get_sale_price() . "</span></h4>";
	} else {
	    $price = "<h4>Free <span>" . $currency . $product->get_price() . "</span></h4>";
	}
	echo '<div class="course-price">' . $price . '</div>';
    }

}

if (!function_exists('course_instructor')) {

    function course_instructor() {
	$instructor = fw_get_db_post_option(get_the_ID(), 'instructor')[0];
	if ($instructor) {
	    echo '<div class="course-instructor">';
	    echo get_the_post_thumbnail($instructor, array(30, 30), array('class' => 'course-instructor-avatar'));
	    echo '<strong>' . get_the_title($instructor) . '</strong>';
	    echo '</div>';
	}
    }

}
if (!function_exists('course_learners_count')) {

    function course_learners_count() {
	$members_arr = learndash_get_users_for_course(get_the_ID(), [], false);

	if (( $members_arr instanceof \WP_User_Query ) && ( property_exists($members_arr, 'total_users') ) && (!empty($members_arr->total_users) )) {
	    echo ($members_arr->total_users + fw_get_db_post_option(get_the_ID(), 'learners')) . ' learners';
	} else {
	    echo '0 learners';
	}
    }

}
if (!function_exists('course_get_started_link')) {

    function course_get_started_link($course_id = null) {
	global $post;
	$user = _wp_get_current_user();

	if (is_null($course_id)) {
	    $course_id = learndash_get_course_id($post);
	}

	if (!$course_id || !isset($user->ID)) {
	    // User Not Logged In OR No Course Identified
	    return false;
	}

	$lessons = learndash_get_lesson_list($course_id);

	if (!$lessons) {
	    // No Lesson
	    return false;
	}

	$first_lesson = reset($lessons);

	$user_course_progress = get_user_meta($user->ID, '_sfwd-course_progress', true);

	if (isset($user_course_progress[$course_id])) {
	    $course_progress = $user_course_progress[$course_id];

	    // get first lesson link
	    if (!$course_progress['lessons'] && isset($first_lesson->ID)) {
		$lesson_id = $first_lesson->ID;
	    } else {
		end($course_progress['lessons']);
		$lesson_id = key($course_progress['lessons']);

		foreach ($lessons as $key => $lesson) {
		    if ($lesson->ID == $lesson_id) {
			$lesson_id = $lessons[$key + 1]->ID;
			break;
		    }
		}
	    }
	} elseif (isset($first_lesson->ID)) {
	    // get first lesson link
	    $lesson_id = $first_lesson->ID;
	}

	if (!$lesson_id) {
	    // No Lesson ID
	    return false;
	}

	if ('sfwd-lessons' != get_post_type($lesson_id)) {
	    // ID not for a Learndash Lesson
	    return false;
	}

	$link = get_post_permalink($lesson_id);
	return $link;
    }

}

add_filter('learndash_focus_mode_can_view_comments', '__return_false');
add_action('learndash-focus-content-end', function() {
    if (is_user_logged_in()) {
	comments_template();
    }
});

function getNextUrl($post_id, $course_id) {
    $next_url = learndash_next_post_link('', true);
    if (!$next_url) {
	$lessons = learndash_course_get_lessons($course_id, array());
	$find = false;
	$next_lesson = array();
	foreach ($lessons as $lesson) {
	    if ($find === true) {
		$next_lesson = $lesson;
		break;
	    }
	    if ($lesson->ID === $post_id) {
		$find = true;
	    }
	}
	if ($next_lesson) {
	    $next_url = get_post_permalink($next_lesson->ID);
	}
    }
    return $next_url;
}
