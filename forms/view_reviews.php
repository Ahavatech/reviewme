<?php
include '../connectsql.php';

$user_id = intval($_GET['user_id']);

$sql = "SELECT * FROM reviews WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $name = $row['name'] ? htmlspecialchars($row['name']) : "Anonymous";
    echo "<p><strong>$name (" . $row['created_at'] . "):</strong> " . htmlspecialchars($row['review']) . "</p>";
}

$stmt->close();
$conn->close();
?>
