<?php session_start();
include '../authentication.php';
include '../connection/connection.php';




// admin login form processing
if(isset($_POST['admin_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $sql_query_run = mysqli_query($connection, $sql_query);

    if(mysqli_num_rows($sql_query_run) > 0) {

        foreach($sql_query_run as $row) {
            $user_id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $email = $row['email'];
        }

        $_SESSION['authentication'] = true;
        $_SESSION['authentication_user'] = [
            'user_id'=>$user_id,
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email,
        ];

        $_SESSION["status"] = "Logged In Successfully";
        header("Location: ../dashboard.php");
    }
    else 
    {

    $_SESSION["status"] = "Invalid User and Password";
    header("Location: ../index.php");

    }
} 
else 
{
    $_SESSION["status"] = "Access Denied";
    header("Location: ../index.php");
}



// logout process
if(isset($_POST['logout_btn'])) {
    //session_destroy();
    unset($_SESSION['authentication']);
    unset($_SESSION['authentication_user']);

    $_SESSION['status'] = "Logged out Successfully";
    header('Location: ../index.php');
    exit(0);

}





?>