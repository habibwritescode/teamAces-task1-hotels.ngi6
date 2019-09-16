<?php

if(isset($_POST['login-submit'])){
//user clicked submit button, implement logic

require "database.php";

$username = $_POST['username'];
$password = $_POST['password'];


if(empty($password) && empty($username)){
    header('location: ../index.php?error=emptyfields');
    exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header('location: ../index.php?error=invalidusername');
    exit();
}
else if(empty($username)){
    header('location: ../index.php?error=usernameempty');
    exit();
}

else if(empty($password)){
    header('location: ../index.php?error=passwordempty&username='.$username);
    exit();
}

else{
    //search fake database for corresponding username


}
}
else{
//user did not click submit but got here through url modification redirect back to login page

header('location: ../index.php');
exit();
}