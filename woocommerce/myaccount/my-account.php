<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */
defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
// ONLY FOR PAYMENT METHOD PAGES
if (is_add_payment_method_page()) {
    ?>
    <div id="youzer">
        <script type="text/javascript">
    	jQuery(document).ready(function () {
    	    jQuery("ul.yz-profile-navmenu a").each(function () {
    		var current = jQuery(this).attr('href');
    		if (current.indexOf('http') == -1) {
    		    jQuery(this).attr('href', '/members/me/' + current);
    		}
    	    });
    	});
        </script>
	<?php
	echo '<div id="yz-bp" class="youzer yz-page yz-account-page">';
	include_once YZ_PUBLIC_CORE . 'class-yz-tabs.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-fields.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-hashtags.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-attachments.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-widgets.php';
	include_once YZ_PUBLIC_CORE . 'functions/yz-navbar-functions.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-user.php';
	include_once YZ_PUBLIC_CORE . 'pages/yz-profile.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-author.php';
	include_once YZ_PUBLIC_CORE . 'class-yz-header.php';

	// Load Profile Style
	wp_enqueue_style('yz-profile', YZ_PA . 'css/yz-profile-style.min.css', array(), YZ_Version);

	// Load Profile Script.
	wp_enqueue_script('yz-profile', YZ_PA . 'js/yz-profile.min.js', array('jquery', 'jquery-effects-fade'), YZ_Version, true);
	// IMPORTANT: HARDCODE BP DISPLAYED USER ID HERE TO MAKE IT WORK WITH WOOCOMMERCE PAGES.
	$bp = buddypress();
	$bp->displayed_user->id = bp_loggedin_user_id();
	?>
        <header id="yz-profile-header" class="<?php echo yz_headers()->get_class('user'); ?>" <?php echo yz_widgets()->get_loading_effect(yz_option('yz_hdr_load_effect', 'fadeIn')); ?>><?php do_action('youzer_profile_header'); ?></header>
	<?php
	yz_update_profile_navigation_menu();
	yz_profile()->navbar();

	echo '<div class="yz-page-head myaccount"><h1>' . __('Account Settings', 'vitacodis-addon') . '</h1></div>';

	echo '<main class="yz-page-main-content non-avatar-pages">';
	?>

        <aside class="youzer-sidebar yz-settings-sidebar">

	    <?php do_action('youzer_settings_menus'); ?>

        </aside>

	<?php
    }

    //  do_action('woocommerce_account_navigation');
    ?>

    <div class="woocommerce-MyAccount-content">
	<?php
	/**
	 * My Account content.
	 *
	 * @since 2.6.0
	 */
	do_action('woocommerce_account_content');
	?>
    </div>

    <?php
// ONLY FOR PAYMENT METHOD PAGES
    if (is_add_payment_method_page()) {
	$Youzer_Profile = new Youzer_Profile();
	echo '</main>';
	echo '</div>';

	wp_enqueue_style('yz-account', YZ_PA . 'css/yz-account-style.min.css', array(), YZ_Version);
    }
    ?>
</div>