<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./App/Views/Auth/Login.php');
    exit();
} else {
    if ($_SESSION['role'] === 'admin') {
        header('Location: ./App/Views/Admin/Dashboard.php');
    } else {
        header('Location: ./App/Views/Common/Dashboard.php');
    }
    exit();
}
?>