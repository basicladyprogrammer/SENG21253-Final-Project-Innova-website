<!-- connect file -->
<?php
    include 'C:\wamp64\www\innova-computer accessories\connect.php' ;
    //include 'C:\wamp64\www\innova-computer accessories\functions\common_function.php';
    //session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website - Checkout Page</title>
    <!-- Bootstrap css link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
    <!-- font awesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
        <link rel="stylesheet" href="../style.css">
        <style>
            .card-img-top{
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
        </style>
</head>
<body>
    <?php
    //  include '../const/header.php';
     ?>
 
    <!-- navbar -->
    <!-- <div class="container-fluid p-0"> -->
        <!--first child -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> backgroundcolor-blue -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #81ecec;">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            <form class="d-flex" action="../search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
    </div>
</nav> -->
    
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav ma-auto">
            <!-- php code -->
            <?php
                if(!isset($_SESSION['username'])){
                    echo "
                    <li class='nav-item'>
                            <a class='nav-link' href='user_login.php'>Welcome Guest</a>
                    </li>";
                }else{echo "
                    <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Welcome ".$_SESSION['username']."</a>
                    </li>";}
                if(!isset($_SESSION['username'])){
                    echo "
                    <li class='nav-item'>
                            <a class='nav-link' href='user_login.php'>Login</a>
                    </li>";
                }else{echo "
                    <li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                    </li>";}
            ?>
        </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div>

    <!-- fourth child -->
    <div class="row px-1">
          <div class="col-md-12">
            <!-- products -->
            <div class="row">
                <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('payment.php');
                    }
                ?>
            </div>
        </div>
        </div>

    <!-- last child -->
    <!-- include footer -->
    <?php
        // include '../const/footer.php';
    ?>
    </div>

    <!-- bootstrap js link-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
</body>
</html>