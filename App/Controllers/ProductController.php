<?PHP
session_start();
require_once '../Models/Product.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {

    $merchant_id = $_POST['merchant_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $product_image = $_FILES['product_image']['name'];
    
    move_uploaded_file($_FILES['product_image']['tmp_name'], "../../Public/Uploads/Products/$product_image");
    
    if (addProduct($merchant_id, $name, $description, $price, $stock, $product_image)) {
        echo "<script>alert('Product added successfully.');</script>";
    } else {
        echo "<script>alert('Error adding product.');</script>";
    }
}

if (isset($_GET['delete'])) {

    $product_id = $_GET['delete'];
    
    if (deleteProduct($product_id)) {
        echo "<script>alert('Product deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting product.');</script>";
    }
}

header('Content-Type: application/json');

if (isset($_GET['action']) && $_GET['action'] === 'fetch_products') {
    $products = getProducts();
    if ($products) {
        echo json_encode(['success' => true, 'products' => $products]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No products found.']);
    }
    exit;
}
?>