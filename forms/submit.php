<?php
session_start();
include '../connectsql.php';

$user_id = intval($_GET['user_id']);

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Review</title>
</head>
<body>
    <h1>Submit Your Review</h1>
    <form action="../process/submit_review.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="name">Your Name (Optional):</label>
        <input type="text" id="name" name="name"><br>
        <label for="review">Your Review:</label>
        <textarea id="review" name="review" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
