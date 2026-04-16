<?php
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

// GET DATA
$search = $_GET['search'] ?? '';
$film_id = $_GET['film_id'] ?? '';

// DATA
$reviews = getReviews($pdo, $search, $film_id);
$films = getAllFilms($pdo);

$total = count($reviews);

ob_start();
include 'templates/reviews.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';