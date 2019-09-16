<?php

$database = array();
class User{
    public $username;
    public $email;
    public $hashedPwd;
function __construct($Username, $Email, $HashedPwd){
    $this->username = $Username;
    $this->email = $Email;
    $this->hashedPwd = $HashedPwd;
}

}


//create test user

$testuser = new User('aces123', 'aces123@gtest.com', password_hash("password", PASSWORD_DEFAULT));
//insert user into db
array_push($database, $testuser);