<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

$reviewer = getReviewer($pdo, $_GET['id']);

updateReviewer($pdo);

ob_start();
include '../templates/admin_editreviewer.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';