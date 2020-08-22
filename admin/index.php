<?php
include('includes/header.php');
include('connection.php');
$select_user="SELECT * FROM slider";
$result_user=mysqli_query($conn,$select_user);
 $total_user= mysqli_num_rows($result_user);
$select_order="SELECT * FROM ngo";
$result_order=mysqli_query($conn,$select_order);
 $total_order= mysqli_num_rows($result_order);
$select_cost="SELECT * FROM contactus";
$result_cost=mysqli_query($conn,$select_cost);
 $total_cost= mysqli_num_rows($result_cost);

?>
<!-- start page container -->
<div class="page-container">
<?php include('includes/sidebar.php')?>
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            
            <!-- start widget -->
           <div class="state-overview">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="overview-panel purple">
                                    <div class="symbol">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php echo $total_user; ?>"><?php echo $total_user; ?></p>
                                        <p>Slider</p>
                                    </div>
                                </div>
                            </div>
                              <div class="col-lg-4 col-sm-6">
                                <div class="overview-panel orange">
                                    <div class="symbol">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php echo $total_order; ?>"><?php echo $total_order; ?></p>
                                        <p>  NGO's</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="overview-panel deepPink-bgcolor">
                                    <div class="symbol">
                                        <i class="fa fa-users usr-clr"></i>
                                    </div>
                                    <div class="value white">
                                        <p class="sbold addr-font-h1" data-counter="counterup" data-value="<?php echo $total_cost; ?>"><?php echo $total_cost; ?></p>
                                        <p> Inquiries</p>
                                    </div>
                                </div>
                            </div>
                          
                           
                        </div>
                    </div>
            <!-- end widget -->
            <!-- start widget -->
           
        </div>
    </div>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>