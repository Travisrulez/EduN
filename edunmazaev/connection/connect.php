<?php

$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "online_rest"; 

$db = mysqli_connect($servername, $username, $password, $dbname);
if (!$db) {    
    die("Connection failed: " . mysqli_connect_error());
}

?>