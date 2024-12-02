<?php
include '../includes/connect.php';

// Delete size
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['size_id'])) {
    $size_id = $_GET['size_id'];
    $delete_query = "DELETE FROM `size` WHERE size_id = $size_id";
    
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Size has been deleted successfully!'); window.location='view_size.php';</script>";
    } else {
        die("Error deleting size: " . mysqli_error($con));
    }
}

// Fetch sizes from the database
$sql = "SELECT * FROM `size` ORDER BY size_name ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sizes - Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">View Sizes</h1>

        <!-- Size Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Size ID</th>
                    <th>Size Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['size_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['size_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['size_product_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['size_price']); ?> Rs</td>
                        <td>
                            <!-- Edit and Delete Buttons -->
                            <a href="edit_size.php?size_id=<?php echo $row['size_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="view_size.php?action=delete&size_id=<?php echo $row['size_id']; ?>" 
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this size?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
