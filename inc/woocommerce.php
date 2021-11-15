<?php
/**
 * Add WooCommerce support
 *
 * @package Pocket-Monster
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('after_setup_theme', 'understrap_woocommerce_support');
if (!function_exists('understrap_woocommerce_support')) {

    /**
     * Declares WooCommerce theme support.
     */
    function understrap_woocommerce_support() {
	add_theme_support('woocommerce');

	// Add Product Gallery support.
	//add_theme_support('wc-product-gallery-lightbox');
	//add_theme_support('wc-product-gallery-zoom');
	//add_theme_support('wc-product-gallery-slider');
	// Add Bootstrap classes to form fields.
	add_filter('woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3);
	add_filter('woocommerce_quantity_input_classes', 'understrap_quantity_input_classes');
    }

}

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// First unhook the WooCommerce content wrappers.
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Then hook in your own functions to display the wrappers your theme requires.
add_action('woocommerce_before_main_content', 'understrap_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'understrap_woocommerce_wrapper_end', 10);

if (!function_exists('understrap_woocommerce_wrapper_start')) {

    /**
     * Display the theme specific start of the page wrapper.
     */
    function understrap_woocommerce_wrapper_start() {
	echo '<div class="wrapper" id="woocommerce-wrapper">';
	echo '<div class="container pb-3" id="content" tabindex="-1">';
	if (is_product_category() == 82) {
	    echo '<div class="row">';
	    echo '<main class="col-md-9 main" id="main">';
	}
    }

}

if (!function_exists('understrap_woocommerce_wrapper_end')) {

    /**
     * Display the theme specific end of the page wrapper.
     */
    function understrap_woocommerce_wrapper_end() {
	if (is_product_category() == 82) {
	    echo '</main><!-- #main -->';
	    get_template_part('template-parts/shop-sidebar');
	    echo '</div><!-- .row -->';
	}
	echo '</div><!-- Container end -->';
	echo '</div><!-- Wrapper end -->';
    }

}

if (!function_exists('understrap_wc_form_field_args')) {

    /**
     * Filter hook function monkey patching form classes
     * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
     *
     * @param string $args Form attributes.
     * @param string $key Not in use.
     * @param null   $value Not in use.
     *
     * @return mixed
     */
    function understrap_wc_form_field_args($args, $key, $value = null) {
	// Start field type switch case.
	switch ($args['type']) {
	    // Targets all select input type elements, except the country and state select input types.
	    case 'select':
		/*
		 * Add a class to the field's html element wrapper - woocommerce
		 * input types (fields) are often wrapped within a <p></p> tag.
		 */
		$args['class'][] = 'form-group';
		// Add a class to the form input itself.
		$args['input_class'][] = 'form-control';
		// Add custom data attributes to the form input itself.
		$args['custom_attributes'] = array(
		    'data-plugin' => 'select2',
		    'data-allow-clear' => 'true',
		    'aria-hidden' => 'true',
		);
		break;

	    /*
	     * By default WooCommerce will populate a select with the country names - $args
	     * defined for this specific input type targets only the country select element.
	     */
	    case 'country':
		$args['class'][] = 'form-group single-country';
		break;

	    /*
	     * By default WooCommerce will populate a select with state names - $args defined
	     * for this specific input type targets only the country select element.
	     */
	    case 'state':
		$args['class'][] = 'form-group';
		$args['custom_attributes'] = array(
		    'data-plugin' => 'select2',
		    'data-allow-clear' => 'true',
		    'aria-hidden' => 'true',
		);
		break;
	    case 'textarea':
		$args['input_class'][] = 'form-control';
		break;
	    case 'checkbox':
		$args['class'][] = 'form-group';
		// Wrap the label in <span> tag.
		$args['label'] = isset($args['label']) ? '<span class="custom-control-label">' . $args['label'] . '<span>' : '';
		// Add a class to the form input's <label> tag.
		$args['label_class'][] = 'custom-control custom-checkbox';
		$args['input_class'][] = 'custom-control-input';
		break;
	    case 'radio':
		$args['label_class'][] = 'custom-control custom-radio';
		$args['input_class'][] = 'custom-control-input';
		break;
	    default:
		$args['class'][] = 'form-group';
		$args['input_class'][] = 'form-control';
		break;
	} // End of switch ( $args ).
	return $args;
    }

}

add_filter('woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
    $args['class'] = 'form-select mb-1';
    return $args;
}, 2);

if (!is_admin() && !function_exists('wc_review_ratings_enabled')) {

    /**
     * Check if reviews are enabled.
     *
     * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
     *
     * @return bool
     */
    function wc_reviews_enabled() {
	return 'yes' === get_option('woocommerce_enable_reviews');
    }

    /**
     * Check if reviews ratings are enabled.
     *
     * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
     *
     * @return bool
     */
    function wc_review_ratings_enabled() {
	return wc_reviews_enabled() && 'yes' === get_option('woocommerce_enable_review_rating');
    }

}

if (!function_exists('understrap_quantity_input_classes')) {

    /**
     * Add Bootstrap class to quantity input field.
     *
     * @param array $classes Array of quantity input classes.
     * @return array
     */
    function understrap_quantity_input_classes($classes) {
	$classes[] = 'form-control';
	return $classes;
    }

}
/* Category page */

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 2);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 2);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 2);


remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 2);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 2);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 2);


add_filter('woocommerce_product_single_add_to_cart_text', 'vitacodis_add_to_cart_text');

function vitacodis_add_to_cart_text() {
    return __('Book now', 'vitacodis');
}

add_filter('woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart');

function bbloomer_redirect_checkout_add_cart() {
    return wc_get_checkout_url();
}

add_action('woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration');

function bbloomer_add_name_woo_account_registration() {
    ?>

    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e('Surname', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
    </p>

    <div class="clear"></div>

    <?php
}

///////////////////////////////
// 2. VALIDATE FIELDS

add_filter('woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3);

function bbloomer_validate_name_fields($errors, $username, $email) {
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
	$errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
	$errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS

add_action('woocommerce_created_customer', 'bbloomer_save_name_fields');

function bbloomer_save_name_fields($customer_id) {
    if (isset($_POST['billing_first_name'])) {
	update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    if (isset($_POST['billing_last_name'])) {
	update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
	update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }
}

add_filter('woocommerce_login_redirect', 'login_redirect');

function login_redirect($redirect_to) {
    return home_url() . '/members/me'
	    . '/';
}

add_action('wp_logout', 'logout_redirect');

function logout_redirect() {
    wp_redirect(home_url());
    exit;
}

add_filter('wc_add_to_cart_message_html', '__return_false');
