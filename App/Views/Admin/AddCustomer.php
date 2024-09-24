<?php
include_once '../Layouts/Header.php';
?>

<div class="form-container">
    <h1>Add New Customer</h1>
    <form action="../../Controllers/CustomerController.php" method="POST" enctype="multipart/form-data">

            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message-global">
                    <?php echo htmlspecialchars($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
        </div>
        <div class="form-group">
            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image" accept="image/*">
        </div>
        <div class="form-group">
            <label for="shipping_address">Shipping Address:</label>
            <input type="text" id="shipping_address" name="shipping_address" placeholder="Enter shipping address" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" placeholder="Enter contact number" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit" name="addCustomer">Add Customer</button>
        </div>
    </form>
</div>

<?php include_once '../Layouts/Footer.php'; ?>
