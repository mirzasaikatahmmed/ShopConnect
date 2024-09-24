<?php
session_start();
require_once '../Models/User.php';

if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in.';
    exit();
}

$userId = $_SESSION['user_id'];
$oldPassword = $_POST['old_password'] ?? '';

if (empty($oldPassword)) {
    echo 'Old password cannot be empty.';
    exit();
}

$user = getUserById($userId);

if (!$user) {
    echo 'User not found.';
    exit();
}

if ($oldPassword === $user['password']) {
    echo 'correct';
} else {
    echo 'incorrect';
}
?>
