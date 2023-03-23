<?php
    include('C:\wamp64\www\innova-computer accessories\connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        //accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];

        //accessing image temp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or 
        $product_categories=='' or $product_price=='' or $product_image1=='' or $product_image2==''){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./upload_images/$product_image1");
            move_uploaded_file($temp_image2,"./upload_images/$product_image2");

            //insert query
            $insert_products="insert into products (product_title,product_description,product_keywords,category_id,product_image1,product_image2,product_price,date,status) 
            values ('$product_title','$product_description','$product_keywords',
            '$product_categories','$product_image1','$product_image2','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('Successfully inserted the product')</script>"; 
            }
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>

    <!-- bootstrap css link-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="admin_css/form.css">
    <link rel="stylesheet" href="header/header.css">
</head>
<body>
    
    <?php include 'header/header.php' ?>
    <br><br><br>
    <br><br><br>
    <div class="login-box">
        <h2 >Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="user-box">
                <!-- <label>Product title</label> -->
                <input type="text" name="product_title" id="product_title" 
                class="form-control" placeholder="Enter product title" autocomplete="off"
                required="required">
            </div>
            <!--description-->
            <div class="user-box">
                <!-- <label for="product_description" class="form-label">Product description</label> -->
                <input type="text" name="product_description" id="product_description" 
                class="form-control" placeholder="Enter product description" autocomplete="off"
                required="required">
            </div>
            <!--keywords-->
            <div class="user-box">
                <!-- <label for="product_keywords" class="form-label">Product keywords</label> -->
                <input type="text" name="product_keywords" id="product_keywords" 
                class="form-control" placeholder="Enter product keywords" autocomplete="off"
                required="required">
            </div>
                <br><br><br>
            <!--categories-->
            <div class="box">
                <select name="product_categories">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query="select * from categories";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>

                </select>
            </div>
            <div class="user-box">
            <div class="box">
                <select name="product_brands" >
                    <option value="">Select a Brand</option>
                    <!-- php part -->
                    <?php
                        $select_brands = "select * from brands";
                        $result_brands = mysqli_query($con,$select_brands);
                        while($row_data = mysqli_fetch_assoc($result_brands)){
                            $brand_title = $row_data['brand_title'];
                            $brand_id = $row_data['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                    <!-- <option value="">Brand 1</option>
                    <option value="">Brand 2</option>-->
                </select>
            </div>
            </div>
            <!--image 1-->
            <div class="custom-image-upload">
                <label for="product_image1" class="form-label">Upload product image 1</label>
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control" required="required">
            </div>
            <!--image 2-->
            <div class="custom-image-upload">
                <label for="product_image2" class="form-label">Upload product image 2</label>
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control" required="required">
            </div>

            <!--price-->
            <div class="user-box">
                <!-- <label for="product_price" class="form-label">Product price</label> -->
                <input type="text" name="product_price" id="product_price" 
                class="form-control" placeholder="Enter product price" autocomplete="off"
                required="required">
            </div>

            <!--price-->
            <div class="">
                <input type="submit" name="insert_product" class="form-button" value="Insert Products">
            </div>
        </form>
    </div>
</body>
</html>