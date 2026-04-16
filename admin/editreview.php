<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

// DATA
$review = getReview($pdo, $_GET['id']);
$films = getAllFilms($pdo);

// UPDATE + DELETE
updateReview($pdo);

ob_start();
include '../templates/admin_editreview.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';