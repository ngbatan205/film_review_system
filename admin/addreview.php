<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

$films = getAllFilms($pdo);

saveReview($pdo);

ob_start();
include '../templates/admin_addreview.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';