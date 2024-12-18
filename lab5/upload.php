<?php
declare(strict_types=1);
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
</head>

<body>
    <div>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fupload'])) {
            $file = $_FILES['fupload'];

            // инфа о файле
            echo 'Имя файла: ' . htmlspecialchars($file['name']) . "<br>";
            echo 'Размер: ' . $file['size'] . " байт<br>";
            echo 'Имя временного файла: ' . htmlspecialchars($file['tmp_name']) . "<br>";
            echo 'Тип: ' . htmlspecialchars($file['type']) . "<br>";
            echo 'Код ошибки: ' . $file['error'] . "<br>";

            // Проверка успешной загрузки
            if ($file['error'] === UPLOAD_ERR_OK) {
                $tempFilePath = $file['tmp_name'];


                if (mime_content_type($tempFilePath) === 'image/jpeg') {

                    $uploadDir = 'upload/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    // Создание хеша для имени файла
                    $finalName = md5_file($tempFilePath) . '.jpg';
                    $uploadFilePath = $uploadDir . $finalName;


                    if (move_uploaded_file($tempFilePath, $uploadFilePath)) {
                        echo 'Файл успешно загружен в ' . htmlspecialchars($uploadFilePath);
                    } else {
                        echo 'Ошибка перемещения файла';
                    }
                } else {
                    echo 'Ошибка - загрузите изображение в формате JPEG.';
                }
            } else {
                echo 'Ошибка: ' . $file['error'];
            }
        }
        ?>

    </div>
    <form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="fupload"><br>
            <button type="submit">Загрузить</button>
        </p>
    </form>
</body>

</html>