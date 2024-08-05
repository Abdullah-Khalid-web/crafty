<?php include 'header.php' ?>

    <main class="Customize-Main">
        <section id="pizza-builder">
            <div class="image-container">
                <img src="images/piz.jpg" alt="Pizza Base" id="pizza-image">
            </div>
            <div class="options-container">
                <h3>Build Your Masterpiece</h3>
                <div class="size-section">
                    <h4>Size</h4>
                    <ul>
                        <li><button id="sma" onclick="changeSize('small'); updatePrice()">Small</button></li>
                        <li><button id="med" onclick="changeSize('medium'); updatePrice()">Medium</button></li>
                        <li><button id="lar" onclick="changeSize('large'); updatePrice()">Large</button></li>
                    </ul>
                </div>
                <div class="flavour-section">
                    <h4>Flavour</h4>
                    <ul>
                        <li><button class="flavor" id="margherita"
                                onclick="selectFlavor('margherita'); updatePrice()">Margherita</button></li>
                        <li><button class="flavor" id="maliaboti"
                                onclick="selectFlavor('maliaboti'); updatePrice()">Malia Boti</button></li>
                        <li><button class="flavor" id="vegetarian"
                                onclick="selectFlavor('vegetarian'); updatePrice()">Vegetarian</button></li>
                        <li><button class="flavor" id="bbq-chicken"
                                onclick="selectFlavor('bbq-chicken'); updatePrice()">BBQ Chicken</button></li>
                        <li><button class="flavor" id="hawaiian"
                                onclick="selectFlavor('hawaiian'); updatePrice()">Hawaiian</button></li>
                    </ul>
                </div>
                <div class="toppings-section">
                    <h4>Toppings</h4>
                    <ul>
                        <li><button id="pepperoni" onclick="addTopping('pepperoni'); updatePrice()">Pepperoni</button>
                        </li>
                        <li><button id="mushrooms" onclick="addTopping('mushrooms'); updatePrice()">Mushrooms</button>
                        </li>
                        <li><button id="onions" onclick="addTopping('onions'); updatePrice()">Onions</button></li>
                        <li><button id="sausage" onclick="addTopping('sausage'); updatePrice()">Sausage</button></li>
                        <li><button id="green-peppers" onclick="addTopping('green-peppers'); updatePrice()">Green
                                Peppers</button></li>
                        <li><button id="extra-cheese" onclick="addTopping('extra-cheese'); updatePrice()">Extra
                                Cheese</button></li>
                    </ul>
                </div>
                <div class="crust-section">
                    <h4>Crust</h4>
                    <ul>
                        <li><button id="classic" onclick="changeCrust('classic'); updatePrice()">Classic</button></li>
                        <li><button id="thin" onclick="changeCrust('thin'); updatePrice()">Thin & Crispy</button></li>
                        <li><button id="stuffed" onclick="changeCrust('stuffed'); updatePrice()">Stuffed Crust</button>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="cart">
            <h3>Your Cart</h3>
            <ul id="cart-items"></ul>
            <P id="item-quantity"><input id="input-item-quantity" onclick="changequantity(); updatePrice()"
                    type="number" min="1" max="9" value="1"></P>

            <p id="cart-total">Total: <span id="total-price">0.00</span> Rs</p>

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
        <div id="cartData"></div>

        <section class="cart-items">
            <h2>Your Items</h2>
            <ul id="cart-list">
            </ul>
            <h2>Final Price</h2>
            <ul id="Final-Price">

            </ul>
        </section>

        <button id="clear">clear</button>


    </main>
    
    <?php include 'footer.php' ?>

    <script src="practice.js"></script>

</body>

</html>