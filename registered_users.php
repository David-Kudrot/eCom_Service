<?php 
include 'authentication.php';
include 'include/header.php';
include 'include/top_navbar.php';
include 'include/side_navbar.php';
include 'connection/connection.php';
?>




    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- popup modal && added to Add Users links button tag -->
    <div class="modal fade" id="add_users_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Here in action attribute, "form_process/add_user_modal.php" full path included -->
            <form action="form_process/add_user_modal.php" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number">
              </div>
              <div class="form-group">
                <label for="" class="form-label">Email</label>
                <span class="email_error text-danger float-right"></span>
                <input type="email" class="form-control email_id" name="email">
              </div>
              <div class="row">
                  <div class="col-md-6">                   
                  <div class="form-group">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  </div>
                  <div class="col-md-6">                   
                  <div class="form-group">
                    <label for="" class="form-label">Conform Password</label>
                    <input type="password" class="form-control" name="conform_password">
                  </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="addUser" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <!-- modal for delete user  -->
    <div class="modal fade" id="delete_user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Here in action attribute, "form_process/add_user_modal.php" full path included -->
            <form action="form_process/add_user_modal.php" method="POST">
            <div class="modal-body">
              <input type="hidden" class="form-control delete_user" name="delete_id">
              <p>
                Are you sure. You want to delete this data ?
              </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="delete_user_btn" class="btn btn-danger">Yes, Delete.!</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


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
                    echo "<h4>".$_SESSION["status"]."</h4>";
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
                <h3 class="card-title">Registered Users</h3>
                <a href="#" class="btn btn-primary float-right btn-sm"  data-toggle="modal" data-target="#add_users_modal">Add Users</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                  <!-- database a je row ta toiri hoyeche seta object hisebe thakche, setar output and value neorar jonno eta korlam -->
                  <?php 
                    $sql_query = "SELECT * FROM users ";
                    $sql_query_run = mysqli_query($connection, $sql_query);

                    // foreach loop die $sql_query_run theke je row ta pawa gelo tar key gulo check kore echo korbo sob <td> te:
                      if(mysqli_num_rows($sql_query_run) > 0) {
                      foreach($sql_query_run as $row) {
                        // echo $row['id'];
                        // echo $row['name'];
                        // echo $row['email'];

                  ?>
                      <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $row['phone'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td>
                        <a href="registered_user_edit.php?user_id=<?php echo $row['id'] ?>; " class="btn btn-info btn-sm">Edit</a>
                        <button type="button" value="<?php echo $row['id'] ?>" href="#" class="btn btn-danger btn-sm delete_btn">Delete</button type="button">
                      </td>
                      <td></td>
                      </tr>


                  <?php 
                        
                        
                      
                      }
                    } 
                    else {
                  ?>

                      <tr>
                        <td>No record found</td>
                      </tr>
                  
                  <?php
                    }

                    
                  ?>
                  
                  

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           </div>
        </div>
      </div>
    </section>
</div>




<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>



    <?php 
    include 'include/jQuery.php';
    ?>

    <script>
      // for live email check connected to add_user_modal.php
      $(document).ready(function () {
        $('.email_id').keyup(function (e) { 
          let email = $('.email_id').val();
          //console.log(email);

          // ajax for live email verification
          $.ajax({
            type: "POST",
            url: "form_process/add_user_modal.php",
            data: {
              'check_email_btn':1,
              'email': email,
            },
            success: function (response) {
              $('.email_error').text(response);
            }
          });
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $('.delete_btn').click(function (e) {
          e.preventDefault();

          let user_id = $(this).val();
          $('.delete_user').val(user_id);
          $('#delete_user').modal('show');
        })


      })
    </script>
    <?php 
        include 'include/footer.php';
    ?>
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  // for deleting users delete button
  
</script>