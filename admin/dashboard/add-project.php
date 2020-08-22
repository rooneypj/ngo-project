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

if(isset($_POST['submit']))
{
     $title=$_POST['title'];
     $short_desc=$_POST['short_desc'];
     $date=$_POST['date'];
     $client_name=$_POST['client_name'];
     $area=$_POST['area'];             

     $category=$_POST['category'];
     $year=$_POST['year'];
     $long_desc=$_POST['long_desc'];
     
      $location='uploads/';
      $i =0;
      foreach($_FILES['image']['name'] as $imgs):
    $final= time().$_FILES['image']['name'][$i];
     $tmp_name=$_FILES['image']['tmp_name'][$i];
     $original='uploads/'.$final;
    move_uploaded_file($tmp_name,$original);
    $i++;
endforeach;
    
         $insert_project="INSERT INTO project(title,short_desc,date,client_name,area,category,year,long_desc,image)
         VALUES('$title','$short_desc','$date','$client_name','$area','$category','$year','$long_desc','$final')";
        $execute=mysqli_query($conn, $insert_project);
        if($execute)
        
        {
            ?>
            <script>
                alert(' Project inserted successfully');
                window.location.href ='manage-project.php';
            </script>
            <?php
        }
    
}

?>

<script type="text/javascript">
    function ValidateExtension() {
        var sbt=document.getElementById("btnUpload");
        //alert(sbt);
        var allowedFiles = [".png", ".jpg", ".jpeg"];
        var fileUpload = document.getElementById("fileUpload");
        var lblError = document.getElementById("lblError");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.value.toLowerCase())) {
            sbt.style.display="none";
            lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
            return false;
            
        }
        else
        {
            sbt.style.display="block";
        }
        lblError.innerHTML = "";
        return true;
        
    }
    
</script>
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
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Add Project</header>
									
								</div>
								 <form action=" " method="post" enctype="multipart/form-data">
								<div class="card-body row">
								        <div class="col-lg-6 p-t-20">
                                        <select class="form-control  select2" name="category">
                                                <option value="Category Name"> Project Type</option>
                                                  <?php 
                                        $sql1 = "SELECT * FROM category";
                                        $result1 = $conn->query($sql1);
                                        
                                        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($row1 = $result1->fetch_assoc()) {
                                            
                                        ?>
                                                     <option value="<?php echo $row1['category']?>"><?php echo $row1['category']; ?></option>
                                        <?php }} ?>
                                        </select>
                                    </div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title">
											<label class="mdl-textfield__label">Title</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="short_desc">
											<label class="mdl-textfield__label">Short Description</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="date" name="date">
											<!--<label class="mdl-textfield__label">Date</label>-->
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="client_name">
											<label class="mdl-textfield__label">Client </label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="year">
											<label class="mdl-textfield__label">Year</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="area">
											<label class="mdl-textfield__label">Location</label>
										</div>
									</div>
									
                                    <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3" >Upload Photo
                                        </label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="image" multiple></div>
                                        </div>
                                    </div>
									<div class="col-md-12 col-sm-12">
                            <textarea name="long_desc" id="summernote" cols="30" rows="10">
                               
                            </textarea>
                        </div>
								
									<!--<div class="col-lg-6 p-t-20">-->
         <!--                               <select class="form-control  select2">-->
         <!--                                       <option value="">Category id</option>-->
         <!--                                           <optgroup label="Alaskan/Hawaiian Time Zone">-->
         <!--                                               <option value="AK">Category id</option>-->
         <!--                                               <option value="HI">banana</option>-->
         <!--                                               <option value="HI">appple</option>-->
         <!--                                           </optgroup>-->
         <!--                               </select>-->
         <!--                           </div>-->
									
									
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button  m-b-10 m-r-20 btn-pink" name="submit" id="btnUpload">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
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