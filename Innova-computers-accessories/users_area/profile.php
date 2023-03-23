<!-- connect file -->
<?php
    include("../connect.php");
    include("../functions/common_function.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo$_SESSION['username']?></title>
    <!-- Bootstrap css link-->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous"> -->
    <!-- font awesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="profile.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <style>
            /* .card-img-top{
                width: 100%;
                height: 200px;
                object-fit: contain;
            }
            body{
                overflow-x:hidden;
            }
            .profile_img{
                width: 90%;
                margin:auto;
                display:block:
                object-fit:content;
            }
            .edit_img{
                width:100px;
                height:100px;
                object-fit:content;
            } */
        </style>
</head>
<body>

            <?php include 'header.php'; ?>
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
                    <a class="nav-link" href="profile.php">My Account</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                        <?php 
                            // cart_item(); 
                        ?>
                        </sup>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Total Price: LKR. 
                        <?php
                            // total_cart_price();
                        ?>/=
                    </a>
                    </li>
                </ul>
            <form class="d-flex" action="../search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
    </div>
</nav> -->
    <!-- calling cart fund -->
    <?php
        // cart();
    ?>
    
    <!-- second child -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav ma-auto"> -->
            <!-- php code -->
            <?php
                // if(!isset($_SESSION['username'])){
                //     echo "
                //     <li class='nav-item'>
                //             <a class='nav-link' href='user_login.php'>Welcome Guest</a>
                //     </li>";
                // }else{echo "
                //     <li class='nav-item'>
                //             <a class='nav-link' href='logout.php'>Welcome ".$_SESSION['username']."</a>
                //     </li>";}

                // if(!isset($_SESSION['username'])){
                //     echo "
                //     <li class='nav-item'>
                //             <a class='nav-link' href='user_login.php'>Login</a>
                //     </li>";
                // }else{echo "
                //     <li class='nav-item'>
                //             <a class='nav-link' href='logout.php'>Logout</a>
                //     </li>";}
            ?>
        <!-- </ul>
    </nav> -->

    <!-- third child -->
    <!-- <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div> -->

    <!-- fourt child -->
    <div class="row">
        <div class="profile-menu">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#" ><h4>Your Profile</h4></a>
                </li>
                <?php
                    global $con;
                    $user_name=$_SESSION['username'];
                    $user_image_query="select * from user_table where user_name='$user_name'";
                    $user_image=mysqli_query($con,$user_image_query);
                    $row_image=mysqli_fetch_array($user_image);
                    $user_image=$row_image['user_image'];
                    echo "
                        <li class='nav-item'>
                            <img src='user_images/$user_image' alt='$user_name' class='profile_img my-4'>
                        </li>";
                ?>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="profile.php" >Pending Orders</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="profile.php?edit_account" >Edit Account</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="profile.php?my_orders" >My orders</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="profile.php?delete_account" >Delete Acount</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="logout.php" >Logout</a>
                </li>
            </ul>
        </div>
        <div class="screen">
            <?php
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
            ?>
        </div>
    </div>

    <!-- last child -->
    <!-- include footer -->
    <?php
        //include ('..//footer.php');
    ?>
    </div>

    <!-- bootstrap js link-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>

        
        <?php include '../const/footer.php'; ?>
</body>
</html>