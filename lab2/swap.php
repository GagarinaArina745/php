<?php
declare(strict_types=1);

function swap(&$a, &$b)
{

    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

$a = 5;
$b = 8;
swap($a, $b);


echo '5 === $b - ';
if (5 === $b) {
    echo "true<br>";
}
else {
    echo "false<br>";
}

echo '8 === $a - ';
if (8 === $a) {
    echo "true<br>";
}
else {
    echo "false<br>";
}