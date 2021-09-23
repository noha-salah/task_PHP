
  
<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
 

if(isset($_GET['del'])){
$show_id =$_GET['del'];
$get_query ="SELECT  * FROM questions WHERE ID_Que= $show_id";
$get_run = mysqli_query($connection, $get_query);
if(mysqli_num_rows($get_run) >0){
    $rowu= mysqli_fetch_array($get_run);
    $id = $rowu['ID_Que'];
    $content =$rowu['Content_Que'];
}
    
    


   
      $del_query="DELETE FROM `questions` WHERE `questions`.`ID_Que` = $show_id";
    
      if(mysqli_query($connection,$del_query))
      {
         $msg= "Question delete"; 
          
      }
   else {
       $error1="no delete";   
      }




}

?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
            <h1>Questions</h1>
            <a class="btn btn-primary btn-sm" href="./add-que.php">
                              <i class="fas fa-plus">
                              </i>
                             Add Question
                          </a>
          </div>
    
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Questions</h3>

         
        </div>
        <?php
  $queryu="SELECT * FROM questions ORDER BY ID_Que DESC";
  $runu= mysqli_query($connection,$queryu);
  if(mysqli_num_rows($runu) >0)
  {
  ?>
        <div class="card-body p-0">
          <table class="table table-striped users">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                      Question  Content
                      </th>   
                      <th style="width: 20%">
                     Test Name
                      </th>   
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
            while ($rowu = mysqli_fetch_array($runu)) {
                $id = $rowu['ID_Que'];
                $content =$rowu['Content_Que'];
       
                $Id_Test =$rowu['Id_Test'];
        
         
              
          ?>
                  <tr>
                      <td>
                      <?php echo $id ;?>
                      </td>
                      <td>
                      <?php echo  $content ;?>
                      </td>
                      <?php
   $get_query ="SELECT  * FROM tests WHERE ID_Test= $Id_Test";
   $get_run = mysqli_query($connection, $get_query);
   if(mysqli_num_rows($get_run) >0){
       $rowu= mysqli_fetch_array($get_run);
       $idu = $rowu['ID_Test'];
       $test_name =$rowu['Content_Test'];
    ;
       
       
       }
                     ?>
<td>
                      <?php echo  $test_name; ?>
                      </td>

                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="show-que.php?show=<?php  echo $id;  ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="edit-que.php?edit=<?php  echo $id;  ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                 
                          <a class="btn btn-danger btn-sm" href="questions.php?del=<?php  echo $id;  ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
            

                  <?php } ?>
                

              </tbody>
          </table>
          <?php
           
          }else {
            echo "<center> <h2 class='alert alert-info' role='alert'>  NO Qustions Available NOW...</h2></center>";  
        }
        
        ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('inc/footer.php'); ?>

 