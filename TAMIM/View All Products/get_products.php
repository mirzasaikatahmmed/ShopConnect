<?php
$products = [
    ["id" => 1, "name" => "Laptop", "price" => 999.99],
    ["id" => 2, "name" => "Smartphone", "price" => 499.99],
    ["id" => 3, "name" => "Tablet", "price" => 299.99],
];


if (!empty($products)) {
    echo "<ul>";
    foreach ($products as $product) {
        echo "<li>Product ID: {$product['id']}, Name: {$product['name']}, Price: \${$product['price']}</li>";
    }
    echo "</ul>";
} else {
    echo "No products found.";
}
?>
