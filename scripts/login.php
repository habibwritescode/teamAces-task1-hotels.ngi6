<?php
session_start();


if(isset($_POST['login-submit'])){
//user clicked submit button, implement logic

require "database.php";

$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['errors'] = array();



if(empty($password) && empty($username)){
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

else{
    //search fake database for corresponding username
        
    if($username == $database[0]->username && password_verify($password, $database[0]->hashedPwd)){
        header ("location: ../login.html");
    }else{
        $_SESSION['errors'][] = "Invalid login credentials". "</br>";
    }
      

}
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../index.php');
exit();
}