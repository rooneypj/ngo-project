<?php @session_start();
if(!isset($_SESSION['admin']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
include('connection.php');
  $admin_id=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">


<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>Binplus</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<!-- inbox style -->
	<link href="../assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->

	<!--date picker js and css code -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


	<link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<!--<link rel="shortcut icon" href="../assets/img/favicon.ico" />-->
	    <link rel="shortcut icon" href="https://binplus.in/assets/images/binpluslogo-min.png" />
    <style type="text/css">
        .btn-default{
            background-color:#fff!important;
            color: #333!important;
            border-color: #fff !important;

        }
    </style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.php">
                       
                        <span class="logo-default">my ngo</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                        <!-- start language menu -->
                       
                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                             <?php
                                     
                                    $qyselect="SELECT * FROM admin_profile WHERE id='$admin_id'";
                                   
                                    $result=mysqli_query($conn,$qyselect);
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="<?php echo $row['image'] ?>" />
                                <span class="username username-hide-on-mobile"> <?php echo $row['name'] ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <?php }?>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="profile.php">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="change_password.php">
                                        <i class="icon-lock"></i> Change Password </a>
                                </li>
                               
                                <li class="divider"> </li>
                                
                                <li>
                                    <a href="logout.php">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start color quick setting -->
        <div class="quick-setting-main">
            <button class="control-sidebar-btn btn" data-toggle="control-sidebar"><i
					class="fa fa-cog fa-spin"></i></button>
            <div class="quick-setting display-none">
                <ul id="themecolors">
                    <li>
                        <p class="selector-title">Main Layouts</p>
                    </li>
                    <li class="complete">
                        <div class="theme-color layout-theme">
                            <a href="#" data-theme="light"><span class="head"></span><span class="cont"></span></a>
                            <a href="index.php" data-theme="dark"><span class="head"></span><span
									class="cont"></span></a>
                        </div>
                    </li>
                    <li>
                        <p class="selector-title">Sidebar Color</p>
                    </li>
                    <li class="complete">
                        <div class="theme-color sidebar-theme">
                            <a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                    <li>
                        <p class="selector-title">Header Brand color</p>
                    </li>
                    <li class="theme-option">
                        <div class="theme-color logo-theme">
                            <a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-indigo"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
                            <a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                    <li>
                        <p class="selector-title">Header color</p>
                    </li>
                    <li class="theme-option">
                        <div class="theme-color header-theme">
                            <a href="#" data-theme="header-white"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-dark"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-blue"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-indigo"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-cyan"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-green"><span class="head"></span><span
									class="cont"></span></a>
                            <a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end color quick setting -->
        <!-- start page container -->