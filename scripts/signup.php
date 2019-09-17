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
    header('location: ../signup.php');
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
	$_SESSION['errors'][] = "Username should contain only alphanumeric characters". "</br>";
    header('location: ../signup.php');
    exit();
}
else if(empty($lastname)){
	$_SESSION['errors'][] = "Please Enter your last name". "</br>";
    header('location: ../signup.php');
    exit();
}
else if(empty($firstname)){
	$_SESSION['errors'][] = "Please Enter your first name". "</br>";
    header('location: ../signup.php');
    exit();
}
else if(empty($username)){
	$_SESSION['errors'][] = "Username is a required field". "</br>";
    header('location: ../signup.php');
    exit();
}

else if(empty($password)){
    $_SESSION['errors'][] = "Password is a required field". "</br>";
    header('location: ../signup.php');
    exit();
}

else if(empty($confirmPassword)){
    $_SESSION['errors'][] = "Password is a required field". "</br>";
    header('location: ../signup.php');
    exit();
}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['errors'][] = "Email is not in a valid format". "<br>";
    header('location: ../signup.php');
exit();
}

else if ($password !== $confirmPassword){
    $_SESSION['errors'][] = "Passwords do not match". "<br>";
    header('location: ../signup.php');
exit();
}


else{
    
        
     //check mock db to see if username is taken
   $count = 0;
   foreach($database as $user){
       if($username == $user->username){
             $count++;
        //username is taken 
       }
    }
   if($count > 0){
    $_SESSION['errors'][] = "That username is already taken". "<br>";
    header('location: ../signuppage.php');
      exit();
   } 
   elseif($count == 0){
    //username is available store information and send a success message
    $newuser = new User($username, $email, password_hash($password, PASSWORD_DEFAULT));
    array_push($database, $newuser);
    $_SESSION['success'] = "Sign up was successful";
    header('location: ../success.php');
      exit();
   } 
   }
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../signup.php');
exit();
}