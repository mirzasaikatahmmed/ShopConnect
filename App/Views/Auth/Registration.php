<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
</head>
<body>

    <div class="registration-container">
        <div class="registration-form">
            <h2>Create an Account</h2>
            <p>Sign up to get started</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message-global">
                    <?php echo htmlspecialchars($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form action="../../Controllers/AuthController.php" method="POST" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo empty($_SESSION['name']) ? "" : $_SESSION['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" value="<?php echo empty($_SESSION['confirm_password']) ? "" : $_SESSION['confirm_password']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Select Role:</label>
                    <select id="role" name="role" required>
                        <option value="">-- Choose a role --</option>
                        <option value="admin" <?php echo (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="merchant" <?php echo (isset($_SESSION['role']) && $_SESSION['role'] == 'merchant') ? 'selected' : ''; ?>>Merchant</option>
                        <option value="customer" <?php echo (isset($_SESSION['role']) && $_SESSION['role'] == 'customer') ? 'selected' : ''; ?>>Customer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="profile_image">Profile Image:</label>
                    <input type="file" id="profile_image" name="profile_image" accept="image/*">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-register" name="register">Sign Up</button>
                </div>
            </form>

            <div class="login-option">
                <p>Already have an account? <a href="./Login.php">Log In</a></p>
            </div>
        </div>
    </div>

</body>
</html>
