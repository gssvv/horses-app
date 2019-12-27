<?

// 2.
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "hbhorse";
$mrh_pass1 = "cjJQQyr69bxR0K9Ys1DJ";
// test
// $mrh_pass1 = "KILwqOP69mp04r4qvLDK";


// номер заказа
// number of order
$inv_id = 0;

// описание заказа
// order description
$inv_desc = "Заказ на сайте superhorse.ru";

// сумма заказа
// sum of order
$out_summ = $_POST['summ'];
// $out_summ = $_POST['summ'];

// тип товара
// code of goods
$shp_email = $_POST['email'];
$shp_info = $_POST['info'];
$shp_name = $_POST['name'];
$shp_phone = $_POST['phone'];
$shp_area = $_POST['area'];
$shp_passport = $_POST['passport'];

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language
$culture = "ru";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_area=$shp_area:Shp_email=$shp_email:Shp_info=$shp_info:Shp_name=$shp_name:Shp_passport=$shp_passport:Shp_phone=$shp_phone");

print $crc;
// форма оплаты товара
// payment form
// print "<html>".
//       "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
//       "<input type=text name=MrchLogin value=$mrh_login>".
//       "<input type=text name=OutSum value=$out_summ>".
//       "<input type=text name=InvId value=$inv_id>".
//       "<input type=text name=Desc value='$inv_desc'>".
//       "<input type=text name=SignatureValue value=$crc>".
//       "<input type=text name=Shp_info value='$shp_info'>".
//       "<input type=text name=IncCurrLabel value=$in_curr>".
//       "<input type=text name=Culture value=$culture>".
//       "<input type=submit value='Pay'>".
//       "</form></html>";
?>