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
 include('includes/header.php');
include('includes/connection.php');
if(isset($_GET['search']))
{
     $name=$_GET['name'];
     $gender=$_GET['gender'];
    } 

?>
<style>
	.box_list ul {
    padding: 15px 20px 35px 5px!important;
}
.strip_list ul {
	 padding: 15px 20px 35px 5px!important;
}
@media (max-width: 991px){
.strip_list ul li:first-child {
     display:block!important;
    }
    }
	</style>

<main>
     <div id="breadcrumb">
			 <div class="container">

				 <ul>
					 <li><a href="index.php">Home </a></li>
					 <li><a href="search_page.php">Search Child </a></li>
					 
				 </ul>
				 <span> </span>
			 </div>
		 </div>
    <!-- /results -->
	 <div class="container margin_60_35">
			 <div class="row">
			 	
				 <div class="col-lg-12">

                     <?php  if($gender=='all'){
                     	$query1="SELECT * from khoyapaya WHERE name LIKE '%$name%'";
                           $result1=mysqli_query($conn,$query1);
                         

                     }
                     else {
                     	 $query1="SELECT * from khoyapaya WHERE name LIKE '%$name%' AND gender='$gender'";

                           $result1=mysqli_query($conn,$query1);
                           

                     }
                    $total=mysqli_num_rows($result1);
                    if($total=='0'){?>
                    	<span style="color:red;font-size:20px;"> Nothing to show.</span>
                    	<?php
                    }
                    else{
                     while($row = $result1->fetch_assoc()) { 
                     	
                     	
                            ?>
                     	
					 <div class="strip_list wow fadeIn">
						  
						 <figure>
							 <a href="view_details.php?id=<?=$row['id'];?>"><img src="admin/uploads/<?php echo $row['photos'];?>" alt="" /></a>
						 </figure>
						
						 <h3><?=$row['name'];?> </h3>
						 <h6><i class=" icon-calendar-1"></i>&nbsp;<?= date("d-M-Y", strtotime($row['date']));?></h6>
						 <p><?=$row['description'];?> </p>
						 <ul>
						 	 
							 <li><a href="view_details.php?id=<?=$row['id'];?>"> Details </a></li>
						 </ul>
					 </div>
					 <?php 
					 } } ?>
					 <!-- /strip_list -->

					

					 
					
					<!--  <nav aria-label="" class="add_top_20">
						 <ul class="pagination pagination-sm">
							 <li class="page-item disabled">
								 <a class="page-link" href="#" tabindex="-1">Previous </a>
							 </li>
							 <li class="page-item active"><a class="page-link" href="#">1 </a></li>
							 <li class="page-item"><a class="page-link" href="#">2 </a></li>
							 <li class="page-item"><a class="page-link" href="#">3 </a></li>
							 <li class="page-item">
								 <a class="page-link" href="#">Next </a>
							 </li>
						 </ul>
					 </nav> -->
					 <!-- /pagination -->
				 </div>
				 <!-- /col -->
				
				
				 <!-- /aside -->
				
			 </div>
			 <!-- /row -->
		 </div>
	 <!-- /container -->
	 </main>
	 <!-- /main -->
<?php include('includes/footer.php')?>