<?php
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

$films = getAllFilms($pdo);

saveReview($pdo); 

ob_start();
include 'templates/addreview.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';