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
	    <div class="col-lg-6 footer-2">
		<?php if (is_active_sidebar('footer')) : ?>
		    <?php dynamic_sidebar('footer'); ?>
		<?php endif; ?>
	    </div>
	    <div class="col-sm-6 col-lg-auto footer-1">
		<a href="<?php echo site_url(); ?>" class="logo-link" rel="home"><img src="<?php echo get_template_directory_uri() ?>/img/main-logo.png" srcset="<?php echo get_template_directory_uri() ?>/img/main-logo-x2.png 2x" alt="<?php bloginfo('name'); ?>"></a>
	    </div>
	    <div class="col-sm-6 col-lg-auto footer-3">
		<ul class="nav social">
		    <?php if (fw_get_db_settings_option('insta')) { ?><li><a href="<?php echo fw_get_db_settings_option('insta') ?>" target="_blank"><svg class="icon"><use xlink:href="#instagram"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('fb')) { ?><li><a href="<?php echo fw_get_db_settings_option('fb') ?>" target="_blank"><svg class="icon"><use xlink:href="#facebook"></use></svg></a></li><?php } ?>
		    <?php if (fw_get_db_settings_option('tw')) { ?><li><a href="<?php echo fw_get_db_settings_option('tw') ?>" target="_blank"><svg class="icon"><use xlink:href="#twitter"></use></svg></a></li><?php } ?>
		</ul>
		<div class="email"><a href="mailto:<?php echo antispambot(fw_get_db_settings_option('email')) ?>"><svg class="icon"><use xlink:href="#email"></use></svg> <?php echo antispambot(fw_get_db_settings_option('email')) ?></a></div>
	    </div>
	</div>
    </div>
    <div class="copiright">
	<div class="container">
	    <div class="row">
		<div class="col-lg-auto">© No copyright I guess? Do whatever you want with the site</div>
		<div class="col-lg-auto">
		    <?php
		    wp_nav_menu(
			    array(
				'theme_location' => 'terms',
				'container' => false,
				'container_class' => false,
				'items_wrap' => '<ul class="nav"><li id="item-id"> Dummy links: </li>%3$s</ul>'
			    )
		    );
		    ?>
		</div>
	    </div>
	</div>
    </div>
</footer>
<?php get_template_part('template-parts/svg-sprite') ?>
<?php wp_footer(); ?>
</body>
</html>