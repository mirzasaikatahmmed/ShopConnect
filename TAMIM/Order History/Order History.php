<?php
session_start();
$user_id = $_SESSION['user_id']; 

$query = "SELECT * FROM orders WHERE user_id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='order'>";
    echo "<p>Order ID: " . $row['id'] . "</p>";
    echo "<p>Product ID: " . $row['product_id'] . "</p>";
    echo "<p>Quantity: " . $row['quantity'] . "</p>";
    echo "<p>Status: " . $row['status'] . "</p>";
    echo "</div>";
}
?>
