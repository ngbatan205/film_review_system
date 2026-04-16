<?php
require 'includes/DatabaseConnection.php';
require 'includes/DatabaseFunctions.php';

/* CALL LOGIC */
$result = sendContactEmail($pdo);

$messageSent = $result['messageSent'];
$error = $result['error'];

$title = "Contact";

ob_start();
include 'templates/mailform.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';