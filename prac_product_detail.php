<?php include 'header.php' ?>

<main class="Customize-Main">
    <section id="pizza-builder">

        <?php

        $product_id = $_GET['id'];
        $sql = "SELECT * FROM `products` where product_id = '$product_id'";

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
                <h3>Build Your Masterpiece</h3>

            ';

        $sqlsize = "SELECT * FROM `size` WHERE size_product_name = '$product_title'";
        $resultsize = mysqli_query($con, $sqlsize);

        if (!$resultsize || mysqli_num_rows($resultsize) == 0) {
            echo '<p>No sizes available for this product.</p>';
        } else {
            echo '
                <div class="size-section">
                    <h4>Sizes</h4>
                    <select  onclick="changeSize() updatePrice() updateproductdetail()">
                    
                    ';

            while ($row = mysqli_fetch_assoc($resultsize)) {
                $size_name = htmlspecialchars($row['size_name']); // Sanitize for XSS
                $size_price = htmlspecialchars($row['size_price']); // Sanitize for XSS
        
                echo '
                        <option> <span id="size_name">' . $size_name . '</span>  - <span id="size_price"> ' . $size_price . '</span> </option>
                    ';
            }

            echo '
                    </select>
                </div>';
        }



        // flavour access
        $sqlflavour = "SELECT * FROM `flavour` WHERE flavour_product_name = '$product_title'";
        $resultflavour = mysqli_query($con, $sqlflavour);

        if ($resultflavour && mysqli_num_rows($resultflavour) > 0) {
            echo '
                <div class="size-section">
                    <h4>Flavour</h4>
                    <select  onclick="updatePrice()">
                    
                    ';

            while ($row = mysqli_fetch_assoc($resultflavour)) {
                $flavour_name = htmlspecialchars($row['flavour_name']); // Sanitize for XSS
                $flavour_price = htmlspecialchars($row['flavour_price']); // Sanitize for XSS
        
                echo '
                    <option> <span id="flavour_name">' . $flavour_name . '</span>  - <span id="flavour_price"> ' . $flavour_price . '</span> </option>
                    ';
            }

            echo '
                    </select>
                </div>';
        }






        // crust           
        $sqlcrust = "SELECT * FROM `crust` WHERE crust_product_name = '$product_title'";
        $resultcrust = mysqli_query($con, $sqlcrust);

        if (!$resultcrust || mysqli_num_rows($resultcrust) == 0) {
            echo '<p>No crust options available for this product.</p>';
        } else {
            echo '
            <div class="size-section">
                <h4>crust</h4>
                <select  onclick="updatePrice()">
                
                ';

            while ($row = mysqli_fetch_assoc($resultcrust)) {
                $crust_name = htmlspecialchars($row['crust_name']); // Sanitize for XSS
                $crust_price = htmlspecialchars($row['crust_price']); // Sanitize for XSS
        
                echo '
                    <option> <span id="crust_name">' . $crust_name . '</span>  - <span id="crust_price"> ' . $crust_price . '</span> </option>
                ';
            }

            echo '
                </select>
            </div>';
        }



        // updateproductdetail();
        



        // TOPPING
        $sqltopping = "SELECT * FROM `topping` WHERE topping_product_name = '$product_title'";
        $resulttopping = mysqli_query($con, $sqltopping);

        if (!$resulttopping || mysqli_num_rows($resulttopping) == 0) {
            echo '<p>No topping options available for this product.</p>';
        } else {
            echo '
    <div class="crust-section">
        <h4>TOPPING</h4>
        <ul>
    ';

            while ($row = mysqli_fetch_assoc($resulttopping)) {
                $topping_name = htmlspecialchars($row['topping_name']); // Sanitize for XSS
                $topping_price = htmlspecialchars($row['topping_price']); // Sanitize for XSS
        
                echo '
            <li>
                <button class="crust-button" onclick="updatePrice()">' . $topping_name . ' - ' . $topping_price . '</button>
            </li>
        ';
            }

            echo '
        </ul>
    </div>';
        }

        echo '</div>
    </section>';
        ?>








        <section id="cart">
            <h3>Your Cart</h3>
            <ul id="cart-items">
                <li>Size : <span id="size_name1"> </span> - <span id="size_price1"> </span> </li>
                <li>Flavour : <span id="flavour_name1"></span> - <span id="flavour_price1"> </span> </li>
                <li>crust : <span id="crust_name1"> </span> - <span id="crust_price1"> </span> </li>
                <li>Size : <span id="size_name1"> </span> - <span id="size_price1"> </span> </li>
                <li>Topping : ' . $topping_name . ' ' . $topping_price . ' </li>
            </ul>
            <P id="item-quantity"><input id="input-item-quantity" name="qunatity" type="number" min="1" max="9"
                    value="1"></P>

            <p id="cart-total">Total: <span id="total-price"></span> Rs</p>

            <script>
                var size_name = document.getElementById("size_name");
                const size_price = document.getElementById("size_price");

                var flavour_name = document.getElementById("flavour_name");
                const flavour_price = document.getElementById("flavour_price");

                var crust_name = document.getElementById("crust_name");
                const crust_price = document.getElementById("crust_price");



                var size_name1 = document.getElementById("size_name1");
                const size_price1 = document.getElementById("size_price1");

                var flavour_name1 = document.getElementById("flavour_name1");
                const flavour_price1 = document.getElementById("flavour_price1");

                var crust_name1 = document.getElementById("crust_name1");
                const crust_price1 = document.getElementById("crust_price1");


                function updateproductdetail() {


                    size_name1.innerHTML("size_name");
                    size_price1.innerHTML("size_price");

                    flavour_name1.innerHTML("flavour_name");
                    flavour_price1.innerHTML("flavour_price");

                    crust_name1.innerHTML("crust_name");
                    crust_price1.innerHTML("crust_price");



                    const Qun = document.getElementById("input-item-quantity");

                    const total_price = document.getElementById("total-price");
                    const total = (size_price + flavour_price + crust_price) * Qun;
                }

            </script>

            <button id="addToCartButton">
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
                    <span>Shop Now</span>
                </div>
            </button>

        </section>

</main>
<?php include 'footer.php' ?>