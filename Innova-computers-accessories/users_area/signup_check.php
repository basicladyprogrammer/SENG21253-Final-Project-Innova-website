<?php include "connect.php" ?>

<?php
session_start();
if (isset($_POST['submit'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confpass = validate($_POST['confpwd']);

    //name validation
    if (empty($fname)) {
        header("Location: signup.php?error=First Name is required");
        exit();
    } 
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$fname))  {
        header("Location: signup.php?error=Only letters and white space allowed for first name");
        exit();
    }   
    else if (empty($lname)) {
        header("Location: signup.php?error=Last Name is required");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$lname))  {
        header("Location: signup.php?error=Only letters and white space allowed for lirst name");
        exit();
    }

    //email validation   
    else if (empty($email)) {
        header("Location: signup.php?error=Email is required");
        exit();
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
        header("Location: signup.php?error=Invalid email format");
        exit();
    }
    
    //password validation
    else if (empty($pass)) {
        header("Location: signup.php?error=Password is required");
        exit();
    } 
    else if (strlen($pass) <= 8) {
        header("Location: signup.php?error=Password is short");
    } 
    //confirm password validation
    else if (empty($confpass)) {
        header("Location: signup.php?error=Confirm Your Password");
        exit();
    } 
    else if ($pass != $confpass) {
        header("Location: signup.php?error=The confirmation password does not match");
        exit();
    }
    else {
        $securedpass = md5($pass);
        $sql = "SELECT * FROM customer WHERE email='$email' ";
        $result = $con->query($sql);
        echo" <script>console.log('".$result->num_rows."')</script> ";
         if ($result->num_rows > 0) {
            echo" <script>console.log('".$result->num_rows."')</script> ";
            header("Location: signup.php?error=Try another email");
            //die();
         } 
        else {
            $sql2 = "INSERT INTO customer (f_name,l_name,email, password) VALUES ('$fname', '$lname','$email', '$securedpass')";
            if($con->query($sql2)){
                header("Location:login.php");/**********/
            }
        }
    } 
}
else{
    header("Location: login.php");/**********/
    exit();
}  

?>