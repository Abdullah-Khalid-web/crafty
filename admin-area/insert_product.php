<?php
include '../includes/connect.php';
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product-title'];
    $product_description = $_POST['Description'];
    $product_status = 'true';
    $product_Image = $_FILES['Image']['name'];
    $temp_Image = $_FILES['Image']['tmp_name'];

    if (empty($product_title) || empty($product_description) || empty($product_Image)) {
        echo "<script>alert('Please fill all the fields')</script>";
    } else {
        // Check if product title already exists
        $check_product_query = "SELECT * FROM `products` WHERE product_title = '$product_title'";
        $result = mysqli_query($con, $check_product_query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Product title already exists. Please choose a different name.')</script>";
        } else {
            // Move uploaded files
            move_uploaded_file($temp_Image, "./product_images/$product_Image");

            // Insert query for products
            $insert_product = "INSERT INTO `products` (product_title, product_description, product_image, product_status) 
                            VALUES ('$product_title', '$product_description', '$product_Image', '$product_status')";

            // Execute the query and check for errors
            if (mysqli_query($con, $insert_product)) {
                echo "<script>alert('Product has been inserted successfully')</script>";
            } else {
                die("Error inserting product: " . mysqli_error($con));
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
    <!-- BootStrap Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <style>
        .red {
            color: red;
        }
    </style>

</head>

<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Product </h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-title" class="form-label">Product-title<span class="red">*</span></label>
                <input type="text" name="product-title" id="product-title" class="form-control"
                    placeholder="Enter product-title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Description" class="form-label">Product-Description<span class="red">*</span></label>
                <input type="text" name="Description" id="Description" class="form-control"
                    placeholder="Enter product Description" autocomplete="off" required="required">
            </div>




            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Image" class="form-label">Product Image 1<span class="red">*</span> </label>
                <input type="file" name="Image" id="Image" class="form-control" autocomplete="off"
                    required="required">
            </div>

            <button type="submit" name="insert_product" class="btn btn-primary">Insert Product</button>
        </form>
    </div >

</body >

</html >






            <!-- category -->
            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-category[]" class="form-label">Product-Flavour<span class="red">*</span></label>
                <?php
                // $select_categories = "Select * from `categories`";
                // $result_categories = mysqli_query($con, $select_categories);

                // while ($row_data = mysqli_fetch_assoc($result_categories)) {
                //     $categories_title = $row_data['category_title'];
                //     $categories_id = $row_data['category_id'];
                //     echo "<div class='form-check'>";
                //     echo "<input class='form-check-input' type='checkbox' name='product-category[]' id='category-$categories_id' value='$categories_id'>";
                //     echo "<label class='form-check-label' for='category-$categories_id'>$categories_title</label>";
                //     echo "</div>";
                // }
                ?>
            </div> -->

