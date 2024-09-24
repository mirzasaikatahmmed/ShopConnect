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
?>
