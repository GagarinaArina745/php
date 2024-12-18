<?php
declare(strict_types=1);

const DBFILE = 'db/guests.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fname'], $_POST['lname'])) {

  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);

  file_put_contents(DBFILE, "$fname $lname\n", FILE_APPEND);

  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Работа с файлами</title>
</head>

<body>

  <h1>Заполните форму</h1>

  <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

    Имя: <input type="text" name="fname" required><br>
    Фамилия: <input type="text" name="lname" required><br>

    <br>

    <input type="submit" value="Отправить!">

  </form>

  <?php

  if (file_exists(DBFILE)) {

    $lines = file(DBFILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $lineNum => $lineContent) {
      echo ($lineNum + 1) . '. ' . htmlspecialchars($lineContent) . "<br>";
    }

    echo "<br>Размер файла: " . filesize(DBFILE) . ' байт(-ов)';
  }
  ?>

</body>

</html>