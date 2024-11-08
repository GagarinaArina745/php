<?php
declare(strict_types=1);

echo "<h1>Загруженные модули</h1>";

$extensions = get_loaded_extensions();
foreach ($extensions as $extension) {
    $functions = get_extension_funcs($extension);

    echo "<h2>Модуль: {$extension}</h2>";
    if ($functions) {
        echo '<ul>';

        foreach ($functions as $function) {
            echo "<li>{$function}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Нет доступных функций</p>";
    }
}