<!-- connect file -->
<?php
    include("../connect.php");
    include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css\home.css">
</head>
<body>
    <div class="box">
    <h1>New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--username field-->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control input-field" placeholder="Enter your username" 
                        autocomplete="off" required="required" name="user_username">
                    </div>

                    <div class="form-outline mb-4">
                        <!--email field-->
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control input-field" placeholder="Enter your email" 
                        autocomplete="off" required="required" name="user_email">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <!--image field-->
                        <label for="user_image" class="form-label">User image</label>
                        <input type="file" id="user_image" class="form-control input-field"  
                        autocomplete="off" required="required" name="user_image">
                    </div>

                    <div class="form-outline mb-4">
                        <!--password field-->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control input-field" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password">
                    </div>

                    <div class="form-outline mb-4">
                        <!--confirm password field-->
                        <label for="conf_user_password" class="form-label">Confirm password</label>
                        <input type="password" id="conf_user_password" class="form-control input-field" placeholder="Re-Enter your password" 
                        autocomplete="off" required="required" name="conf_user_password">
                    </div>

                    <div class="form-outline mb-4">
                        <!--address field-->
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control input-field" placeholder="Enter your address" 
                        autocomplete="off" required="required" name="user_address">
                    </div>

                    <div class="form-outline mb-4">
                        <!--contact field-->
                        <label for="user_contact" class="form-label">contact</label>
                        <input type="text" id="user_contact" class="form-control input-field" placeholder="Enter your contact" 
                        autocomplete="off" required="required" name="user_contact">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="submit-btn"
                        name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include "../const/footer.php";
    ?>
</body>
</html>

<!-- php code -->
<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact=$_POST['user_contact'];

        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];

        $user_ip=getIPAddress();

        //-- select_query
        $select_query="Select * from user_table where user_name='$user_username' or user_email='$user_email'";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('Username and Email is already exits')</script>";
        }else if($user_password!=$conf_user_password){
            echo "<script>alert('Passwords do not match')</script>";
        }else{
            //-- insert query
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");
            $insert_query="Insert into user_table (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
            values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
            
            $sql_execute=mysqli_query($con,$insert_query);

            if($sql_execute){
                echo "<script>alert('Data inserted successfully')</script>";
            }else{
                die("Connection failed: " . $con->connect_error);
            }
        }
        //-- selecting cart items
        $select_cart_items="Select * from cart_details where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $num_of_row=mysqli_num_rows($result_cart);
        if($num_of_row>0){
            $_SESSION['username'] = $user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
?>