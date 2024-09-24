<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $orderId = trim($_POST['order_id']);
   
    $orders = [
        ["id" => "101", "status" => "Shipped", "tracking_number" => "TRACK123"],
        ["id" => "102", "status" => "Delivered", "tracking_number" => "TRACK456"],
        ["id" => "103", "status" => "Pending", "tracking_number" => "TRACK789"],
    ];

    $orderFound = false;
    foreach ($orders as $order) {
        if ($order['id'] === $orderId) {
            $orderFound = true;
            echo "<h2>Order Status</h2>";
            echo "Order ID: " . htmlspecialchars($order['id']) . "<br>";
            echo "Status: " . htmlspecialchars($order['status']) . "<br>";
            echo "Tracking Number: " . htmlspecialchars($order['tracking_number']) . "<br>";
            break;
        }
    }

    if (!$orderFound) {
        echo "Order ID not found.";
    }
} else {
    echo "Invalid request method.";
}
?>
