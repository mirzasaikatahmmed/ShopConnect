<?php
include_once '../Layouts/Header.php';
?>

<div class="merchant-container"> 
    <h1>Add New Merchant</h1>
    <form action="../../Controllers/MerchantController.php" method="POST" enctype="multipart/form-data">
        
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message-global">
                    <?php echo htmlspecialchars($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

        <table class="merchant-table">
            <tr>
                <td>
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo empty($_SESSION['name']) ? "" : $_SESSION['name']; ?>" required>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Create a password" required>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <label for="profile_image">Profile Image:</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="business_name">Business Name:</label>
                        <input type="text" id="business_name" name="business_name" placeholder="Enter your business name" required>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="business_address">Business Address:</label>
                        <input type="text" id="business_address" name="business_address" placeholder="Enter your business address" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" id="contact_number" name="contact_number" placeholder="Enter your contact number" required>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="business_license">Business License:</label>
                        <input type="text" id="business_license" name="business_license" placeholder="Enter your business license number" required>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <button type="submit" class="btn-submit" name="addMerchant">Add Merchant</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once '../Layouts/Footer.php'; ?>
