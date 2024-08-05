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


</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Product</h1>
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">
    <!-- title -->
         <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-title" class="form-label">Product-title</label>
                <input type="text" name="product-title" id="product-title" class="form-control" placeholder="Enter product-title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Description" class="form-label">Product-Description</label>
                <input type="text" name="Description" id="Description" class="form-control" placeholder="Enter product Description" autocomplete="off" required="required">
            </div>
            
            <!-- KeyWords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="KeyWords" class="form-label">Product KeyWords</label>
                <input type="text" name="KeyWords" id="KeyWords" class="form-control" placeholder="Enter product KeyWords" autocomplete="off" required="required">
            </div>
            
            <!-- category -->
            <div class="form-outline mb-4 w-50 m-auto">
            <select name="product-category" class="form-select" id="product-category" class="product-category">
                <option value="">Select a category</option>
                <option value="">Pizza</option>
                <option value="">burger</option>

            </select>       
        </div>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
            <select name="product-Brands" class="form-select" id="product-Brands" class="product-category">
                <option value="">Select a Brands</option>
                <option value="">Pizza</option>
                <option value="">burger</option>

            </select>       
        </div>
            

                    <!-- Image 1 -->
                    <div class="form-outline mb-4 w-50 m-auto">
                <label for="Image1" class="form-label">Product Image 1</label>
                <input type="file" name="Imag1" id="Image1" class="form-control" autocomplete="off" required="required">
            </div>
                    <!-- Image 2 -->
                    <div class="form-outline mb-4 w-50 m-auto">
                <label for="Image2" class="form-label">Product Image 2</label>
                <input type="file" name="Imag2" id="Image2" class="form-control" autocomplete="off" required="required">
            </div>
                    <!-- Image 3 -->
                    <div class="form-outline mb-4 w-50 m-auto">
                <label for="Image3" class="form-label">Product Image 3</label>
                <input type="file" name="Imag3" id="Image3" class="form-control" autocomplete="off" required="required">
            </div>

         </form>
    </div>
    
</body>
</html>