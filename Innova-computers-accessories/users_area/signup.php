<?php
    include 'C:\wamp64\www\innova-computer accessories\connect.php';
    include 'C:\wamp64\www\innova-computer accessories\functions\common_function.php';
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
    <script>
        function validateForm() {
        var fname = document.forms["singup"]["fname"].value;
        var lname = document.forms["singup"]["lname"].value;
        var email = document.forms["singup"]["email"].value;
        var password = document.forms["singup"]["password"].value;
        var confpwd = document.forms["singup"]["confpwd"].value;

        if (fname == "" || lname == "" || address == "" || email == "" || password == "" || confpwd == "") {
            alert("All fields must be filled out");
            return false;
        }

        if (password.length < 6) {
            alert("Password must contain at least 6 characters");
            return false;
        }

        if (password != confpwd) {
            alert("Passwords do not match");
            return false;
        }
    }

    </script>
</head>
<body>
        <form name="signup" action="signup_check.php" method="POST">

    <?php if (isset($_GET['success'])) { ?>
        <h1 class="success"><?php echo $_GET['success']; ?></h1>
    <?php } ?>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p><br>
    <?php } ?>
    <div class="box">
        <h1>Sign Up</h1>
        <form name="signup" action="signup_check.php" method="POST" onsubmit="return validateForm()">

            <h1 class="success"></h1>
            <label for="fname" class="inputnames">First Name </label>
            <input type="text" name="fname" class="form-control input-field" placeholder="Enter first name">
            <br>
            <label for="lname" class="inputnames">Last Name </label>
            <input type="text" name="lname" class="form-control input-field" placeholder="Enter last name">
            <br>
            <label for="email" class="inputnames">Email</label>
            <input type="text" name="email" class="form-control input-field" placeholder="&#xf003 username@gmai.com">
            <br>
            <label for="password" class="inputnames">Password</label>
            <input type="password" name="password" class="form-control input-field" placeholder="&#xf084..............">
            <ion-icon class="show-hide" name="eye-outline"></ion-icon>
            <br>
            <label for="confpwd" class="inputnames">Confirm Password </label>
            <input type="password" name="confpwd" class="form-control input-field" placeholder="&#xf046..............">
            <ion-icon name="heart"></ion-icon>
            <br><br>
            <span><input type="submit" name="submit" value="CreateAccount" class="submit-btn"></span>
        </form>
    </div>
    <?php
    include "../const/footer.php";
    ?>
    
</body>
</html>