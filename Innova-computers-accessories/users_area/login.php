<?php
    include '../connect.php';
    include '../functions/common_function.php';
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
    <?php if (isset($_GET['success'])) { ?>
    <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="login-box">
        <div class="login">
            <h2>LogIn</h2>
        </div>
        <br>
        <div class="form">
            <form action="login_check.php" method="POST">
            <label for="email">Email*</label><br>
            <input type="text" name="email" class="form-control input-field" placeholder="&#xf003 username@gmail.com"><br><br>
            <label for="password">Password*</label><br>
            <input type="password" name="password" id="password" class="form-control input-field" placeholder="&#xf084 .........."><br><br>
            <input type="submit" name="submit" value="Log In" id="login" >
            </form>                   
        </div>
            <p style="text-align: center;" >OR</p>
            <div class="buttons">
                <div class="b1"><a href="signup.php"><button type="button">Sign Up</button></a> </div>
                <div class="b2"><a href="admin_login"><button type="button">Admin Login</button></a> </div>
            </div>
            <div class="bottum">
                 
            </div>
    </div>
    <div>
        
    </div>
    <?php include "../const/footer.php";?>
            
        
</body>
</html>