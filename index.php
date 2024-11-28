<?php include 'header.php' ?>
<main>
    <section id="Home">
        <div class="section1">
            <img src="Section11 img.jpg" alt="">
        </div>
    </section>
    <section id="Products" class="boxes Products">

        <?php
        // Assuming $con is already initialized and connected to your database.
        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $image = $row['product_image'];
                ?>
                <a href="product_detail.php?product_id=<?php echo $row['product_id']; ?>">
                    <div class="box ZoomIn">
                        <img class="" src="admin-area/product_images/<?php echo  $row['product_image'] ;  ?> "
                            alt="<?php echo $row['product_title']; ?>">
                            <?php // echo  $image ;  ?>
                            <?php  //echo "admin-area/product_images/" . htmlspecialchars($row['product_image'])?>
                        <h2><?php echo htmlspecialchars($row['product_title']); ?></h2>
                        <p><?php echo htmlspecialchars($row['product_description']); ?></p>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "No products found.";
        }
        ?>
    </section>
</main>

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