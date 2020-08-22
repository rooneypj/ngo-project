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
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Manage Menu</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group" wfd-id="183">
                                                <a href="add-menu.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <!--<div class="btn-group pull-right">-->
                                            <!--    <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"-->
                                            <!--        data-toggle="dropdown">Tools-->
                                            <!--        <i class="fa fa-angle-down"></i>-->
                                            <!--    </button>-->
                                            <!--    <ul class="dropdown-menu pull-right">-->
                                            <!--        <li>-->
                                            <!--            <a href="javascript:;">-->
                                            <!--                <i class="fa fa-print"></i> Print </a>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <a href="javascript:;">-->
                                            <!--                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <a href="javascript:;">-->
                                            <!--                <i class="fa fa-file-excel-o"></i> Export to Excel </a>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                        <table  class="table table-striped table-bordered table-hover table-checkable order-column"  style="width: 100%" id="example4">
                                            <thead>
                                                <tr>
                                                    <th> S. No.</th>
                                                    <th>Meal Time </th>
                                                    <th> Meal Week</th>
                                                    <th> Date</th>
                                                    
                                                   <th>Menu</th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                   $n=0;
                                                   $query1="SELECT * FROM menu";
                                                   $result1=mysqli_query($conn,$query1);
                                                   //  while($row=mysqli_fetch_array($result1))
                                                    while($row = $result1->fetch_assoc()) 


                                                        {

                                                        $n++;
                                                        $mealtime=$row['meal_time'];
                                                        $week=$row['week'];
                                                        $m_id=$row['menu_id'];
                                                        $menu1=$row['menu1'];
                                                        $mealdate1=$row['day1'];
                                                        $menu2=$row['menu2'];
                                                        $mealdate2=$row['day2'];
                                                        $menu3=$row['menu3'];
                                                        $mealdate3=$row['day3'];
                                                        $menu4=$row['menu4'];
                                                        $mealdate4=$row['day4'];
                                                        $menu5=$row['menu5'];
                                                        $mealdate5=$row['day5'];
                                                        $menu6=$row['menu6'];
                                                        $mealdate6=$row['day6'];
                                                        $menu7=$row['menu7'];
                                                        $mealdate7=$row['day7'];
                                                      
                                                         
                                                    ?>
                                              <tr>
                                                  <td><?= $n ?></td>
                                                  <td><?= $mealtime ?></td>
                                                  <td><?= $week ?></td>
                                                  <td>
                                                       <ol>
                                                        <li><?php echo date("l", strtotime($mealdate1)) ?></li>
                                                         <li><?php echo date("l", strtotime($mealdate2)) ?></li>
                                                          <li><?php echo date("l", strtotime($mealdate3)) ?></li>
                                                           <li><?php echo date("l", strtotime($mealdate4)) ?></li>
                                                            <li><?php echo date("l", strtotime($mealdate5)) ?></li>
                                                             <li><?php echo date("l", strtotime($mealdate6)) ?></li>
                                                              <li><?php echo date("l", strtotime($mealdate7)) ?></li>
                                                     
                                                     </ol>
                                                     
                                                  </td>
                                                  <td>
                                                      <ol>
                                                        <li><?php echo $menu1 ?></li>
                                                        <li><?php echo $menu2 ?></li>
                                                        <li><?php echo $menu3 ?></li>
                                                        <li><?php echo $menu4 ?></li>
                                                        <li><?php echo $menu5 ?></li>
                                                        <li><?php echo $menu6 ?></li>
                                                        <li><?php echo $menu7 ?></li>
                                                      
                                                     </ol>
                                                      
                                                     </td>
                                                  
                                                <td class="valigntop">
                                                    <a href="edit-menu.php?id=<?= $m_id?>"><button type="button"  class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></button></a>
                                                   <a href="delete_menu.php?id=<?= $m_id?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>     
                                     </div>
                                 </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
  
   
  
<!-- end page container -->
<?php include('includes/footer.php')?>