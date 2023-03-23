<?php
    include 'C:\wamp64\www\innova-computer accessories\connect.php';
    include 'C:\wamp64\www\innova-computer accessories\functions\common_function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css\home.css">
</head>
<body>
    <div class="signin-container">
        <div class="row">
        <div class="items">
            <div class="con">
                <div class="box">
                    <div class="login"><h2>Admin LogIn</h2></div><br>
                    <div class="form">
                        <form action="admin_login_check.php" method="POST">

                            <?php if (isset($_GET['success'])) { ?>
                                <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <label for="email">Email*</label><br>
                            <input type="text" name="email" class="form-control input-field" placeholder="&#xf003 username@gmai.com"><br><br>
                            <label for="password">Password*</label><br>
                            <input type="password" name="password" id="password" class="form-control input-field" placeholder="&#xf084 .........."><br><br>
                            <br>
                            <input type="submit" name="submit" value="Log In" id="login" >
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div>
        <?php
            include "../const/footer.php";
        ?>
    </div>

</body>
</html>