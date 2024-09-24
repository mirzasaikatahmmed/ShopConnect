<?php
include '../Layouts/Header.php';
require_once '../../Models/User.php';
$customers = getUsersByRole('customer');
?>

<main class="customer-management">
    <div class="table-container">
        <a class="btn add-customer-btn" href="AddCustomer.php">+ Add Customer</a>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($customers) > 0): ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($customer['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($customer['name']); ?></td>
                            <td><?php echo htmlspecialchars($customer['email']); ?></td>
                            <td><?php echo htmlspecialchars($customer['created_at']); ?></td>
                            <td>
                                <a class="btn action-btn edit-btn" href="EditCustomer.php?id=<?php echo $customer['user_id']; ?>">Edit</a>
                                <a class="btn action-btn delete-btn" href="DeleteCustomer.php?id=<?php echo $customer['user_id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No customers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include '../Layouts/Footer.php'; ?>
