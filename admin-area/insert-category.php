<?php
include '../includes/connect.php';
if (isset($_POST['insert-cat'])) {
    $category_title = mysqli_real_escape_string($con, $_POST['cat_title']);

    // select data from database
    $select_query = "Select * from `categories` where category_title = '$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0){
        echo "<script>alert('Error: Could not insert category Becsuse it is already')</script>";
    }
    else{
        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        
        
        $result = mysqli_query($con, $insert_query);
        
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert category')</script>";
        }
    }
}


?>
<h2 class="text-center my-3">Insert Category</h2>
<form class="mb-2" action="" method="post">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-cat" value="Insert Categories">

    </div>
</form>