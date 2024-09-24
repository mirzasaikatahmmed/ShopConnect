<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/Login.php');
    exit();
} else {
    header('Location: ./MerchantDashboard.php');
    exit();
}
?>