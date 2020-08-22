<?php 
   
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
                  
                 Order-Management
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
                     <div class="btn-group pull-right">
                        <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                           data-toggle="dropdown">Tools
                        <i class="fa fa-angle-down"></i>
                        </button>
                        <!--<ul class="dropdown-menu pull-right">-->
                        <!--   <li>-->
                        <!--      <a href="javascript:;">-->
                        <!--      <i class="fa fa-print"></i> Print </a>-->
                        <!--   </li>-->
                        <!--   <li>-->
                        <!--      <a href="javascript:;">-->
                        <!--      <i class="fa fa-file-pdf-o"></i> Save as PDF </a>-->
                        <!--   </li>-->
                        <!--   <li>-->
                        <!--      <a href="javascript:;">-->
                        <!--      <i class="fa fa-file-excel-o"></i> Export to Excel </a>-->
                        <!--   </li>-->
                        <!--</ul>-->
                     </div>
                  </div>
               </div>
               <div class="table-scrollable">
                  <table
                     class="table table-striped table-bordered table-hover table-checkable order-column"
                     style="width: 100%" id="example4">
                     <thead>
                        <tr>
                           <th>S. No.</th>
                           <th>User</th>
                           <th>Meal-Time </th>
                           <th>Meal-Type</th>
                           <th>Plan</th>
                           <th> Duration</th>
                           <th>Quantity</th>
                           <th>day In Week</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                            <th>Delivery Address</th>
                           <th>Total Price</th>
                           <th>Payment-Method</th>
                           <th>Status</th>
                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                           $n=1;
                           $query1="SELECT * FROM meal_order ORDER BY id DESC";
                           $result1=mysqli_query($conn,$query1);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row = $result1->fetch_assoc()) {
                           //  {
                               $status=$row['status'];
                                $add=$row['del_address'];
                               $id=$row['id'];
                                $ic=$row['user_id'];
                            
                            ?>
                        <tr>
                           <td scope="row"><?php echo $n;?></td>
                           <td><?php $ic=$row['user_id'];
                           $query12="SELECT * FROM user where id='$ic'";
                           $result12=mysqli_query($conn,$query12);
                           while($row12 = $result12->fetch_assoc()) {
                          echo $row12['name']; }?></td>
                           <td><?php echo $row['meal_time'];?></td>
                           <td><?php echo $row['meal_type'];?></td>
                           <td><?php echo $row['plan'];?></td>
                           <td><?php echo $row['duration'];?></td>
                           <td><?php echo $row['quantity'];?></td>
                           <td><?php echo $row['day_in_week'];?></td>
                            <td><?php echo $row['start_date'];?></td>
                              <td><?php echo $row['end_date'];?></td>
                              <?php
                           $query13="SELECT * FROM user where id='$ic'";
                           $result13=mysqli_query($conn,$query12);
                           while($row13 = $result13->fetch_assoc()) {
                       if($add=='0'){
                        ?>
                               <td><?php echo $row13['breakfast_address']?><br/><?php echo $row13['breakfast_pin']?></td>
                               <?php }
                               else if($add=='1') {?>
                                <td><?php echo $row13['lunch_address']?><br/><?php echo $row13['lunch_pin']?></td>
                                <?php } }?>
                               <td><?php echo $row['total_price']; ?></td>
                                <td><?php echo $row['payment_method'];?></td>
                         
                           <td>
                              <?php
                                 if($status==0){
                                     ?>
                              <button class="btn btn-success btn-sm" >Active</button>
                              
                              <?php
                                 }
                                 else{
                                   ?>
                              <button class="btn btn-info btn-sm" >Deactive</button>
                              
                              <?php  
                                 }
                                 ?>
                           </td>
                           <td class="valigntop">
                             
                             
                              <a href="delete_order.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                           </td>
                        </tr>
                        
                           <?php $n++; } ?>
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