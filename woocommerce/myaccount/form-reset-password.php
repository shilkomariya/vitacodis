<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */
defined('ABSPATH') || exit;

do_action('woocommerce_before_reset_password_form');
?>
<div class="login-wrp">
    <div class="row justify-content-between flex-md-row-reverse gx-2 justify-content-between">
	<div class="col-12 col-lg-6 col-md-6">
	    <div class="img-box round-image ms-auto">
		<?php echo wp_get_attachment_image(14096, 'large', false, array("class" => 'img-fluid')); ?>
	    </div>
	</div>
	<div class="col-12 col-md-6 align-self-center">

	    <h3><?php echo apply_filters('woocommerce_reset_password_message', esc_html__('Enter a new password below.', 'woocommerce')); ?></h3><?php // @codingStandardsIgnoreLine           ?>
	    <form method="post" class="woocommerce-ResetPassword lost_reset_password">


		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		    <label for="password_1"><?php esc_html_e('New password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password_1" id="password_1" autocomplete="new-password" />
		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last mb-2">
		    <label for="password_2"><?php esc_html_e('Re-enter new password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password_2" id="password_2" autocomplete="new-password" />
		</p>

		<input type="hidden" name="reset_key" value="<?php echo esc_attr($args['key']); ?>" />
		<input type="hidden" name="reset_login" value="<?php echo esc_attr($args['login']); ?>" />

		<div class="clear"></div>

		<?php do_action('woocommerce_resetpassword_form'); ?>

		<p class="woocommerce-form-row form-row">
		    <input type="hidden" name="wc_reset_password" value="true" />
		    <button type="submit" class="btn btn-primary" value="<?php esc_attr_e('Save', 'woocommerce'); ?>" style="min-width: 153px"><?php esc_html_e('Save', 'woocommerce'); ?></button>
		</p>
		<p class="message-text">Choosing a strong password is critical to securing your account. Make sure the password is at least 10 characters long, use a mix of letters (upper and lower case), numbers, special characters and do not use dictionary words and any of your personally identifiable information.</p>

		<?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>

	    </form>
	    <?php
	    do_action('woocommerce_after_reset_password_form');
	    ?>
	</div>
    </div>
</div>
