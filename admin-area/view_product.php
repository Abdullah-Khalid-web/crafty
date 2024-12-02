<?php
include '../includes/connect.php';

// Handle product freeze/unfreeze
if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $action = $_GET['action'];

    if ($action === 'freeze') {
        $update_status = "UPDATE `products` SET product_status = 'false' WHERE product_id = $product_id";
    } elseif ($action === 'unfreeze') {
        $update_status = "UPDATE `products` SET product_status = 'true' WHERE product_id = $product_id";
    } elseif ($action === 'delete') {
        $update_status = "DELETE FROM `products` WHERE product_id = $product_id";
    }

    if (mysqli_query($con, $update_status)) {
        echo "<script>alert('Product status updated successfully!'); window.location='view_products.php';</script>";
    } else {
        die("Error updating product: " . mysqli_error($con));
    }
}

// Fetch products
$sql = "SELECT * FROM products ORDER BY product_title ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">View Products</h1>

        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['product_title']); ?></td>
                        <td><?php echo htmlspecialchars($row['product_description']); ?></td>
                        <td>
                            <img src="./product_images/<?php echo $row['product_image']; ?>" alt="Product Image" width="80">
                        </td>
                        <td>
                            <?php echo $row['product_status'] === 'true' ? 'Active' : 'Frozen'; ?>
                        </td>
                        <td>
                            <?php if ($row['product_status'] === 'true'): ?>
                                <a href="view_products.php?action=freeze&product_id=<?php echo $row['product_id']; ?>" 
                                   class="btn btn-warning btn-sm">Freeze</a>
                            <?php else: ?>
                                <a href="view_products.php?action=unfreeze&product_id=<?php echo $row['product_id']; ?>" 
                                   class="btn btn-success btn-sm">Unfreeze</a>
                            <?php endif; ?>
                            <a href="view_products.php?action=delete&product_id=<?php echo $row['product_id']; ?>" 
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
