<?php
include_once '../Layouts/header.php';
require_once '../../Models/Merchant.php';

if (isset($_GET['merchant_id'])) {
    $merchantId = $_GET['merchant_id'];
} else {
    echo "Merchant ID not provided.";
    exit();
}

$merchant = getMerchantById($merchantId);

if (!$merchant) {
    echo "Merchant not found.";
    exit();
}
?>
<div class="edit-merchant-container">
    <h2>Edit Merchant</h2>
    <form id="editMerchantForm" action="updateMerchant.php" method="POST">        
        <div class="input-group">
            <label for="merchant_name">Merchant Name</label>
            <input type="text" id="merchant_name" name="merchant_name" placeholder="Enter merchant name" value="<?php echo htmlspecialchars($merchant['business_name']); ?>" required>
            <div id="merchant-name-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="merchant_email">Merchant Email</label>
            <input type="email" id="merchant_email" name="merchant_email" placeholder="Enter merchant email" value="<?php echo htmlspecialchars($merchant['email']); ?>" required>
            <div id="merchant-email-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="merchant_phone">Merchant Phone</label>
            <input type="tel" id="merchant_phone" name="merchant_phone" placeholder="Enter merchant phone number" value="<?php echo htmlspecialchars($merchant['contact_number']); ?>" required>
            <div id="merchant-phone-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="merchant_address">Merchant Address</label>
            <input type="text" id="merchant_address" name="merchant_address" placeholder="Enter merchant address" value="<?php echo htmlspecialchars($merchant['business_address']); ?>" required>
            <div id="merchant-address-error" class="error-message"></div>
        </div>

        <div id="status-message" class="status-message"></div>

        <button type="submit">Update Merchant</button>
    </form>
</div>
<?php include_once '../Layouts/footer.php'; ?>
