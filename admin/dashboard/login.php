<?php 
session_start();

 include('connection.php');
 if(isset($_POST['submit']))
 {
     $username=$_POST['username'];
      $password=$_POST['password'];
      if($username!='' && $password!='')
      {
      $qyselect="SELECT * FROM admin WHERE username='$username' AND password='$password'"; 
      $execute=mysqli_query($conn,$qyselect);
      $count=mysqli_num_rows($execute);
      if($count==1)
      {
          if($row=mysqli_fetch_array($execute))
          {
           $admin= $row['id'];
          $_SESSION['admin']=$admin;
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
<!DOCTYPE html>
<html>



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content=" Admin Dashboard" />
	<meta name="author" content="Binplus  Technologies pvt ltd." />
	<title>Binplus Workshop |Admin Dashboard</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="../assets/css/pages/extra_pages.css">
	<!-- favicon -->
	<!--<link rel="shortcut icon" href="../assets/img/favicon.ico" />-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<img alt="" src="../assets/img/logo-2.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox pull-left">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
						<div class="contact100-form-checkbox pull-right">
					<a href="forget_password.php" style="color:white;"> Forget Password ?</a>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/js/pages/extra-pages/pages.js"></script>
	<!-- end js include path -->
</body>



</html>