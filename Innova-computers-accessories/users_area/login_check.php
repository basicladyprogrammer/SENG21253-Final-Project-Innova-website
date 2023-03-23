<?php
session_start();
include "C:\wamp64\www\innova-computer accessories\connect.php";

if(isset($_POST['submit'])){

    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
    }

    $email=validate($_POST['email']);
    $pass=validate($_POST['password']);

    
    if (empty($email)) {
		header("Location: login.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
        $securedpassword=md5($pass);

        $sql_user="select * from customer where email='$email' and password='$securedpassword';";
        $sql_admin="select * from admin where Email='$email' and password='$securedpassword';";

        $result_user=$con->query($sql_user);

        if ($result_user->num_rows>0) {
            $row=$result_user->fetch_assoc();
            if ($row['email'] == $email && $row['password'] == $securedpassword) {
                 
                    $_SESSION['Email'] = $row['email'];
                    $_SESSION['Fname'] = $row['f_name'];
                    $_SESSION['Lname'] = $row['l_name'];

                    header("Location:../index.php");
                    exit();
            }
            else {
                header("Location: login.php?error=Incorect email or password");
                exit();
            }   
        }
        elseif($result_admin->num_rows>0) {
            $row=$result_admin->fetch_assoc();
            if ($row['email'] == $email && $row['password'] == $securedpassword) {
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_fname'] = $row['fname'];
                $_SESSION['admin_lname'] = $row['lname'];

                header("Location: https://www.facebook.com/");
                exit();
            } else {
                header("Location: login.php?error=Incorect email or password");
                exit();
            }	
        }
        else{
            header("Location: login.php?error=Invalid Login");
	        exit();
            
        }
    }

}

?>