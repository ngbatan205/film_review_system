<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

$category = getCategory($pdo, $_GET['id']);

updateCategory($pdo);

ob_start();
include '../templates/admin_editcategory.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';