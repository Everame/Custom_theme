<?php
function sendMail(){
    $message='</div>'.
                $_POST['message'].
             '</div>
             </span style="color: orange;">Contacts: '.
                $_POST['email'].' - '.$_POST['fName'].' '.$_POST['lastName'].' ('.$_POST['phone'].')'.
             '</span>';
    wp_mail('ilyatarasov@bk.ru','Message from users DartService',$message);
}
if (isset($_POST['send'])) {
    sendMail();
}
