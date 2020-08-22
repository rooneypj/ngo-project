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
                     
                     User management
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
                  <div class="table-scrollable">
                     <table
                        class="table table-striped table-bordered table-hover table-checkable order-column"
                        style="width: 100%" id="example4">
                        <thead>
                           <tr>
                              <th> S. No.</th>
                              <th>Name </th>
                              <th>Mobile No. </th>
                              <th> E-mail </th>
                              <th> Breakfast Address </th>
                              <th>Lunch Address</th>
                              <th> Actions </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
        function display_client(){
   
    global $conn;
    $arr=array();
    $query="Select * from user";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
        $arr[]=$row;
    }
    return $arr;
}
                              $n=1;
                              $client=display_client();
                              //print_r($client);
                             foreach($client as $row):
                               ?>
                           <tr>
                              <th scope="row"><?php echo $n;?></th>
                              <td><?php echo $row['name'];?></td>
                              <td><a href="tel:<?php echo $row['mobile'];?>"><button class="btn btn-success" style="border-radius:30px;"><i class="fa fa-phone"></i> <?php echo $row['mobile'];?></button></a></td>
                              <td><a href="mailto:<?php echo $row['email'];?>"><button class="btn btn-info" style="border-radius:30px;text-transform: none;"><i class="fa fa-envelope"></i> <?php echo $row['email'];?></button></a></td>
                              
                              
                              <td><?php echo $row['breakfast_address'];?><br/><?php echo $row['breakfast_pin'];?></td>
                             
                              
                              <td><?php echo $row['lunch_address'];?><br/><?php echo $row['lunch_pin'];?></td>
                             <td class="valigntop">
                                 <a href="delete-client.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" aria-hidden="true" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                              </td>
                           </tr>
                           <?php $n++; endforeach; ?>
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