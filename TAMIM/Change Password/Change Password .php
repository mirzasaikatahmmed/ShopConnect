<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    if (!password_verify($current_password, $_SESSION['user_password'])) {
        echo "Current password incorrect.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $new_password)) {
        echo "New password must be strong.";
    } else {
        $_SESSION['user_password'] = password_hash($new_password, PASSWORD_BCRYPT);
      
        echo "Password changed successfully.";
    }
}
?>
