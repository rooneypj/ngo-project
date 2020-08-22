<?php 
include('connection.php');
include('includes/header.php');
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $title = $_POST['title'];
    $link = $_POST['link'];
   
     
    $sql ="UPDATE links SET title='$title',link='$link' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Data updated successfully');
        window.location.href ='important_links.php';</script>
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
                                    <header>Important Links</header>
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
                                                <a href="add_link.php"><button id="addRow1" class="btn btn-info" wfd-id="431">
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
                                                    <th> S. No.</th>
                                                    <th> Title </th>
                                                    <th> Links </th>
                                                   <th>Status</th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
        $n=0;
        $query1="SELECT * FROM links";
       $result1=mysqli_query($conn,$query1);
       
         while($row = $result1->fetch_assoc()) {
        //  {
            $status=$row['status'];
             $id=$row['id'];
         $n++;
         ?>
<tr>
                                                            <th scope="row"><?php echo $n;?></th>
                                                            <td><?php echo $row['title'];?></td>
                                                            <td><a href="<?php echo $row['link'];?>" target="_blank">Goto Link</a></td>
                                                           
                                                            <td>
                                                                <?php
                                                                if($status==0){
                                                                    ?>
                                                                    <form action="status_deactive.php" method="post">
                        <input type="hidden" value="<?php echo $row['id'] ?>" name="tid"><button class="btn btn-success btn-sm" type="submit" onclick="return confirm('are you sure  want to deactive this');" name="link_deactive">Active</button></form><?php
                                                                }
                                                                else{
                                                                  ?>
                                                                  <form action="status_active.php" method="post">
                        <input type="hidden" value="<?php echo $row['id'] ?>" name="tid"><button class="btn btn-info btn-sm" onclick="return confirm('are you sure  want to active this');" type="submit" name="link_active">Deactive</button></form>
                        <?php  
                                                                }
                                                                ?>
                                                            </td>

                                                            <td class="valigntop">
                                                               
                        <button type="button" data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>" class="btn btn-warning btn-sm mb-1"><i class="fa fa-pencil" aria-hidden="true" style="color: white;"></i></button>
                        
                                         
                                         
                                                                <a href="delete_links.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                               

                                                            </td>
                                                            
                   
                                                        </tr>
<div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="" method="post">
      <div class="modal-body">
      
           	<div class="col-lg-12 p-t-20">
           	                           	<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title"  value="<?php echo $row['title'] ?>"required>
											<label class="mdl-textfield__label">Title </label>
										</div>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="url" name="link"  value="<?php echo $row['link'] ?>"required >
											<label class="mdl-textfield__label">Link </label>
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