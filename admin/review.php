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
                  
                  Review management
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
                        <!--<a href="add-workshop.php"><button id="addRow1" class="btn btn-info" wfd-id="431">-->
                        <!--Add New <i class="fa fa-plus"></i>-->
                        <!--</button></a>-->
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-6">
                     <!--<div class="btn-group pull-right">-->
                     <!--   <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"-->
                     <!--      data-toggle="dropdown">Tools-->
                     <!--   <i class="fa fa-angle-down"></i>-->
                     <!--   </button>-->
                     <!--   <ul class="dropdown-menu pull-right">-->
                     <!--      <li>-->
                     <!--         <a href="javascript:;">-->
                     <!--         <i class="fa fa-print"></i> Print </a>-->
                     <!--      </li>-->
                     <!--      <li>-->
                     <!--         <a href="javascript:;">-->
                     <!--         <i class="fa fa-file-pdf-o"></i> Save as PDF </a>-->
                     <!--      </li>-->
                     <!--      <li>-->
                     <!--         <a href="javascript:;">-->
                     <!--         <i class="fa fa-file-excel-o"></i> Export to Excel </a>-->
                     <!--      </li>-->
                     <!--   </ul>-->
                     <!--</div>-->
                  </div>
               </div>
               <div class="table-scrollable">
                  <table
                     class="table table-striped table-bordered table-hover table-checkable order-column"
                     style="width: 100%" id="example4">
                     <thead>
                        <tr>
                           <th> #</th>
                           <th> Name </th>
                           <th>Mobile </th>
                           <th> Star </th>
                           <th> Status </th>
                           <th> Message</th>
                          
                           
                           
                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $n=0;
                           $query1="SELECT * FROM rating";
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
                           <td><?php echo $row['name'];?></td>
                           <td><a href="tel:<?php echo $row['mobile'];?>"><?php echo $row['mobile'];?></a></td>
                           <td><?php echo $row['star'];?></td>
                           <td><?php
                             $userstatus=$row['status'];
                            if($userstatus=='0'){
                               ?>
                               <a href='disable_review.php?id=<?= $row['id']?>&'><button class='btn btn-primary btn-sm' title='Click to Deactivate review'>Active</button>
                           <?php 
                           }
                           else{
                               ?>
                            <a href='enable_review.php?id=<?= $row['id'] ?>'><button class='btn btn-danger btn-sm' title='Click to activate review'>Deactivated</button>

                           <?php
                               
                           }
                           
                           ?></td>
                           <td><?php echo $row['message'];?></td>
                          
                         
                         
                             
                           <td class="valigntop">
                              <!--<form action="edit-workshop.php" method="post">-->
                              <!--   <input type="hidden" value="<?php echo $row['id'] ?>" name="tid">-->
                              <!--   <button type="submit"  class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></button>-->
                              <!--</form>-->
                             
                              <a href="delete_review.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                           </td>
                        </tr>
                         </tbody>
                        <?php } ?> 
                        
                        </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>

<?php include('includes/tools.php')?>

<?php
include('includes/footer.php')
?>