
<?php
session_start();
include 'includes/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user from the database
    $sql = "SELECT * FROM users_reg WHERE user_email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    echo  $password;

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['user_password'])) {
            // Set session variables
            $_SESSION['fname'] = $row['user_fname'];
            $_SESSION['lname'] = $row['user_lname'];
            $_SESSION['id'] = $row['user_id'];

            // Optionally set cookies (not recommended for sensitive information)
            setcookie('fname', $row['user_fname'], time() + (86400 * 30), "/");
            setcookie('lname', $row['user_lname'], time() + (86400 * 30), "/");

            // Redirect to the index or another page
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $con->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signaup.css">

    <style>
    :root {
  --primary-color: rgba(255, 84, 5, 1);
  --secondary-color: #1a5f6b;
}


/* Base body styling */
body {
    margin: 0;
    padding: 0;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
}

/* Sliding animations */
body.slide-out {
    transform: translateX(-100%);
}

body.slide-in {
    transform: translateX(100%);
}




</style>


</head>
<body><br><br><br><center>
    <form class="form" method="post">
        <p class="title">login </p>
        <p class="message">Wellcome Sir/Ma'am! I hope you like and never forget your taste</p>
     
        <label>
            <input class="input" type="email" placeholder="" required=""id="email" name="email">
            <span>Email</span>
        </label> 
            
        <label>
            <input class="input" type="password" placeholder="" required="" id="password" name="password">
            <span>Password</span>
        </label>
        <button class="submit">Log IN</button>
        <p class="signin">I dont have an Acount <a href="signup.php">Register</a> </p>

    </form></center>
</body>

<script>
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent immediate navigation
            const targetUrl = this.href;

            // Add slide-out class for the current page
            document.body.classList.add('slide-out');

            // Navigate to the new page after the animation
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 200); // Match the CSS transition duration
        });
    });

    // Add a slide-in effect when the new page loads
    window.addEventListener('load', () => {
        document.body.classList.add('slide-in');
        setTimeout(() => {
            document.body.classList.remove('slide-in');
        }, 200); // Clear the animation class after the transition
    });
</script>


</html>