<?php
require_once 'Database.php';

function getMerchants() {
    $conn = getConnection();
    $sql = "SELECT m.merchant_id, u.name, m.business_name, m.business_address, m.contact_number, m.business_license, u.created_at 
            FROM merchants m 
            JOIN users u ON m.user_id = u.user_id";
    
    $result = mysqli_query($conn, $sql);
    $merchants = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $merchants[] = $row;
    }
    
    mysqli_close($conn);
    return $merchants;
}

function createMerchant($name, $email, $password, $role, $profileImage, $businessName, $businessAddress, $contactNumber, $businessLicense) {
    $conn = getConnection();
    $emailCheckSql = "SELECT * FROM users WHERE email = '$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckSql);
    
    if (mysqli_num_rows($emailCheckResult) > 0) {
        mysqli_close($conn);
        return "Email already exists.";
    }
    
    $sql = "INSERT INTO users (name, email, password, role, profile_image) VALUES ('$name', '$email', '$password', '$role', '$profileImage')";
    
    if (mysqli_query($conn, $sql)) {
        $userId = mysqli_insert_id($conn);
        $sql = "INSERT INTO merchants (user_id, business_name, business_address, contact_number, business_license) VALUES ($userId, '$businessName', '$businessAddress', '$contactNumber', '$businessLicense')";
        
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            return true;
        }
    }
    
    mysqli_close($conn);
    return false;
}

function updateMerchant($merchantId, $name, $email, $businessName, $businessAddress, $contactNumber, $businessLicense) {
    $conn = getConnection();
    $sql = "UPDATE users u 
            JOIN merchants m ON u.user_id = m.user_id 
            SET u.name = '$name', u.email = '$email', m.business_name = '$businessName', m.business_address = '$businessAddress', m.contact_number = '$contactNumber', m.business_license = '$businessLicense', u.updated_at = NOW() 
            WHERE m.merchant_id = $merchantId";
    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    }
    
    mysqli_close($conn);
    return false;
}

function getUserDataById($user_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getMerchantDataByUserId($user_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM merchants WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getMerchantDataById($user_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT m.merchant_id, u.name, m.business_name, m.business_address, m.contact_number, m.business_license, u.created_at 
                            FROM merchants m 
                            JOIN users u ON m.user_id = u.user_id 
                            WHERE m.user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getMerchantById($merchantId) {
    $conn = getConnection();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT m.merchant_id, u.name, u.email, m.business_name, m.business_address, m.contact_number, m.business_license, u.created_at 
                            FROM merchants m 
                            JOIN users u ON m.user_id = u.user_id 
                            WHERE m.merchant_id = ?");
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    $stmt->bind_param("i", $merchantId);
    if (!$stmt->execute()) {
        die("Statement execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        return null;
    }

    return $result->fetch_assoc();
}


?>
