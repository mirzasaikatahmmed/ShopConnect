<?php 
include_once '../Layouts/Header.php';
require_once '../../Models/User.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = getUserDataById($user_id);
?>

<div class="edit-profile-container">
    <h1>Edit Profile</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message"><?php echo $_SESSION['success']; ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="EditProfile.php" enctype="multipart/form-data">
        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </div>

        <div class="input-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($user['contact_number']); ?>" required>
        </div>

        <div class="input-group">
            <label for="shipping_address">Shipping Address</label>
            <input type="text" id="shipping_address" name="shipping_address" value="<?php echo htmlspecialchars($user['shipping_address']); ?>" required>
        </div>

        <div class="input-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" id="profile_image" name="profile_image">
        </div>

        <button type="submit" class="btn-save">Save Changes</button>
    </form>
</div>

<?php require_once '../Layouts/Footer.php'; ?>
