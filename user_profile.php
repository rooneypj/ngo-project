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
 include('includes/header.php');
 include('includes/sidebar.php');?>
 <div class="col-md-9 sidebar_body">
                 <div class="card">
                    <div class="card-header"><div class="row">
                        <div class="col-md-6">
                             <h4 class="pull-left">Personal Information</h4>
                        </div>
                    <div class="col-md-6">
                     
                     </div>
                     </div>
                   
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $select_profile="select * from user where id='$user_id'";
                            $excute_profile=mysqli_query($conn,$select_profile);
                            while($row_profile=mysqli_fetch_array($excute_profile))
                               { ?>

                                        <div class="col-md-6 mt">
                                            <label>Name</label>
                                         <input type="text" class="form-control"  value="<?php echo $row_profile['name']; ?>" spellcheck="false"readonly>
                                          </div>
                                          <div class="col-md-6 mt"><label>E-mail</label>
                                         <input type="email" class="form-control"  Value="<?php echo $row_profile['email']; ?>" spellcheck="false"readonly> </div>
                                           <div class="col-md-6 mt"><label>Mobile No</label>
                                         <input type="number" class="form-control"  Value="<?php echo $row_profile['mobile']; ?>" spellcheck="false" readonly> </div>
                                            <div class="col-md-6 mt">
                                                <label> Address</label></label>
                                               <textarea class="form-control" readonly><?php echo $row_profile['address']; ?>,<?php echo $row_profile['state']; ?>,<?php echo $row_profile['pin']; ?></textarea>
                                            </div>
                                       
                                      
                                           <div class="col-md-12 mt mb">
                                               <a href="edit_profile.php?id=<?php echo $row_profile['id']; ?>"> <button type="button" class="btn_1 medium" > Edit</button></a>
                                               </div>
                                           <?php }?>
        
                            </div>
                        </div>
            </div>
            </div>
            
            </div>
        </div>
</section>
<!--modal profile edit start-->

	 <!-- /main -->
<?php include('includes/footer.php')?>