<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="Сообщение с сайта superhorse.ru\n\nИмя: $name \n\nПочта: $email \n\nСообщение: $message";
$recipient = "san4es-ag@ya.ru";
$subject = "superhorse.ru – Сообщение с сайта";
$headers = 'From: Оповещение superhorse.ru <classichorse@yandex.ru>\r\n';

if(isset($name) and isset($email)) {
    mail($recipient, $subject, $formcontent, $headers);
}

?>
