<?php
session_start();


if(isset($_POST['signup-submit'])){
//user clicked submit button, implement logic

require "database.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emailAddress = $_POST['emailAddress'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$_SESSION['errors'] = array();



if(empty($firstname) && empty($lastname) && empty($emailAddress) && empty($username) && empty($password) && empty($confirmPassword)){
    $_SESSION['errors'] [] = "Fill in all fields". "</br>";
    header('location: ../index.php');
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
	$_SESSION['errors'][] = "Username should contain only alphanumeric characters". "</br>";
    header('location: ../index.php');
    exit();
}
else if(empty($username)){
	$_SESSION['errors'][] = "Username is a required field". "</br>";
    header('location: ../index.php');
    exit();
}

else if(empty($password)){
    $_SESSION['errors'][] = "Password is a required field". "</br>";
    header('location: ../index.php');
    exit();
}

else if(empty($confirmPassword)){
    $_SESSION['errors'][] = "Password is a required field". "</br>";
    header('location: ../index.php');
    exit();
}

else{
    //search fake database for corresponding username
        
    foreach($database as $result) {
        if($username == $result->username && password_verify($password, $result->hashedPwd)){
            $_SESSION['success'] = "Logged in successfully";
            header ("location: ../welcome.php");
        }else{
            $_SESSION['errors'][] = "Invalid signup credentials". "</br>";
            header('location: ../index.php');
        }
      }
      

}
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../index.php');
exit();
}