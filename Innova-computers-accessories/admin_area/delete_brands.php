<?php
    if(isset($_GET['delete_brands'])){
        $delete_id=$_GET['delete_brands'];
        
        // delete query
        $delete_query="Delete from brands where brand_id=$delete_id";
        $result_product=mysqli_query($con,$delete_query);
        if($result_product){
            echo "<script>alert('Brand deleted successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
?>