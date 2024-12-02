<?php
include '../includes/connect.php';

// Delete flavour
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['flavour_id'])) {
    $flavour_id = $_GET['flavour_id'];
    $delete_query = "DELETE FROM `flavour` WHERE flavour_id = $flavour_id";
    
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Flavour has been deleted successfully!'); window.location='view_flavour.php';</script>";
    } else {
        die("Error deleting flavour: " . mysqli_error($con));
    }
}

// Fetch flavours from database
$sql = "SELECT * FROM `flavour` ORDER BY flavour_name ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Flavours - Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">View Flavours</h1>

        <!-- Flavour Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Flavour ID</th>
                    <th>Flavour Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['flavour_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['flavour_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['flavour_product_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['flavour_price']); ?> Rs</td>
                        <td>
                            <!-- Edit and Delete Buttons -->
                            <a href="edit_flavour.php?flavour_id=<?php echo $row['flavour_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="view_flavour.php?action=delete&flavour_id=<?php echo $row['flavour_id']; ?>" 
                                class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this flavour?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
