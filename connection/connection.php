<?php 


// $server_name = "localhost";
// $user_name = "ecomservice@gmail.com";
// $password = 123456;
// $database_name = "ecom_service_db";

// $connection = new mysqli($server_name, $user_name, $password, $database_name);

// if($connection->connect_error) {
//     header("Location : error/database_error.php");
//     die("Connection Failed".$connection->connect_error);
// }

    $server_name = "localhost";
    $email = "ecomservice@gmail.com";
    $password = "123456";
    $db_name = "ecom_service_db";

    $connection = new mysqli($server_name, $email, $password, $db_name);

    if($connection) {
        echo "Hei bro your db is connected";

    } else {
        echo "Sorry bro so sad your connection is failed";
    }



?>