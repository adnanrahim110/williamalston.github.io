<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../vendor/autoload.php';

if (isset($_POST['send_mail'])) {
    $mail = new PHPMailer(true);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'arkaka0092@gmail.com';
    $mail->Password = 'zcjp bomb wqjw lgat';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($_POST['email']);

    $mail->addAddress('info@williamgalston.com', $_POST['name']);

    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body = 
        'Name: ' . $name . '<br>' .
        'Email: ' . $email . '<br>' .
        'Phone: ' . $phone . '<br>' .
        'Message: ' . $message . '<br>' .
        'From: ' . $email;

    $mail->AltBody = 
        'Name: ' . $name . '\n' .
        'Email: ' . $email . '\n' .
        'Phone: ' . $phone . '\n' .
        'Message: ' . $message . '\n' .
        'From: ' . $email;

    if ($mail->send()) {
        header("location: ../thankyou.html");
    } else {
        header("location: ../index.html");
    }
} else {
    header("location: ../index.html");
    '<script> echo= "something went wrong" </script>';
}