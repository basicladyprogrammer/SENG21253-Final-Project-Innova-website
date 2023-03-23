<?php
    if(isset($_GET['edit_account'])){
        $user_session_name=$_SESSION['username'];
        $select_query="Select * from user_table where user_name='$user_session_name'";
        $result_query=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        $user_name=$row_fetch['user_name'];
        $user_email=$row_fetch['user_email'];
        $user_address=$row_fetch['user_address'];
        $user_mobile=$row_fetch['user_mobile'];
    }
        //--update button click
        if(isset($_POST['user_update'])){
            $update_id=$user_id;
            $user_name=$_POST['user_username'];
            $user_email=$_POST['user_email'];
            $user_address=$_POST['user_address'];
            $user_mobile=$_POST['user_mobile'];

            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];

            move_uploaded_file($user_image_tmp,"./user_images/$user_image");

            //--update query
            $update_data = "Update user_table set user_name='$user_name', user_email='$user_email', user_image='$user_image', 
            user_address='$user_address', user_mobile='$user_mobile' where $user_id=$update_id";
            $result_query_update=mysqli_query($con,$update_data);
            if($result_query_update){
                echo "<script>alert('Data updated successfully')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/style.css">
    <style>
        .custom-image{
            display:flex;
        }
        .edit_img{
            width:50%;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Edit Account</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="user-box">
            <input type="text" class="form-control input-field" name="user_username" value="<?php echo $user_name ?>">
        </div>
        <div class="user-box">
            <input type="email" class="form-control input-field" name="user_email" value="<?php echo $user_email ?>">
        </div>
        <div class="custom-image">
            <input type="file" class="form-control input-field" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>
        <div class="user-box">
            <input type="text" class="form-control input-field" name="user_address" value="<?php echo $user_address ?>">
        </div>
        <div class="user-box">
            <input type="text" class="form-control input-field" name="user_mobile" value="<?php echo $user_mobile ?>">
        </div>
        <input type="submit" value="update" class="submit-btn" name="user_update">
    </form>
    </div>
</body>
</html>