<?php
include 'includes/connect.php';

if (isset($_GET['cart_id']) ) {
    $cart_id = $_GET['cart_id'];

    if (!empty($cart_id)) {

        $delete_query = "DELETE FROM `cart` WHERE id = $cart_id";
        $result = mysqli_query($con, $delete_query);

        if ($result) {
            echo "Product removed to cart";
            header("Location: cart.php?message=Product added to cart");
        } else {
            echo "Failed to add removed to cart. Error: " . $result;
        }
        
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Product ID or User ID not set.";
}
?>
