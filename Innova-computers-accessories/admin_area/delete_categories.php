<?php
    if(isset($_GET['delete_categories'])){
        $delete_id=$_GET['delete_categories'];
        
        // delete query
        $delete_query="Delete from categories where category_id=$delete_id";
        $result_product=mysqli_query($con,$delete_query);
        if($result_product){
            echo "<script>alert('Category deleted successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
?>