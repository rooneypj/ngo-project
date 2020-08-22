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
 include('includes/sidebar.php');
$id=$_GET['id'];
if(isset($_POST['submit']))
{   
    $tid = $_POST['id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];
   
    
    $sql ="UPDATE user SET name='$name',address='$address',mobile='$mobile',state='$state',pin='$pin' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Profile updated successfully');
        window.location.href ='user_profile.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   
}
?>

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
                     <form action="" method="post">
                    <div class="card-body">
                        <div class="row">
                           
                            <?php
                            $select_profile="select * from user where id='$id'";
                            $excute_profile=mysqli_query($conn,$select_profile);
                            while($row=mysqli_fetch_array($excute_profile))
                               { ?>
                             <div class="col-md-6 mt"> <label>Name</label>
                                         <input type="text" class="form-control"  value="<?=$row['name']?>" spellcheck="false" name="name"required> </div>
                                         
                                           <div class="col-md-6 mt"><label>Mobile No</label>
                                         <input type="number" class="form-control"  Value="<?=$row['mobile']?>" spellcheck="false" name="mobile" required> </div>
                                         <div class="col-md-6 mt"><label>Address</label>
                                        <textarea class="form-control" name="address" required><?=$row['address']?></textarea></div>
                                          <div class="col-md-6 mt"><label>State</label>
                                         <input type="text" class="form-control"  Value="<?=$row['state']?>" spellcheck="false" name="state" required> </div>
                                            <div class="col-md-6 mt"><label>Pincode</label></label>
                                         <input type="number" class="form-control"  value="<?=$row['pin']?>" spellcheck="false" name="pin" required > </div>
                                      <input type="hidden" name="id" value="<?=$row['id']?>">
                                           <div class="col-md-12 mt mb">
                                                <button type="submit" name="submit" class="btn_1 medium"> Submit</button>
                                               </div>
                                           <?php }?>
                                       
        
                            </div>
                        </div>
                        </form>
            </div>
            </div>
            
            </div>
        </div>
</section>

	 <!-- /main -->
<?php include('includes/footer.php')?>