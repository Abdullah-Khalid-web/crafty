<?php
include '../includes/connect.php';
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($con, $sql);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<main class="container my-4">
    <h2 class="text-center mb-4">Manage Orders</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Product Details</th>
                <th>Order Date</th>
                <th>Subtotal</th>
                <th>Shipping Fee</th>
                <th>Total</th>
                <th>User Address</th>
                <th>User Phone</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['product_details']); ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['subtotal']; ?> Rs</td>
                    <td><?php echo $row['shipping_fee']; ?> Rs</td>
                    <td><?php echo $row['total']; ?> Rs</td>
                    <td><?php echo htmlspecialchars($row['user_address']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_phoneno']); ?></td>
                    <td id="status-<?php echo $row['order_id']; ?>">
                        <?php echo htmlspecialchars($row['status']); ?>
                    </td>
                    <td>
                        <?php if ($row['status'] === 'Pending'): ?>
                            <button class="btn btn-success btn-sm mb-1" onclick="updateStatus(<?php echo $row['order_id']; ?>, 'Delivered')">Mark as Delivered</button>
                            <button class="btn btn-danger btn-sm" onclick="updateStatus(<?php echo $row['order_id']; ?>, 'Canceled')">Cancel</button>
                        <?php else: ?>
                            <span class="text-muted">No actions available</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<script>
    // Function to update order status
    function updateStatus(orderId, newStatus) {
        if (confirm(`Are you sure you want to change the status to "${newStatus}"?`)) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_order_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                    document.getElementById(`status-${orderId}`).innerText = newStatus;
                } else {
                    alert("Error updating status.");
                }
            };

            xhr.send(`order_id=${orderId}&status=${newStatus}`);
        }
    }
</script>
