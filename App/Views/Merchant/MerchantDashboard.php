<?php
include_once '../Layouts/Header.php';
require_once '../../Models/Merchant.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$merchant = getMerchantDataById($user_id);
?>

<div class="merchant-dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($merchant['name']); ?>!</h1>

    <div class="dashboard-sections">
        <div class="section products-section">
            <h2>Your Products</h2>
            <p>Manage your inventory and add new products.</p>
            <a href="Products.php" class="btn">Manage Products</a>
        </div>

        <div class="section orders-section">
            <h2>Orders</h2>
            <p>View and process your customers' orders.</p>
            <a href="Orders.php" class="btn">View Orders</a>
        </div>

        <div class="section profile-section">
            <h2>Profile</h2>
            <p>Update your profile information and settings.</p>
            <a href="EditProfile.php" class="btn">Edit Profile</a>
        </div>
    </div>
</div>

<?php include_once '../Layouts/Footer.php'; ?>
