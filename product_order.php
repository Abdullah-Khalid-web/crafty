<?php
include 'includes/connect.php';
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to login if user not logged in
    exit();
}
$user_id = $_SESSION['id'];

// Fetch cart items for the user
$cart_items = [];
$cart_query = "SELECT * FROM cart WHERE user_id = ?";
$stmt = $con->prepare($cart_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }
}

// Handle "Order Now" functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_now'])) {
    $product_ids = [];
    $cart_ids = [];
    $total_quantity = 0;
    $total_price = 0;

    foreach ($cart_items as $item) {
        $product_ids[] = $item['product_id'];
        $cart_ids[] = $item['id'];
        $total_quantity += $item['quantity'];
        $total_price += $item['cart_price'];
    }

    $product_ids_str = implode(",", $product_ids);
    $cart_ids_str = implode(",", $cart_ids);

    $order_query = "INSERT INTO orders (user_id, product_ids, cart_ids, quantity, date, order_price)
                    VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($order_query);
    $stmt->bind_param("issid", $user_id, $product_ids_str, $cart_ids_str, $total_quantity, $total_price);

    if ($stmt->execute()) {
        // Clear the cart
        $delete_cart_query = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $conn->prepare($delete_cart_query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        echo "<script>alert('Order placed successfully!'); window.location.href = 'order.php';</script>";
    } else {
        echo "<script>alert('Error placing order.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        .master-container {
            display: grid;
            gap: 20px;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Card Styles */
        .card {
            background: #ffffff;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.15);
        }

        .title {
            width: 100%;
            padding: 15px 20px;
            background-color: #f7f9fc;
            font-weight: 700;
            font-size: 16px;
            color: #555;
            border-bottom: 1px solid #ddd;
            text-transform: uppercase;
        }

        .products,
        .details {
            padding: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .product:last-child {
            border-bottom: none;
        }

        .product img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .product .details {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .product span {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        .product p {
            font-size: 12px;
            color: #777;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #2b2b2f;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity p {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }

        /* Checkout Section */
        .checkout-btn {
            background: linear-gradient(180deg, #4480ff 0%, #115dfc 50%, #0550ed 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .checkout-btn:hover {
            background: linear-gradient(180deg, #115dfc 0%, #0550ed 50%, #0036b2 100%);
        }

        .checkout-btn {
            width: 100%;
            /* Ensure it spans full width on small screens */
            margin-top: 20px;
            font-size: 16px;
        }


        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .master-container {
                padding: 15px;
                gap: 15px;
            }

            .product {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .checkout-btn {
                width: 100%;
                text-align: center;
            }
        }

        @media screen and (max-width: 480px) {
            .title {
                font-size: 14px;
                padding: 10px 15px;
            }

            .product img {
                width: 50px;
                height: 50px;
            }

            .checkout-btn {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="master-container">
        <!-- Cart Section -->
        <div class="card cart">
            <label class="title">Your cart</label>
            <div class="products">
                <?php if (!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $item): ?>
                        <div class="product">
                            <div class="left">
                                <img src="admin-area/product_images/pizza.jpg" alt="Pizza"
                                    style="width: 50px; border-radius: 10px;">
                            </div>
                            <div class="right">
                                <span>Product Name: <?= htmlspecialchars($item['product_id']) ?></span>
                                <p>Flavour: <?= htmlspecialchars($item['flavour']) ?></p>
                                <p>Size: <?= htmlspecialchars($item['size']) ?></p>
                                <p>Crust: <?= htmlspecialchars($item['crust']) ?></p>
                                <p>Toppings: <?= htmlspecialchars($item['toppings']) ?></p>
                            </div>
                            <div class="quantity">
                                <p>Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
                            </div>
                            <label class="price">Price: <?= htmlspecialchars($item['cart_price']) ?>$</label>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Checkout Section -->
        <div class="card checkout">
            <label class="title">Checkout</label>
            <form method="POST" action="">
                <div class="details">
                    <?php
                    // Start the session to get the logged-in user ID
                    $user_id = $_SESSION['id'];

                    // Fetch user details
                    $sql = "SELECT * FROM `users_reg` WHERE user_id = '$user_id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    // Extract user information
                    $fname = htmlspecialchars($row["user_fname"]);
                    $lname = htmlspecialchars($row["user_lname"]);
                    $email = htmlspecialchars($row["user_email"]);
                    $user_phoneno = htmlspecialchars($row["user_phoneno"]);
                    $user_address = htmlspecialchars($row["user_address"]);

                    // Calculate the subtotal and total
                    $subtotal = array_sum(array_column($cart_items, 'cart_price'));
                    $shipping_fee = 200;
                    $total = $subtotal + $shipping_fee;
                    ?>

                    <!-- Display User Details -->
                    <h3>User Details</h3>
                    <p><strong>Name:</strong> <?= $fname . ' ' . $lname ?></p>
                    <p><strong>Email:</strong> <?= $email ?></p>
                    <p><strong>Phone Number:</strong> <?= $user_phoneno ?></p>
                    <p><strong>Address:</strong> <?= $user_address ?></p>


                    <h3>Order Summary</h3>
                    <p><strong>Subtotal:</strong> <?= number_format($subtotal, 2) ?> rs</p>
                    <p><strong>Shipping Fees:</strong> <?= number_format($shipping_fee, 2) ?> rs</p>
                    <p><strong>Total:</strong> <?= number_format($total, 2) ?> rs</p>
                </div>

                <!-- <div class="checkout--footer">
                    <button class="checkout-btn">Checkout</button>
                </div> -->


                <input type="hidden" name="subtotal" value="<?= $subtotal ?>">
                <input type="hidden" name="shipping_fee" value="<?= $shipping_fee ?>">
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="user_address" value="<?= $user_address ?>">
                <input type="hidden" name="user_phoneno" value="<?= $user_phoneno ?>">
                <div class="checkout--footer">
                    <button type="submit" name="checkout" class="checkout-btn" aria-label="Place Order">
                        Checkout
                    </button>
                </div>

            </form>
        </div>
    </div>
</body>
<?php
if (isset($_POST['checkout'])) {
    // Sanitize and fetch form data
    $subtotal = floatval($_POST['subtotal']);
    $shipping_fee = floatval($_POST['shipping_fee']);
    $total = floatval($_POST['total']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_phoneno = mysqli_real_escape_string($con, $_POST['user_phoneno']);
    $product_details = [];
    foreach ($cart_items as $item) {
        $product_details[] = [
            'product_id' => $item['product_id'],
            'flavour' => $item['flavour'],
            'size' => $item['size'],
            'crust' => $item['crust'],
            'toppings' => $item['toppings'],
            'quantity' => $item['quantity'],
            'price' => $item['cart_price']
        ];
    }
    // Convert the details to JSON format for easy storage
    $product_details_json = json_encode($product_details);

    // Insert data into the orders table
    $sql = "INSERT INTO orders (user_id, product_details, order_date, subtotal, shipping_fee, total, user_address, user_phoneno, status)
    VALUES ('$user_id', '$product_details_json', NOW(), '$subtotal', '$shipping_fee', '$total', '$user_address', '$user_phoneno', 'Pending')";




    if (mysqli_query($con, $sql)) {
        echo "<p>Order placed successfully!</p>";
    } else {
        echo "<p>Error placing order: " . mysqli_error($con) . "</p>";
    }

    $clear_cart_query = "DELETE FROM cart WHERE user_id = '$user_id'";
    mysqli_query($con, $clear_cart_query);
}
?>

</html>