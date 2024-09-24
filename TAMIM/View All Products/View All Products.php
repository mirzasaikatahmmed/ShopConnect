<?php
session_start();

$products = [
    ["name" => "Product 1", "description" => "Description 1", "price" => 100],
    ["name" => "Product 2", "description" => "Description 2", "price" => 20],
];

header('Content-Type: application/json');
echo json_encode($products);
?>
