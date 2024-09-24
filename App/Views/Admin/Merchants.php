<?php
include '../Layouts/Header.php';
require_once '../../Models/Merchant.php';
$merchants = getMerchants();
?>

<main class="merchant-management">
    <div class="table-container">
        <a class="btn add-merchant-btn" href="AddMerchant.php">+ Add Merchant</a>
        <table class="merchant-table">
            <thead>
                <tr>
                    <th>Merchant ID</th>
                    <th>Business Name</th>
                    <th>Business Address</th>
                    <th>Contact Number</th>
                    <th>Business License</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($merchants) > 0): ?>
                    <?php foreach ($merchants as $merchant): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($merchant['merchant_id']); ?></td>
                            <td><?php echo htmlspecialchars($merchant['business_name']); ?></td>
                            <td><?php echo htmlspecialchars($merchant['business_address']); ?></td>
                            <td><?php echo htmlspecialchars($merchant['contact_number']); ?></td>
                            <td><?php echo htmlspecialchars($merchant['business_license']); ?></td>
                            <td>
                                <a class="btn action-btn edit-btn" href="EditMerchant.php?id=<?php echo $merchant['merchant_id']; ?>">Edit</a>
                                <a class="btn action-btn delete-btn" href="DeleteMerchant.php?id=<?php echo $merchant['merchant_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No merchants found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include '../Layouts/Footer.php'; ?>
