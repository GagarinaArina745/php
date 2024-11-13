<?php
declare(strict_types=1);

$visCount = 1;
if (isset($_COOKIE['visCount'])) {
  $visCount = (int) $_COOKIE['visCount'] + 1;
}

$msg = 'Это ваш первый визит на сайт.';
if (isset($_COOKIE['msg'])) {
  $msg = htmlspecialchars(trim($_COOKIE['msg']));
  $msg = "<p>Последнее посещение: $msg</p>";
}

setcookie('visCount', (string) $visCount, time() + 86400);
setcookie('msg', date("Y-m-d H:i:s"), time() + 86400);


?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Последний визит</title>
</head>

<body>

  <h1>Последний визит</h1>

  <?php
  echo "<p>Количество посещений: $visCount</p>";
  echo $msg;
  ?>

</body>

</html>