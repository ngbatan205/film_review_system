<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

deleteReview($pdo);

/* FILTER */
$search = $_GET['search'] ?? '';
$film_id = $_GET['film_id'] ?? '';

/* DATA */
$reviews = getReviews($pdo, $search, $film_id);
$films = getAllFilms($pdo);

$total = count($reviews);
$title = "Total Reviews";
$color = "#4CAF50";

/* VIEW */
ob_start();
include '../templates/admin_reviews.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';