<?php
include '../includes/connect.php';
if (isset($_POST['insert-brand'])) {
    $brand_title =mysqli_real_escape_string($con, $_POST['brand_title']);

    // select data from database
    $select_query = "Select * from `brands` where brands_title	 = '$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Error: Could not insert brand bcz it is already exist')</script>";
    }
    else{
        $insert_query = "INSERT INTO `brands` (brands_title) VALUES ('$brand_title')";
        
        
        $result1 = mysqli_query($con, $insert_query);
        
        if ($result1) {
            echo "<script>alert('brand has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert brand')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Brands</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-brand" value="Insert Brands" >

    </div>
</form>