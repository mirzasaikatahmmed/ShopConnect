<?PHP 
require_once 'Database.php';

function fetchAllOrders() {
    $conn = getConnection();
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);
    $orders = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }
    $conn->close();
    return $orders;
}

function deleteOrder($orderId) {
    $conn = getConnection();
    $sql = "DELETE FROM orders WHERE order_id = $orderId";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}