<?php 
include 'authentication.php';
include 'include/header.php';
include 'include/top_navbar.php';
include 'include/side_navbar.php';
include 'connection/connection.php';
?>


    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Registered Users</li>
            </ol>
            </div><!-- /.col -->
            <!-- user update message -->
            <div class="form-text text-success mx-auto">
            <?php 
                if(isset($_SESSION["status"])){
                    echo "<h6>".$_SESSION["status"]."</h6>";
                    unset($_SESSION["status"]);
                } else {

                }
            ?>
            </div>
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit-Registered Users</h3>
                <a href="registered_users.php" class="btn btn-danger float-right btn-sm">BACK</a>
              </div>
              
              <!-- /.card-header -->
              <div class="">
              <form action="form_process/add_user_modal.php" method="POST">
                <div class="modal-body">
                    <?php 
                        if(isset($_GET['user_id'])) {

                            $user_id = $_GET['user_id'];
                            $sql_query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
                            $sql_query_run = mysqli_query($connection, $sql_query);
                            
                            if(mysqli_num_rows($sql_query_run) > 0) {
                                foreach($sql_query_run as $row) {
                                    ?>
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['id'] ?>">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>" >
                                    </div>

                                    <?php
                                }
                            }
                        }
                    ?>
                
                </div>
                <div class="modal-footer justify-content-center">
                <button type="submit" name="update_user" class="btn btn-primary float-right">Update</button>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>


    <?php 
        include 'include/jQuery.php';
        include 'include/footer.php';
    ?>