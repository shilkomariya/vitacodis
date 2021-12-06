<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$user = get_user_by('login', $user_login);

// if you need the email address or something else
$email = $user->user_email;

// if you need an extra field from the user metas
$firstname = get_user_meta($user->ID, 'billing_first_name', true);
?>

<?php do_action('woocommerce_email_header', $email_heading, $email); ?>

<?php /* translators: %s: Customer username */ ?>
<p><?php printf(esc_html__('Hello  %s,', 'woocommerce'), esc_html($firstname)); ?></p>
<?php /* translators: %s: Store name */ ?>
<p>We have received a request to reset the password for the Vitacodis account associated with <?php echo $email ?>. No changes have been made to your account yet. Please click the link below to change your password now.</p>
<?php /* translators: %s: Customer username */ ?>
<p>
    <a class="link" href="<?php echo esc_url(add_query_arg(array('key' => $reset_key, 'id' => $user_id), wc_get_endpoint_url('lost-password', '', wc_get_page_permalink('myaccount')))); ?>"><?php // phpcs:ignore       ?>
	<?php esc_html_e('Reset Password', 'woocommerce'); ?>
    </a>
</p>

<p>Please note that your password will not change unless you click the button above and create a new one. The link will expire in one day.</p>

<p>If you did not request a password change, then please disregard this email. </p>

<p>Sincerely,</p>

<p>Vitacodis Team</p>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ($additional_content) {
    echo wp_kses_post(wpautop(wptexturize($additional_content)));
}

do_action('woocommerce_email_footer', $email);
