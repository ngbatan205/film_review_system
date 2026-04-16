<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

$categories = getCategories($pdo);

saveFilm($pdo);

ob_start();
include '../templates/admin_addfilm.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';