<?php

$name = 'Арина';
$age = 20;

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Переменные и вывод</title>
</head>

<body>
    <h1>Переменные и вывод</h1>

    <p>Меня зовут: <?= $name ?>
    <p>Мне <?= $age ?> лет


    <p>Тип переменной name:
        <?= var_dump($name) ?>
    <p>Тип переменной age:
        <?= var_dump($age) ?>

</body>

</html>