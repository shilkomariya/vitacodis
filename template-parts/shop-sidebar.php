<?php
/**
 * Shop sidebar
 *
 * @package Vitacodis-theme
 */
// Exit if accessed directly.
?>
<div class="col-md-3 aside">

    <?php
    $get_args = array(
	'hierarchical' => 1,
	'taxonomy' => 'product_cat',
	'parent' => 82,
	'hide_empty' => 1,
	'show_option_none' => '',
    );
    $get_subcats = get_categories($get_args);
    $cur_cat_id = get_queried_object()->term_id;
    echo '<ul class="cats-widget">';
    if ($cur_cat_id == 82) {
	echo '<li class="current-cat"><a href="' . get_term_link(82) . '">All Consultans</a></li>';
    } else {
	echo '<li><a href="' . get_term_link(82) . '">All Consultans</a></li>';
    }
    foreach ($get_subcats as $sc_val) {
	$get_link = get_term_link($sc_val->slug, $sc_val->taxonomy);
	if ($cur_cat_id == $sc_val->term_id) {
	    echo '<li class="current-cat">';
	} else {
	    echo '<li>';
	}
	echo '<a href="' . $get_link . '">' . $sc_val->name . '</a>';
	echo '</li>';
    }
    echo '</ul>';
    ?>
</div>