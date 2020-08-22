<?php
@session_start();
if(!isset($_SESSION['user']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
else{
    $user_id=$_SESSION['user'];
}
 include ('includes/header.php');
 include ('includes/sidebar.php')?>

              <div class="col-md-9 sidebar_body">
                 <div class="card">
                    <div class="card-header"><div class="row">
                        <div class="col-md-6">
                             <h4 class="pull-left"> My NGO</h4>
                        </div>
                    <div class="col-md-6" style="text-align:right;">
                    <a href="add_ngo.php"> <button type="button" class="btn_1"> Add</button></a>
                     </div>
                     </div>
                   
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                            <table
                     class="table table-striped table-bordered table-hover table-checkable order-column"
                     style="width: 100%" id="myTable">
                     <thead>
                        <tr>
                           <th> #</th>
                           <th>Image</th>
                           <th>Title</th>
                            <th> Link </th>
                           <th> Status </th>
                            <th> Action </th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                           $n=1;
                           $query1="SELECT * FROM ngo WHERE  add_by='$user_id'";
                           $result1=mysqli_query($conn,$query1);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row = $result1->fetch_assoc()) {
                           //  {
                               $status=$row['status'];
                      
                            
                            ?>
                        <tr>
                           <td scope="row"><?php echo $n;?></td>
                            <td scope="row"><img src="admin/uploads/<?php echo $row['image'];?>" style="height:70px;"></td>
                           <td><?php echo $row['title'];?></td>
                           
                          
                           <td><a href="ngo_details.php?id=<?php echo $row['id'];?>" style="font-weight: 700;">Goto Page <i class="icon-share-2"></i></a></td>
                          
                           <td>
                              <?php
                                 if($status==0){
                                     ?>
                                    
                              <button  type="button" class="btn btn-success btn-sm" >Active</button>
                             
                              <?php
                                 }
                                 else{
                                   ?>
                             
                              <button  type="button" class="btn btn-info btn-sm"  >Deactive</button>
                            
                              
                              <?php  
                                 }
                                 ?>
                           </td>
                            <td class="valigntop">
                               
                              
                              <a href="delete_ngo.php?id=<?php echo $row['id']?>"><button type="submit" data-toggle="modal" onclick="return confirm('are you sure  want to delete this');" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1"><i class="icon-trash" aria-hidden="true"></i></button></a>
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
</section>

<?php include ('includes/footer.php')?>