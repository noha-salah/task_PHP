<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
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
  if(isset($_POST['submit'])){
    $content = mysqli_real_escape_string($connection, $_POST['content']);

    $check_query="SELECT * FROM tests WHERE Content_Test ='$content'";
    $check_run =mysqli_query($connection,$check_query);


if(empty($content))
                  {
                      $error1 = "ALL (*) feilds Are Required";
                  }

 elseif (mysqli_num_rows($check_run) > 0) {
 $error1 =" Content Already Exist ";    
}

 else {
     
         $insert_query = "INSERT INTO `tests` (`Content_Test`) VALUES ( '$content')";
   
    if(mysqli_query($connection,$insert_query))
    {
        $msg="Test ADDED";
       
        
    }
 else {
    
     $error1="Error in Add Process ";
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
            <h1>users</h1>
          </div>
    
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">users</h3>

         
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
                    <label for="username">Test Name</label>
                    <input type="text" class="form-control"  name="content"  placeholder="Enter username">
                  </div>
               
               
                
      
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
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

 











