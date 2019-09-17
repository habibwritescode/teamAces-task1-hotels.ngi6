<?php
session_start();


if(isset($_POST['signup-submit'])){
//user clicked submit button, implement logic
require('connection.php');

// require "database.php";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['emailAddress'];
$usernames = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$_SESSION['errors'] = array();



if(empty($firstname) && empty($lastname) && empty($emailAddress) && empty($usernames) && empty($password) && empty($confirmPassword)){
    $_SESSION['errors'] [] = "Fill in all fields". "</br>";
    header('location: ../index.php');
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $usernames)){
	$_SESSION['errors'][] = "Username should contain only alphanumeric characters". "</br>";
    header('location: ../index.php');
    exit();
}
else if(empty($lastname)){
	$_SESSION['errors'][] = "Please Enter your last name". "</br>";
    header('location: ../index.php');
    exit();
}
else if(empty($firstname)){
	$_SESSION['errors'][] = "Please Enter your first name". "</br>";
    header('location: ../index.php');
    exit();
}
else if(empty($usernames)){
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

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['errors'][] = "Email is not in a valid format". "<br>";
    header('location: ../index.php');
exit();
}

else if ($password !== $confirmPassword){
    $_SESSION['errors'][] = "Passwords do not match". "<br>";
    header('location: ../index.php');
exit();
}


else{
    
$checkUser = "SELECT * FROM users WHERE usernames = '$usernames'";
$result = $conn->query($checkUser);
$user = $result->fetch(PDO::FETCH_ASSOC);


if($user){
    $_SESSION['errors'][] = "Username already exists. Please choose a different username";
    header('location: ../index.php');
    exit;
}else{
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    include('insert.php');

    // $_SESSION['success'] = "Sign up was successful, please use your registration details to login";
    header('location: ../login.php?success=');
    exit();
} 

   }
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../index.php');
exit();
}