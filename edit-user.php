<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
  ?>


<?php

 if(isset($_GET['edit'])){

$edit_id =$_GET['edit'];
$get_query ="SELECT  * FROM users WHERE id= $edit_id";
$get_run = mysqli_query($connection, $get_query);
if(mysqli_num_rows($get_run) >0){
    $rowu= mysqli_fetch_array($get_run);
    $idu = $rowu['id'];
    $emailu =$rowu['email'];
    $usernameu =$rowu['username'];
    $passwordu =$rowu['password'];
    $roleu = $rowu['role'];
    
    
}else{
    
 
header('location: users.php'); }
 }
 
?>

<body class="hold-transition sidebar-mini">
<!-- Site w00rapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php
include('inc/navbar.php');
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
 
  <?php
include('inc/sidebarinfo.php');
  ?>
   

      <!-- Sidebar Menu -->
      <?php
include('inc/sidebar.php');
  ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php
  if(isset($_POST['update'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = $_POST['role'];
    $check_query="SELECT * FROM users WHERE username ='$username' or email='$email'";

$check_run =mysqli_query($connection,$check_query);
$salt_pass="SELECT *FROM users ORDER BY id DESC LIMIT 1";
$salt_run= mysqli_query($connection, $salt_pass);
$salt_row = mysqli_fetch_array($salt_run);
$salt =$salt_row['salt'];
$password1=crypt($password,$salt);

if(empty($username) or empty($email) or empty($password))
                  {
                      $error1 = "ALL (*) feilds Are Required";
                  }

 

 else {

  //$update_query="UPDATE `users` SET `email`='$email' WHERE `users`.`id` = $edit_id";

  $update_query="UPDATE `users` SET `username`='$username' WHERE `id` = $edit_id";

  // if(isset($password)){
  // $update_query .=",`password` = '$password1'";
  // }

  //$update_query .="WHERE `users`.`id` = $edit_id";

      
    if(mysqli_query($connection,$update_query))
    {
        $msg="USER edit";
     
        
    }
 else {
    
     $error1="Error in edit Process ";
    }
    
    }

  }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit users</h1>
          </div>
    
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Edit users</h3>

         
        </div>
 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="card-body">
                <?php  if(isset($error1))
          {
              echo "<div class='alert alert-danger' role='alert'> $error1 </div>";
              

     
          }
          else if (isset($msg)) {
           echo "<div class='alert alert-success' role='alert'> $msg </div>";
                 
          
      }
?>
      
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control"value="<?php  if(isset($usernameu)){echo $usernameu ;}?>"  name="username" id="username" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control"  value="<?php  if(isset($emailu)){echo $emailu ;}?>"  name="email" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  value="<?php  if(isset($passwordu)){echo $passwordu ;}?>"   name="password" id="password" placeholder="Password">
                  </div>
                
                  <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio"  value="admin" name="role">
                          <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="normal" name="role" checked>
                          <label class="form-check-label">Normal</label>
                        </div>
                      
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="update" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('inc/footer.php'); ?>

 











