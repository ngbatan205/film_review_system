<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

$error = login($pdo);

ob_start();
include 'templates/login.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';