<?php
require_once __DIR__ . '/../Models/Order.php';


function getAllOrders() {
    return fetchAllOrders();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        $orderId = $_GET['id'];
        if (deleteOrder($orderId)) {
            $_SESSION['success'] = 'Order deleted successfully.';
        } else {
            $_SESSION['error'] = 'Failed to delete order.';
        }
        header('Location: ../Views/Admin/Orders.php');
        exit();
    }
}
