<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

/* DELETE */
deleteFilm($pdo);

/* SEARCH */
$search = $_GET['search'] ?? '';
$category_id = $_GET['category_id'] ?? '';

/* DATA */
$films = getAllFilms($pdo, $search, $category_id);
$categories = getAllCategories($pdo);


$total = getTotalFilms($pdo);
$title = "Films";
$badgeClass = "badge-blue";

/* VIEW */
ob_start();
include '../templates/admin_films.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';