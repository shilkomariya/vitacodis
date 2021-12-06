<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */
defined('ABSPATH') || exit;

$user = get_user_by('login', $user_login);

// if you need the email address or something else
$email = $user->user_email;

// if you need an extra field from the user metas
$firstname = get_user_meta($user->ID, 'billing_first_name', true);

do_action('woocommerce_email_header', $email_heading, $email);
?>
<p><?php printf(esc_html__('Hello %s,', 'woocommerce'), esc_html($firstname)); ?></p>
<?php if (learndash_user_get_enrolled_courses($user->ID, array(), true)) { ?>
    <p>Thank you for signing up for your free Vitacodis wellbeing course. You can access your Vitacodis account to watch the selected course, view and edit your details, change your password and more. </p>

    <p><?php printf(esc_html__('Your username: %s', 'woocommerce'), '<strong>' . esc_html($email) . '</strong>'); ?></p>
<?php } else { ?>
    <p>Thank you for joining our growing community of individuals looking to adopt the principles of wellbeing for a long, healthy and happy life. You can access your Vitacodis account to view and edit your personal details, change your password and more. Take a minute to read this email – it will help you make the most of our comprehensive website.</p>

    <p><?php printf(esc_html__('Your username is your email address: %s', 'woocommerce'), '<strong>' . esc_html($email) . '</strong>'); ?></p>
<?php } ?>
<p><strong>Learn online, from anywhere in the world</strong><br>
    All Vitacodis courses take place online, through a mixture of videos, quizzes, discussions and other resources. You can access them on desktop, tablet or mobile. </p>

<p><strong>Learn anytime, at your own pace</strong><br>
    Once you are signed up for any of our courses, you can learn whenever you like, at a pace that suits you. You do not need to be online at strict times and all materials are available whenever you need them. We recommend watching one or two modules at a time and then implementing what you learn as you go.  </p>

<p><strong>Learn with other people</strong><br>
    Learning the principles and methods of wellbeing is most effective when you learn with other people, allowing you to share your opinions, experiences and ideas. That is why discussion is built into every Vitacodis course – we invite you to join in and post your comments and questions.</p>

<p>Sincerely yours,</p>

<p>Anita Young,
    Customer Team
</p>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
do_action('woocommerce_email_footer', $email);
