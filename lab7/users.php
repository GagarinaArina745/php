<?php
declare(strict_types=1);

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

spl_autoload_register(function ($class): void {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file))
        require $file;
});

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>User Info</title>
</head>
<body>";

$user1 = new User("Арина", "arisha", "pass123");
$user2 = new User("Андрей", "andreyy", "qwerty12345");
$superuser = new SuperUser("Admin", "admin123", "adminadmin", "administrator");

// инфа об объектах
echo $user1->showInfo();
echo $user2->showInfo();
echo $superuser->showInfo();

// удаление объектов
$user1 = $user2 = $superuser = null;


echo "</body></html>";