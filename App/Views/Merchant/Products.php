<?php
include_once '../Layouts/Header.php';
?>
    <div class="product-container">
        <h1>Product Management</h1>
        <form id="addProductForm" enctype="multipart/form-data">
            <h2>Add New Product</h2>
            <label for="merchant_id">Merchant ID:</label>
            <input type="number" name="merchant_id" required><br>

            <label for="name">Product Name:</label>
            <input type="text" name="name" required><br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br>

            <label for="price">Price:</label>
            <input type="text" name="price" required><br>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" required><br>

            <label for="product_image">Product Image:</label>
            <input type="file" name="product_image" accept="image/*" required><br>

            <input type="submit" value="Add Product">
        </form>

        <h2>Product List</h2>
        <div id="productList"></div>
    </div>
<?php include_once '../Layouts/Footer.php'; ?>
