<?php

$id = $_GET["ID"];

$server = "localhost";
$username = "root";
$password = "";
$db_name = "shopeasy";

$con = mysqli_connect($server, $username, $password, $db_name);

    //Check connection
    if(!$con){
        die("conection failed: " .  mysqli_connect_error());
    }

    //perform delete query
    if(!$con){
        die(mysqli_connect_error());
    }

    mysqli_query($con, "DELETE FROM `user` WHERE id=$id");
    header('location:user.php');

    $con->close();
    ?>
