<?php
include '../includes/connect.php';

// Delete topping
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['topping_id'])) {
    $topping_id = $_GET['topping_id'];
    $delete_query = "DELETE FROM `topping` WHERE topping_id = $topping_id";
    
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Topping has been deleted successfully!'); window.location='view_topping.php';</script>";
    } else {
        die("Error deleting topping: " . mysqli_error($con));
    }
}

// Fetch toppings from the database
$sql = "SELECT * FROM `topping` ORDER BY topping_name ASC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Toppings - Admin Dashboard</title>
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">View Toppings</h1>

        <!-- Toppings Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Topping ID</th>
                    <th>Topping Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['Topping_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['topping_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['topping_product_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['topping_price']); ?> Rs</td>
                            <td>
                                <!-- Edit and Delete Buttons -->
                                <a href="edit_topping.php?topping_id=<?php echo $row['topping_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="view_topping.php?action=delete&topping_id=<?php echo $row['topping_id']; ?>" 
                                   class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this topping?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No toppings found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
