<?php

$server="localhost";
$username="root";
$password="";
$database="crafty";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con){

    die(mysqli_error($con));
}



?>