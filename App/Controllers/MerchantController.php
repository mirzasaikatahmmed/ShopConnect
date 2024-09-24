<?php
session_start();
require_once '../Models/Merchant.php';

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addMerchant'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);
        $profileImage = $_FILES['profile_image'];
        $businessName = trim($_POST['business_name']);
        $businessAddress = trim($_POST['business_address']);
        $contactNumber = trim($_POST['contact_number']);
        $businessLicense = trim($_POST['business_license']);

        if (!validateEmail($email)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: ../Views/Admin/AddMerchant.php');
            exit();
        }

        if (!validatePassword($password)) {
            $_SESSION['error'] = 'Password must be at least 8 characters long, contain at least one letter and one number.';
            header('Location: ../Views/Admin/AddMerchant.php');
            exit();
        }

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: ../Views/Admin/AddMerchant.php');
            exit();
        }

        $targetDir = '../../Public/Uploads/Merchants/';
        $uniqueFileName = uniqid() . '_' . basename($profileImage['name']);
        $targetFile = "{$targetDir}{$uniqueFileName}";
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($profileImage['size'] > 5000000) {
            $_SESSION['error'] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($profileImage['tmp_name'], $targetFile)) {
            $role = 'merchant';
            $inserted = createMerchant($name, $email, $password, $role, $uniqueFileName, $businessName, $businessAddress, $contactNumber, $businessLicense);

            if ($inserted) {
                $_SESSION['success'] = 'Merchant added successfully.';
                header('Location: ../Views/Admin/AddMerchant.php');
                exit();
            } else {
                $_SESSION['error'] = 'Registration failed. Please try again.';
                header('Location: ../Views/Admin/AddMerchant.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'File upload failed. Please try again.';
            header('Location: ../Views/Admin/AddMerchant.php');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateMerchant'])) {
    $merchantId = $_POST['merchant_id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $businessName = trim($_POST['business_name']);
    $businessAddress = trim($_POST['business_address']);
    $contactNumber = trim($_POST['contact_number']);
    $businessLicense = trim($_POST['business_license']);

    if (!validateEmail($email)) {
        $_SESSION['error'] = 'Invalid email format.';
        header('Location: ../Views/Common/Profile.php');
        exit();
    }

    $updated = updateMerchant($merchantId, $name, $email, $businessName, $businessAddress, $contactNumber, $businessLicense);

    if ($updated) {
        $_SESSION['success'] = 'Profile updated successfully.';
    } else {
        $_SESSION['error'] = 'Update failed. Please try again.';
    }

    header('Location: ../Views/Common/Profile.php');
    exit();
}


?> 
