<?php
session_start();
include '../connectsql.php';

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("CSRF token validation failed");
}

