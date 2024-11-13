<?php

declare(strict_types=1);

// Код для всех страниц - сохранение информации о посещенных страницах

if (!isset($_SESSION['visits'])) {
	$_SESSION['visits'] = [];
}
	
// добавляем путь в массив
$_SESSION['visits'][] = $_SERVER['REQUEST_URI'];