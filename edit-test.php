<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
  ?>


<?php

 if(isset($_GET['edit'])){ 
     
    $edit_id =$_GET['edit'];

$get_query ="SELECT  * FROM tests WHERE ID_Test= $edit_id";
$get_run = mysqli_query($connection, $get_query);
if(mysqli_num_rows($get_run) >0){
    $rowu= mysqli_fetch_array($get_run);
    $id = $rowu['ID_Test'];
    $content =$rowu['Content_Test'];
    
    
}else{
    
 
header('location: tests.php'); }
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


  //$update_query="UPDATE `users` SET `email`='$email' WHERE `users`.`id` = $edit_id";
echo "id=" . $edit_id;
  $query="UPDATE `tests` SET `Content_Test`='$content' WHERE `ID_Test`=?";

//   $update_query="UPDATE `tests` SET `Content_Test`='$content' WHERE `ID_Test` = $edit_id";

  // if(isset($password)){
  // $update_query .=",`password` = '$password1'";
  // }

  //$update_query .="WHERE `users`.`id` = $edit_id";

      
    if(mysqli_query($connection,$query))
    {
        $msg="Test edit";
     
        
    }
 else {
    
     $error1="Error in edit Process ";
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
                    <label for="username">Name Test</label>
                    <input type="text" class="form-control" value="<?php  if(isset($content)){echo $content ;}?>"  name="content" placeholder="Enter email">
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

 











