<?php include 'header.php' ?>
    <main>
        <section id="Home">
            <div class="section1">
                <img src="Section11 img1.jpg" alt="">
               
            </div>
        </section>
        <section id="Products" class="boxes Products">
            <a href="pizza1.php">
                <div class="box ZoomIn">
                    <img class="" src="images/pizza.jpg" alt="Image 1">
                    <h2>Pizza</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>
            <a href="#">
                <div class="box ZoomIn">
                    <img src="images/burger.jpg" alt="Image 2">
                    <h2>Burger</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>
            <a href="#">
                <div class="box ZoomIn">
                    <img src="images/Fries.jpg" alt="Image 3">
                    <h2>Fries</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="images/Sandwich.jpg" alt="Image 4">
                    <h2>Sandwich</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="images/Shawarma.jpg" alt="Image 5">
                    <h2>Shawarma</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="images/Chicken.jpg" alt="Image 6">
                    <h2>Chicken</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>
        </section>


        <Section id="Contact">

            <div class="contact-form">
                <h2><span class="orange">Contact Us</span></h2>
                <form action="" method="">
                    <div class="ff">

                        <div class="form-group ">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group ">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </Section>


    </main>

    <?php
        $select_brands = "Select * from `brands`";
        $result_brand = mysqli_query($con, $select_brands);
        
       ;
        while( $row_data = mysqli_fetch_assoc($result_brand)){
            $brand_title = $row_data['brands_title'] ;
            $brand_id = $row_data['brands_id'] ;
            echo "<li class='nav-item'> 
                <a href='index.php?brand=$brand_id' class='nav-link text-dark'>
                    $brand_title
                </a>
            </li>";
        }
    ?>
    <?php
        $select_categories = "Select * from `categories`";
        $result_categories = mysqli_query($con, $select_categories);
        
       ;
        while( $row_data = mysqli_fetch_assoc($result_categories)){
            $categories_title = $row_data['category_title'] ;
            $categories_id = $row_data['category_id'] ;
            echo "<li class='nav-item'> 
                <a href='index.php?categories=$categories_id' class='nav-link text-dark'>
                    $categories_title
                </a>
            </li>";
        }
    ?>

    <?php include 'footer.php' ?>


    <!-- hamburger -->
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        })
        document.querySelector(".nav-link").forEach(n => n.addEventListener("click", () => {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }));
    </script>


</body>

</html>