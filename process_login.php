<?php
session_start();
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];

        // Redirect to the index or any other page after successful login
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}

?>
