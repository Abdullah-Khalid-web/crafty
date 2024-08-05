<?php 
  include 'includes/connect.php';
?>

<?php
session_start(); // Start the session to access session variables

// Check if session variables exist
if (isset($_SESSION['fname']) && isset($_SESSION['lname']))
{
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    // Display the user information
}
else
{

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
    <link rel="stylesheet" href="style.css">
    
     <!-- BootStrap Link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">


    <style>
        * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

body {
  display: flex;
  flex-wrap: wrap;
  font-family: 'Lato', sans-serif;
  font-family: 'Poppins', sans-serif;
}

header {
  background-color: rgba(255, 84, 5, 0.626);
  color: white;
  height: 60px;
  display: flex;
  width: 100%;
  justify-content: space-between;
  padding: 0 15px;
  position: fixed;
  display: flex;
  align-items: center;
  z-index: 10;
}

header .left img {
  height: 56px;
  padding: 2px;
  align-items: center;

}

header .right {
  display: flex;
  align-items: center;
  min-width: 100px;

}

header .right ul {
  display: flex;
  flex-wrap: wrap;
  text-decoration: none;

}

.right ul li {
  padding:  10px 0;
  text-decoration: none;
  list-style: none;
  position: relative;
  overflow: hidden;
}

.right ul li a {
  position: relative;
  text-decoration: none;
  color: white;
  font-size: 1.2rem;
  font-weight: bold;
}

.right li a:after {
  content: "";
  position: absolute;
  background-color: rgb(0, 0, 0);
  height: 3px;
  width: 0;
  left: 0;
  bottom: -5px;
  transition: 0.3s;
}

.right li a:hover:after {
  width: 100%;
}

.right li a:hover {
  color: rgb(70, 67, 67);
  font-size: 1.15rem;
  transition: 0.3s;
  align-items: center;
  justify-content: center;
  
}
.right li a:active {
  font-size: 1.2rem;

}







.navbar {
  min-height: 70px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 12px;

}

.nav-menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
}

.nav-branding {
  font-size: 2rem;

}

.nav-link {
  transition: 0.7sec ease;

}

.hamburger {
  display: none;
  cursor: pointer;
}

.bar {
  display: block;
  width: 25px;
  height: 3px;
  margin: 5px auto;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  background-color: white;
}

@media(max-width : 1000px) {
  .hamburger {
    display: block;
    justify-content: center;
    align-items: center;
  }

  .hamburger.active .bar:nth-child(2) {
    opacity: 0;
  }

  .hamburger.active .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
  }

  .hamburger.active .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
  }

  .nav-menu {

    position: fixed;
    left: -100%;
    top: 70px;
    gap: 0;
    flex-direction: column;
    background-color: #1f1e1e;
    width: 100%;
    height: 90%;
    text-align: center;
    transition: 0.3s;
    opacity: 0.8;
  }

  .nav-item {
    margin: 6px 0;
  }

  .nav-menu.active {
    left: 0;
  }
}


