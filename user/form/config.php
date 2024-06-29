<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "shopeasy";

$con = mysqli_connect($server, $username, $password, $db_name);

if(!$con){
    die(mysqli_connect_error());
}
?>