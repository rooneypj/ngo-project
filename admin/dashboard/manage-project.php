<?php 
    //  session_start();
    //  if(!isset($_SESSION['login_user'])){
    //      echo "<script>alert('login first');
    //      window.location.href='index.php';
    //      </script>";
    //      exit(0);
    //  }
   include('connection.php');
   include('includes/header.php');
   if(isset($_POST['submit']))
   {   
       $id = $_POST['id'];
        $location='uploads/';
       $final= time().$image=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $original='uploads/'.$final;
       move_uploaded_file($tmp_name,$original);
       $sql ="UPDATE project SET image='$final' WHERE id='$id'";
       if (mysqli_query($conn, $sql)) {
           ?>
<script>alert(' Project Image updated successfully');
   window.location.href ='manage-project.php';
</script>
<?php
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   
   }
   ?>
<div class="page-container">
<?php include('includes/sidebar.php')?>
<!-- start page content -->
<div class="page-content-wrapper">
<div class="page-content">
   <!-- start widget -->
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card card-topline-red">
            <div class="card-head">
               <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                  
                  Project management
               </header>
               <div class="tools">
                  <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                  <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                  <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
               </div>
            </div>
            <div class="card-body ">
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-6">
                     <div class="btn-group" wfd-id="183">
                        <a href="add-project.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
                        Add New <i class="fa fa-plus"></i>
                        </button></a>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-6">
                     <div class="btn-group pull-right">
                        <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                           data-toggle="dropdown">Tools
                        <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                           <li>
                              <a href="javascript:;">
                              <i class="fa fa-print"></i> Print </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                           </li>
                           <li>
                              <a href="javascript:;">
                              <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="table-scrollable">
                  <table
                     class="table table-striped table-bordered table-hover table-checkable order-column"
                     style="width: 100%" id="example4">
                     <thead>
                        <tr>
                           <th> #</th>
                           <th>Title</th>
                           <th>Short Description</th>
                           <th>Date </th>
                           <th> Client </th>
                           <th> Category </th>
                           <th> Location </th>
                           <th> Year </th>
                           <th> Long Description</th>
                           <th>Image</th>

                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $n=0;
                           $query1="SELECT * FROM project";
                           $result1=mysqli_query($conn,$query1);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row = $result1->fetch_assoc()) {
                           //  {
                            //   $status=$row['status'];
                               $id=$row['id'];
                            $n++;
                            ?>
                        <tr>
                           <th scope="row"><?php echo $n;?></th>
                           <td><?php echo $row['title'];?></td>
                           <td><?php echo $row['short_desc'];?></td>
                           <td><?php echo $row['date'];?></td>
                           <td><?php echo $row['client_name'];?></td>
                           <td><?php echo $row['category'];?></td>
                           <td><?php echo $row['area'];?></td>
                           <td><?php echo $row['year'];?></td>
                           <td><?php echo $row['long_desc'];?></td>
                           <td><img src="uploads/<?php echo $row['image'];?>" title="<?php echo $row['title'];?>" alt="<?php echo $row['title'];?>" height="75px" width="75px"></td>
                          
                          
                          
                              <!--<form action="status_active.php" method="post">-->
                              <!--   <input type="hidden" value="<?php echo $row['id'] ?>" name="tid"><button class="btn btn-info btn-sm" type="submit" name="workshop_active">Deactive</button>-->
                              <!--</form>-->
                              
                           </td>
                           <td class="valigntop">
                              <form action="edit-project.php" method="post">
                                 <input type="hidden" value="<?php echo $row['id'] ?>" name="tid">
                                 <button type="submit"  class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></button>
                              </form>
                              <button type="button" data-toggle="modal" data-target="#edit_img1<?php echo $row['id'] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-picture-o" aria-hidden="true" style="color:#fff;"></i></button>
                              <a href="delete-project.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                           </td>
                        </tr>
                       
                        <div class="modal fade" id="edit_img1<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Project Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <input type="file" name="image" class="form-control">
                                       <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>">
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <?php } ?>
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end page content -->
<?php include('includes/tools.php')?>
<!-- end page container -->
<?php include('includes/footer.php')?>