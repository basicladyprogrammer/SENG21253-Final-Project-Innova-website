<?php
    include 'connect.php';
    include 'functions/common_function.php';
?>
<html>
    <head>
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/header.js"></script>
    <script src="js\product_details.js"></script>
    <link href="css/product_details.css" rel="stylesheet" type="text/css">
    
    </head>

    <body>
     <?php include 'const/header.php'; ?> 

            
     <div class="product-container">
    <!-- fourth child -->
    <!-- <div class="row px-1">
          <div class="col-md-10"> -->
        <!-- <div class="product-card">
            <div class="product-info"> -->
            <!-- products -->
            <!-- <div class="row"> -->
            <!--fetching products-->
            <?php
            //calling function
            view_details();
            search_product();
            // $ip = getIPAddress();  
            // echo 'User Real IP Address - '.$ip; 
            ?>
              
              <!--row end-->
            <!-- </div> -->
            <!--col end-->
          <!-- </div> -->
        </div>




     <?php include 'const/footer.php'; ?> 
    
    </body>
</html>