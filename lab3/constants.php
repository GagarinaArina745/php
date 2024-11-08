<?php
declare(strict_types=1);

echo "<h1>Определённые в PHP константы</h1>";

$constants = get_defined_constants();

foreach ($constants as $constant => $value) {
    echo "<p>{$constant}  =>  {$value}</p>";
}