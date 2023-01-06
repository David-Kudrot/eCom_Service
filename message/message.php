<?php 
include '../form_process/login.php';

if(isset($_SESSION["authentication"])) {

?>

    <div class="alert alert-warning show float-center" role="alert">
    <strong><?php echo $_SESSION['status']; ?></strong>
    </div>


<?php
    
    unset($_SESSION['status']);
}

?>