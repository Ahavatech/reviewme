<?php
session_start();
include '../connectsql.php';

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("CSRF token validation failed");
}

$username = htmlspecialchars(trim($_POST['username']));
$password = htmlspecialchars(trim($_POST['password']));

$sql = "SELECT id, password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        session_regenerate_id(true);  // Prevent session fixation
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        echo "Login failed! Please check your credentials.";
    }
} else {
    echo "Login failed! Please check your credentials.";
}

$stmt->close();
$conn->close();
?>
