<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate Your Review Link</title>
</head>
<body>
    <h1>Generate Your Unique Review Link</h1>
    <form action="../process/generate_link_process.php" method="POST">
        <button type="submit">Generate Link</button>
    </form>
</body>
</html>
