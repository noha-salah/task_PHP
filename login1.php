<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
  ?>
  <?php
ob_start();
  session_start();

if(isset($_POST['submit'])){
    
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);

    $check_username_query = "SELECT *  FROM users WHERE username ='$username'";
    $check_username_run =mysqli_query($connection,$check_username_query);
    if(mysqli_num_rows($check_username_run)>0){
        $row = mysqli_fetch_array($check_username_run);
        $db_username=$row['username'];
        $db_password=$row['password'];
          $db_role=$row['role'];
         
          $password =crypt($password,$db_password);
          
          
if($username == $db_username ||  $db_password == $password){
            header('location:index.php');  
            $_SESSION['username'] =$db_username;
            $_SESSION['role'] =$db_role;
             $_SESSION['author_image'] =$db_author_image;
           
          }
 else {
     
      $error =" Wrong UserName Or Password";
 }
          
          
          
          
    }
 else {
    
     $error =" Wrong UserName Or Password";
     
     
    }
    
    
    
    
    
    
}

?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">  <img src="online.png" width="70px" height="70px"\>
  <br>
<b>System</b>Education
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to  your session</p>

      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input-group mb-3">
          <input type="text"  name="username" class="form-control" placeholder="username">
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
        <label>
                <?php
            
                if(isset($error))
                {
                    
                     echo "<div class='alert alert-danger' role='alert'> $error </div>";
                }
                ?>
                
                
            </label>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit"  name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="register1.php" class="btn btn-sm btn-block btn-default">
          <i class="fab fa-plus"></i> Create Account
        </a>
     
      </div>

    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include('inc/footer.php'); ?>

