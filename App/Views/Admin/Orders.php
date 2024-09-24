<?php
include_once '../Layouts/Header.php';
require_once '../../Controllers/OrderController.php';

$orders = getAllOrders(); // Fetch orders from the database

?>

<link rel="stylesheet" href="../../Public/CSS/styles.css">

<div class="order-management">
    <h1>Order Management</h1>
    <div class="table-container">
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($orders) > 0): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['customer_id']; ?></td>
                            <td><?php echo number_format($order['total_price'], 2); ?></td>
                            <td><?php echo ucfirst($order['status']); ?></td>
                            <td><?php echo $order['created_at']; ?></td>
                            <td><?php echo $order['updated_at']; ?></td>
                            <td>
                                <a href="edit_order.php?id=<?php echo $order['order_id']; ?>" class="btn edit-btn">Edit</a>
                                <a href="../../Controllers/OrderController.php?action=delete&id=<?php echo $order['order_id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once '../Layouts/Footer.php'; ?>
