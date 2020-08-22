<?php 
include('connection.php');
include('includes/header.php');
if(isset($_POST['submit']))
{    
    $cid=$_POST['cid'];
    $title=$_POST['title'];
     $note=$_POST['note'];
     $location="uploads/";
 $profile=$_FILES['profile']['name'];
$tmp=$_FILES['profile']['tmp_name'];
$original="uploads/slider/".$profile;
move_uploaded_file($tmp,$original);
     
    $sql ="UPDATE slider SET title='$title',note='$note',image='$profile' WHERE id='$cid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' slider updated successfully');
        //window.location.href ='slider.php';</script>
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
                                    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Slider-Management</header>
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
                                                <a href="add_slider.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
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
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column"
                                            style="width: 100%" id="example4">
                                            <thead>
                                                <tr>
                                                    <th> S. No.</th>
                                                    <th> Slider Title </th>
                                                    <th> Slider Image </th>
                                                    <th> Note</th>
                                                     <th> Status</th>
                                                   <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
        $n=0;
        $query1="SELECT * FROM slider";
       $result1=mysqli_query($conn,$query1);
       while($row = $result1->fetch_assoc()) {
        $id=$row['id'];
        $status=$row['status'];
         $n++;
         ?>
<tr>
                                                            <th scope="row"><?php echo $n;?></th>
                                                            <td><?php  echo $row['title'];?></td>
                                                            <td><img  src="<?php  echo 'uploads/slider/'.$row['image'] ?>" style="height: auto;width: 300px;" alt="Slider Image" /></td>
                                                            <td><?php echo $row['note'];?></td>
                                                            
<td>
                            <?php
                                 if($status==0){
                                     ?>
                                     <form action="status_deactive.php" method="post">
                                      <input type="hidden" name="tid" value="<?php echo $row['id']?>">
                              <button  type="submit"  name="slider_deactive" class="btn btn-success btn-sm" onclick="return confirm('are you sure  want to deactive this');" >Active</button>
                              </form>
                              <?php
                                 }
                                 else{
                                   ?>
                             <form action="status_active.php" method="post">
                                      <input type="hidden" name="tid" value="<?php echo $row['id']?>">
                              <button  type="submit"  name="slider_active" class="btn btn-info btn-sm" onclick="return confirm('are you sure  want to active this');" >Deactive</button>
                              </form>
                              
                              <?php  
                                 }
                                 ?>
                          </td>
                                                            <td class="valigntop">
                                                               
                        <button type="button" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>" class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></button>
                        
                                         
                                         
                                                                <a href="delete_slider.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick=" return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                               

                                                            </td>
                                                            
                   
                                                        </tr>
<div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      
           	<div class="col-lg-12 p-t-20">
           	                           	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title"  value="<?php echo $row['title'] ?>" >
											<label class="mdl-textfield__label">Slider Title </label>
										</div>
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										    	<label>Slider Image </label>
											<input type="file" class="form-control" name="profile" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
										
										</div>
									</div>
										<div class="col-lg-12 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="note"  value="<?php echo $row['note'] ?>" >
											<label class="mdl-textfield__label">Note </label>
										</div>
									</div>
             <input type="hidden" name="cid" class="form-control" value="<?php echo $row['id'] ?>">
       
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
    <script type="text/javascript">
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" height="100"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

  
<!-- end page container -->
<?php include('includes/footer.php')?>