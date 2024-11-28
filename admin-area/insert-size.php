<?php
include '../includes/connect.php';
if (isset($_POST['insert-size'])) {
    $size_name = mysqli_real_escape_string($con, $_POST['size_name']);
    $size_product_name = mysqli_real_escape_string($con, $_POST['size_product_name']);
    $size_price = $_POST['size_price'];

    // select data from database
    $select_query = "Select * from `size` where size_name = '$size_name' AND size_product_name = '$size_product_name' ";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Error: Could not insert size Becsuse it is already')</script>";
    }
    else{
        $insert_query = "INSERT INTO `size` (size_name,size_product_name,size_price) VALUES ('$size_name','$size_product_name','$size_price')";
        
        
        $result = mysqli_query($con, $insert_query);
        
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert category')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Size of Product</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="size_name" placeholder="Insert Size" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    
    <div class="input-group w-90 mb-3">
        <select class="form-control" name="size_product_name" aria-label="Username" aria-describedby="basic-addon1">
            <?php
                echo 'asdasd';
                $sql = 'SELECT * from `products`';
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    die("Query failed: " . mysqli_error($con));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        print_r($row);
                        echo "<option value='".$row['product_title']."'>".$row['product_title']."</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="size_price" placeholder="Enter the Price of size" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-size" value="Insert Size">

    </div>
</form>