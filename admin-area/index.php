<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
        <!-- BootStrap Link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    

        <style>
            *{
                margin: 0;padding: 0;
                box-sizing: border-box;
            }
            .logopic {
            width: 50px;

        }

        .admin-image{
            width: 100px;
            object-fit: contain;
        }
        </style>
</head>
<body>
    <header class="p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <img class="logopic" src="../logo.png" alt="">
                    <nav class="navbar navbar-expand-lg ">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="" class="nav-link">Wellcome Gust</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
    </header>

    <div class="bg-light">
        <h3 class="texr-center p-2">
            Manage Details
        </h3>
    </div>

    <!-- Third Section -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center ">
                <div class="p-3">
                    <a href="#"><img class="admin-image" src="../cat-8198720_640.webp" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="#" class="nav-link text-light bg-info my-1">Insert Product</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Product</a></button>
                    <button><a href="index.php?insert-category" class="nav-link text-light bg-info my-1">Insert Category</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Category</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">INsert Brand</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">View Brand</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">All Payment</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">List User</a></button>
                    <button><a href="#" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>




        <!-- Fourth Child -->
         <div class="container">
            <?php
            if(isset($_GET['insert-category'])){
                include 'insert-category.php';
            }
            ?>
         </div>


    <!-- BootStrap Jc Link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>