<?php

$name = $_POST['name'];
$shop = $_POST['shop'] ? $_POST['shop'] : '<i>Не указано</i>';
$email = $_POST['email'];
$phone = $_POST['phone'];
$inn = $_POST['inn'] ? $_POST['inn'] : '<i>Не указано</i>';
$region = $_POST['region'] ? $_POST['region'] : '<i>Не указано</i>';
$humset = $_POST['humset'] ? $_POST['humset'] : '<i>Не указано</i>';
$message = $_POST['message'] ? $_POST['message'] : '<i>Не указано</i>';

$recipient = "info@superhorse.ru";
$recipient_copy = "yuriy_p@korma-anilyn.ru";
$subject = "Заявка на сотрудничество";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: SUPER HORSE NUTRITION <info@superhorse.ru>\r\n";

$formcontent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
      <head style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
        <meta name="viewport" content="width=device-width" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
    
      </head>
      <body style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #efefef;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;">
        <table class="body-wrap" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #efefef;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;">
          <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
            <td class="container" style="margin: 0 auto !important;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 640px !important;">
              <!-- Message start -->
              <table style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                  <td align="center" class="masthead" style="margin: 0;padding: 80px 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-image: url(http://superhorse.ru/mail-bg.jpg);background-size: cover;color: white;">
                    <h1 style="margin: 0 auto !important;padding: 0;font-size: 32px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;max-width: 90%;text-transform: uppercase;">
                      '.$subject.'
                    </h1>
                  </td>
                </tr>
                <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                  <td class="content" style="margin: 0;padding: 30px 35px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background: white;">
                    <h2 align="center" style="margin: 0;padding: 0;font-size: 28px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;">
                    Заявка от '.$name.'
                    </h2>
    
                    <p align="center" style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                      Заявка со страницы "Сотрудничество" на сайте
                      <a href="http://superhorse.ru/" target="_blank" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #2A713E;">superhorse.ru
                    </a></p>
    
                    <h3 class="m" style="margin: 50px 0 20px 0;padding: 0;font-size: 24px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;">
                      Форма:
                    </h3>
    
                    <table class="list" style="margin: 30px 0 20px 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Название ООО, ИП:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$name.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Магазин, интернет-магазин:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$shop.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Email:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$email.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Контактный телефон:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$phone.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          ИНН, ОРГН:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$inn.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Регион (край, область, республика):
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$region.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Населенный пункт (район, город, посёлок, станица):
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$humset.'
                        </td>
                      </tr>
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                        <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          Комментарий:
                        </td>
                        <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          '.$message.'
                        </td>
                      </tr>
                    </table>
    
                    <table style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                      <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        <td align="center" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                          <p style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                            <a href="http://superhorse.ru/" class="button" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: white;display: inline-block;background: #2A713E;border: solid #2A713E;border-width: 10px 20px 8px;font-weight: bold;text-decoration: none;border-radius: 4px;">Перейти на сайт
                          </a></p>
                        </td>
                      </tr>
                    </table>
    
                    <p style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                      <em style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">С Уважением, <br style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        – Classic Horse Nutrition
                    </em></p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
            <td class="container" style="margin: 0 auto !important;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 640px !important;">
              <!-- Message start -->
              <table style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                  <td class="content footer" align="center" style="margin: 0;padding: 30px 35px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background: none;">
                    <p style="margin: 0;padding: 0;font-size: 14px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;">
                      Отправлено сайтом
                      <a href="http://superhorse.ru" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;">superhorse.ru</a>
                    </p>
                    <p style="margin: 0;padding: 0;font-size: 14px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;">
                      <a href="mailto:info@superhorse.ru" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;">info@superhorse.ru
                    </a></p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </body>
    </html>';

if(isset($name) and isset($email) and isset($phone)) {
    mail($recipient, $subject, $formcontent, $headers);
    mail($recipient_copy, $subject, $formcontent, $headers);
}

?>
