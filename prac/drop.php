<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .user-dropdown {
            position: relative; /* Enable positioning of the dropdown content */
            display: inline-block; /* Keep the element inline with others */
          }
          
          .dropdown-icon {
            width: 30px; /* Adjust as needed */
            height: 30px; /* Adjust as needed */
            border-radius: 50%; /* Make it a circle */
            cursor: pointer; /* Indicate interactivity */
          }
          
          .dropdown-content {
            display: none; /* Hide initially */
            position: absolute; /* Position relative to the dropdown icon */
            background-color: #fff; /* Dropdown background color */
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); /* Optional shadow */
            padding: 10px;
            top: 35px; /* Adjust based on icon size and spacing */
            left: 0; /* Align with the icon */
            z-index: 1; /* Ensure it appears above other elements */
          }
          
          .user-dropdown:hover .dropdown-content {
            display: block; /* Show the dropdown content on hover */
          }
          
    </style>
    <title>Document</title>
</head>
<body>
    <div class="user-dropdown">
        <img src="user-icon.png" alt="User Icon" class="dropdown-icon">
        <div class="dropdown-content">
          <?php if (isset($_SESSION['fname']) && isset($_SESSION['lname'])): ?>
            <p><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></p>
            <form action="logout.php" method="post">
              <input type="submit" value="Logout">
            </form>
          <?php endif; ?>
        </div>
      </div>
      
</body>
</html>