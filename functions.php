<?php
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'wp_enqueue_scripts', 'dartServices_assets' );
add_action( 'widgets_init', 'widget_sidebar_register' );

if ( function_exists('register_sidebar') )
register_sidebar(array(
    'name'          => 'Testing widget',
    'id'            => "test",
    'description'   => 'Test widget',
    'before_widget' => 'div',
    'after_widget' => 'div'
));

function widget_sidebar_register(){
    register_sidebar(array(
        'name'          => 'Login form',
        'id'            => "login_Form",
        'description'   => 'Form Login and register',
        'before_widget' => '',
        'after_widget' => ''
    ));
}

function dartServices_assets() {
    
    wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/assets/fonts/fontawesome-free-5.15.4-web/css/all.css');
    wp_enqueue_style( 'mediaCSS', get_template_directory_uri() . '/css/media.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'loginForm', get_template_directory_uri() . '/css/loginForm.css');
}

function theme_register_nav_menu(){
    register_nav_menu( 'primaryMenu', 'Primary menu' );
	add_theme_support( "post-thumbnails", array("post") );
	add_image_size( "serviceThumb", 30, 30, true );
    add_image_size( "commentsThumb", 70, 70, true );
    add_image_size( "teamThumb", 90, 90, true );
}



show_admin_bar(false);



