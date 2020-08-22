<?php 
    //  session_start();
    //  if(!isset($_SESSION['login_user'])){
    //      echo "<script>alert('login first');
    //      window.location.href='index.php';
    //      </script>";
    //      exit(0);
    //  }
   include('connection.php');
   include('includes/header.php');
 
   ?>
<div class="page-container">
<?php include('includes/sidebar.php')?>
<!-- start page content -->
<div class="page-content-wrapper">
   <div class="page-content">
      <!-- start widget -->
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-topline-red">
               <div class="card-head">
                  <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                     <span >Gallery management</span> <span class="floar-right">
                         
                  </header>
                  <div class="tools">
                     <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                     <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                     <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                  </div>
               </div>
               <div class="card-body ">
                  <div class="row">
                     <div class="col-md-6 col-sm-6 col-6">
                     </div>
                     <div class="col-md-6 col-sm-6 col-6">
                        
                     </div>
                  </div>
                  <a href="manage_gallery.php" class='btn btn-primary' >+ Manage </a></span></td>
                      
                       			 <form action="add_image.php" method="post" enctype="multipart/form-data">
								<div class="card-body row">
								    
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title">
											<label class="mdl-textfield__label">Image title </label>
										</div>
									</div>
								<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										    <label>NGO Image </label>
											<input type="file" class="form-control" name="file" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
											
										</div>
									</div>
                                   
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											NGO Name<select name="ngoid" class="form-control">
											     <?php
                       $ng=mysqli_query($conn,"select * from ngo");
                       while($ngo=mysqli_fetch_array($ng,MYSQLI_BOTH))
                       {
                       ?>
											    <option value="<?php echo $ngo['id']; ?>"><?php echo $ngo['title']; ?></option>
											<?php } ?>
											</select>
											
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
</div><!-- Button trigger modal -->

<!-- end page content -->
<?php 

include('includes/tools.php')?>
<!-- end page container -->
<?php include('includes/footer.php')?>