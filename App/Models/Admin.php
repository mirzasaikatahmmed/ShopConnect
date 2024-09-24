<?php
require_once 'Database.php';

function updateAdminData($user_id, $name, $email)
{
    $conn = getConnection();
    $sql = "UPDATE users SET name = ?, email = ?, updated_at = NOW() WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $name, $email, $user_id);
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}

function getUserDataById($user_id)
{
    $conn = getConnection();

    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $result;
}