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

add_filter('woocommerce_add_to_cart_redirect', 'vitacodis_redirect_checkout_add_cart');

function vitacodis_redirect_checkout_add_cart() {
    return wc_get_checkout_url();
}

add_action('woocommerce_register_form_start', 'vitacodis_add_name_woo_account_registration');

function vitacodis_add_name_woo_account_registration() {
    ?>

    <p class="form-row form-row-first">
        <label class="form-label" for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label class="form-label" for="reg_billing_last_name"><?php _e('Surname', 'woocommerce'); ?> <span class="required">*</span></label>
        <input type="text" class="form-control" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
    </p>

    <div class="clear"></div>

    <?php
}

///////////////////////////////
// 2. VALIDATE FIELDS

add_filter('woocommerce_registration_errors', 'vitacodis_validate_name_fields', 10, 3);

function vitacodis_validate_name_fields($errors, $username, $email) {
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

add_action('woocommerce_created_customer', 'vitacodis_save_name_fields');

function vitacodis_save_name_fields($customer_id) {
    if (isset($_POST['billing_first_name'])) {
	update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    if (isset($_POST['billing_last_name'])) {
	update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
	update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }

    if ((!empty($_POST['freecourse'])) && (!empty($_POST['courseid']))) {
	ld_update_course_access($customer_id, $_POST['courseid'], false);
	wp_redirect(get_the_permalink(11133));
	exit;
    }
}

add_filter('woocommerce_login_redirect', 'login_redirect');

function login_redirect($redirect_to) {
    return home_url() . '/members/me/';
}

add_action('wp_logout', 'logout_redirect');

function logout_redirect() {
    wp_redirect(home_url());
    exit;
}

add_filter('wc_add_to_cart_message_html', '__return_false');

// Concatenate remove link after item qty
function filter_woocommerce_cart_item_name($item_qty, $cart_item, $cart_item_key) {
    $remove_link = apply_filters('woocommerce_cart_item_remove_link', sprintf(
		    '<a href="#" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">&times;</a>', __('Remove this item', 'woocommerce'), esc_attr($cart_item['product_id']), esc_attr($cart_item['data']->get_sku()), esc_attr($cart_item_key)
	    ), $cart_item_key);

    // Return
    return $remove_link . $item_qty;
}

add_filter('woocommerce_cart_item_name', 'filter_woocommerce_cart_item_name', 10, 3);

// jQuery - Ajax script
function action_wp_footer() {
    // Only checkout page
    if (!is_checkout())
	return;
    ?>
    <script type="text/javascript">
        jQuery(function ($) {
    	$('form.checkout').on('click', '.cart_item a.remove', function (e) {
    	    e.preventDefault();

    	    var cart_item_key = $(this).attr("data-cart_item_key");

    	    $.ajax({
    		type: 'POST',
    		url: wc_checkout_params.ajax_url,
    		data: {
    		    'action': 'woo_product_remove',
    		    'cart_item_key': cart_item_key,
    		},
    		success: function (result) {
    <?php if (WC()->cart->cart_contents_count == 1) { ?>
			    window.location.href = "<?php echo esc_url(home_url('/')) ?>";
    <?php } else { ?>
			    $('body').trigger('update_checkout');
    <?php } ?>
    		    //console.log( 'response: ' + result );
    		},
    		error: function (error) {
    		    //console.log( error );
    		}
    	    });
    	});
        });
    </script>
    <?php
}

add_action('wp_footer', 'action_wp_footer', 10, 0);

// Php Ajax
function woo_product_remove() {
    if (isset($_POST['cart_item_key'])) {
	$cart_item_key = sanitize_key($_POST['cart_item_key']);

	// Remove cart item
	WC()->cart->remove_cart_item($cart_item_key);
    }

    // Alway at the end (to avoid server error 500)
    die();
}

add_action('wp_ajax_woo_product_remove', 'woo_product_remove');
add_action('wp_ajax_nopriv_woo_product_remove', 'woo_product_remove');


add_action('template_redirect', 'empty_cart_redirection');

function empty_cart_redirection() {
    if (WC()->cart->is_empty() && is_cart()) {
	wp_safe_redirect(esc_url(home_url('/')));
	exit;
    }
}

add_action('template_redirect', 'empty_cart_redirection');

function empty_checkout_redirection() {
    if (WC()->cart->is_empty() && is_checkout()) {
	wp_safe_redirect(esc_url(home_url('/')));
	exit;
    }
}

/**
 * @snippet       WooCommerce User Registration Shortcode
 */
add_shortcode('wc_reg_form_vitacodis', 'vitacodis_separate_registration_form');

function vitacodis_separate_registration_form() {
    if (is_admin())
	return;
    if (is_user_logged_in())
	return;
    ob_start();

    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY

    do_action('woocommerce_before_customer_login_form');
    ?>
    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >
        <input type="hidden" name="freecourse" value="true">
        <input type="hidden" name="courseid" value="<?php echo get_the_ID(); ?>">

	<?php do_action('woocommerce_register_form_start'); ?>

	<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

	    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label class="form-label"  for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username']) ) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                                      ?>
	    </p>

	<?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    	<label class="form-label" for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    	<input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email']) ) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                                      ?>
        </p>

	<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

	    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label class="form-label" for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" />
	    </p>

	<?php else : ?>

	    <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

	<?php endif; ?>

	<?php do_action('woocommerce_register_form'); ?>

        <p class="woocommerce-form-row form-row">
	    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
    	<button type="submit" class="woocommerce-form-register__submit btn btn-primary" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Sign up', 'woocommerce'); ?></button>
        </p>

	<?php do_action('woocommerce_register_form_end'); ?>

    </form>

    <?php
    return ob_get_clean();
}

// Shop random order. View settings drop down order by Woocommerce > Settings > Products > Display
add_filter('woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args');

function custom_woocommerce_get_catalog_ordering_args($args) {
    $orderby_value = isset($_GET['orderby']) ? woocommerce_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    if ('random_list' == $orderby_value) {
	$args['orderby'] = 'rand';
	$args['order'] = '';
	$args['meta_key'] = '';
    }
    return $args;
}

add_filter('woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby');
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby');

function custom_woocommerce_catalog_orderby($sortby) {
    $sortby['random_list'] = 'Random';
    return $sortby;
}
