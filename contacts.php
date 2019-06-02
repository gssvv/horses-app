<?php

$name = $_POST['name'];
$shop = $_POST['shop'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$inn = $_POST['inn'] || 'Не указан';
$region = $_POST['region'];
$humset = $_POST['humset'];
$message = $_POST['message'];

$formcontent="Заявка на сотрудничество с сайта superhorse.ru\n\n Имя: $name \nМагазин, интернет-магазин: $shop \nEmail: $email \nКонтактный телефон: $phone \nИНН, ОРГН: $inn \nРегион (край, область, республика): $region \nНаселенный пункт (район, город, посёлок, станица): $humset \n \n\nКомментарий: $message";
$recipient = "san4es-ag@ya.ru";
$subject = "superhorse.ru – Заявка на сотрудничество";
$headers = 'From: SUPER HORSE NUTRITION <classichorse@yandex.ru>\r\n';

if(isset($name) and isset($email) and isset($phone)) {
    mail($recipient, $subject, $formcontent, $headers);
}

?>
