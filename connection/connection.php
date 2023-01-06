<?php 


$server_name = "localhost";
$user_name = "ecomservice@gmail.com";
$password = 123456;
$database_name = "ecom_service_db";

$connection = new mysqli($server_name, $user_name, $password, $database_name);

if(!$connection) {
    header("Location : error/database_error.php");
    die();
}



?>