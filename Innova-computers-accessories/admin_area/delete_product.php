<?php
    if(isset($_GET['delete_product'])){
        $delete_id=$_GET['delete_product'];
        
        // delete query
        $delete_query="Delete from products where product_id=$delete_id";
        $result_product=mysqli_query($con,$delete_query);
        if($result_product){
            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('index.php?view_product','_self')</script>";
        }
    }
?>