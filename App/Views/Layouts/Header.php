<?php 
    session_start();
    include_once '../../Models/Database.php';

    $role = $_SESSION['role'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <script src="../../../Public/Assets/JS/script.js" defer></script>
    <style>
        
    </style>
    <title>ShopConnect</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>ShopConnect</h1>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php
                    $conn = getConnection();
                    if ($conn) {
                        $userId = $_SESSION['user_id'];
                        $query = "SELECT name FROM users WHERE user_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $stmt->bind_result($name);
                        $stmt->fetch();
                        $stmt->close();
                        echo "<span>Welcome, " . htmlspecialchars($name) . "</span>";
                    } else {
                        echo "<span>Database connection error</span>";
                    }
                ?>
                
                <?php if ($role === 'admin'): ?>
                    <div class="dropdown">
                        <button class="dropbtn">Admin Panel</button>
                        <div class="dropdown-content">
                            <a href="../Admin/Dashboard.php">Dashboard</a>
                            <a href="../Admin/Merchants.php">Manage Merchants</a>
                            <a href="../Admin/Users.php">Manage Users</a>
                            <a href="../Admin/Products.php">Manage Products</a>
                            <a href="../Admin/Reports.php">Reports</a>
                            <a href="../Admin/Settings.php">Settings</a>
                        </div>
                    </div>
                <?php elseif ($role === 'merchant'): ?>
                    <div class="dropdown">
                        <button class="dropbtn">Merchant Panel</button>
                        <div class="dropdown-content">
                            <a href="../Merchant/MerchantDashboard.php">Dashboard</a>
                            <a href="../Merchant/Products.php">Manage Products</a>
                            <a href="../Merchant/Orders.php">View Orders</a>
                            <a href="../Common/Profile.php">Update Profile</a>
                        </div>
                    </div>
                <?php elseif ($role === 'customer'): ?>
                    <div class="dropdown">
                        <button class="dropbtn">Customer Dashboard</button>
                        <div class="dropdown-content">
                            <a href="../Customer/ViewOrders.php">My Orders</a>
                            <a href="../Customer/Wishlist.php">Wishlist</a>
                            <a href="../Customer/Profile.php">My Profile</a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="nav-links">
                    <div class="dropdown">
                        <button class="dropbtn">Account</button>
                        <div class="dropdown-content">
                            <a href="../Common/Profile.php">Profile</a>
                            <a href="../Auth/ChangePassword.php">Change Password</a>
                            <a href="../../Controllers/LogoutController.php">Logout</a>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <span><a href="../Auth/login.php" style="color:white;">Login</a></span>
            <?php endif; ?>
        </div>
    </header>
</body>
</html>
