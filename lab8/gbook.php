<?php
declare(strict_types=1);

require_once 'config-sample.php';

$mysqli = new mysqli(HOST_ADRESS, USER, PASS, NAME);

if ($mysqli->connect_error) {
    die('Ошибка соединения: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim(htmlspecialchars($mysqli->real_escape_string($_POST['name'])));
    $email = trim(htmlspecialchars($mysqli->real_escape_string($_POST['email'])));
    $msg = trim(htmlspecialchars($mysqli->real_escape_string($_POST['msg'])));


    $insert_query = "INSERT INTO msgs (name, email, msg) VALUES('$name', '$email', '$msg')";
    $mysqli->query($insert_query);

    if ($mysqli->errno) {
        die('Ошибка вставки записи: ' . $mysqli->error);
    }

    header('Location:' . $_SERVER['PHP_SELF']);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $del_querry = "DELETE FROM msgs WHERE id = $id";
    $mysqli->query($del_querry);

    if ($mysqli->errno) {
        die('Ошибка удаления записи: ' . $mysqli->error);
    }

    header('Location:' . $_SERVER['PHP_SELF']);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>

<body>

    <h1>Гостевая книга</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        Ваше имя:<br>
        <input type="text" name="name"><br>
        Ваш E-mail:<br>
        <input type="email" name="email"><br>
        Сообщение:<br>
        <textarea name="msg" cols="50" rows="5"></textarea><br>
        <br>
        <input type="submit" value="Добавить!">

    </form>

    <?php


    $select_querry = "SELECT * FROM msgs ORDER BY id DESC";
    $selectResult = $mysqli->query($select_querry) or die('Ошибка выборки: ' . $mysqli->error);

    $rows = $selectResult->num_rows;
    echo "<br>";
    echo 'Записей в гостевой книге: ' . $rows . '<br>';

    while ($row = $selectResult->fetch_assoc()) {
        echo "<div>";
        echo "<p><b>{$row['name']}</b> ({$row['email']})</p>";
        echo "<p>{$row['msg']}</p>";
        echo "<div align='right'><a href='gbook.php?id=" . $row['id'] . "'>Удалить</a></div>";
    }

    $mysqli->close();
    ?>

</body>

</html>