.right li .bx {
  align-items: center;
  background-image: linear-gradient(144deg, #f5ff40, #eb6e00);
  border: 0;
  border-radius: 18px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: sans-serif;
  font-size: 1.1rem;
  justify-content: center;
  line-height: 0.3em;
  max-width: 100%;
  min-width: 140px;
  padding: 3px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
  transition: all .2s;

}

.right li .bx:active,
.right li .bx:hover {
  outline: 0;
  font-size: 1.05rem;
}

.bx span {
  background-color: rgb(255, 84, 5);
  padding: 12px 5px;
  border-radius: 16px;
  width: 100%;
  height: 100%;
  transition: .2s;
  text-align: center;
}

.bx:hover span {
  background: none;
}

.bx:active {
  transform: scale(0.9);
}

.right li .bx:after {
  content: "";
  position: absolute;
  background-color: rgb(180, 40, 40);
  height: 0px;
  width: 0;
  left: 0;
  bottom: 0px;
  transition: 0.3s;
}








/* main body */
.section1 img {
  width: 100%;
}



.boxes {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin: auto;
  justify-content: center;

}

.boxes .box {
  width: 300px;
  padding: 20px;
  margin: 20px;
  border: 1px solid #ccc;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.boxes .box:hover {
  box-shadow: 0px 0px 8px black;
  transition: 0.5s;
}

.boxes .box img {
  max-width: 100%;
  height: auto;
}

.boxes .box h2 {
  margin: 10px 0;
  color: black;
}

.boxes .box p {
  color: #666;
}

.boxes a {
  text-decoration: none;
  margin: 10px;

}

.ZoomIn {
  width: 100%;
  height: 100%;
  transition: transform 0.3s, filter 0.3s;
}

.ZoomIn:hover {
  transform: scale(0.95);
  filter: brightness(1.3);
}
.ZoomIn:active {
  transform: scale(0.9); 
  filter: brightness(1.4); 
  border: 2px solid #ff5733;
}


/* contact form */

.contact-form {
  align-items: center;
  justify-content: center;
  max-width: 1000px;
  margin: 20px 20px;
  margin: 20px auto;
  padding: 20px;
  background-color: #ff5405de;
  border: 2px solid rgb(255, 5, 5);
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.contact-form .orange {
  color: #ffff;
}

.contact-form form .ff{
  display: flex;
   flex-wrap: wrap;
  margin: auto;
  align-items: center;
  justify-content: center;


}
.ff input{
  flex-wrap: wrap;
  box-sizing: border-box;
}
.form-group {
  flex: 1; /* This makes the input fields take up equal width */
  padding: 10px;
  margin: 5px;
  display: flex;
  margin: 20px 0;
  text-align: left;
  min-width: 100px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 6px;
  color: #fff;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 12px;
  border: 2px solid rgb(255, 84, 5);
  border-radius: 6px;
  background-color: #fff;
  color: #0d0d0d;
  transition: border-color 0.3s, background-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
  border-color: rgb(255, 84, 5);
  background-color: #fff;
}




input[type="submit"] {
  position: relative;
  padding: 10px 20px;
  border-radius: 7px;
  border: 1px solid rgb(61, 106, 255);
  font-size: 14px;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 2px;
  background: transparent;
  color: #ff5733;
  background-color: white;
  overflow: hidden;
  box-shadow: 0 0 0 0 transparent;
  -webkit-transition: all 0.2s ease-in;
  -moz-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}

input[type="submit"]:hover {
  background: rgb(53, 51, 51);
  box-shadow: 0 0 30px 5px rgb(43, 43, 38);
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  color: white;
}

input[type="submit"]:hover::before {
  -webkit-animation: sh02 0.5s 0s linear;
  -moz-animation: sh02 0.5s 0s linear;
  animation: sh02 0.5s 0s linear;
}

input[type="submit"]::before {
  content: '';
  display: block;
  width: 0px;
  height: 86%;
  position: absolute;
  top: 7%;
  left: 0%;
  opacity: 0;
  background: #fff;
  box-shadow: 0 0 50px 30px #fff;
  -webkit-transform: skewX(-20deg);
  -moz-transform: skewX(-20deg);
  -ms-transform: skewX(-20deg);
  -o-transform: skewX(-20deg);
  transform: skewX(-20deg);
}

@keyframes sh02 {
  from {
    opacity: 0;
    left: 0%;
  }

  50% {
    opacity: 1;
  }

  to {
    opacity: 0;
    left: 100%;
  }
}

input[type="submit"]:active {
  box-shadow: 0 0 0 0 transparent;
  -webkit-transition: box-shadow 0.2s ease-in;
  -moz-transition: box-shadow 0.2s ease-in;
  transition: box-shadow 0.2s ease-in;
}









footer {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 0 3px;
  margin-top: 10px;
  background-color: rgb(255, 84, 5);
  color: #ffffff;
  text-align: center;
  width: 100%;
  flex-wrap: wrap;
}

.footer-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  align-items: center;
}

.footer-logo {
  font-size: 24px;
  font-weight: bold;
  flex: 1;
}

.footer-links {
  flex: 1;
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  text-align: center;
}

.footer-links a {
  color: #ffffff;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-links a:hover {
  color: black;
}

.footer-info {
  flex: 1;
}

.footer-info p {
  margin: 5px 0;
}

/* Responsiveness for smaller screens */
@media (max-width: 768px) {
  footer {
    padding: 15px 10px;
  }

  .footer-logo {
    font-size: 18px;
  }

  .footer-links a {
    font-size: 14px;
  }

  .footer-info p {
    margin: 3px 0;
  }
}

/* Responsiveness for even smaller screens */
@media (max-width: 480px) {
  footer {
    flex-direction: column;
    align-items: center;
  }

  .footer-content {
    flex-direction: column;
  }

  .footer-info {
    margin-top: 15px;
  }
}




































/* Pizza Page */
.Customize-Body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f5f5f5;
}


.Customize-Main {
  padding: 50px;
  margin-top: 50px;
}

