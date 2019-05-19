<?php
/**
 * Created by PhpStorm.
 * User: rootmaster
 * Date: 11/10/18
 * Time: 07:25 AM
 */

if(!empty($_POST['sendmail'])) {
    $to      = 'matt@halliganwebdevelopment.com';
    $subject = 'Page Contact';
    $message = 'Contact from page: <br>. ';
    if(!empty($_POST['name'])){
        $message.=$_POST['name'] . '<br>';
    }

    if(!empty($_POST['email'])){
        $message.=$_POST['email'] . '<br>';
    }

    if(!empty($_POST['phone'])){
        $message.=$_POST['phone'] . '<br>';
    }

    if(!empty($_POST['message'])){
        $message.=$_POST['message'] . '<br>';
    }


    $headers = 'From: matt@halliganwebdevelopment.com' . "\r\n" .
        'Reply-To: matt@halliganwebdevelopment.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
