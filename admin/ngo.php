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
       $sql ="UPDATE ngo SET image='$final' WHERE id='$id'";
       if (mysqli_query($conn, $sql)) {
           ?>
<script>alert(' Data Image updated successfully');
   window.location.href ='ngo.php';
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
                  
                 NGO management
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
                        <a href="add_ngo.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
                        Add New <i class="fa fa-plus"></i>
                        </button></a>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-6">
                    
                  </div>
               </div>
               <div class="table-scrollable">
                  <table
                     class="table table-striped table-bordered table-hover table-checkable order-column"
                     style="width: 100%" id="example4">
                     <thead>
                        <tr>
                           <th> #</th>
                           <th>Image</th>
                           <!--<th>View Description</th>-->
                            <th> Location </th>
                            <th> working on corona </th>
                            <th> Ac/No </th>
                            <th> IFSC </th>
                            <th> Bank Name </th>
                            <th> Add By </th>
                            <th> Status </th>
                           <th> Actions </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $n=0;
                           $query1="SELECT * FROM ngo";
                           $result1=mysqli_query($conn,$query1);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row = $result1->fetch_assoc()) {
                           //  {
                              $status=$row['status'];
                               $id=$row['id'];
                            $n++;
                            ?>
                        <tr>
                           <th scope="row"><?php echo $n;?></th>
                            <td><img  class="thumbnail" src="uploads/<?php echo $row['image'];?>" title="<?php echo $row['title'];?>" alt="<?php echo $row['title'];?>"> <?php echo $row['title'];?></td>
                           
                           
                         <!--<td><a href="ngo_details.php?id=<?php echo $row['id'];?>" style="font-weight: 700;">Goto Page <i class="fa fa-share-square-o"></i></a></td>-->
                          
                         
                           <td><?php echo $row['location'];?>,<?php echo $row['city'];?>,<?php echo $row['state'];?></td>
                           <td><?php echo $row['corona'];?></td>
                           <td><?php echo $row['ac_no'];?></td>
                           <td><?php echo $row['ifsc'];?></td>
                           <td><?php echo $row['bank'];?></td>
                           <td><?php 
                           $add= $row['add_by'];
                           if($add=='Admin'){
                           ?> Admin <?php } else{ 
                           $query12="SELECT * FROM user where id='$add'";
                           $result12=mysqli_query($conn,$query12);
                           while($row12 = $result12->fetch_assoc()) {
                          echo $row12['name']; }
                           }?>
                           </td>
                          <td>
                            <?php
                                 if($status==0){
                                     ?>
                                     <form action="status_deactive.php" method="post">
                                      <input type="hidden" name="tid" value="<?php echo $row['id']?>">
                              <button  type="submit"  name="ngo_deactive" class="btn btn-success btn-sm" onclick="return confirm('are you sure  want to deactive this');" >Active</button>
                              </form>
                              <?php
                                 }
                                 else{
                                   ?>
                             <form action="status_active.php" method="post">
                                      <input type="hidden" name="tid" value="<?php echo $row['id']?>">
                              <button  type="submit"  name="ngo_active" class="btn btn-info btn-sm" onclick="return confirm('are you sure  want to active this');" >Deactive</button>
                              </form>
                              
                              <?php  
                                 }
                                 ?>
                          </td>
                           
                           <td class="valigntop">
                               <a href="edit_ngo.php?id=<?php echo $row['id']?>"><button type="button"  class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                              <button type="button" data-toggle="modal" data-target="#edit_img1<?php echo $row['id'] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-picture-o" aria-hidden="true" style="color:#fff;"></i></button>
                              <a href="delete_ngo.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                           </td>
                        </tr>
                       
                        <div class="modal fade" id="edit_img1<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Ngo Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                       <input type="file" class="form-control" name="image" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
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
<!-- end page content -->
<?php include('includes/tools.php')?>
<!-- end page container -->
<?php include('includes/footer.php')?>