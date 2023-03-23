<!-- connect file -->
<?php
    include("../connect.php");
    include("../functions/common_function.php");
    //session_start();

    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }

    //-- getting total items and total price of all items
    global $con;
    $get_ip_address=getIPAddress();
    $total_price=0;
    $cart_query_price="Select * from cart_details where ip_address='$get_ip_address'";
    $result_cart_price=mysqli_query($con,$cart_query_price);
    $invoice_number=mt_rand();
    $status='pending';
    $count_product = mysqli_num_rows($result_cart_price);
    while($row_price=mysqli_fetch_array($result_cart_price)){
        $product_id=$row_price['product_id'];
        $select_products="select * from products where product_id='$product_id'";
        $run_price=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($run_price)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }

    //-- getting quantity form cart
    $get_cart="select * from cart_details";
    $run_cart=mysqli_query($con,$get_cart);
    $get_item_quantity=mysqli_fetch_array($run_cart);
    $quantity=$get_item_quantity['quantity'];
    if($quantity==0){
        $quantity=1;
        $subtotal=$total_price;
    }else{
        $quantity=$quantity;
        $subtotal=$total_price*$quantity;
    }

    //--insert order
    $insert_orders="Insert into user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status)
    values ($user_id,$subtotal,$invoice_number,$count_product,NOW(),'$status')";
    $result_query=mysqli_query($con,$insert_orders);
    if($result_query){
        echo "<script>alert('Orders are submitted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }

    //--inserrt pending orders
    $insert_pending_orders="Insert into orders_pending (user_id,invoice_number,product_id,quantity,order_status)
    values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
    $result_pending_orders=mysqli_query($con,$insert_pending_orders);

    //--delete items from cart
    $empty_cart="Delete from cart_details where ip_address='$get_ip_address'";
    $result_delete=mysqli_query($con,$empty_cart);
?>
