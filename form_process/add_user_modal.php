<?php session_start();
date_default_timezone_set('Asia/Kolkata');
include '../connection/connection.php';

// live email id check by jQuery and Ajax
if(isset($_POST['check_email_btn'])) {

    $email = $_POST['email'];

    $email_check = "SELECT email FROM users WHERE email='$email'";
    $email_check_run = mysqli_query($connection, $email_check);

    if(mysqli_num_rows($email_check_run) > 0) {

        echo 'Email is already exists.!';
    }
    else
    {
        echo "It's available.";
    }
}

if(isset($_POST["addUser"])) {
    
    
    $name = $_POST["name"];
    $phone = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conform_password = $_POST["conform_password"];

    // password and conform-password check and adding data to db
    if($password == $conform_password) {

        // check email id if email is already exists
        $email_check = "SELECT email FROM users WHERE email='$email'";
        $email_check_run = mysqli_query($connection, $email_check);

        if(mysqli_num_rows($email_check_run) > 0) {

            $_SESSION["status"] = "Email is already exists.!";
            header("Location: ../registered_users.php");
        }
        else
        {
            $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
            $users_query_run = mysqli_query($connection, $sql);
        
            if($users_query_run) {
                $_SESSION["status"] = "User Added Successfully.";
                header("Location: ../registered_users.php");
            } else {
                $_SESSION["status"] = "User Registration Failed.!";
                header("Location: ../registered_users.php");
            }
        }

        
    } else {
        $_SESSION["status"] = "Password and Conform-password does not match.!";
            header("Location: ../registered_users.php");
    }

   
}


// for updating user by modal form
if(isset($_POST["update_user"])) {

    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $phone = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql_query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password' WHERE id='$user_id'";
    $sql_query_run = mysqli_query($connection, $sql_query);

    if($sql_query_run) {
        $_SESSION["status"] = "User Updated Successfully.";
        header("Location: ../registered_users.php");
    } else {
        $_SESSION["status"] = "User Updating Failed.!";
        header("Location: ../registered_users.php");
    }
}

// for delete an user form registered user list and form db
if(isset($_POST['delete_user_btn'])) {

    $user_id = $_POST['delete_id'];

    $sql = "DELETE FROM users WHERE id='$user_id'";
    $sql_run = mysqli_query($connection, $sql);

    if($sql_run) {
        $_SESSION["status"] = "User Deleted Successfully.";
        header("Location: ../registered_users.php");
    } else {
        $_SESSION["status"] = "User Deleting Failed.!";
        header("Location: ../registered_users.php");
    }

}

?>