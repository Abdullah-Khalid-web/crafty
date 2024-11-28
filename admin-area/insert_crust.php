<?php
include '../includes/connect.php';
if (isset($_POST['insert-crust'])) {
    $crust_name = mysqli_real_escape_string($con, $_POST['crust_name']);
    $crust_product_name = $_POST['crust_product_name'];
    $crust_price = $_POST['crust_price'];
    // select data from database
    $select_query = "Select * from `crust` where crust_name	 = '$crust_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Error: Could not insert brand bcz it is already exist')</script>";
    } else {
        $insert_query = "INSERT INTO `crust` (crust_name,crust_product_name,crust_price) VALUES ('$crust_name','$crust_product_name','$crust_price')";


        $result1 = mysqli_query($con, $insert_query);

        if ($result1) {
            echo "<script>alert('crust has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert crust')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Crust</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="crust_name" placeholder="Insert Crust" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="crust_price" value=""
            placeholder="Insert price if this Crust price is more than others" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-90 mb-3">
        <select class="form-control" name="crust_product_name" aria-label="Username" aria-describedby="basic-addon1">
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


    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-crust" value="Insert Crust">

    </div>
</form>