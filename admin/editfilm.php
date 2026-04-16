<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

$film = getFilm($pdo, $_GET['id']);
$categories = getCategories($pdo);

updateFilm($pdo);

ob_start();
include '../templates/admin_editfilm.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';