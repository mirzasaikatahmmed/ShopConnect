<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "registration_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to change your password.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = htmlspecialchars(trim($_POST['current_password']));
    $new_password = htmlspecialchars(trim($_POST['new_password']));
    $confirm_new_password = htmlspecialchars(trim($_POST['confirm_new_password']));


    $user_id = $_SESSION['user_id']; 
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($current_password, $hashed_password)) {
       
        if ($new_password !== $confirm_new_password) {
            echo "<p style='color:red;'>New passwords do not match.</p>";
        } elseif (strlen($new_password) < 8) {
            echo "<p style='color:red;'>New password must be at least 8 characters long.</p>";
        } else {
          
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $new_hashed_password, $user_id);

            if ($stmt->execute()) {
                echo "<h3>Password changed successfully!</h3>";
            } else {
                echo "Error updating password: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "<p style='color:red;'>Current password is incorrect.</p>";
    }
}


$conn->close();
?>
