<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
if (is_page(38)) {
    wp_safe_redirect(home_url('/members/me/'));
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
	<script>
	    !function (f, b, e, v, n, t, s)
	    {
		if (f.fbq)
		    return;
		n = f.fbq = function () {
		    n.callMethod ?
			    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
		};
		if (!f._fbq)
		    f._fbq = n;
		n.push = n;
		n.loaded = !0;
		n.version = '2.0';
		n.queue = [];
		t = b.createElement(e);
		t.async = !0;
		t.src = v;
		s = b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t, s)
	    }(window, document, 'script',
		    'https://connect.facebook.net/en_US/fbevents.js');
	    fbq('init', '559985198484399');
	    fbq('track', 'PageView');
	</script>
    <noscript><img height="1" width="1" style="display:none"
		   src="https://www.facebook.com/tr?id=559985198484399&ev=PageView&noscript=1"
		   /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body <?php body_class(); ?> <?php vitacodis_body_attributes(); ?>>
    <?php do_action('wp_body_open'); ?>
    <header class="site-header">
	<nav class="navbar navbar-expand-md navbar-light">
	    <div class="container">
		<a href="<?php echo site_url(); ?>" class="logo-link" rel="home"><img src="<?php echo get_template_directory_uri() ?>/img/main-logo.png" srcset="<?php echo get_template_directory_uri() ?>/img/main-logo-x2.png 2x" alt="<?php bloginfo('name'); ?>"></a>
		<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
		    <span class="toggle-icon"><i></i><i></i><i></i><i></i></span>
		    <span class="btn-text"><?php _e('Menu', 'vitacodis'); ?></span>
		</button>
		<div id="navbarNavDropdown" class="collapse navbar-collapse">
		    <?php
		    wp_nav_menu(
			    array(
				'theme_location' => 'primary',
				'container' => 'false',
				'menu_class' => 'navbar-nav',
				'fallback_cb' => '',
				'menu_id' => 'main-menu',
				'walker' => new vitacodis_WP_Bootstrap_Navwalker(),
			    )
		    );
		    ?>
		</div>
	    </div>
	</nav>
    </header>