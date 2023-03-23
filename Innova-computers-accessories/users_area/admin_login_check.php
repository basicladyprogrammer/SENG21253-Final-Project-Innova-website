<?php
session_start();
include "connect.php";

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

        $sql_user="select * from user_table where user_email='$email' and user_password='$securedpassword';";

        $result_user=$con->query($sql_user);

        if ($result_user->num_rows>0) {
            $row=$result_user->fetch_assoc();
            if ($row['email'] == $email && $row['password'] == $securedpassword) {
                 
                    $_SESSION['Email'] = $row['email'];
                    $_SESSION['Fname'] = $row['f_name'];
                    $_SESSION['Lname'] = $row['l_name'];

                    header("Location:C:\wamp64\www\innova-computer accessories\admin_area\index.php");
                    exit();
            }
            else {
                header("Location: login.php?error=Incorect email or password");
                exit();
            }   
        }
         else {
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