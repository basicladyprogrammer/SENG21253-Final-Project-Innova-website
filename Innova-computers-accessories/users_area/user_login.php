<!-- connect file -->
<?php
    include("../connect.php");
    include("../functions/common_function.php");
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
    <div class="login-box">
        <h2 class="login">User Login</h2>

        <div class="row d-flex align-items-center justify-content-center mt-5">

            <div class="form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!--username field-->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control input-field" placeholder="Enter your username" 
                        autocomplete="off" required="required" name="user_username">
                    </div>
                    
                    <div class="form-outline mb-4">
                        <!--password field-->
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control input-field" placeholder="Enter your password" 
                        autocomplete="off" required="required" name="user_password">
                    </div>
                    <p style="text-align: center;" >OR</p>
                    <div class="buttons">
                        <input type="submit" value="Login" id="login"
                        name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? 
                        <div class="b1"><a href="user_registration.php" class="text-danger"><button type="button"> Register</button></a> </div></p>
                        <div class="b2"><a href="admin_login"><button type="button">Admin Login</button></a> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "../const/footer.php";?>
</body>
</html>

<?php
    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        $select_query="Select * from user_table where user_name='$user_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $user_ip=getIPAddress();

        //--cart item
        $select_cart_items="Select * from cart_details where ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $num_of_row=mysqli_num_rows($result_cart);

        if($row_count>0){
            //--password checking
            if(password_verify($user_password,$row_data['user_password'])){
                // echo "<script>alert('Login Successfull')</script>";
                $_SESSION['username'] = $user_username;
                
                if($row_count==1 and $num_of_row==0){
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfull')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }else{
                    $_SESSION['username'] = $user_username;
                    echo "<script>alert('Login Successfull')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
?>