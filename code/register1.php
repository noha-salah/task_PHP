      
  
<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
  ?>
  <?php
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $role = "normal";
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

 elseif (mysqli_num_rows($check_run) > 0) {
 $error1 =" Username Or Email Already Exist ";    
}

 else {
     
         $insert_query = "INSERT INTO `users` ( `email`,`username`, `password`, `role`) VALUES ( '$email', '$username','$password1', '$role')";
   
    if(mysqli_query($connection,$insert_query))
    {
        $msg="USER ADDED";
       
        
    }
 else {
    
     $error1="Error in Add Process ";
    }
    
    }

  }
  ?>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <img src="online.png" width="70px" height="70px"\>
  <br>
<b>System</b>Education
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

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
        <div class="input-group mb-3">
          <input type="text"  name="username" class="form-control" placeholder="User name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
    
      
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="submit" class="btn-sm btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

   

      <a href="login1.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php include('inc/footer.php'); ?>

 