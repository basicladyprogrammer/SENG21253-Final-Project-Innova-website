<!--connect file-->

<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "innova_store";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error."<br>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- Bootstrap css link-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous"> -->
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin_css/form.css">
    <!--css file-->
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="header/header.css">
    <link rel="stylesheet" href="footer/foot.css">
    <style>
        body {
            margin:0;
            padding:0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
        }
        .admin_image{
            width: 100px;
            object-fit: contain;
        }

        /* .footer{
            position: absolute;
            bottom: 0;
        } */

        .product_image{
            width: 100px;
            object-fit:contain;
        }
        .view-button {
            background-color: #4FC3A1;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
}


    </style>
</head>
<body>
<?php include 'header/header.php'?>
    <!--navbar-->
    <!-- <div class="container-fluid p-0"> -->
        <!--first child-->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <u class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </u>
                </nav>
            </div>
        </nav> -->

        <!--second child-->
        <!-- <div class="bg-light">
            <h3 class="text-center p-2">Manage details</h3>
        </div> -->

        <!-- third child -->
        <!-- <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/admin-profile.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>

                </div> -->
                <!-- <div class="button text-center"> -->
                    <!--button*10>a.nv-link.text-light.bg-info.my-1-->
                    <!-- <button class="mx-3 my-3">
                        <a href="insert_product.php" class="nav-link">Insert Products</a>
                    </button>
                    <button class="mx-3">
                        <a href="index.php?view_products" class="nav-link">View Products</a>
                    </button>
                    <button class="mx-3">
                        <a href="index.php?insert_category" class="nav-link">Insert Categories</a>
                    </button>
                    <button class="mx-3">
                        <a href="" class="nav-link">View Categories</a>
                    </button>
                    <button class="mx-3">
                        <a href="" class="nav-link">All orders</a>
                    </button>
                    <button class="mx-3">
                        <a href="" class="nav-link">All Payments</a>
                    </button>
                    <button class="mx-3">
                        <a href="" class="nav-link">List users</a>
                    </button>
                    <button class="mx-3">
                        <a href="" class="nav-link">Logout</a>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- fourth child-->
        <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['update_products'])){
                include('update_products.php');
            }
            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if(isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brands.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payments'])){
                include('delete_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }
            ?>
        </div>
        <!--last child -->
        <!--include footer-->
        
    </div>


    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <?php
//       include 'footer/footer.php'  
       ?>
</body>
</html>