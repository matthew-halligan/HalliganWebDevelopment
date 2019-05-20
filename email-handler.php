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
    if(!empty($_POST['txtName'])){
        $message.=$_POST['txtName'] . '<br>';
    }

    if(!empty($_POST['txtPhone'])){
        $message.=$_POST['txtPhone'] . '<br>';
    }

    if(!empty($_POST['txtEmail'])){
        $message.=$_POST['txtEmail'] . '<br>';
    }

    if(!empty($_POST['txtComments'])){
        $message.=$_POST['txtComments'] . '<br>';
    }


    $headers = 'From: matt@halliganwebdevelopment.com' . "\r\n" .
        'Reply-To: matt@halliganwebdevelopment.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
