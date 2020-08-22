<?php include('includes/header.php')?>
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
	.box_list ul {
    padding: 15px 20px 35px 5px!important;
}
a{
    color:black;
}
   </style>
  <main>
  
<section>
	
		 <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				 <?php
        $n=0;
        $query1="SELECT * FROM slider";
       $result1=mysqli_query($conn,$query1);
       while($row = $result1->fetch_assoc()) {
       
        
         ?>
				<div class="carousel-item <?= ($n==1)?'active':''?>">
				<img class="d-block w-100" src="<?php  echo 'admin/uploads/slider/'.$row['image'] ?>" alt="First slide" style="height:600px;">
				</div>
				
			<?php 
			 $n++;
			} ?>
			</div>
			</div>
			
		 </section>

		 

		 <!-- /Hero -->

		 <div class="container margin_120_95" style="padding-bottom:15px!important;padding-top:50px!important;">
			 <div class="main_title">
				 <h2>Our Features </h2>
				<!--  <p>Usu habeo equidem sanctus __. Suas summo id sed, ____ erant oporteat cu pri. __ eum omnes molestie. Sed __ debet scaevola, ne mel. </p> -->
			 </div>
			 <div class="row add_bottom_30">
				 <div class="col-lg-4">
					 <div class="box_feat" id="icon_1" style="height:290px;">
						 <span></span>
						 
						 <p><a href="https://covid19india.org"> COVID-19 </a>
						 
						 </p>
					 </div>
				 </div>
				 <div class="col-lg-4">
					 <div class="box_feat" id="icon_2" style="height:290px;">
						 <span></span>
						 <h3></h3>
						 <p>NGO on Corona <br><a href="corona-ngo.php" >Click here</a> </p>
					 </div>
				 </div>
				 <div class="col-lg-4">
					 <div class="box_feat" id="icon_3" style="height:290px;">
						 <h3>Update 24x7 </h3>
						 <p>We are available 24x7.Please visit website. </p>
					 </div>
				 </div>
			 </div>
			 <!-- /row -->
			 

		 </div>
		 <!-- /container -->
		 
 <div class="bg_color_1">
			 <div class="container-fluid margin_120_95">
				 <div class="main_title">
					 <h2>Most Viewed NGO </h2>
					 
				 </div>
				 <div class="row">
				 	 <?php $n=1; 	 $query1="SELECT * FROM `ngo` where status='0'  ORDER BY `ngo`.`updated_at` DESC  LIMIT 10";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                           $n<6;
                            ?>
					 <div class="col-lg-3 col-md-6">
						 <div class="box_list home" style="height: 450px;">
							 
							 <figure>

								 <a href="ngo_details.php?id=<?=$row['id'];?>"><img src="admin/uploads/<?php echo $row['image'];?>" class="img-fluid" alt="<?=$n;?>"  style="height:260px; width:100%;"/>
							 </figure>
							 <div class="wrapper">
								
								 <h3><?php echo $row['title'];?> </h3>
								 <p><?php echo $row['tagline'];?></p>
								 
								 
							 </div>
							 </a>
							 <ul>
								<!--  <li><i class="icon-eye-7"></i> 854 Views </li> -->
								 <li><a href="ngo_details.php?id=<?=$row['id'];?>">Details</a></li>
							 </ul>
						 </div>
					 </div>
<?php $n++;}?>
					
				 </div>
				 <!-- /row -->
				
			 </div>
			 <!-- /container -->
		 </div>
		 <!--<div id="app_section">-->
			<!-- <div class="container">-->
			<!--	 <div class="row justify-content-around">-->
			<!--		 <div class="col-md-5">-->
			<!--			 <p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433" /></p>-->
			<!--		 </div>-->
			<!--		 <div class="col-md-6">-->
			<!--			 <small>Application </small>-->
			<!--			 <h3>Download  <strong>NGO App </strong> Now! </h3>-->
			<!--			 <p class="lead">Non-profit organizations come as a key to people’s kindness, charity, and the desire to make the world better. Certainly, every charity organization wants to widespread the impulse of sharing and giving as hard as possible. That is why lots of them opt for versatile ngo website templates to underpin their social attitude with a professional website and so to let more people get involved into charity. The main purpose of non-government organizations websites is to evoke the desire to support and to become a donor. The thing is that even a small detail can distract a potential donor and make the one doubt about the organization.  </p>-->
			<!--			 <div class="app_buttons wow" data-wow-offset="100">-->
			<!--				 <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">-->
			<!--				 <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1"></path>-->
			<!--				 <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58"></path>-->
			<!--				 <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9"></path>-->
			<!--			 </svg>-->
			<!--				 <a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true" /></a>-->
			<!--				 <a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true" /></a>-->
			<!--			 </div>-->
			<!--		 </div>-->
			<!--	 </div>-->
				 <!-- /row -->
			<!-- </div>-->
			 <!-- /container -->
		 <!--</div>-->
		 <!-- /app_section -->
		 <section style="background:black; padding-top:10px; padding-bottom:5px;">
			 <div class="container text-center">
				 
			 </div>
		 </section>
	 </main>
	<?php include('includes/footer.php')?>