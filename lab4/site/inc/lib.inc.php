<?php

declare(strict_types=1);


/**
 * Функция, рисующая таблицу умножения
 * @param int $cols - количество столбцов таблицы,
 * @param int $rows - количество строк таблицы,
 * @param string $color - цвет первых столбца и строки,
 * @return int  - количество вызывов функции.
 */
function getTable(int $cols = 4, int $rows = 5, string $color = 'yellow'): int
{

    static $count = 0;
    $count++;

    //echo "<table>";

    echo "<tr>";
    echo '<th style="background-color:', $color, ';">*</th>';

    for ($i = 1; $i <= $cols; $i++) {
        echo '<th style="background-color:', $color, ';">', $i, '</th>';
    }
    echo "</tr>";

    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";

        echo '<th style="background-color:', $color, ';">', $i, '</th>';
        for ($j = 1; $j <= $cols; $j++) {
            echo "<td>", $i * $j, "</td>";
        }
        echo "</tr>";
    }
    //echo "</table>";

    return $count;
}




/**
 * Функция, создающая меню.
 * @param array $menu - массив,содержащий элементы меню и ссылки,
 * @param bool $vertical - при true (по умолчанию) меню вертикальное, иначе - горизонтальное
 */
function getMenu(array $menu, bool $vertical = true)
{
    if ($vertical) {
        $menuType = 'menu';
    } else {
        $menuType = 'menu novertical';
    }


    echo "<ul class='$menuType'>";
    foreach ($menu as $item) {
        echo "<li><a href=\"{$item['href']}\">{$item['link']}</a></li>";
    }

    echo "</ul>";

}



/**
 * Функция установления приветствия
 * @return string возвращает значение переменной приветствия
 */
function getWelcome()
{

    $welcome = 'Доброй ночи';

    $hour = getdate()['hours'];

    if ($hour >= 0 && $hour < 6) {
        $welcome = 'Доброй ночи';
    }
    elseif ($hour >= 6 && $hour < 12) {
        $welcome = 'Доброе утро';
    }
    elseif ($hour >= 12 && $hour < 18) {
        $welcome = 'Добрый день';
    }
    elseif ($hour >= 18 && $hour < 23) {
        $welcome = 'Добрый вечер';
    }

    return $welcome;
}