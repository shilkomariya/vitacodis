<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
if (is_user_logged_in()) {
    return;
}
?>
<form class="woocommerce-form woocommerce-form-login login" method="post">
    <?php do_action('woocommerce_login_form_start'); ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
	<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username']) ) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                    ?>
    </p>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
	<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
	<input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
    </p>

    <?php do_action('woocommerce_login_form'); ?>
    <div class="row justify-content-sm-between">
	<p class="col-sm-auto">
	    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme w-100">
		<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
	    </label>
	</p>
	<p class="col-sm-auto woocommerce-LostPassword lost_password">
	    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot password?', 'woocommerce'); ?></a>
	</p>
    </div>
    <div class="login-btn-wrp">
	<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
	<button type="submit" class="woocommerce-form-login__submit btn btn-primary" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
    </div>
    <?php do_action('woocommerce_login_form_end'); ?>
</form>
