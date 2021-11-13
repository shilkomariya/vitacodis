<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<form id="registerform" action="<?php site_url('wp-login.php?action=register'); ?>" method="post">
    <div class="mb-1">
	<label for="user_first_name" class="form-label">First Name</label>
	<input id="user_first_name" class="form-control" name="first_name" required="required" type="text">
    </div>
    <div class="mb-1">
	<label for="user_last_name" class="form-label">Surname</label>
	<input id="user_last_name" class="form-control" name="last_name" required="required" type="text">
    </div>
    <div class="mb-1">
	<label for="user_email"  class="form-label">E-mail</label>
	<input type="email" name="user_email" id="user_email" class="form-control" value="" size="25">
    </div>
    <div class="mb-1">
	<label for="user_password"  class="form-label">Password</label>
	<input id="user_password"  class="form-control" name="password" required="required" type="password"  aria-required="true">
    </div>
    <input type="hidden" name="redirect_to" value="<?php the_permalink(2225) ?>">

    <div class="mb-1 ">
	<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="sign up">
	<div class="social-login">
	    <?php echo do_shortcode('[nextend_social_login provider="facebook"]') ?>
	    <?php echo do_shortcode('[nextend_social_login provider="google"]') ?>
	    <?php echo do_shortcode('[nextend_social_login provider="linkedin"]') ?>
	</div>
    </div>
</form>

By signing up, you agree to our Terms of Use and Privacy Policy.Sign up with
