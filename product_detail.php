<?php include 'header.php'; ?>

<main class="Customize-Main">
    <section id="pizza-builder">

        <?php
        if(isset($_SESSION['id'])){
            $user_id  = $_SESSION['id'];
        }
        else{

        }
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM `products` WHERE product_id = '$product_id'";
        $result = mysqli_query($con, $sql);
        $row_data = mysqli_fetch_assoc($result);

        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_image = $row_data['product_image'];

        echo '
        <div class="image-container">
            <img src="admin-area/product_images/' . $product_image . '" alt="Pizza Base" id="pizza-image">
        </div>

        <div class="options-container">
            <h3>Build Your Masterpiece</h3>';
        ?>

        <!-- Sizes -->
        <div class="size-section">
            <h4>Sizes</h4>
            <select id="size-select" onchange="updateCartDetails()">
                <option value="0" data-price="0">Select Size</option>
                <?php
                $sqlsize = "SELECT * FROM `size` WHERE size_product_name = '$product_title'";
                $resultsize = mysqli_query($con, $sqlsize);
                while ($row = mysqli_fetch_assoc($resultsize)) {
                    echo '<option value="' . htmlspecialchars($row['size_name']) . '" data-price="' . htmlspecialchars($row['size_price']) . '">' . htmlspecialchars($row['size_name']) . ' - ' . htmlspecialchars($row['size_price']) . ' Rs</option>';
                }
                ?>
            </select>
        </div>

        <!-- Flavours -->
        <div class="size-section">
            <h4>Flavours</h4>
            <select id="flavour-select" onchange="updateCartDetails()">
                <option value="0" data-price="0">Select Flavour</option>
                <?php
                $sqlflavour = "SELECT * FROM `flavour` WHERE flavour_product_name = '$product_title'";
                $resultflavour = mysqli_query($con, $sqlflavour);
                while ($row = mysqli_fetch_assoc($resultflavour)) {
                    echo '<option value="' . htmlspecialchars($row['flavour_name']) . '" data-price="' . htmlspecialchars($row['flavour_price']) . '">' . htmlspecialchars($row['flavour_name']) . ' - ' . htmlspecialchars($row['flavour_price']) . ' Rs</option>';
                }
                ?>
            </select>
        </div>

        <!-- Crust -->
        <div class="size-section">
            <h4>Crust</h4>
            <select id="crust-select" onchange="updateCartDetails()">
                <option value="0" data-price="0">Select Crust</option>
                <?php
                $sqlcrust = "SELECT * FROM `crust` WHERE crust_product_name = '$product_title'";
                $resultcrust = mysqli_query($con, $sqlcrust);
                while ($row = mysqli_fetch_assoc($resultcrust)) {
                    echo '<option value="' . htmlspecialchars($row['crust_name']) . '" data-price="' . htmlspecialchars($row['crust_price']) . '">' . htmlspecialchars($row['crust_name']) . ' - ' . htmlspecialchars($row['crust_price']) . ' Rs</option>';
                }
                ?>
            </select>
        </div>

        <!-- Toppings -->
        <div class="size-section">
            <h4>Toppings</h4>
            <ul id="topping-list" onchange="updateCartDetails()">
                <?php
                $sqltopping = "SELECT * FROM `topping` WHERE topping_product_name = '$product_title'";
                $resulttopping = mysqli_query($con, $sqltopping);
                while ($row = mysqli_fetch_assoc($resulttopping)) {
                    echo '
            <li>
                <label>
                    <input  type="checkbox" class="topping-checkbox" data-price="' . htmlspecialchars($row['topping_price']) . '">
                    ' . htmlspecialchars($row['topping_name']) . ' - ' . htmlspecialchars($row['topping_price']) . ' Rs
                </label>
            </li>';
                }
                ?>
            </ul>
        </div>

    </section>

    <section id="cart">
        <h3>Your Cart</h3>
        <ul id="cart-items">
            <li>Size: <span id="cart-size">None</span> - <span id="cart-size-price">0</span> Rs</li>
            <li>Flavour: <span id="cart-flavour">None</span> - <span id="cart-flavour-price">0</span> Rs</li>
            <li>Crust: <span id="cart-crust">None</span> - <span id="cart-crust-price">0</span> Rs</li>
            <li>Toppings: <span id="cart-toppings">None</span></li>
        </ul>
        <P id="item-quantity"><input onchange="updateCartDetails()" id="input-item-quantity" name="qunatity"
                type="number" min="1" max="9" value="1"></P>

        <h3>Total: <span id="cart-total-price">0</span> Rs</h3>

        <button id="addToCartButton">
            <?php
            echo'
            <a href="addToCart.php">

            ';
                ?>
                <div class="default-btn">
                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2"
                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle r="3" cy="12" cx="12"></circle>
                    </svg>
                    <span>Add to Cart</span>
                </div>
                <div class="hover-btn">
                    <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2"
                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                        <circle r="1" cy="21" cx="9"></circle>
                        <circle r="1" cy="21" cx="20"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span>Add to Cart</span>
                </div>
            </a>
        </button>

        <button id="order-button" class="order-button"> <a href="product_order.php">Order Now</a> </button>
    </section>

    <div class="popup m-0" style="display: none;"> <!-- Ensure initial display is none -->
        <div class="popup-content m-0">
            <?php include 'product_order.php' ?>
            <img class="close-img close" src="images/x.png" alt="Close">
        </div>
    </div>


    <!-- Add to cart button url -->

    <script>document.getElementById('addToCartButton').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default link behavior

    const sizeSelect = document.getElementById('size-select');
    const flavourSelect = document.getElementById('flavour-select');
    const crustSelect = document.getElementById('crust-select');
    const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');
    const quantityInput = document.getElementById("input-item-quantity");

    // Get selected values
    const selectedSize = sizeSelect.options[sizeSelect.selectedIndex];
    const selectedFlavour = flavourSelect.options[flavourSelect.selectedIndex];
    const selectedCrust = crustSelect.options[crustSelect.selectedIndex];
    const selectedToppings = [];
    let toppingTotal = 0;

    toppingCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const toppingName = checkbox.parentNode.textContent.trim().split(" - ")[0];
            selectedToppings.push(toppingName);
            toppingTotal += parseFloat(checkbox.dataset.price);
        }
    });

    const quantity = parseInt(quantityInput.value, 10);

    // Send data to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "addToCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    const userId = <?php echo $_SESSION['id']; ?>;
    const productId = <?php echo $product_id; ?>;

    const params = `user_id=${userId}&product_id=${productId}&size=${selectedSize.value}&flavour=${selectedFlavour.value}&crust=${selectedCrust.value}&toppings=${encodeURIComponent(selectedToppings.join(','))}&quantity=${quantity}`;

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Optional: Handle a successful response
            alert("Product added to cart successfully!");
            // You can also update the cart UI here if needed
        } else {
            alert("Error adding product to cart.");
        }
    };

    xhr.send(params);
});

    </script>



    <!-- POP up js for order Button -->
    <script>
        // Function to open popup
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

        // Event listener for the order button
        document.getElementById('order-button').addEventListener('click', function () {
            openPopup('.popup'); // Open the popup when the button is clicked
        });

        // Close the popup when clicking outside the popup content
        document.addEventListener('click', function (event) {
            const popup = document.querySelector('.popup');
            if (popup && popup.style.display === 'flex' && !popup.contains(event.target) && !event.target.matches('#order-button')) {
                closePopup('.popup'); // Close if click is outside the popup
            }
        });

        // Prevent event propagation inside the popup content
        document.querySelector('.popup-content').addEventListener('click', function (event) {
            event.stopPropagation();
        });

        // Close the popup when clicking the close button
        document.querySelector('.close').addEventListener('click', function () {
            closePopup('.popup');
        });


    </script>




    <!-- Js for The total price and cart -->
    <script>
        function updateCartDetails() {
            const sizeSelect = document.getElementById('size-select');
            const flavourSelect = document.getElementById('flavour-select');
            const crustSelect = document.getElementById('crust-select');
            const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');

            // Update size
            const selectedSize = sizeSelect.options[sizeSelect.selectedIndex];
            document.getElementById('cart-size').innerText = selectedSize.value;
            document.getElementById('cart-size-price').innerText = selectedSize.dataset.price;

            // Update flavour
            const selectedFlavour = flavourSelect.options[flavourSelect.selectedIndex];
            document.getElementById('cart-flavour').innerText = selectedFlavour.value;
            document.getElementById('cart-flavour-price').innerText = selectedFlavour.dataset.price;

            // Update crust
            const selectedCrust = crustSelect.options[crustSelect.selectedIndex];
            document.getElementById('cart-crust').innerText = selectedCrust.value;
            document.getElementById('cart-crust-price').innerText = selectedCrust.dataset.price;

            // Update toppings
            let toppingNames = [];
            let toppingTotal = 0;
            toppingCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const toppingName = checkbox.parentNode.textContent.trim().split(" - ")[0];
                    const toppingPrice = parseFloat(checkbox.dataset.price);
                    toppingNames.push(`${toppingName} (${toppingPrice} Rs)`);
                    toppingTotal += toppingPrice;
                    console.log(toppingName)
                    console.log(toppingPrice)
                }
            });
            document.getElementById('cart-toppings').innerText = toppingNames.join(', ') || 'None';

            // Update Quantity
            const Qun = document.getElementById("input-item-quantity");
            const quantity = parseInt(Qun.value, 10);

            // Update total
            const totalPrice = (
                parseFloat(selectedSize.dataset.price) +
                parseFloat(selectedFlavour.dataset.price) +
                parseFloat(selectedCrust.dataset.price) +
                toppingTotal) * quantity;


            document.getElementById('cart-total-price').innerText = totalPrice.toFixed(2);
        }

    </script>

</main>
<?php include 'footer.php'; ?>