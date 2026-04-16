<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

/* DELETE */
deleteReviewer($pdo);

/* SEARCH */
$search = $_GET['search'] ?? '';

/* DATA */
$reviewers = getReviewers($pdo, $search);

$total = getTotalReviewers($pdo);
$title = "Total Reviewers";
$color = "#FF9800";

/* VIEW */
ob_start();
include '../templates/admin_reviewers.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';