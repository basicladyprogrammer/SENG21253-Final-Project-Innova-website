<?php
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];

        $get_data="Select * from products where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];

        //fetching category name
        $select_category="select * from categories where category_id=$category_id";
        $result_category=mysqli_query($con,$select_category);
        $row_category=mysqli_fetch_assoc($result_category);
        $category_title=$row_category['category_title'];

        //fetching brands name
        $select_brand="select * from brands where brand_id=$brand_id";
        $result_brand=mysqli_query($con,$select_brand);
        $row_brand=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand['brand_title'];
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" 
            value="<?php echo $product_title?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control" 
            value="<?php echo $product_description?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" 
            value="<?php echo $product_keywords?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="" class="form-select" >
                    <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                    <!-- php part -->
                    <?php
                        $select_category = "select * from categories";
                        $result_category = mysqli_query($con,$select_category);
                        while($row_data = mysqli_fetch_assoc($result_category)){
                            $category_title = $row_data['category_title'];
                            $category_id = $row_data['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brands" class="form-label">Product Brand</label>
                <select name="product_brands" id="" class="form-select">
                    <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
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
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                    <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" >
                    <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
                </div>
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                    <div class="d-flex">
                        <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" >
                        <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
                    </div>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" 
                value="<?php echo $product_price?>">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" 
                value = "Update Product">
            </div>
    </form>
</div>
<!-- editing products -->
<?php
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category=$_POST['product_category'];
        $product_brands=$_POST['product_brands'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $c=$_FILES['product_image2']['name'];

        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];

        //checking empty codition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' 
        or $product_price=='' or $product_image1=='' or $product_image2==''){
            echo "<script>alert('Please fill all the available fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");

            //-- query to update product
            $update_product="update products set product_title='$product_title',product_description='$product_description',
            product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brands',product_image1='$product_image1',
            product_image2='$product_image2',product_price='$product_price',date=NOW() where product_id=$edit_id";

            $result_update=mysqli_query($con,$update_product);
            if($result_update){
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('insert_product.php','_self')</script>";
            }
        }
    }
?>