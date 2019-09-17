<?php

include "connection.php";

$sql = "INSERT INTO users (firstname, lastname, usernames, email, password)
 VALUES ('$firstname', '$lastname', '$usernames', '$email', '$passHash')";

$done = $conn->exec($sql);