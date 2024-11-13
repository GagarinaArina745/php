<?php

declare(strict_types=1);

// Код для всех страниц - сохранение информации о посещенных страницах

if (!isset($_SESSION['visitedPages'])) {
	$_SESSION['visitedPages'] = [];
}
	
// добавляем путь в массив
$_SESSION['visitedPages'][] = $_SERVER['REQUEST_URI'];