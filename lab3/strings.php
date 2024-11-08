<?php
declare(strict_types=1);

$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

/**
 * Функция проверки сложности пароля
 * Пароль должен содержать минимум:
 * - одну заглавную букву,
 * - одну строчную букву,
 * - одну цифру,
 * - длина не менее 8 символов.
 * 
 * @param string $password - проверяемые пароль
 * @return bool - вернёт true, если пароль соответствует требованиям
 */
function checkPasswordDifficulty(string $password): bool
{
    return preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/\d/', $password) && strlen($password) >= 8;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
</head>

<body>

    <?php

    $login = strtolower(trim($login));
    $passwordValid = checkPasswordDifficulty($password) ? 'Пароль сложный' : 'Пароль простой';
    $name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');

    $emailValid = 'email некорректный';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailValid = 'email корректен';
    }
    ?>

    <!-- Вывод значений на экран -->
    <p>Логин после обработки: <?= $login ?></p>
    <p>Проверка пароля: <?= $passwordValid ?></p>
    <p>Имя после обработки: <?= $name ?></p>
    <p>Проверка email: <?= $emailValid ?></p>
    <p>Переменная code: <?= htmlspecialchars($code) ?></p>
    
</body>

</html>