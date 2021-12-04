<?php


function dartServices_assets() {
    
    wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/assets/fonts/fontawesome-free-5.15.4-web/css/all.css');
    wp_enqueue_style( 'mediaCSS', get_template_directory_uri() . '/css/media.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
}

add_action( 'wp_enqueue_scripts', 'dartServices_assets' );

show_admin_bar(false);



