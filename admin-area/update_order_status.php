<?php
include 'db_connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    // Sanitize inputs
    $order_id = mysqli_real_escape_string($con, $order_id);
    $new_status = mysqli_real_escape_string($con, $new_status);

    // Update the order status in the database
    $sql = "UPDATE orders SET status = '$new_status' WHERE order_id = '$order_id'";
    if (mysqli_query($con, $sql)) {
        echo "Order status updated successfully!";
    } else {
        echo "Error updating order status: " . mysqli_error($con);
    }
}
?>
