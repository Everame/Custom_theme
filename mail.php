<?php
public function __construct() {
    add_action( 'wp_ajax_nopriv_send_mail', array( $this, 'sendMail' ) );
    add_action( 'wp_ajax_send_mail', array( $this, 'sendMail' ) );
    wp_send_json_success( __( 'Thanks for reporting!', 'reportabug' ) );
}
function sendMail(){
    $message='</div>'.
                $_POST['message'].
             '</div>
             </span style="color: orange;">Contacts: '.
                $_POST['email'].' - '.$_POST['fName'].' '.$_POST['lastName'].' ('.$_POST['phone'].')'.
             '</span>';
    wp_mail('ilyatarasov@bk.ru','Message from users DartService',$message);
}
