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
 include ('includes/sidebar.php');
if(isset($_POST['submit']))
 {
    $cpass=md5($_POST['cpass']);
      $newpass=md5($_POST['newpass']);
      if($cpass!='' && $newpass!='')
      {
      $qyselect="SELECT * FROM user WHERE id='$user_id' AND password='$cpass'"; 
      $execute=mysqli_query($conn,$qyselect);
      $count=mysqli_num_rows($execute);
      if($count==1)
      {
          $sql123 ="UPDATE user SET password='$newpass' WHERE id='$user_id'";
    if (mysqli_query($conn, $sql123)) {
      
        
      echo 
      "<script>alert('Password updated successfully');
        window.location.href ='user_profile.php';</script>";
       
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
          }
       else{
      echo "<script>alert('invalid Current Password');
        window.location.href = 'change_password.php';
        </script>";
    }
      }
     
 }
?>

              <div class="col-md-9 sidebar_body">
                 <div class="card">
                    <div class="card-header"><div class="row">
                        <div class="col-md-6">
                             <h4 class="pull-left"> Change Your Password</h4>
                        </div>
                    <div class="col-md-6">
                     
                     </div>
                     </div>
                  
                    </div>
                    <form action="" method="post">
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-8 mt"> <label>Current Password</label>
                                         <input type="password" name="cpass"
                                          class="form-control " required/></div>
                                          <div class="col-md-8 mt"><label>New Password</label>
                                         <input type="password" name="newpass"
                                          class="form-control" id="password"required/></div>
                                           <div class="col-md-8 mt"><label>Confirm-password</label>
                                         <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' 
                                          class="form-control " required/>
                                     <span id='message'></span></div>
                                         <div class="col-md-12 mt mb">
                     <button type="submit" name="submit" class="btn_1 medium">Submit</button>
                     </div>
                                            
                            </div>
                        </div>
                        </form>
            </div>
            </div>
            
            </div>
        </div>
</section>
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
<?php include ('includes/footer.php')?>