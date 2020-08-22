<?php 
include('connection.php');
include('includes/header.php');

if(isset($_POST['submit']))
{
     $package_name=$_POST['package_name'];
     $price=$_POST['price'];
     $duration=$_POST['duration'];
if( $price!='' && $duration!='')
  {
    $sql_query="INSERT INTO cost (package_name,price,duration,status)
    VALUES ('$package_name','$price','$duration','0')";
    $execute_query=mysqli_query($conn, $sql_query);
    if($execute_query)
    {
      echo "<script>alert(' Your Detail Sent successfully');
        window.location.href = 'manage_package.php';
        </script>";
    }
    else{
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

}

?>


    <!-- start page content -->
    <div class="page-container">
<?php include('includes/sidebar.php')?>
    <div class="page-content-wrapper">
        <div class="page-content">
           
            <!-- start widget -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card-box">
								<div class="card-head">
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Add Package</header>
									
								</div>
								 <form action=" " method="post" enctype="multipart/form-data">
								<div class="card-body row">
								    
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="package_name">
											<label class="mdl-textfield__label">Package Name (₹)</label>
										</div>
									</div>
								<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="price">
											<label class="mdl-textfield__label">Price (₹)</label>
										</div>
									</div>
                                   
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="duration">
											<label class="mdl-textfield__label">Duration </label>
										</div>
									</div>
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button  m-b-10 m-r-20 btn-pink" name="submit">Submit</button>
										<button type="reset"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Reset</button>
									</div>
								
								</div>
									</form>
							</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>