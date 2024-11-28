<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/connect.php';

    // Retrieve POST data
    $fname = $_POST["fnames"];
    $lname = $_POST["lnames"];
    $email = $_POST["email"];
    $user_phoneno = $_POST["user_phoneno"];
    $user_address = $_POST["user_address"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check if passwords match
    if ($password != $cpassword) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate email
    $sql_check = "SELECT * FROM users_reg WHERE user_email = ?";
    $stmt_check = $con->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Email is already registered!";
        exit();
    }

    // Insert the new user
    $sql = "INSERT INTO `users_reg` (`user_fname`, `user_lname`, `user_email`, `user_phoneno`, `user_address`, `user_password`) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $fname, $lname, $email, $user_phoneno, $user_address, $hashed_password);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['id'] = $row['user_id'];


        // Set cookies for user information (valid for 30 days)
        setcookie('fname', $fname, time() + (86400 * 30), "/");
        setcookie('lname', $lname, time() + (86400 * 30), "/");

        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
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
        /* Base body styling */
body {
    margin: 0;
    padding: 0;

    transition: transform 0.6s ease-in-out;
}

body.slide-out {
    transform: translateX(-10%);
}

body.slide-in {
    transform: translateX(10%);
}



    </style>
</head>
<body><br><br><br><center>
    <form class="form" method="post">
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p>
            <div class="flex">
            <label>
                <input class="input" type="text" placeholder="" required="" id="fnames" name="fnames">
                <span>Firstname</span>
            </label>
    
            <label>
                <input class="input" type="text" placeholder="" required="" id="lnames" name="lnames">
                <span>Lastname</span>
            </label>
        </div>  
                
        <label>
            <input class="input" type="email" placeholder="" required=""id="email" name="email">
            <span>Email</span>
        </label> 

        <label>
            <input class="input" type="user_phoneno" placeholder="" required=""id="user_phoneno" name="user_phoneno">
            <span>Phone number</span>
        </label>

        <label>
            <input class="input" type="user_address" placeholder="" required=""id="user_address" name="user_address">
            <span>Address</span>
        </label> 
            
        <label>
            <input class="input" type="password" placeholder="" required="" id="password" name="password">
            <span>Password</span>
        </label>

        <label>
            <input class="input" type="password" placeholder="" required="" id="cpassword" name="cpassword">
            <span>Confirm password</span>
        </label>


        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
        
    </form></center>
</body>
</html>