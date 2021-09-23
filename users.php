
  
<?php
include('inc/db.php');
  ?>
<?php
include('inc/header.php');
 

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
            <h1>users</h1>
            <a class="btn btn-primary btn-sm" href="./add-user.php">
                              <i class="fas fa-plus">
                              </i>
                             Add User
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
          <h3 class="card-title">users</h3>

         
        </div>
        <?php
  $queryu="SELECT * FROM users ORDER BY id DESC";
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
                       UserName
                      </th>
                
                      <th style="width: 20%">
                          Email
                      </th>
                      <th style="width: 20%">
                       Role
                    </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php
            while ($rowu = mysqli_fetch_array($runu)) {
           $id = $rowu['id'];

          $email =$rowu['email'];
          $username =$rowu['username'];
          $password =$rowu['password'];
          $role = $rowu['role'];
        
         
              
          ?>
                  <tr>
                      <td>
                      <?php echo $id ;?>
                      </td>
                      <td>
                      <?php echo $username ;?>
                      </td>
                      <td>
                      <?php echo $email ;?>
                    </td>
                    <td>
                    <?php echo $role ;?>
                  </td>
                     
                   
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="show-user.php?show=<?php  echo $id;  ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="edit-user.php?edit=<?php  echo $id;  ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                 
                          <a class="btn btn-danger btn-sm" href="users.php?del=<?php  echo $id;  ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <div class="modal fade" id="modal-default">
        
        <!-- /.modal-dialog -->
      </div>
        <div class="modal fade" id="user<?php echo  $id;?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete User </h4>
        </div>
        <div class="modal-body">
          <p style="color:red;">Are You Sure Delete ...?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     
          
          <a  class="btn btn-danger" href="users.php?del=<?php  echo $id ;?>"  >Delete</a>
      
      </div>
    </div>
  </div>
</div>
                  <?php } ?>
                

              </tbody>
          </table>
          <?php
           
          }else {
            echo "<center> <h2 class='alert alert-info' role='alert'>  NO Users Available NOW...</h2></center>";  
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

 