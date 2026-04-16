<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

deleteCategory($pdo);
saveCategory($pdo);

/* SEARCH */
$search = $_GET['search'] ?? '';

/* DATA */
$categories = getAllCategories($pdo, $search);

$total = count($categories);
$title = "Categories";
$badgeClass = "badge-green";

/* VIEW */
ob_start();
include '../templates/admin_categories.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';