<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<footer class="site-footer">
    <div class="container">
	<div class="row">
	    <div class="col-md-auto logo">
		<a href="<?php echo site_url(); ?>" class="logo-link" rel="home"><img src="<?php echo get_template_directory_uri() ?>/img/footer-logo.png" srcset="<?php echo get_template_directory_uri() ?>/img/footer-logo-x2.png 2x" alt="<?php bloginfo('name'); ?>"></a>
	    </div>
	    <div class="col-auto">
		<?php
		wp_nav_menu(
			array(
			    'theme_location' => 'footer',
			    'container' => false,
			    'container_class' => false,
			    'menu_class' => 'nav',
			    'menu_id' => 'footer-links',
			)
		);
		?>
	    </div>
	    <div class="col-auto">
		<?php if (fw_get_db_settings_option('address') != "") { ?>
    		<div class="address"><a href="https://goo.gl/maps/TTwCzrKH8j2jiW3w8" target="_blank"><?php echo fw_get_db_settings_option('address') ?></a></div>
		<?php } ?>
		<?php if (fw_get_db_settings_option('phone') != "") { ?>
    		<div class="phone"><a href="tel:<?php echo preg_replace("/[^0-9]/", '', fw_get_db_settings_option('phone')) ?>">Tel: <?php echo fw_get_db_settings_option('phone') ?></a></div>
		<?php } ?>
	    </div>
	    <div class="col-12 col-lg-auto">
		<ul class="nav social">
		    <?php if (fw_get_db_settings_option('insta')) { ?><li><a href="<?php echo fw_get_db_settings_option('insta') ?>" target="_blank"><svg class="icon"><use xlink:href="#instagram"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('fb')) { ?><li><a href="<?php echo fw_get_db_settings_option('fb') ?>" target="_blank"><svg class="icon"><use xlink:href="#facebook"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('in')) { ?><li><a href="<?php echo fw_get_db_settings_option('in') ?>" target="_blank"><svg class="icon"><use xlink:href="#linkedin"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('tw')) { ?><li><a href="<?php echo fw_get_db_settings_option('tw') ?>" target="_blank"><svg class="icon"><use xlink:href="#twitter"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('yt')) { ?><li><a href="<?php echo fw_get_db_settings_option('yt') ?>" target="_blank"><svg class="icon"><use xlink:href="#youtube"></use></svg></a></li><?php } ?>
		</ul>
	    </div>
	</div>
    </div>
</footer>
<footer class="copyright">
    <div class="container">
	<div class="row">
	    <div class="col-md-auto">© <?php echo date('Y'); ?> Vitacodis. All rights reserved</div>
	    <div class="col-md-auto">
		<?php
		wp_nav_menu(
			array(
			    'theme_location' => 'terms',
			    'container' => false,
			    'container_class' => false,
			    'items_wrap' => '<ul class="nav">%3$s</ul>'
			)
		);
		?>
	    </div>
	</div>
    </div>
</footer>
<?php get_template_part('template-parts/svg-sprite') ?>
<?php get_template_part('template-parts/cookies') ?>
<?php wp_footer(); ?>
</body>
</html>