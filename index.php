<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./App/Views/Auth/Login.php');
    exit();
} else {
    if ($_SESSION['role'] === 'admin') {
        header('Location: ./App/Views/Admin/Dashboard.php');
    } elseif ($_SESSION['role'] === 'merchant') {
        header('Location: ./App/Views/Merchant/MerchantDashboard.php');
    } else {
        header('Location: ./App/Views/Common/Dashboard.php');
    }
    exit();
}
?>