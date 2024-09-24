<?PHP SESSION_START(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>

    <div class="forgot-password-container">
        <div class="forgot-password-form">
            <h2>Forgot Your Password?</h2>
            <p>Enter your email address to reset your password</p>
            
            <form id="forgotPasswordForm" action="../../Controllers/ForgotPasswordController.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <p id="email-error-message" style="color:red;"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-reset">Reset Password</button>
                </div>
            </form>

            <div class="login-option">
                <p>Remembered your password? <a href="./Login.php">Log In</a></p>
            </div>
        </div>
    </div>

</body>
</html>
