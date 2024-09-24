<?PHP
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Welcome Back</h2>
            <p>Sign in to continue</p>

            <?php if (isset($_SESSION['error_message'])): ?>
            <div class="error-message-global">
                <?php echo htmlspecialchars($_SESSION['error_message']); ?>
            </div>
            <?php endif; ?>

            <form id="loginForm" action="../../Controllers/AuthController.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                    <div id="email-error-message" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <div id="password-error-message" class="error-message"></div>
                </div>
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="forgot-password">
                        <a href="./ForgotPassword.php">Forgot Password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-login" name="login">Login</button>
                </div>
            </form>

            <div class="register-option">
                <p>Don’t have an account? <a href="./Registration.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
