<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form');
?>
<div class="login-wrp">
    <div class="row justify-content-between flex-md-row-reverse gx-2 justify-content-between">
	<div class="col-12 col-lg-6 col-md-6">
	    <div class="img-box round-image ms-auto">
		<?php echo wp_get_attachment_image(13758, 'large', false, array("class" => 'img-fluid')); ?>
	    </div>
	</div>
	<div class="col-12 col-lg-5 col-md-6 align-self-center">
	    <h2 class="h3"><?php esc_html_e('User Login', 'woocommerce'); ?></h2>
	    <form class="woocommerce-form woocommerce-form-login login" method="post">
		<?php do_action('woocommerce_login_form_start'); ?>
		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		    <label for="username"><?php esc_html_e('Email Address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username']) ) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                  ?>
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
		<div class="login-btn-wrp row">
		    <div class="col-12">
			<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
		    </div>
		    <div class="col-auto">
			<button type="submit" class="woocommerce-form-login__submit btn btn-primary" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
		    </div>
		    <div class="col-auto social-login">
			<?php echo do_shortcode('[nextend_social_login login="1" link="1" unlink="1" style="icon" heading="or login with"]') ?>
		    </div>
		</div>
		<?php do_action('woocommerce_login_form_end'); ?>
	    </form>
	    <p class="sing-up-text mt-1">Dont have an account? <a id="ShowSignUp" href="#">Sign Up</a></p>
	</div>
    </div>
</div>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
    <div class="register-wrp" style="display: none;">
        <div class="row justify-content-between flex-md-row-reverse gx-2 justify-content-between">
    	<div class="col-12 col-lg-6 col-md-6">
    	    <div class="img-box round-image ms-auto">
		    <?php echo wp_get_attachment_image(13786, 'large', false, array("class" => 'img-fluid')); ?>
    	    </div>
    	</div>
    	<div class="col-12 col-lg-5 col-md-6 align-self-center">
    	    <h2 class="h3"><?php esc_html_e('Sign Up and Start Learning', 'woocommerce'); ?></h2>
    	    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

		    <?php do_action('woocommerce_register_form_start'); ?>

		    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			    <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username']) ) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                  ?>
			</p>

		    <?php endif; ?>

    		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    		    <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    		    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email']) ) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine                                                  ?>
    		</p>

		    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			    <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" />
			</p>

		    <?php else : ?>

			<p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

		    <?php endif; ?>


    		<div class="login-btn-wrp row mb-1">
    		    <div class="col-12">
			    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
    		    </div>
    		    <div class="col-auto">
    			<button type="submit" class="woocommerce-form-register__submit btn btn-primary" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Sign up', 'woocommerce'); ?></button>
    		    </div>
    		    <div class="col-auto social-login">
			    <?php echo do_shortcode('[nextend_social_login login="1" link="1" unlink="1" style="icon" heading="or sign up with"]') ?>
    		    </div>
    		</div>
		    <?php do_action('woocommerce_register_form'); ?>

		    <?php do_action('woocommerce_register_form_end'); ?>

    	    </form>
    	</div>
        </div>
    </div>

<?php endif; ?>

<?php
do_action('woocommerce_after_customer_login_form');
