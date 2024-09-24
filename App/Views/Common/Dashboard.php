<?php
include '../Layouts/Header.php';
?>
<main class="dashboard">
    <h1>Dashboard</h1>
    <div class="dashboard-content">
        <div class="card">
        <h2>Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?>!</h2>
        <p>This is your dashboard. Here you can manage your account, view stats, and more.</p>
        </div>

        <div class="card">
        <h2>Quick Links</h2>
        <ul>
            <li><a href="../Auth/Profile.php">View Profile</a></li>
            <li><a href="../Auth/ForgotPassword.php">Forgot Password</a></li>
            <li><a href="../Auth/ResetPassword.php">Reset Password</a></li>
        </ul>
        </div>
    </div>
    </main>
<?php
include '../Layouts/Footer.php';
?>
