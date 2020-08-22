<?php @session_start();
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
   include('includes/header.php')?>
   <style type="text/css">
   	.box_feat{
   		height:220px;
   	}
   	.box_feat span {
		width: 50px;
		height: 50px;
	}
	.box_main{
		 padding: 36px 20px 20px;
	}
	.box_feat h3{
        color:white;
		margin-top: 15px;
	}
	/* .box_feat img{
        height:60px;
		width:60px;
	} */
	.black{
		color:black;
	}
	.box_feat:hover{
		background:#4a4a4a;
		border:2px solid white;
	}
	.box-1{
		background:#0b7493;
	}
	.box-2{
		background:#e74e84;
	}
	.box-3{
		background:#82E0AA ;
	}
	.box-4{
		background:#F8C471;
	}
	.box-5{
		background:#0b7493;
	}
   </style>
  <main>
  
		 <div class="hero_home version_1">
			 <div class="content">
				 <h3>Find a Child! </h3>
				
				 <form action="search_page.php" method="get">
					 <div id="custom-search-input">
						 <div class="input-group">
							 <input type="text" class=" search-query" name="name" placeholder="Ex. Name ...." required />
							  <input type="submit" name="search"  value="Search" class="btn_search"/>
						 </div>
						 <ul>
							 <li>
								 <input type="radio" id="all" name="gender" value="all" checked="" />
								 <label for="all">All </label>
							 </li>
							 <li>
								 <input type="radio" id="doctor" name="gender" value="male" />
								 <label for="doctor">Boy </label>
							 </li>
							 <li>
								 <input type="radio" id="clinic" name="gender" value="female" />
								 <label for="clinic">Girl </label>
							 </li>
						 </ul>
						
					 </div>
				 </form>
			 </div>
		 </div>
		 <!-- /Hero -->

		 <!-- /container -->
		

		<!--  <div id="app_section">
			 <div class="container"> -->
				 <!-- <div class="row justify-content-around">
					 <div class="col-md-5">
						 <p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433" /></p>
					 </div>
					 <div class="col-md-6">
						 <small>Application </small>
						 <h3>Download  <strong>Findoctor App </strong> Now! </h3>
						 <p class="lead">Tota omittantur necessitatibus mei __. Quo paulo perfecto eu, _____ percipit ponderum no eos. ___ eu mazim sensibus. Ad _______ dissentiunt qui, ei menandri ________ eos. Nam iisque consequuntur __. </p>
						 <div class="app_buttons wow" data-wow-offset="100">
							 <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							 <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1"></path>
							 <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58"></path>
							 <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9"></path>
						 </svg>
							 <a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true" /></a>
							 <a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true" /></a>
						 </div>
					 </div>
				 </div> -->
				 <!-- /row -->
			<!--  </div> -->
			 <!-- /container -->
		<!--  </div> -->
		 <!-- /app_section -->
		
	 </main>
	<?php include('includes/footer.php')?>