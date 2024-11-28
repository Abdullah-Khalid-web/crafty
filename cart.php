<?php include('header.php'); ?>

<style>
    .cart-section {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .cart-item {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .product-image img {
        max-width: 100px;
        margin-right: 20px;
    }

    .product-info h2 {
        margin: 0 0 10px;
    }

    .product-actions {
        margin-left: auto;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .product-actions button,
    .product-actions a {
        margin-top: 5px;
        padding: 8px 12px;
        border: none;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .product-actions button:hover,
    .product-actions a:hover {
        background-color: #0056b3;
    }

    .product-details {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f1f1f1;
    }

    .product-details.hidden {
        display: none;
    }


    .bg-pri {
        background-color: orange;
    }
</style>

<main>
    <section id="Cart" class="cart-section">
        <h1>Your Cart</h1>

        <?php
        // session_start();
        $user_id = $_SESSION['id'];

        // Fetch cart items for the logged-in user
        $cart_query = "SELECT * FROM cart c 
            JOIN products p ON c.product_id = p.product_id 
            WHERE c.user_id = '$user_id'";



        $cart_result = mysqli_query($con, $cart_query);

        if (mysqli_num_rows($cart_result) > 0) {
            while ($cart_item = mysqli_fetch_assoc($cart_result)) {
                $cart_id = $cart_item['id'];
                $product_id = $cart_item['product_id'];
                $product_title = $cart_item['product_title'];
                $product_image = $cart_item['product_image'];
                $product_description = $cart_item['product_description'];
                $product_price = $cart_item['cart_price'];
                $size = $cart_item['size'];
                $flavour = $cart_item['flavour'];
                $quantity = $cart_item['quantity'];
                ?>

                <div class="cart-item">
                    <div class="product-image">
                        <img src="admin-area/product_images/<?php echo htmlspecialchars($product_image); ?>"
                            alt="<?php echo htmlspecialchars($product_title); ?>">
                    </div>
                    <div class="product-info">
                        <h2><?php echo htmlspecialchars($product_title); ?></h2>
                        <p><strong>Price:</strong> $<?php echo number_format($product_price, 2); ?></p>
                        <p><strong>Size:</strong> <?php echo htmlspecialchars($size); ?></p>
                        <p><strong>Flavour:</strong> <?php echo htmlspecialchars($flavour); ?></p>
                        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
                    </div>
                    <div class="product-actions">
                        <button id="order-button bg-pri" class="order-button">Order Now</button>
                        <!-- Button to toggle more details -->
                        <button class="order-button" onclick="toggleDetails('<?php echo $product_id; ?>')">More Details</button>
                        <!-- Link to product detail page -->
                        <a class="order-button text-center" href="product_detail.php?product_id=<?php echo $product_id; ?>"
                            class="btn">View Product</a>

                        <a class="text-center order-button" href="removeFromCart.php?cart_id=<?php echo $cart_id; ?>" class="btn">Remove</a>

                    </div>
                </div>

                <!-- Hidden details section -->
                <div id="details-<?php echo $product_id; ?>" class="product-details hidden">
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($product_description); ?></p>
                    <p><strong>Added Toppings:</strong> <?php echo htmlspecialchars($cart_item['toppings']); ?></p>
                </div>


                    <section id="cart-section">
                        <h2>Your Cart</h2>
                        <ul id="cart-list"></ul>
                        <section class="cart-summary">
                            <h3>Summary</h3>
                            <button class="nav-link text-light bg-warning my-1 p-2" id="checkout-button">Checkout</button>
                        </section>
                    </section>
                <?php
            }
        } else {
            echo "<p>Your cart is empty!</p>";
        }

        mysqli_close($con);
        ?>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</main>

<?php include('footer.php'); ?>

<script>
    function toggleDetails(productId) {
        const detailsDiv = document.getElementById(`details-${productId}`);
        if (detailsDiv.classList.contains('hidden')) {
            detailsDiv.classList.remove('hidden');
        } else {
            detailsDiv.classList.add('hidden');
        }
    }
</script>