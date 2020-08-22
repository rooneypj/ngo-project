<?php include('includes/header.php');
include('connection.php');
if(isset($_POST['submit']))
 {
     $cpass=$_POST['cpass'];
      $newpass=$_POST['newpass'];
      if($cpass!='' && $newpass!='')
      {
      $qyselect="SELECT * FROM admin WHERE id='$admin_id' AND password='$cpass'"; 
      $execute=mysqli_query($conn,$qyselect);
      $count=mysqli_num_rows($execute);
      if($count==1)
      {
          $sql123 ="UPDATE admin SET password='$newpass' WHERE id='$admin_id'";
    if (mysqli_query($conn, $sql123)) {
      
        
      echo 
      "<script>alert('Password updated successfully');
        window.location.href ='profile.php';</script>";
       
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
          }
       else{
      echo "<script>alert('invalid Current Password');
        window.location.href = 'index.php';
        </script>";
    }
      }
     
 }
?>

<!-- start page container -->

<div class="page-container">
<?php include('includes/sidebar.php')?>
    <!-- start page content -->
   <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-head">
                  <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Login Password Resetting</header>
                </div>
                <div class="card-body ">
                  
                    
                      <div class="row mt-4">
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                          <form action="" method="post">
                          <div class="row">
                              <div class="col-md-12 mt-2">
                                 <div class="form-group form-inline">
                                    
                                    
                                       <input type="password" name="cpass" data-required="1"
                                          placeholder="Please Enter Your Old Password"
                                          class="form-control input-height"style="width:100%;" required/>
                                    
                                 </div>
                              </div>
                              <div class="col-md-12 mt-2">
                                 <div class="form-group form-inline">
                                    
                                    
                                       <input type="password" name="newpass" data-required="1"
                                          placeholder="Please Enter Your New Password"
                                          class="form-control input-height" id="password"style="width:100%;"required/>
                                    
                                 </div>
                              </div>
                               <div class="col-md-12 mt-2">
                                 <div class="form-group form-inline">
                                    
                                    
                                       <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' data-required="1"
                                          placeholder="Please Enter Your Confirm Password"
                                          class="form-control input-height"style="width:100%;" required/>
                                     <span id='message'></span>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-2">
                                  <button class=" btn btn-primary btn-lg" type="submit" name="submit"> Submit</button>
                                  </div>
                                 </div>
                                 </form>
                             </div>
                              <div class="col-md-3"></div>
                           </div>
                         </div>
                   </div>
                   
                  </div>
                </div>
              </div>
            </div>
         
    <!-- end page content -->

    <?php include('includes/tools.php')?>
<!-- end page container -->
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password matched.';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password did not match: Please try again';
  }
};
</script>
<?php include('includes/footer.php')?>