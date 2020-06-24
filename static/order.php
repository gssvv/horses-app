<?

$customerEmail = $_POST['email'];
$summ = $_POST['summ'];
$customerInfoInline = $_POST['info'];
$customerName = $_POST['name'];
$customerPhone = $_POST['phone'];
$customerArea = $_POST['area'];
$customerPassport = $_POST['passport'];

print($customerInfoInline);

$customerInfoArr = explode(";", $customerInfoInline);
$customerInfo = '';

foreach($customerInfoArr as $tr) {
  $customerInfo .= '<tr style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;\'>';

  $td = explode("|", $tr);

  $customerInfo .= 
  '<td
    style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
  >
    '.$td[0].'
  </td>
  <td
    align="right"
    class="price"
    style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: 600;\'
  >
    '.$td[1].'
  </td>';

  $customerInfo .= '</tr>';
};

$subject = 'Уведомление о заказе';

$adminEmail = "info@korma-anilyn.ru";
$adminEmailCopy = "yuriy_p@korma-anilyn.ru";
// $adminEmail = "the.alex.dev@yandex.ru";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: SUPER HORSE NUTRITION <info@korma-anilyn.ru>\r\n";

$formcontentCustomer = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html
    xmlns="http://www.w3.org/1999/xhtml"
    style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
  >
    <head
      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
    >
      <meta
        http-equiv="Content-Type"
        content="text/html; charset=utf-8"
        style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
      />
      <meta
        name="viewport"
        content="width=device-width"
        style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
      />
    </head>
    <body
      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #efefef;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;\'
    >
      <table
        class="body-wrap"
        style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;height: 100%;background: #efefef;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;width: 100% !important;\'
      >
        <tr
          style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
        >
          <td
            class="container"
            style=\'margin: 0 auto !important;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 640px !important;\'
          >
            <!-- Message start -->
            <table
              style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;\'
            >
              <tr
                style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
              >
                <td
                  align="center"
                  class="masthead"
                  style=\'margin: 0;padding: 80px 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background-image: url(http://superhorse.ru/mail-bg.jpg);background-size: cover;color: white;\'
                >
                  <h1
                    style=\'margin: 0 auto !important;padding: 0;font-size: 32px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;max-width: 90%;text-transform: uppercase;\'
                  >
                    '.$subject.'
                  </h1>
                </td>
              </tr>
              <tr
                style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
              >
                <td
                  class="content"
                  style=\'margin: 0;padding: 30px 35px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background: white;\'
                >
                  <h2
                    align="center"
                    style=\'margin: 0;padding: 0;font-size: 28px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;\'
                  >
                    Заказ от '.date("d.m.Y").'
                  </h2>
  
                  <p
                    align="center"
                    style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                  >
                    Вы успешно совершили заказ на нашем сайте
                    <a
                      href="http://superhorse.ru/"
                      target="_blank"
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: #2A713E;\'
                      >superhorse.ru
                    </a>
                  </p>
  
                  <h3
                    class="m"
                    style=\'margin: 50px 0 20px 0;padding: 0;font-size: 24px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;\'
                  >
                    Корзина:
                  </h3>
  
                  <table
                    class="list"
                    style=\'margin: 30px 0 20px 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;\'
                  >
                  '.$customerInfo.'
                  <tr
                    class="result"
                    style=\'margin: 0;padding: 0;font-size: 22px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #fff !important;border-top: 1px solid #ccc;font-weight: 600;\'
                  >
                    <td
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;padding-top: 15px;\'
                    >
                      Оплата при получении:
                    </td>
                    <td
                      align="right"
                      class="price"
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: 600;padding-top: 15px;\'
                    >
                      '.$summ.'р
                    </td>
                  </tr>
                  </table>

                  <p style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                    Населенный пункт: '.$customerArea.' </br>
                    Серия и номер паспорта: '.$customerPassport.'
                  </p>
  
                  <p
                    style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                  >
                    В ближайшее время мы свяжемся с вами для обсуждения деталей по
                    указанным вами контактным данным.
                  </p>
  
                  <p
                    style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                  >
                    Также, вы можете связаться с нами прямо сейчас по почте
                    <a
                      href="mailto:info@korma-anilyn.ru"
                      target="_blank"
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: #2A713E;\'
                      >info@korma-anilyn.ru</a
                    >
                    или телефону
                    <a
                      href="tel:8 (800) 333-53-42"
                      target="_blank"
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: #2A713E;\'
                      >8 (800) 333-53-42.
                    </a>
                  </p>
  
                  <p
                    style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                  >
                    Товары, дополнительная информация, а также все контактные
                    данные доступны на сайте.
                  </p>
  
                  <table
                    style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;\'
                  >
                    <tr
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
                    >
                      <td
                        align="center"
                        style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
                      >
                        <p
                          style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                        >
                          <a
                            href="http://superhorse.ru/"
                            class="button"
                            style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: white;display: inline-block;background: #2A713E;border: solid #2A713E;border-width: 10px 20px 8px;font-weight: bold;text-decoration: none;border-radius: 4px;\'
                            >Перейти на сайт
                          </a>
                        </p>
                      </td>
                    </tr>
                  </table>
  
                  <p
                    style=\'margin: 0;padding: 0;font-size: 16px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;\'
                  >
                    <em
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
                      >С Уважением,
                      <br
                        style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
                      />
                      – Classic Horse Nutrition
                    </em>
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr
          style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
        >
          <td
            class="container"
            style=\'margin: 0 auto !important;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;display: block !important;clear: both !important;max-width: 640px !important;\'
          >
            <!-- Message start -->
            <table
              style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;\'
            >
              <tr
                style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;\'
              >
                <td
                  class="content footer"
                  align="center"
                  style=\'margin: 0;padding: 30px 35px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background: none;\'
                >
                  <p
                    style=\'margin: 0;padding: 0;font-size: 14px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;\'
                  >
                    Отправлено сайтом
                    <a
                      href="http://superhorse.ru"
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;\'
                      >superhorse.ru</a
                    >
                  </p>
                  <p
                    style=\'margin: 0;padding: 0;font-size: 14px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 0;color: #888;text-align: center;\'
                  >
                    <a
                      href="mailto:info@korma-anilyn.ru"
                      style=\'margin: 0;padding: 0;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;\'
                      >info@korma-anilyn.ru
                    </a>
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </html>';

