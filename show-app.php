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

$show_id =$_GET['show'];
$get_query ="SELECT  * FROM tests WHERE ID_Test= $show_id";
$get_run = mysqli_query($connection, $get_query);

if(mysqli_num_rows($get_run) >0){
    $rowu= mysqli_fetch_array($get_run);
    $idu = $rowu['ID_Test'];
    $content =$rowu['Content_Test'];
 ;
    
    
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
            <h1>Test Detail</h1>
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
          <h3 class="card-title">Test Detail</h3>

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
                         Name Test  :<?php echo $content;?>
                        </span>
                        <?php
                    $join_query="SELECT questions.Content_Que
                    FROM tests 
                    INNER JOIN questions ON (tests.ID_Test =3)";
                    $get_join_query = mysqli_query($connection, $join_query);
                        if(mysqli_num_rows($get_join_query) >0)
                        {
                        while ($ros = mysqli_fetch_array($get_join_query)) {
                        
                          $ros= mysqli_fetch_array($get_join_query);
                      
                          $que_name =$ros['Content_Que'];
                          ?>
                        <span class="username">
                         Name question  :<?php echo  $que_name;?>
                        </span>
                        <?php }}?>
                        <?php
                    $join_query1="SELECT answers.Content_Ans,questions.Content_Que
                    FROM questions 
                    inner JOIN answers  ON (questions.ID_Que = $show_id)";
                    $get_join_query1 = mysqli_query($connection, $join_query1);
                        if(mysqli_num_rows($get_join_query1) >0)
                        {
                        while ($ros1= mysqli_fetch_array($get_join_query1)) {
                        
                          $ros1= mysqli_fetch_array($get_join_query1);
                      
                          $ans_name =$ros1['Content_Ans'];
                          ?>
                        <span>
                         Name answer  :<?php echo  $ans_name;?>
                        </span>
                        <?php }}?>
                      </div>
              
                      <!-- /.user-block -->
        

                      <a  href="./tests.php" class="btn  btn-sm btn-primary">Back</a>
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

 
