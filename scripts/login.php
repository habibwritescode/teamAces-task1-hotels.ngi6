<?php
session_start();

if(isset($_POST['login-submit'])){
    
    //user clicked submit button, implement logic
require "connection.php";

$usernames = $_POST['username'];
$password = $_POST['password'];
$_SESSION['loginError'] = array();



if(empty($password) && empty($usernames)){
    $_SESSION['loginError'] [] = "Fill in all fields". "</br>";
    header('location: ../login.php');
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $usernames)){
	$_SESSION['loginError'][] = "Username should contain only alphanumeric characters". "</br>";
    header('location: ../login.php');
    exit();
}
else if(empty($usernames)){
	$_SESSION['loginError'][] = "Username is a required field". "</br>";
    header('location: ../login.php');
    exit();
}

else if(empty($password)){
    $_SESSION['loginError'][] = "Password is a required field". "</br>";
    header('location: ../login.php');
    exit();
}

else{
        
    $sql = "SELECT * FROM users WHERE usernames='$usernames'";

    
    $result = $conn->query($sql);
    
    $user = $result->fetch(PDO::FETCH_ASSOC);
    
	if($usernames !== $user['usernames'] || !password_verify($password, $user['password'])){
        $_SESSION['loginError'][] = "User not found. Please click on the Sign Up link to create an Account";
		header("location: login.php");
		exit;
    }elseif($usernames === $user['usernames'] && password_verify($password, $user['password'])){
		header("location: ../success.php?loggedIn=");
		exit;
	}
      

}
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../login.php');
exit();
}