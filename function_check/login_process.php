<?php 

if(isset($_POST['admin_submit']) && !empty($_POST['admin_submit'])) {

    $email = isset($_POST[$email]) && !empty($_POST[$email]) ? $_POST[$email] : '';
    $password = isset($_POST[$password]) && !empty($_POST[$password]) ? $_POST[$password] : '';
    $remember = isset($_POST[$remember]) && !empty($_POST[$remember]) ? $_POST[$remember] : '';


    // match data from database
    $sql = "SELECT id FROM users_table WHERE email='$email'";

    // sending data to database
    $result = $connection->query($sql);


    // check email
    if($result->num_rows > 0) {

    }else {
        $error_status = 'error';
        $error_message = 'Email was not found';
    };



};



?>