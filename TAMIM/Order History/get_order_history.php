<?php
session_start();

$orderHistory = [
    ["id" => 1, "item" => "Laptop", "date" => "2024-09-15", "status" => "Shipped"],
    ["id" => 2, "item" => "Headphones", "date" => "2024-09-20", "status" => "Delivered"],
    ["id" => 3, "item" => "Smartphone", "date" => "2024-10-01", "status" => "Pending"],
];

if (!empty($orderHistory)) {
    foreach ($orderHistory as $order) {
        echo "Order ID: {$order['id']}, Item: {$order['item']}, Date: {$order['date']}, Status: {$order['status']}<br>";
    }
} else {
    echo "No order history found.";
}
?>
