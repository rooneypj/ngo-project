<?php 
include('connection.php');
include('includes/header.php');
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $package_name = $_POST['package_name'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
     
    $sql ="UPDATE cost SET package_name='$package_name',price='$price',duration='$duration' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Package updated successfully');
        window.location.href ='manage_package.php';</script>
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
                                                    <th> Email </th>
                                                    <th> Mobile</th>
                                                   <th>Website</th>
                                                    <th> Message </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
        $n=0;
        $query1="SELECT * FROM contactus";
       $result1=mysqli_query($conn,$query1);
       
         while($row = $result1->fetch_assoc()) {
        //  {
            $status=$row['status'];
             $id=$row['id'];
         $n++;
         ?>
<tr>
                                                            <th scope="row"><?php echo $n;?></th>
                                                            <td><?php echo $row['name'];?></td>
                                                            <td><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td>
                                                            <td> <a href="tel:<?php echo $row['mobile'];?>"><?php echo $row['mobile'];?></a></td>
                                                            <td><?php echo $row['website'];?></td>
                                                            <td><?php echo $row['message'];?>
                                                            </td>

                                                          </tr>
<div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      
           	<div class="col-lg-12 p-t-20">
           	                           	<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="package_name"  value="<?php echo $row['package_name'] ?>" >
											<label class="mdl-textfield__label">Price </label>
										</div>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="price"  value="<?php echo $row['price'] ?>" >
											<label class="mdl-textfield__label">Price </label>
										</div>
									</div>
										<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="duration"  value="<?php echo $row['duration'] ?>" >
											<label class="mdl-textfield__label">Duration </label>
										</div>
									</div>
             <input type="hidden" name="id" class="form-control" value="<?php echo $row['id'] ?>">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
    <script type="text/javascript">
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
  
<!-- end page container -->
<?php include('includes/footer.php')?>