<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

$custom_background_defaults = array(
        'default-color' => 'efefef',
        'default-image' => get_bloginfo('template_url') . '/images/bg_wall.gif',
);
add_theme_support( 'custom-background', $custom_background_defaults );
