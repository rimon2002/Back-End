<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>

<div class="content-wrapper">
    <!--Modal-->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label for="">Name:</label>
            <input type="text" name="name"  class="form-control" placeholder="name">
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input type="email" name="email"  class="form-control" placeholder="example:rimon65@gmail.com">
        </div>

        <div class="form-group">
            <label for="">Phone number:</label>
            <input type="number" name="phone"   class="form-control" placeholder="phone number">
        </div>
        <div class="form-group">
            <label for="">Password:</label>
            <input type="password" name="password"  class="form-control" placeholder="password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

                    <?php

                        if(isset($_SESSION['status']))
                        {

                            echo  "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }



                    ?>




    <div class="card">
              <div class="card-header">
                <h3 class="card-title"><h3 class="card-title">Registered Users
                    
                </h3>
                <a href="" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add user</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example 1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query="SELECT * FROM users";
                    $query_run=mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0)
                 {
                 foreach($query_run as $row)
                  {
                   //echo  $row['name'];
                   ?>
                   <tr>
                    <td><?php echo  $row['id']; ?></td>
                    <td><?php echo  $row['name']; ?></td>
                    <td><?php echo  $row['email']; ?></td>
                    <td><?php echo  $row['phone']; ?></td>
                    
                    <td>
                    <a href="">Edit</a>
                    <a href="">Delete</a>


                    </td>
                  </tr>
                   <?php
                  }



                 }
                   else{
                    ?>
                    <tr>
                      <td>No Record Found</td>
                    </tr>
                    <?php


                   }   
                   ?>
                    
                  
                  </tbody>
                  </table>
                  </div>
</div>


</div>

<?php
include('includes/footer.php');

?>