$formcontentAdmin = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
                  <h2 align="center" style="margin: 0;padding: 0;font-size: 28px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;">Заказ от '.date('d.m.Y').'</h2>
  
                  <p align="center" style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                    Совершен заказ на сайте
                    <a href="http://superhorse.ru/" target="_blank" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #2A713E;">superhorse.ru
                  </a></p>
  
                  <h3 class="m" style="margin: 50px 0 20px 0;padding: 0;font-size: 24px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;">
                    Информация о заказе:
                  </h3>
  
                  <table class="list" style="margin: 30px 0 20px 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                      <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        Дата заказа:
                      </td>
                      <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        '.date('d.m.Y').'
                      </td>
                    </tr>
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                      <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        ФИО:
                      </td>
                      <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        '.$customerName.'
                      </td>
                    </tr>
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                      <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        Email:
                      </td>
                      <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        '.$customerEmail.'
                      </td>
                    </tr>
                    <tr style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #f5f5f5;border-top: 1px solid #ccc;">
                      <td style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                        Номер телефона
                      </td>
                      <td align="right" style="margin: 0;padding: 5px 10px;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;">
                      '.$customerPhone.'
                      </td>
                    </tr>
                    <tr
                    class="result"
                    style=\'margin: 0;padding: 0;font-size: 22px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #fff !important;border-top: 1px solid #ccc;font-weight: 600;\'
                  >
                    <td
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;padding-top: 15px;\'
                    >
                      Оплата при получении:
                    </td>
                    <td
                      align="right"
                      class="price"
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: 600;padding-top: 15px;\'
                    >
                      '.$summ.'р
                    </td>
                  </tr>
                  </table>
  
                  <h3 class="m" style="margin: 50px 0 20px 0;padding: 0;font-size: 24px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.25;margin-bottom: 20px;">
                    Корзина:
                  </h3>
  
                  <table class="list" style="margin: 30px 0 20px 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;border-collapse: collapse;width: 100% !important;">
                  '.$customerInfo.'
                    
                  <tr
                    class="result"
                    style=\'margin: 0;padding: 0;font-size: 22px;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;background-color: #fff !important;border-top: 1px solid #ccc;font-weight: 600;\'
                  >
                    <td
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;padding-top: 15px;\'
                    >
                      Оплата при получении:
                    </td>
                    <td
                      align="right"
                      class="price"
                      style=\'margin: 0;padding: 5px 10px;font-size: 100%;font-family: &apos;Avenir Next&apos;, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: 600;padding-top: 15px;\'
                    >
                      '.$summ.'р
                    </td>
                  </tr>
                  </table>

                  <p style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                    Населенный пункт: '.$customerArea.' </br>
                    Серия и номер паспорта: '.$customerPassport.'
                  </p>
  
                  <p style="margin: 0;padding: 0;font-size: 16px;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;font-weight: normal;margin-bottom: 20px;">
                    Письмо с информацией об оплате отправлено покупателю. Теперь
                    необходимо связаться с ним по указанным контактным данным для
                    обсуждения дальнейших действий.
                  </p>
  
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
                    <a href="mailto:info@korma-anilyn.ru" style="margin: 0;padding: 0;font-size: 100%;font-family: \'Avenir Next\', &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;line-height: 1.65;color: #888;text-decoration: none;font-weight: bold;">info@korma-anilyn.ru
                  </a></p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </html>';

if(isset($customerEmail) and isset($customerPhone)) {
    mail($adminEmail, $subject, $formcontentAdmin, $headers);
    mail($adminEmailCopy, $subject, $formcontentAdmin, $headers);
    mail($customerEmail, $subject, $formcontentCustomer, $headers);
}

// header("HTTP/1.1 301 Moved Permanently");
// header("Location: http://superhorse.ru/cart?status=success&email=$customerEmail");
// exit();

?>