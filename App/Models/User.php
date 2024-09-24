<?PHP
require_once 'Database.php';

function getUser ($email) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createUser($name, $email, $password, $role, $uniqueFileName) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, profile_image, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $name, $email, $password, $role, $uniqueFileName);
    $stmt->execute();
    return $stmt->insert_id;
}

function getUsersByRole($role) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE role = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function createCustomer($insertedUserId, $shippingAddress, $contactNumber) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO customers (user_id, shipping_address, contact_number) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $insertedUserId, $shippingAddress, $contactNumber);
    $stmt->execute();
    return $stmt->affected_rows;
}

function getUserDataById($user_id) {
    $conn = getConnection();
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user;
}

function getMerchantDataByUserId($user_id) {
    $conn = getConnection();
    $query = "SELECT * FROM merchants WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $merchant = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $merchant;
}

?>