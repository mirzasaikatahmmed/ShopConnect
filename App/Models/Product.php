<?PHP
require_once 'Database.php';
function getProducts() {
    $conn = getConnection();
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = [];
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }
    
    mysqli_close($conn);
    return $products;
}
function addProduct($merchant_id, $name, $description, $price, $stock, $product_image) {
    $conn = getConnection();
    $sql = "INSERT INTO products (merchant_id, name, description, price, stock, product_image) 
            VALUES ('$merchant_id', '$name', '$description', '$price', '$stock', '$product_image')";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    if ($result) {
        return true;
    } else {
        return false;
    }
}
function deleteProduct($product_id) {
    $conn = getConnection();
    $sql = "DELETE FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>