<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>

    <div class="reset-password-container">
        <div class="reset-password-form">
            <h2>Reset Your Password</h2>
            <p>Please enter your new password</p>
            
            <form id="resetPasswordForm" action="../../Controllers/ResetPasswordController.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new_password" placeholder="Enter your new password" required>
                    <p id="password-error-message" style="color:red;"></p> <!-- Error message for password -->
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your new password" required>
                    <p id="confirm-error-message" style="color:red;"></p> <!-- Error message for confirmation -->
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-reset">Update Password</button>
                </div>
            </form>

            <div class="login-option">
                <p>Remembered your password? <a href="login.php">Log In</a></p>
            </div>
        </div>
    </div>
</body>
</html>
