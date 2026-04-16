<?php
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

if (!isset($_GET['id'])) {
    header('Location: reviews.php');
    exit();
}

$review = getReviewDetail($pdo, $_GET['id']);

if (!$review) {
    header('Location: reviews.php');
    exit();
}

ob_start();
include 'templates/review_detail.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';