<?php
session_start();
require_once __DIR__ . '/../Models/Admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $user_id = $_SESSION['user_id'] ?? null;

    if ($user_id) {
        $result = updateAdminData($user_id, $name, $email);

        if ($result) {
            $_SESSION['success'] = 'Profile updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update profile.';
        }
    } else {
        $_SESSION['error'] = 'User ID not found.';
    }

    header('Location: EditProfile.php');
    exit();
}