<?php
session_start();
include '../connectsql.php';

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("CSRF token validation failed");
}

$username = htmlspecialchars(trim($_POST['username']));
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$unique_link = bin2hex(random_bytes(16));  // Secure unique link

$sql = "INSERT INTO users (username, password, unique_link) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $unique_link);

if ($stmt->execute()) {
    echo "Registration successful!<br>";
    echo "Your review submission link: <a href='../forms/submit.php?user_id=" . $stmt->insert_id . "'>Submit Review</a><br>";
    echo "Your review board link: <a href='../forms/view_reviews.php?user_id=" . $stmt->insert_id . "'>View Reviews</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
