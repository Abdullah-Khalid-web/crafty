<?php include('header.php'); ?>

<style>
    .cart1{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .summary-section,
    .cart-section {
        padding: 20px;
        /* max-width: 1200px; */
        margin: 0 auto;
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .cart-item {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        /* flex: 1; */
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





    #summary-section {
        padding: 50px;
        background: #000;
        max-width: 100%;
        margin: 10px auto;
        text-align: center;
        box-shadow: 0 4px 58px rgba(255, 84, 5, 1);
    }

    #summary-section h3 {
        margin-bottom: 15px;
        font-size: 1.5rem;
        color:rgba(255, 84, 5, 1);
    }

    #summary-section p {
        font-size: 1.2rem;
        margin: 10px 0;
        color:rgba(255, 84, 5, 1);
    }
</style>

<main>
    <div class="cart1">
        <h1 class="h1 text-center text-pri">Your Cart</h1>
        <!-- <hr> -->
        <section id="Cart" class="cart-section">

            <?php
            // session_start();
            $user_id = $_SESSION['id'];

            // Fetch cart items for the logged-in user
            $cart_query = "SELECT * FROM cart c 
            JOIN products p ON c.product_id = p.product_id 
            WHERE c.user_id = '$user_id'";



            $cart_result = mysqli_query($con, $cart_query);
            $total_price_cart = 0;
            if (mysqli_num_rows($cart_result) == 0) {
                echo '
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            ';

            }
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
                    $total_price_cart = $total_price_cart + $product_price;
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
                            <p><strong>Toppings:</strong> <?php echo htmlspecialchars($cart_item['toppings']); ?></p>
                            <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
                        </div>
                        <div class="product-actions">
                            <button id="order-button bg-pri" class="order-button">Order Now</button>
                            <!-- Link to product detail page -->
                            <a class="order-button text-center" href="product_detail.php?product_id=<?php echo $product_id; ?>"
                                class="btn">View Product</a>

                            <a class="text-center order-button" href="removeFromCart.php?cart_id=<?php echo $cart_id; ?>"
                                class="btn">Remove</a>

                        </div>
                    </div>

                    <?php
                }
            } else {
                echo "<p>Your cart is empty!</p>";
            }

            mysqli_close($con);
            ?>
        </section>

        <section id="summary-section">
            <h3>Summary</h3>
            <p>Total Price : <?php echo number_format($total_price_cart, 2); ?> </p>
            <button class="order-button"> Order Now </button>
        </section>

        <div class="popup m-0" style="display: none;">
            <div class="popup-content m-0">
                <?php include 'product_order.php'; ?>
                <img class="close-img close" src="images/x.png" alt="Close">
            </div>
        </div>
    </div>

    <!-- POP up js for order Button -->

    <script>    // Function to open popup
        function openPopup(popupClass) {
            const popup = document.querySelector(popupClass);
            if (popup) {
                popup.style.display = 'flex'; // Show the popup
            }
        }

        // Function to close popup
        function closePopup(popupClass) {
            const popup = document.querySelector(popupClass);
            if (popup) {
                popup.style.display = 'none'; // Hide the popup
            }
        }

        // Attach click events to all "Order Now" buttons
        document.querySelectorAll('.order-button').forEach(button => {
            button.addEventListener('click', function () {
                openPopup('.popup');
            });
        });

        // Close button logic
        document.querySelectorAll('.close').forEach(closeButton => {
            closeButton.addEventListener('click', function () {
                closePopup('.popup');
            });
        });


    </script>
</main>
<?php include('footer.php'); ?>