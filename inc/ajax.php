<?php

add_action('wp_ajax_cookies_agree', 'cookies_agree_callback');
add_action('wp_ajax_nopriv_cookies_agree', 'cookies_agree_callback');

function cookies_agree_callback() {

    setcookie('CookiesAgreed', "true", time() + 32208000, '/', $_SERVER['HTTP_HOST']);

    wp_die();
}
