

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
    $test = mysqli_real_escape_string($connection, $_POST['test']);

    $check_query="SELECT * FROM questions WHERE Content_Que ='$content'";
    $check_run =mysqli_query($connection,$check_query);


if(empty($content))
                  {
                      $error1 = "ALL (*) feilds Are Required";
                  }

 elseif (mysqli_num_rows($check_run) > 0) {
 $error1 =" Content Already Exist ";    
}

 else {
     
         $insert_query = "INSERT INTO `questions` (`Content_Que`,`Id_Test`) VALUES ( '$content','$test')";
   
    if(mysqli_query($connection,$insert_query))
    {
        $msg="Question ADDED";
    
      // header("Refresh:0; url=questions.php");
        
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
                    <label for="username">Question Content</label>
                    <input type="text" class="form-control"  name="content"  placeholder="Enter username">
                  </div>
               
               
                  <div class="form-group">    
        <label> Select Test </label>            
        <id="eventID" /> 


        <select  class="custom-select mr-sm-2" name="test">
<?php
        $res=mysqli_query($connection,"SELECT * FROM tests");
        while($row=mysqli_fetch_array($res))
{
?>
         <option value="<?php echo $row["ID_Test"]; ?>"><?php echo $row["Content_Test"]; ?></option>

<?php
}


?> 

    </select>
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

 











