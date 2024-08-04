<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafty Crusts</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/crafty/style.css">
</head>

<body>
    <header>
        <div class="left">
            <img src="logo.png" alt="Crafty Crusts">
        </div>
        <div class="right">
            <nav class="navbar">
                <a href="#" class="nav-branding"></a>
                <ul class="nav-menu">
                    <li class="nav-item"><a href="#Home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#Products" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="#About" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#Contact" class="nav-link">ContactUs</a></li>
                    <li class="nav-item"><a href="/login/login.php" class="nav-link bx"><Span>SignIn</Span></a></li>
                    <li class="nav-item"><a href="/login/register.php" class="nav-link bx"><span>SignUp</span></a></li>
                    <li class="nav-item"><a href="ShoppingCart.html" class="nav-link bx"><span>ShoppingCart</span></a></li>
                    <li class="nav-item"> <?php echo "Welcome ". $_SESSION['username']?></li>
                    
                </ul>
        </div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        </nav>
    </header>
    <main>
        <section id="Home">
            <div class="section1">
                <img src="Section11 img1.jpg" alt="">
               
            </div>
        </section>
        <section id="Products" class="boxes Products">
            <a href="pizza1.html">
                <div class="box ZoomIn">
                    <img class="" src="pizza.jpg" alt="Image 1">
                    <h2>Pizza</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>
            <a href="#">
                <div class="box ZoomIn">
                    <img src="burger.jpg" alt="Image 2">
                    <h2>Burger</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>
            <a href="#">
                <div class="box ZoomIn">
                    <img src="Fries.jpg" alt="Image 3">
                    <h2>Fries</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="Sandwich.jpg" alt="Image 4">
                    <h2>Sandwich</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="Shawarma.jpg" alt="Image 5">
                    <h2>Shawarma</h2>
                    <p>Click Here For Order And Customize. According to Yours taste</p>
                </div>
            </a>

            <a href="#">

                <div class="box ZoomIn">
                    <img src="Chicken.jpg" alt="Image 6">
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
    <footer>
        <div class="footer-content">
          <div class="footer-logo ">
            <p>&copy; Crafty Crusts</p>
            <p>Made By SE Mafia</p>
          </div>
          <div class="footer-links">
            <a href="#Home">Home</a>
            <a href="#Pizza">Pizza</a>
            <a href="#Customize">Customize</a>
            <a href="#About">About Us</a>
            <a href="#Contact">Contact</a>
          </div>
          <div class="footer-info">
            <p>Order Fast Food</p>
            <p>Customize your food to your flavor</p>
            <p>123 Main Street</p>
            <p>Your City, Country</p>
            <p>Email: info@craftycrusts.com</p>
          </div>
        </div>
      </footer>



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