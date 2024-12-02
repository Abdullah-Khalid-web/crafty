<?php
include '../includes/connect.php';

// Delete crust
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['crust_id'])) {
    $crust_id = $_GET['crust_id'];
    $delete_query = "DELETE FROM `crust` WHERE crust_id = $crust_id";
    
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Crust has been deleted successfully!'); window.location='view_crust.php';</script>";
    } else {
        die("Error deleting crust: " . mysqli_error($con));
    }
}

// Fetch crusts from database
$sql = "SELECT * FROM `crust` ORDER BY crust_name ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crusts - Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">View Crusts</h1>

        <!-- Crust Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Crust ID</th>
                    <th>Crust Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['crust_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['crust_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['crust_product_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['crust_price']); ?> Rs</td>
                        <td>
                            <!-- Edit and Delete Buttons -->
                            <a href="edit_crust.php?crust_id=<?php echo $row['crust_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="view_crust.php?action=delete&crust_id=<?php echo $row['crust_id']; ?>" 
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this crust?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
