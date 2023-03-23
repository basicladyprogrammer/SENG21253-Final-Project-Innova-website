<!-- connect file -->
<?php
    include 'connect.php';
    include 'functions/common_function.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innova product-Cart </title>
    
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/header.js"></script>
    
    <link href="css/cart.css" rel="stylesheet" type="text/css">
    
        
        <style>
            .cart_img{
                width: 80px;
                height: 80px;
                object-fit: contain;
            }
            .table-button {
                background-color: #4FC3A1;
                border: none;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;  
                border-radius: 10px;
            }
            .table-button:hover {
                background-color: #249976;  
            }
            .checkout-btn{
                
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                
            }
            


        </style>
</head>
<body>
    <!-- navbar -->
        <?php include 'const/header.php'; ?> 

    <!-- third child -->
    <div class="bg-light">
        <!-- <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p> -->
    </div>

    <!-- fourth child -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">

                    <!-- php code to display dynamic data -->
                    <?php
                        $get_ip_address = getIPAddress(); 
                        $total_price=0; 
                        $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "
                            <h2>Responsive Table</h2>
                             <div class='table-wrapper'>
                             <table class='fl-table'>
                              <thead>
                                <tr>
                                    <th>Product_name</th>
                                    <th>product_image</th>
                                    <th>quantity</th>
                                    <th>total price</th>
                                    <th>remove</th>
                                    <th colspan='2'>operations</th>
                                </tr>
                            </thead>
                            <tbody>";

                        while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products="select * from products where product_id='$product_id'";
                        $result_products=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $product_price=array($row_product_price['product_price']);
                            $product_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];
                            $product_values=array_sum($product_price);
                            $total_price+=$product_values;
                        
                    ?>
                    <tr>
                        <td><?php echo $product_title?></td>
                        <td><img src="admin_area/upload_images/<?php echo$product_image1 ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>

                        <!-- php code for update -->
                        <?php
                            $get_ip_address = getIPAddress(); 
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total_price=$total_price*$quantities;
                            }
                        ?>

                        <td>LKR. <?php echo $product_table?>/=</td>
                        <td><input type="checkbox" name="removeitem[]" value="
                            <?php 
                                echo $product_id
                            ?>">
                        </td>
                        <td>
                            <!-- <button class="bg-info border-0 px-3 py-2 mx-3">Update</button> -->
                            <input type="submit" value="Update Cart" class="table-button" name="update_cart">
                        </td>
                        <td>
                            <!-- <button class="bg-info border-0 px-3 py-2 mx-3">Remove</button> -->
                            <input type="submit" value="Remove Cart" class="table-button" name="remove_cart">
                        </td>
                    </tr>

                    <?php
                        }}}else{
                              echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                          }
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-5">
            <?php 
                $get_ip_address = getIPAddress(); 
                $cart_query="select * from cart_details where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                    echo "<h4 class='total'>Subtotal: Rs.<strong class='text-info'>$total_price</strong>/=</h4>
                    <input type='submit' value='Continue Shopping' class='table-button' name='continue_shopping'>
                    <button class='table-button'><a href='users_area/checkout.php' class='checkout-btn'>Checkout</a></button>";
                  } else{
                    echo "<input type='submit' value='Continue Shopping' class='table-button' name='continue_shopping'>";
                  }
                  if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                  }
                ?>
            </div>
        </div>
    </div>
    </form>
    
    <!-- remove item function -->
    <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem']as $remove_id){
                    echo $remove_id;
                    $delete_query="Delete from cart_details where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();
    ?>

    <!-- last child -->
    <!-- include footer -->
    <?php
        include 'const/footer.php';;
    ?>
    </div>

    <!-- bootstrap js link-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
</body>
</html>