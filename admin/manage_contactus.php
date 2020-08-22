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
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Inquiry-Management</header>
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
                                                <!--<a href="add_package.php"><button id="addRow1" class="btn btn-info" wfd-id="431">-->
                                                <!--    Add New <i class="fa fa-plus"></i>-->
                                                <!--</button></a>-->
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group pull-right">
                                                <!--<button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"-->
                                                <!--    data-toggle="dropdown">Tools-->
                                                <!--    <i class="fa fa-angle-down"></i>-->
                                                <!--</button>-->
                                                </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column"
                                            style="width: 100%" id="example4">
                                            <thead>
                                                <tr>
                                                    <th> S. No.</th>
                                                    <th> Name </th>
                                                   
                                                    <th> Mobile</th>
                                                    <th> Email </th>
                                                    <th> Message </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
        $n=0;
        $query1="SELECT * FROM contactus";
       $result1=mysqli_query($conn,$query1);
       
         while($row = $result1->fetch_assoc()) {
        
             $id=$row['id'];
         $n++;
         ?>
<tr>
                                                            <th scope="row"><?php echo $n;?></th>
                                                            <td><?php echo $row['name'];?></td>
                                                            <td><a href="tel:<?php echo $row['mobile'];?>"><button class="btn btn-success" style="border-radius:30px;"><i class="fa fa-phone"></i> <?php echo $row['mobile'];?></button></a></td>
                              <td><a href="mailto:<?php echo $row['email'];?>"><button class="btn btn-info" style="border-radius:30px;text-transform: none;"><i class="fa fa-envelope"></i> <?php echo $row['email'];?></button></a></td>
                                                           
                                                            <td><?php echo $row['message'];?>
                                                            </td>
                                                            <td class="valigntop">
                                 <a href="delete_inquiry.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" aria-hidden="true" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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
    </div>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
    <script type="text/javascript">
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
  
<!-- end page container -->
<?php include('includes/footer.php')?>