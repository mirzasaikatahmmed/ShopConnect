<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productId = trim($_POST['product_id']);
    $quantity = intval($_POST['quantity']);


    if (empty($productId) || $quantity <= 0) {
        echo "Please enter a valid Product ID and Quantity.";
    } else {
      
        echo "Order received!<br>";
        echo "Product ID: " . htmlspecialchars($productId) . "<br>";
        echo "Quantity: " . htmlspecialchars($quantity) . "<br>";
       
    }
} else {
    echo "Invalid request method.";
}
?>
