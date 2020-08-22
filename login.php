<?php session_start();
 include('includes/header.php');
include('includes/connection.php');
 if(isset($_POST['submit']))
 {
     $username=$_POST['email'];
      $password=md5($_POST['password']);
      if($username!='' && $password!='')
      {
      $qyselect="SELECT * FROM user WHERE email='$username' AND password='$password' AND status='0'"; 
      $execute=mysqli_query($conn,$qyselect);
      $count=mysqli_num_rows($execute);
      if($count==1)
      {
          if($row=mysqli_fetch_array($execute))
          {
           $user= $row['id'];
          $_SESSION['user']=$user;
          echo"<script>alert('Login successfully');
        window.location.href = 'index.php';
        </script>";
     } }
       else{
      echo "<script>alert('invalid Username and Password');
        window.location.href = 'login.php';
        </script>";
    }
      }
     
 }
 ?>
<div class="bg_color_2">
			 <div class="container margin_60_35">
				 <div id="login">
					 
					 <div class="box_form">
						 <form action="" method="post">
							<h3>Please login to sunshine ngo </h3>
							<br/>
							 <div class="form-group">
							 	 <label>Email </label>
								 <input type="email" class="form-control" name="email"  required/>
							 </div>
							 <div class="form-group">
							 	 <label>Password </label>
								 <input type="password" class="form-control"  id="password" name="password" required/>
							 </div>
							 <a href="forget_password.php"><small>Forgot password? </small></a>
							 <div class="form-group text-center add_top_20">
								 <button class="btn_1 medium" type="submit"name="submit"> Submit</button>
							 </div>
						 </form>
					 </div>
					 <p class="text-center link_bright">Do not have an account yet?  <a href="register.php"><strong>Register now! </strong></a></p>
				 </div>
				 <!-- /login -->
			 </div>
		 </div>
         <?php include('includes/footer.php')?>