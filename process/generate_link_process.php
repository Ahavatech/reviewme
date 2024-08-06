<?php
session_start();
include '../connectsql.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../forms/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT unique_link FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($existing_link);
$stmt->fetch();
$stmt->close();

if (empty($existing_link)) {
    $unique_link = bin2hex(random_bytes(16));  // Generate a new unique link
    $sql = "UPDATE users SET unique_link = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $unique_link, $user_id);
    if ($stmt->execute()) {
        echo "Your unique review submission link: <a href='../forms/submit.php?user_id=" . $user_id . "'>Submit Review</a><br>";
        echo "Your review board link: <a href='../forms/view_reviews.php?user_id=" . $user_id . "'>View Reviews</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "You already have a unique link generated:<br>";
    echo "Your unique review submission link: <a href='../forms/submit.php?user_id=" . $user_id . "'>Submit Review</a><br>";
    echo "Your review board link: <a href='../forms/view_reviews.php?user_id=" . $user_id . "'>View Reviews</a>";
}

$conn->close();
?>
