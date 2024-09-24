<?php 
    include '../Layouts/Header.php';
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header('Location: ../Auth/login.php');
        exit();
    }
?>
<main class="admin-dashboard">
    <h1>Admin Dashboard</h1>
    
    <div class="dashboard-welcome">
        <h2>Welcome, Admin <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; ?>!</h2>
        <p>Manage your platform efficiently from here.</p>
    </div>

    <div class="dashboard-content">
        <div class="card">
            <h3>User Management</h3>
            <p>Oversee user accounts and roles.</p>
            <a class="btn" href="../Admin/Users.php">Manage Users</a>
        </div>

        <div class="card">
            <h3>Merchant Management</h3>
            <p>Manage merchant accounts and activities.</p>
            <a class="btn" href="../Admin/Merchants.php">Manage Merchants</a>
        </div>

        <div class="card">
            <h3>Product Management</h3>
            <p>Oversee product listings and details.</p>
            <a class="btn" href="../Admin/Products.php">Manage Products</a>
        </div>

        <div class="card">
            <h3>Order Management</h3>
            <p>Track and manage customer orders.</p>
            <a class="btn" href="../Admin/Orders.php">Manage Orders</a>
        </div>
    </div>
</main>
<?php include '../Layouts/Footer.php'; ?>
