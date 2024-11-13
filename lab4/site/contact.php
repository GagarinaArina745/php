<?php
declare(strict_types=1);

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


  $sendTo = " GagarinaArina745@yandex.ru";
  $sendFrom = "admin@center.ogu";

  $headers = "From: $sendFrom\r\n" .
    "Reply-To: $sendFrom\r\n" .
    "Content-Type: text/plain; charset=utf-8";


  if (mail($sendTo, $subject, $body, $headers)) {
    $msg = "<p>Сообщение отправлено.</p>";
  }
  else {
    $msg = "<p>Ошибка при отправке сообщения.</p>";
  }
}
?>


<!-- Область основного контента -->
<h3>Адрес</h3>
<address>123456 Москва, Малый Американский переулок 21</address>
<h3>Задайте вопрос</h3>
<form method='post'>
  <label>Тема письма: </label>
  <br>
  <input name='subject' type='text' size="50">
  <br>
  <label>Содержание: </label>
  <br>
  <textarea name='body' cols="50" rows="10"></textarea>
  <br>
  <br>
  <input type='submit' value='Отправить'>
</form>
<!-- Область основного контента -->

<? echo $msg ?>