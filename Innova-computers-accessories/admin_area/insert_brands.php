<?php
    include('C:\wamp64\www\innova-computer accessories\connect.php');
    if(isset($_POST['insert_brand'])){
        $brand_title = $_POST['brand_title'];
        //select sql
        $select_query = "select * from brands where brand_title = '$brand_title'";
        $result_select = mysqli_query($con,$select_query);
        $number = mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This brand already has been inserted')</script>";
        }else{
            //insert query
            $insert_query = "insert into brands (brand_title) values ('$brand_title')";
            $result = mysqli_query($con,$insert_query);
            if($result){
                echo "<script>alert('Brand has been inserted successfully')</script>";
            }
        }
    }
?>
<div class="login-box">
<h2>Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="user-box">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" 
        aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-button" name="insert_brand" value="Insert Brands" >
    </div>
</form>