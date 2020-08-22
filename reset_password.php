<?php 
 include('includes/header.php');
include('includes/connection.php');
 $email=$_GET['id'];
$reset_key=$_GET['key'];
$sql = "SELECT * FROM user WHERE email='$email'";

$result = $conn->query($sql);
 $count=mysqli_num_rows($result);
 if ($result->num_rows > 0) {
 $n=0;
 while($row = $result->fetch_assoc()) {
  $n++;
     $key=$row['reset_key'];
 }
     
 }
if(isset($_POST['update_password'])){
    $new_password= md5($_POST['new_password']);
   
    if ($key==$reset_key) 
    {
        $udatepassword= "UPDATE user SET password='$new_password' WHERE email='$email'";
        $excute_update_operation = mysqli_query($conn, $udatepassword);
        if ($excute_update_operation) {
            echo "<script>alert('Password has been updated successfully');
                    window.location.href='login.php';
                    </script>";
        }
        
    } else {
    echo "<script>alert('Password not updated');
                    window.location.href='reset_password.php';
                    </script>";
    }
}

 ?>
<div class="bg_color_2">
			 <div class="container margin_60_35">
				 <div id="login">
					 
					 <div class="box_form">
						 <form action="" method="post">
							<h3>Reset Your Password! </h3>
							<br/>
							 <div class="form-group">
							 	 <label>New Password </label>
								<input type="password" class="form-control" name="new_password" id="first_password"  placeholder="New Password">
							 </div>
							 <div class="form-group">
							 	 <label> Confirm Password </label>
								  <input type="password" class="form-control"  id="second_password" placeholder="Confirm Password">
                                 <span id="error" style="color:red;"></span>
							 </div>
							
							 <div class="form-group text-center add_top_20">
								 <button class="btn_1 medium" name="update_password" id="btnSubmit"  onclick="return Validate()" type="submit"> Submit</button>
							 </div>
						 </form>
					 </div>
					 
				 </div>
				 <!-- /login -->
			 </div>
		 </div>
		   <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("first_password").value;
        var confirmPassword = document.getElementById("second_password").value;
         var error = document.getElementById("error");
        if (password != confirmPassword) {
            error.innerHTML='Password not Matched';
            return false;
        }
        return true;
    }
</script>
         <?php include('includes/footer.php')?>