<?php 
include_once '../Layouts/Header.php';
require_once '../../Models/Admin.php';

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
        <div class="success-message-global"><?php echo $_SESSION['success']; ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message-global"><?php echo $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form id="updateProfileAdminForm">
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

        <button type="submit" class="btn-save">Save Changes</button>
    </form>
    <div id="update-status" class="status-message"></div>
</div>

<?php require_once '../Layouts/Footer.php'; ?>
