<?php
include '../includes/connect.php';
if (isset($_POST['insert-flavour'])) {
    $flavour_name =mysqli_real_escape_string($con, $_POST['flavour_name']);
    $flavour_product_name = $_POST['flavour_product_name'];
    $flavour_price = $_POST['flavour_price'];
    // select data from database
    $select_query = "Select * from `flavour` where flavour_name	 = '$flavour_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Error: Could not insert brand bcz it is already exist')</script>";
    }
    else{
        $insert_query = "INSERT INTO `flavour` (flavour_name,flavour_product_name,flavour_price) VALUES ('$flavour_name','$flavour_product_name','$flavour_price')";
        
        
        $result1 = mysqli_query($con, $insert_query);
        
        if ($result1) {
            echo "<script>alert('flavour has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert flavour')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Flavour</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="flavour_name" placeholder="Insert Flavour" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <!-- <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="flavour_product_name" placeholder="Insert Flavour Product Name" aria-label="Username"
            aria-describedby="basic-addon1">
    </div> -->

    <div class="input-group w-90 mb-3">
        <select class="form-control" name="flavour_product_name" aria-label="Username" aria-describedby="basic-addon1">
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
        <input type="text" class="form-control" name="flavour_price" value="" placeholder="Insert price if this flavour price is more than others" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-flavour" value="Insert flavour" >

    </div>
</form>