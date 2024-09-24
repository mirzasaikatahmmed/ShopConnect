<?php
include_once '../Layouts/header.php';
require_once '../../Models/User.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit();
}

$userId = $_SESSION['user_id'];
?>
<div class="change-password-container">
    <h2>Change Password</h2>
    <form id="changePasswordForm">
        <div class="input-group">
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" name="old_password" placeholder="Enter your old password" value="<?php echo empty($_SESSION['old_password']) ? "" : $_SESSION['old_password']; ?>">
            <div id="old-password-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter your new password" value="<?php echo empty($_SESSION['new_password']) ? "" : $_SESSION['new_password']; ?>">
            <div id="new-password-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="confirm_new_password">Confirm New Password</label>
            <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm your new password" value="<?php echo empty($_SESSION['confirm_new_password']) ? "" : $_SESSION['confirm_new_password']; ?>">
            <div id="confirm-new-password-error" class="error-message"></div>
        </div>

        <div id="status-message" class="status-message"></div>

        <button type="submit">Change Password</button>
    </form>
</div>
<?php include_once '../Layouts/footer.php'; ?>
