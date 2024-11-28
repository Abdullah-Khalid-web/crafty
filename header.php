<?php
include 'includes/connect.php';
?>

<?php
session_start(); // Start the session to access session variables

// Check if session variables exist
if (isset($_SESSION['fname']) && isset($_SESSION['lname'])) {
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  // Display the user information
} else {

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

    :root {
      --primary-color: rgba(255, 84, 5, 1);
      --secondary-color: #1a5f6b;
    }

    body {
      display: flex;
      flex-wrap: wrap;
      font-family: 'Poppins', sans-serif;
      font-family: 'Lato', sans-serif;
    }

    header {
      background-color: var(--primary-color);
      color: white;
      height: 60px;
      display: flex;
      width: 100%;
      justify-content: space-between;
      padding: 0 15px;
      /* position: fixed; */
      display: flex;
      text-align: center;
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
      padding: 10px 0;
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
      border-radius: 3px;
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
      background-color: var(--primary-color);
      padding: 12px 5px;
      border-radius: 3px;
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








    /* main body Index page */
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
      padding: 12px;
      margin: 5px;
      border: 1px solid #ccc;
      display: flex;
      flex: 1;
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










    footer {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 0 3px;
      margin-top: 10px;
      background-color: var(--primary-color);
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




































    /* Product detail page */
    .Customize-Body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }


    .Customize-Main {
      padding: 50px;
      margin-top: 25px;
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



    /* General Styles for Size Section */
    .size-section {
      margin: 20px 0;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #f9f9f9;
      text-align: center;
    }

    .size-section h4 {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    /* Dropdown Styles */
    .size-section select {
      width: 80%;
      padding: 10px;
      font-size: 16px;
      color: #333;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      appearance: none;
      /* Removes default styling for better customization */
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .size-section select:focus {
      border-color: #007bff;
      /* Highlight border on focus */
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
      /* Light blue glow on focus */
    }

    /* Optional: Add a downward arrow icon */
    .size-section select {
      background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" fill="%23333" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 12px;
    }

    /* Optional: Adjust dropdown options */
    .size-section select option {
      padding: 10px;
      font-size: 16px;
      color: #333;
    }




    /* General Styles for Topping Section */
.size-section {
  margin: 20px 0;
  padding: 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
  text-align: center;
}

.size-section h4 {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-bottom: 15px;
}

/* Styles for Topping List */
.size-section {
  margin: 20px 0;
  padding: 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
  text-align: center;
}

.size-section h4 {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-bottom: 15px;
}

/* Styles for Topping List */
.size-section ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 10px; 
}

.size-section li {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  font-size: 14px;
  color: black;
  padding: 5px;
  border-radius: 4px;
  transition: background-color 0.2s ease;
}

.size-section li:hover {
  color: black;
  background-color: #f0f0f0;
}

.size-section label {
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px; /* Space between checkbox and text */
}
.size-section label input{
  
}
.topping-checkbox {
  color: black;
  transform: scale(1.2); /* Slightly enlarge the checkbox */
}





    /* cart of the product detail page */

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







    /* Add to cart button of the product detail page */

    #addToCartButton {
      position: relative;
      overflow: hidden;
      outline: none;
      cursor: pointer;
      border-radius: 5px;
      background-color: hsl(31, 100%, 53%);
      border: solid 3px hsl(50deg 100% 50%);
      font-family: inherit;
      margin: 10px;
    }

    .default-btn,
    .hover-btn {
      background-color: var(--primary-color);
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 10px 6px;
      border-radius: 5px;
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


    /* Order Button of the Product detail page */

    .order-button {
      height: 2.8em;
      width: 9em;
      background: transparent;
      -webkit-animation: jello-horizontal 0.9s both;
      animation: jello-horizontal 0.9s both;
      border: 2px solid var(--primary-color);
      outline: none;
      color: var(--primary-color);
      cursor: pointer;
      font-size: 17px;
      margin: 10px;
    }

    .order-button:hover {
      background: var(--primary-color);
      color: #ffffff;
      animation: squeeze3124 0.9s both;
    }

    @keyframes squeeze3124 {
      0% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
      }

      30% {
        -webkit-transform: scale3d(1.25, 0.75, 1);
        transform: scale3d(1.25, 0.75, 1);
      }

      40% {
        -webkit-transform: scale3d(0.75, 1.25, 1);
        transform: scale3d(0.75, 1.25, 1);
      }

      50% {
        -webkit-transform: scale3d(1.15, 0.85, 1);
        transform: scale3d(1.15, 0.85, 1);
      }

      65% {
        -webkit-transform: scale3d(0.95, 1.05, 1);
        transform: scale3d(0.95, 1.05, 1);
      }

      75% {
        -webkit-transform: scale3d(1.05, 0.95, 1);
        transform: scale3d(1.05, 0.95, 1);
      }

      100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
      }
    }






    /* Order Popup */
    .popup {
    height: auto; /* Allows content to dictate height */
    max-height: 90vh; /* Limits height for better usability */
    background-color: var(--primary-color); /* Overlay color for focus */
    width: 90%; /* Full width on small screens */
    max-width: 600px; /* Limit the width on larger screens */
    position: fixed; /* Fixed positioning for modal behavior */
    top: 50%; /* Center vertically */
    left: 50%; /* Center horizontally */
    transform: translate(-50%, -50%);
    display: none; /* Hidden by default */
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Ensure it appears above other elements */
    padding: 3px;
    border-radius: 10px;
    box-shadow: 0 4px 25px var(--primary-color); /* Add subtle shadow */
    overflow: hidden; /* Prevent overflow issues */
}

.popup-content {
    background-color: #fff; /* White background for content */
    padding: 20px;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for content */
    width: 100%; /* Ensure it fits within the popup */
    max-height: 85vh; /* Allow scrolling for overflow content */
    overflow-y: auto; /* Add vertical scrolling for long content */
}

.close-img {
    position: absolute;
    top: 10px; /* Adjusted for better spacing */
    right: 10px;
    cursor: pointer;
    background-color: var(--primary-color);
    border-radius: 50%; /* Make it a circle */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Shadow for button */
    width: 30px;
    height: 30px; /* Ensures it remains circular */
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth interactions */
}

.close-img:hover {
    background-color: var(--primary-hover-color); /* Slightly lighter/darker shade on hover */
    transform: scale(1.1); /* Subtle zoom effect on hover */
}

.close-img img {
    width: 60%; /* Size of the close icon inside */
    height: auto;
    pointer-events: none; /* Prevent accidental clicks on the image itself */
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
          <li class="nav-item"><a href="contactus.php" class="nav-link">ContactUs</a></li>

          <?php
           if (isset($_SESSION['fname']) && isset($_SESSION['lname'])): ?>
            <li class="nav-item">
              <?php echo  '<li class="nav-item"><a href="user_profile.php" class="nav-link"> '.$_SESSION["fname"] . ' ' . $_SESSION["lname"].' </a></li>' ; ?>
            </li>
            <li class="nav-item">
              <a href="cart.php" class="nav-link bx"><span>ShoppingCart</span></a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link bx"><span>logout</span></a>
            </li>
            <!-- <li>
              <form action="logout.php" method="post" style="display: inline;">
                <input type="submit" class="nav-link bx" value="Logout">
              </form>
            </li> -->
          <?php else: ?>
            <?php  //echo $_SESSION["fname"] . ' ' . $_SESSION["lname"]; ?>
            <li class="nav-item">
              <a href="login.php" class="nav-link bx"><span>SignIn</span></a>
            </li>
            <li class="nav-item">
              <a href="signup.php" class="nav-link bx"><span>SignUp</span></a>
            </li>
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