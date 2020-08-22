<?php @session_start();
// if(!isset($_SESSION['user']))
// {
//     echo"<script>alert('login first');
//   window.location.href = 'login.php';
//   </script>";
//    exit(0);
// }
include('includes/connection.php');
if(isset($_SESSION['user'])){
  $user_id=$_SESSION['user'];
}
?>
<!DOCTYPE html>
 <html lang="en">

 <head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <meta charset="utf-8" />
	 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	 <meta name="description" content="" />
	 <meta name="author" content="Ansonika" />
	 <title> SUNSHINE NGO PORTAL</title>

	 <!-- Favicons-->
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	   <link rel="icon" href="img/logo.jpg" />
	 <link href="cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
	 <!-- GOOGLE WEB FONT -->
     <link href="../../fonts.googleapis.com/css_1d6877d1.css" rel="stylesheet" />

	 <!-- BASE CSS -->
	 <link href="css/bootstrap.min.css" rel="stylesheet" />
	 <link href="css/style.css" rel="stylesheet" />
	 <link href="css/menu.css" rel="stylesheet" />
	 <link href="css/vendors.css" rel="stylesheet" />
	 <link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <!-- YOUR CUSTOM CSS -->
	 <link href="css/custom.css" rel="stylesheet" />
	
	 
	
 </head>
<style>
    .logo-icon{
      color:black!important;
    }
    @media only screen and (max-width: 600px) {
        .logo-icon {
    margin-left:40px;
  }
}
.white{
	color:#F4F6F7!important; 
}
.follow_us ul li a i {
    color: white;
}
.card:hover{
transform: translateY(-1px)!important;
    box-shadow: 0 2px 8px #d4d5d9!important;
  }
  .header-menu{
  	font-size:22px!important;
  }
  .menu-list{
padding-left: 5px!important;
    padding-right: 5px!important;
  }
</style>
 <body>
      <div id="preloader" class="Fixed">
		 <div data-loader="circle-side"></div>
	 </div>
	 <!-- /Preload-->
	
	 <div id="page">		
	 <header class="header_sticky">	
		 <a href="#menu" class="btn_mobile">
			 <div class="hamburger hamburger--spin" id="hamburger">
				 <div class="hamburger-box">
					 <div class="hamburger-inner"></div>
				 </div>
			 </div>
		 </a>
		 <!-- /btn_mobile-->
		 <div class="container">
			 <div class="row">
				 <div class="col-lg-3 col-6">
					 <div i>
						 <h3><a href="index.php" title="Findoctor" style="color:#333;"><img src="img/logo.jpg" class="img-fluid" style="height:45px;">SUNSHINE NGO PORTAL</a></h3>
                     </div>
                   
				 </div>
				 <div class="col-lg-9 col-6">
					
					 <nav id="menu" class="main-menu">
						 <ul>
							 <li class="menu-list">
								 <span><a href="index.php" class="header-menu">Home </a></span>
							</li>
							<li class="menu-list">
								 <span><a href="about.php" class="header-menu">About Us </a></span>
							</li>
							<li class="menu-list">
								 <span><a href="ngo.php" class="header-menu">NGO </a></span>
							</li>
							 <li>
								 <span><a href="corona-ngo.php" class="header-menu">NGO Working on Corona </a></span>
							</li> -->
							<li class="menu-list">
								 <span><a href="contact.php" class="header-menu">Contact us </a></span>
							</li>
							 
						 </ul>
					 </nav>
					 <!-- /main-menu -->
				 </div>
			 </div>
		 </div>
		 <!-- /container -->
	 </header>
	 <!-- /header -->
	
	 <main>