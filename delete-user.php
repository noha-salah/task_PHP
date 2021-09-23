<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
  ?>

<?php

//   if(!isset($_SESSION['username']))
//   {
//         header('location:login.php'); 
//   }
      
// $session_username=$_SESSION['username'];
if(isset($_GET['del'])){
$show_id =$_GET['del'];
$get_query ="SELECT  * FROM users WHERE id= $show_id";
$get_run = mysqli_query($connection, $get_query);
if(mysqli_num_rows($get_run) >0){
    $rowu= mysqli_fetch_array($get_run);
    $idu = $rowu['id'];
    $emailu =$rowu['email'];
    $usernameu =$rowu['username'];
    $passwordu =$rowu['password'];
    $roleu = $rowu['role'];}
    
    


   
      $del_query="DELETE FROM `users` WHERE `users`.`id` = $show_id";
    
      if(mysqli_query($connection,$del_query))
      {
         $msg= "user delete"; 
          
      }
   else {
       $error1="no delete";   
      }




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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
         
              <div class="row">
                <div class="col-12">
               
                    <div class="post">
                      <div class="user-block">
                       
                        <span class="username">
                         Name  :<?php echo $usernameu;?>
                        </span>
                        <span class="username">
                          Role : <?php echo $roleu;?>
                        </span>
                        <span class="username">
                         Email : <?php echo $emailu;?>
                        </span>
                       
                      </div>
                      <!-- /.user-block -->
                   <?php
                   
 

    
    

   
    
    
    
?>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<label>Are you sure Delete ...?</label>
<button  type="submit"  name="submit"class="btn btn-sm btn-dangar">Delete<button>
<a href="./users.php" class="btn btn-sm btn-primary">cancel<button>


                   </form>

                      <a  href="./users.php" class="btn  btn-sm btn-primary">Back</a>
                    </div>

                  
                </div>
              </div>
            </div>
          
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <?php include('inc/footer.php'); ?>

 
