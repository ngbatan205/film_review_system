<?php
require '../includes/DatabaseConnection.php';
require '../includes/DatabaseFunctions.php';
require '../check.php';

/* DELETE */
deleteContact($pdo);

/* SEARCH */
$search = $_GET['search'] ?? '';

/* DATA */
$contacts = getContacts($pdo, $search);

$total = count($contacts);
$title = "Contact Messages";
$badgeClass = "badge-purple";

/* VIEW */
ob_start();
include '../templates/admin_contacts.html.php';
$output = ob_get_clean();

include '../templates/admin_layout.html.php';