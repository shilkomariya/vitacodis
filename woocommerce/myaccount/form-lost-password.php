<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */
defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>

<div class="login-wrp">
    <div class="row justify-content-between flex-md-row-reverse gx-2 justify-content-between">
	<div class="col-12 col-lg-6 col-md-6">
	    <div class="img-box round-image ms-auto">
		<?php echo wp_get_attachment_image(13787, 'large', false, array("class" => 'img-fluid')); ?>
	    </div>
	</div>
	<div class="col-12 col-lg-5 col-md-6 align-self-center">
	    <form method="post" class="woocommerce-ResetPassword lost_reset_password">
		<h3>Forgot your password?</h3>
		<p><?php echo apply_filters('woocommerce_lost_password_message', esc_html__('Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce')); ?></p><?php // @codingStandardsIgnoreLine        ?>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		    <label for="user_login"><?php esc_html_e('Username or email', 'woocommerce'); ?></label>
		    <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="text" name="user_login" id="user_login" autocomplete="username" />
		</p>

		<div class="clear"></div>

		<?php do_action('woocommerce_lostpassword_form'); ?>
		<div class="row align-items-center">
		    <p class="col-md-auto">
			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="btn btn-primary" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
		    </p>
		    <p class="col-md-auto">
			<a class="back-to-link" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Back to the login page</a>
		    </p>
		</div>

		<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

	    </form>
	    <?php
	    do_action('woocommerce_after_lost_password_form');
	    ?>
	</div>
    </div>
</div>
