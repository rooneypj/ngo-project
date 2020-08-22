<?php include('includes/header.php');
include('includes/connection.php');
$city=$_POST['city'];
?>
<style>
	.box_list ul {
    padding: 15px 20px 35px 5px!important;
}
/*.strip_list ul {
	 padding: 15px 20px 35px 5px!important;
}*/
#district-show{
    display:none;
}
	</style>

<main>
     <div id="breadcrumb">
			 <div class="container">
				 <ul>
					 <li><a href="index.php">Home </a></li>
					 <li><a href="ngo.php">NGO </a></li>
					 
				 </ul>
			 </div>
		 </div>
    <!-- /results -->
	 <div class="container margin_60_35">
			 <div class="row">
			 	 
				 
				 <div class="col-lg-8">
                     <?php  $query1="SELECT * FROM ngo where status='0'  AND city='$city'";
                           $result1=mysqli_query($conn,$query1);
                            $countresult=mysqli_num_rows($result1);
                           if($countresult=='0'){
                               echo '<div class="alert alert-danger" role="alert">
                                      <h3>No NGO found in this location! </h3>
                                    </div>';
                           }
                           else{
                               echo $countresult.' result found.<br>' ;
                            while($row = $result1->fetch_assoc()) {
                            ?>
					 <div class="strip_list wow fadeIn">
						 
						 <figure>
							 <a href="ngo_details.php?id=<?=$row['id'];?>"><img src="admin/uploads/<?php echo $row['image'];?>" alt="" /></a>
						 </figure>
						 <small><?=$row['tagline'];?> </small>
						 <h3><?=$row['title'];?> </h3>
						 <h6><i class=" icon-calendar-1"></i>&nbsp;<?= date("d-M-Y", strtotime($row['date']));?></h6>
						 <p><?=$row['short_desc'];?> </p>
						 <ul>
						 	 <li><a href="<?=$row['gmap'];?>" target="_blank"  class="btn_listing">View on Map </a></li>
							 <li><a href="<?=$row['gmap'];?>" target="_blank">Directions </a></li>
							 <li><a href="ngo_details.php?id=<?=$row['id'];?>"> Details </a></li>
						 </ul>
					 </div>
					 <?php  }} ?>
					 
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
				 <aside class="col-lg-4" id="sidebar">
					  
					 <div class="box_general_3 booking">
						 <form>
							 <div class="title" style="padding: 12px 25px;">
							 <h3>NGO List</h3>
							
							 </div>
							
							 <ul class="treatments clearfix">
							 	<?php
    							 	$query1="SELECT * FROM ngo where status='0'";
                                    $result1=mysqli_query($conn,$query1);
                                    while($row = $result1->fetch_assoc()) {
                                ?>
								 <li>
									<a href="ngo_details.php?id=<?=$row['id'];?>"><span style="font-size:20px;color:#333;"><?=$row['title'];?></span></a>
								 </li>
								  <?php  } ?>
							
							 </ul>
							
							
						 </form>
					 </div>
					<div class="card">
					    <div class="card-header"><h5>Search by Area</h5></div>
					    <div class="card-body pb-3">
					        <form action="" method="post">
					                            <label>Select  state</label>
					                            <select class="form-control"  name="state" onchange="choosecity()" id="state_name" required>
                                                    <option value="">Select a state</option>
                                                    <?php
                                                        $query1="SELECT city_state, COUNT(city_state)  FROM cities GROUP BY city_state HAVING COUNT(city_state) > 1 ORDER BY city_state ASC ";
                                                       $result1=mysqli_query($conn,$query1);
                                                       while($row = $result1->fetch_assoc()) {
                                                    ?>
                                                      <option value="<?php echo $row['city_state'];?>"><?php echo $row['city_state'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="form-group mt-3" id="district-show">
                                                    <label>Select District</label>
                                                    <select id="selectcity"  name="city" class=" form-control" required>
                                                    </select>
                                                </div>
                                <button type="submit" name="search" class="btn btn-primary btn-block mt-3"><i class="fa fa-search"></i> Search</button>

					        </form>
					    </div>
					</div>
				
				 </aside>
				 <!-- /col -->
				
				
				 <!-- /aside -->
				
			 </div>
			 <!-- /row -->
		 </div>
	 <!-- /container -->
	 </main>
	 <!-- /main -->
	 <script>
	     function choosecity(){
        var state = document.getElementById("state_name").value;
         $.ajax({
        url: "admin/district_data.php",
        type: "POST",
        data: {
            'radio': state
        },
        success: function(data) {
            $('#selectcity').html(data);
            $('#district-show').show();
            
          }
        });
      }
	 </script>
<?php include('includes/footer.php')?>