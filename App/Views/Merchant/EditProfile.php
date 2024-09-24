<?php 
include_once '../Layouts/Header.php';
require_once '../../Models/Merchant.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = getUserDataById($user_id);
$merchant = getMerchantDataByUserId($user_id);
?>

<div class="edit-profile-container">
    <h1>Edit Profile</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message-global"><?php echo $_SESSION['success']; ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message-global"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form id="updateProfileMerchantForm">
        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            <div id="name-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <div id="email-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="business_name">Business Name</label>
            <input type="text" id="business_name" name="business_name" value="<?php echo htmlspecialchars($merchant['business_name']); ?>" required>
            <div id="business_name-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="business_address">Business Address</label>
            <input type="text" id="business_address" name="business_address" value="<?php echo htmlspecialchars($merchant['business_address']); ?>" required>
            <div id="business_address-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($merchant['contact_number']); ?>" required>
            <div id="contact_number-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="business_license">Business License</label>
            <input type="text" id="business_license" name="business_license" value="<?php echo htmlspecialchars($merchant['business_license']); ?>" required>
            <div id="business_license-error" class="error-message"></div>
        </div>

        <button type="submit" class="btn-save">Save Changes</button>
    </form>
    <div id="update-status" class="status-message"></div>
</div>

<?php require_once '../Layouts/Footer.php'; ?>
