<?php
session_start();
include 'includes/connect.php';

if (isset($_POST['user_id'], $_POST['product_id'], $_POST['size'], $_POST['flavour'], $_POST['crust'], $_POST['toppings'], $_POST['quantity'])) {
    // Retrieve the data from POST request
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];
    $flavour = $_POST['flavour'];
    $crust = $_POST['crust'];
    $toppings = $_POST['toppings']; // Comma-separated list of toppings
    $quantity = $_POST['quantity'];

    // Prepare SQL to insert the data into the cart table
    $sql = "INSERT INTO `cart` (`user_id`, `product_id`, `size`, `flavour`, `crust`, `toppings`, `quantity`) 
            VALUES ('$user_id', '$product_id', '$size', '$flavour', '$crust', '$toppings', '$quantity')";

    if (mysqli_query($con, $sql)) {
        // Successfully added to cart
        echo 'Product added to cart successfully!';
    } else {
        // Error occurred
        echo 'Error adding product to cart: ' . mysqli_error($con);
    }
} else {
    // Missing parameters
    echo 'Required data missing';
}

mysqli_close($con); // Close the database connection
?>


<?php
// session_start();
// include 'includes/connect.php';
// // Ensure the session ID exists
// if (!isset($_SESSION['id'])) {
//     // Handle case if user is not logged in
//     exit('User is not logged in');
// }

// $user_id = $_SESSION['id']; // Get the user ID
// $product_id = $_POST['product_id']; // Get the product ID
// $size = $_POST['size'];
// $flavour = $_POST['flavour'];
// $crust = $_POST['crust'];
// $toppings = $_POST['toppings'];
// $quantity = $_POST['quantity'];

// // Insert into database logic (add product to cart)
// $sql = "INSERT INTO cart (user_id, product_id, size, flavour, crust, toppings, quantity) VALUES ('$user_id', '$product_id', '$size', '$flavour', '$crust', '$toppings', '$quantity')";

// // Execute the query
// if (mysqli_query($con, $sql)) {
//     echo "Product added to cart successfully!";
// } else {
//     echo "Error adding product to cart.";
// }
?>

