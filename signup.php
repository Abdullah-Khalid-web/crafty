<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'conection.php';
    $fname=$_POST["fnames"];
    $lname=$_POST["lnames"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $exists=false;
    
    if (($password == $cpassword) && !$exists) {
        $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`, `confirmpassword`) VALUES ('$fname', '$lname', '$email', '$password', '$cpassword')";
        
        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION['fname'] = $fname; // Replace $fname with the actual variable holding the first name
            $_SESSION['lname'] = $lname; // Replace $lname with the actual variable holding the last name
        
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signaup.css">
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