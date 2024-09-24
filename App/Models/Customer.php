<?PHP 
require_once 'Database.php';

function getCustomerDetails() {
    $conn = getConnection();
    $sql = "
        SELECT u.user_id, u.name, u.email, u.created_at, 
               c.shipping_address, c.contact_number 
        FROM users u
        JOIN customers c ON u.user_id = c.user_id
        WHERE u.role = 'customer'
    ";
    $result = mysqli_query($conn, $sql);
    $customers = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
    }

    mysqli_close($conn);
    return $customers;
}

?>