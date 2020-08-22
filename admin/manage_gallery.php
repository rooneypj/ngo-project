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
                     <span >Gallery management</span> <span class="floar-right">
                         
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
                  <a href="add_gallery.php" class='btn btn-primary' >+ Add </a></span></td>
                             
                  <div class="table-scrollable">
                     <table
                        class="table table-striped table-bordered table-hover table-checkable order-column"
                        style="width: 100%" id="example4">
                        <thead>
                           <tr>
                              <th> S. No.</th>
                              <th>NGO </th>
                              <th>Title </th>
                              <th>Image</th>
                              <th>Date</th>
                              <th> Actions </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
      
    $query="SELECT gallery.*,ngo.title
FROM gallery
LEFT JOIN ngo
ON gallery.ngoid = ngo.id";
    $result=mysqli_query($conn,$query);
    $n=0;
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
   $n++;
                               ?>
                           <tr>
                              <th scope="row"><?php echo $n;?></th>
                              <td><?php echo $row['title'];?></td>
                               <td><?php echo $row['titles'];?></td>
                              <td><img src="uploads/gallery/<?php echo $row['image'];?>" height="200" width="200"></td>
                              <td><?=  $row['dates'] ?></td>
                              <td class="valigntop">
                                 <a href="delete_gallery.php?id=<?php echo $row['id']?>">
                                     <button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" aria-hidden="true" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
                                         <i class="fa fa-trash" aria-hidden="true"></i></button></a>
                              </td>
                           </tr>
                     <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div><!-- Button trigger modal -->

<!-- end page content -->
<?php 

include('includes/tools.php')?>
<!-- end page container -->
<?php include('includes/footer.php')?>