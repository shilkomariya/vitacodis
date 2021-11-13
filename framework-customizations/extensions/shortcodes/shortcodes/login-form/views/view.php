<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<?php
wp_login_form(array(
    'echo' => true,
    'redirect' => site_url('members/me', $_SERVER['REQUEST_URI']),
));
?>
<p class="sing-up-text">Don’t have an account? <a href="<?php the_permalink(3561) ?>">Sign Up</a></p>