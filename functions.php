<?php
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'wp_enqueue_scripts', 'dartServices_assets' );
add_action( 'widgets_init', 'widget_sidebar_register' );
add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action('wp_ajax_send_mail'       , 'sendMail');
add_action('wp_ajax_nopriv_send_mail', 'sendMail');
add_action('wp_ajax_buy_Product'       , 'buy_Product');
add_action('wp_ajax_nopriv_buy_Product', 'buy_Product');
add_action('wp_head','js_variables');

add_filter( 'wp_mail_from', 'vortal_wp_mail_from' );
add_filter( 'wp_mail_content_type', function($content_type){
	return "text/html";
});

function vortal_wp_mail_from( $email_address ){
	return 'ilyatarasov@bk.ru';
}

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
    wp_enqueue_style( 'mediaProfile', get_template_directory_uri() . '/css/mediaProfile.css');
    wp_enqueue_style( 'mediaAccount', get_template_directory_uri() . '/css/mediaAccount.css');
    wp_enqueue_style( 'mediaLoginForm', get_template_directory_uri() . '/css/mediaLoginForm.css');
    wp_enqueue_style( 'mediaPricing', get_template_directory_uri() . '/css/mediaPricing.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'loginForm', get_template_directory_uri() . '/css/loginForm.css');
    wp_enqueue_style( 'profile', get_template_directory_uri() . '/css/profile.css');
    wp_enqueue_style( 'account', get_template_directory_uri() . '/css/account.css');
    wp_enqueue_style( 'pricing', get_template_directory_uri() . '/css/pricing.css');
}

function theme_register_nav_menu(){
    register_nav_menu( 'primaryMenu', 'Primary menu' );
    register_nav_menu( 'userMenu', 'User menu' );
	add_theme_support( "post-thumbnails", array("post") );
	add_image_size( "serviceThumb", 30, 30, true );
    add_image_size( "commentsThumb", 70, 70, true );
    add_image_size( "teamThumb", 90, 90, true );
}

function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'functions_url' => get_template_directory_uri().'functions.php'
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).
        ';</script>'
    );
}

function sendMail(){
    $message='</div>'.
                $_REQUEST['message'].
             '</div>
             </span style="color: orange;">Contacts: '.
                $_REQUEST['email'].' - '.$_REQUEST['fName'].' '.$_REQUEST['lastName'].' ('.$_REQUEST['phone'].')'.
             '</span>';
    wp_mail('ilyatarasov@bk.ru','Message from users DartService',$message);
    wp_die();
}

function buy_Product(){
    $message='<div>Thank you for buying our product!</div>
              <a href="https://disk.yandex.ru/d/wTBnOPawKC3hgQ">Your programm</a>';
    wp_mail($_REQUEST['mail'],'Link for download paid programm DartService manager',$message);
    wp_die();
}




show_admin_bar(false);



