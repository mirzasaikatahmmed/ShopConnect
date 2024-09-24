<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
</head>
<body>

    <div class="forgot-password-container">
        <div class="forgot-password-form">
            <h2>Forgot Your Password?</h2>
            <p>Enter your email address to reset your password</p>
            
            <form action="process_forgot_password.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
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