#pizza-builder {
  display: flex;
  justify-content: space-between;
}

@media (max-width: 800px) {
  #pizza-builder {
      display: block;
      justify-content: space-between;
  }
}

.image-container {
  flex: 1;
  text-align: center;

}

.image-container img {
  width: 100%;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  height: 100%;
}

.options-container {
  flex: 1;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

h3 {
  font-size: 20px;
  margin-bottom: 20px;
}

.size-section,
.flavour-section,
.toppings-section,
.crust-section {
  margin-bottom: 20px;
}

.size-section ul,
.flavour-section ul,
.toppings-section ul,
.crust-section ul {
  list-style: none;
  padding: 0;
}

.size-section li,
.flavour-section li,
.toppings-section li,
.crust-section li {
  margin-bottom: 5px;
}

.size-section button,
.flavour-section button,
.toppings-section button,
.crust-section button {
  display: block;
  padding: 10px 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: #fff;
  color: #333;
  cursor: pointer;
  width: 100%;
  margin: 5px;
  transition: all 0.2s ease-in-out;
}

.size-section button:hover,
.flavour-section button:hover,
.toppings-section button:hover,
.crust-section button:hover {
  background-color: #ff5405;
  color: white;
  transition: 0.3s;
}

.size-section button.active,
.flavour-section button.active,
.toppings-section button.active,
.crust-section button.active {
  background-color: #ddd;
}




#cart {
  margin-top: 50px;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

#cart h3 {
  margin-bottom: 10px;
}

#cart-items {
  margin: 0;
  padding: 0;
  list-style: none;
}

#cart-items li {
  margin-bottom: 5px;
  font-weight: bold;
  margin: 5px;
}

#cart-total {
  margin-top: 20px;
  font-weight: bold;
}

#clear {
  display: block;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  background-color: #333;
  color: #fff;
  cursor: pointer;
  margin-top: 20px;
}







#addToCartButton {
  position: relative;
  overflow: hidden;
  outline: none;
  cursor: pointer;
  border-radius: 50px;
  background-color: hsl(31, 100%, 53%);
  border: solid 4px hsl(50deg 100% 50%);
  font-family: inherit;
  margin: 10px -5px;
}

.default-btn,
.hover-btn {
  background-color: hsl(31, 100%, 53%);
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 12px 11px;
  border-radius: 50px;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  transition: all .3s ease;
}

.hover-btn {
  position: absolute;
  inset: 0;
  background-color: #ff5405;
  transform: translate(0%, 100%);
}

.default-btn span {
  color: hsl(0, 0%, 100%);
}

.hover-btn span {
  color: hsl(50deg 100% 50%);
}

#addToCartButton:hover .default-btn {
  transform: translate(0%, -100%);
}

#addToCartButton:hover .hover-btn {
  transform: translate(0%, 0%);
}








#item-quantity {
  font-family: Arial, sans-serif;
  font-size: 16px;
  margin-bottom: 10px;
}

#item-quantity input {
  width: 50px;
  padding: 5px;
  font-size: inherit;
  border: 1px solid #ccc;
  border-radius: 10px;
  text-align: center;
}

#Final-Price,
#cart-list {
  margin-top: 50px;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

#Final-Price li,
#cart-list li {
  margin-bottom: 5px;
  font-weight: bold;
  margin: 10px;
  border: 1px lightgray solid;
  border-radius: 10px;
  padding: 20px;
  list-style: none;
}
    </style>
</head>

<body>
    <header>
        <div class="left">
          <a href="index.php">
            <img src="images/logo.png" alt="Crafty Crusts">

          </a>
        </div>
        <div class="right">
            <nav class="navbar">
                <a href="#" class="nav-branding"></a>
                <ul class="nav-menu">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="index.php#Products" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="#About" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="index.php#Contact" class="nav-link">ContactUs</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link bx"><span>SignIn</span></a></li>
                <li class="nav-item"><a href="signup.php" class="nav-link bx"><span>SignUp</span></a></li>
                    <li class="nav-item"><a href="ShoppingCart.html" class="nav-link bx"><span>ShoppingCart</span></a></li>
                    <?php if (isset($_SESSION['fname']) && isset($_SESSION['lname'])): ?>
                             <li><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['fname']) && isset($_SESSION['lname'])): ?>
            <form action="logout.php" method="post">
                <input  type="submit" class="nav-link bx" value="Logout">
            </form>
        <?php endif; ?>
                </ul>
        </div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        </nav>
    </header>