<?php

declare(strict_types=1);

// Код для всех страниц - вывод информации о посещенных страницах

echo "<h2>Список посещённых страниц</h2>";
if (isset($_SESSION['visits']) && count($_SESSION['visits']) > 0) {
    
	echo "<ul>";
    foreach ($_SESSION['visits'] as $page) {
        echo "<li>$page</li>";
	}
    echo "</ul>";
} 