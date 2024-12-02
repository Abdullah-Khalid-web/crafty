<?php
session_start();
include 'includes/connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user_id'], $_POST['product_id'], $_POST['size'], $_POST['flavour'], $_POST['crust'], $_POST['toppings'], $_POST['quantity'], $_POST['total_price'])) {
        // Sanitize inputs
        $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
        $size = mysqli_real_escape_string($con, $_POST['size']);
        $flavour = mysqli_real_escape_string($con, $_POST['flavour']);
        $crust = mysqli_real_escape_string($con, $_POST['crust']);
        $toppings = mysqli_real_escape_string($con, $_POST['toppings']);
        $quantity = (int)$_POST['quantity'];
        $total_price = (float)$_POST['total_price'];

        // Prepare SQL
        $sql = "INSERT INTO `cart` (`user_id`, `product_id`, `size`, `flavour`, `crust`, `toppings`, `quantity`, `cart_price`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssssid', $user_id, $product_id, $size, $flavour, $crust, $toppings, $quantity, $total_price);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Product added to cart successfully!';
        } else {
            echo 'Error adding product to cart: ' . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Required data missing';
    }
} else {
    echo 'Invalid request method';
}

mysqli_close($con);
?>
