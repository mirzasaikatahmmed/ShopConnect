<?php
session_start();
require_once '../Models/User.php';

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addCustomer'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);
        $profileImage = $_FILES['profile_image'];
        $shippingAddress = trim($_POST['shipping_address']);
        $contactNumber = trim($_POST['contact_number']);

        if (!validateEmail($email)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: ../Views/Admin/AddCustomer.php');
            exit();
        }

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: ../Views/Admin/AddCustomer.php');
            exit();
        }

        if (!validatePassword($password)) {
            $_SESSION['error'] = 'Password must be at least 8 characters long, contain at least one letter and one number.';
            header('Location: ../Views/Admin/AddCustomer.php');
            exit();
        }

        $targetDir = '../../Public/Uploads/Users/';
        $uniqueFileName = uniqid() . '_' . basename($profileImage['name']);
        $targetFile = "{$targetDir}{$uniqueFileName}";
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($profileImage['size'] > 5000000) {
            $_SESSION['error'] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($profileImage['tmp_name'], $targetFile)) {
            $role = 'customer';
            $insertedUserId = createUser($name, $email, $password, $role, $uniqueFileName);

            if ($insertedUserId) {
                if (createCustomer($insertedUserId, $shippingAddress, $contactNumber)) {
                    $_SESSION['success'] = 'Customer added successfully.';
                    header('Location: ../Views/Admin/Users.php');
                    exit();
                } else {
                    $_SESSION['error'] = 'Failed to add customer information.';
                    header('Location: ../Views/Admin/AddCustomer.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = 'Registration failed. Please try again.';
                header('Location: ../Views/Admin/AddCustomer.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Failed to upload image.';
            header('Location: ../Views/Admin/AddCustomer.php');
            exit();
        }
    }
}
