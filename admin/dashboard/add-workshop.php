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
     $workshop_name=$_POST['workshop_name'];
     $date=$_POST['date'];
     $title=$_POST['title'];
     $description=$_POST['description'];
     $category=$_POST['category'];
     
      $location='uploads/';
    $final= time().$image=$_FILES['image']['name'];
     $tmp_name=$_FILES['image']['tmp_name'];
     $original='uploads/'.$final;
    move_uploaded_file($tmp_name,$original);
    
         $insert_workshop="INSERT INTO workshop(workshop_name,date,title,description,category,image)VALUES('$workshop_name','$date','$title','$description', '$category','$final')";
        $execute=mysqli_query($conn, $insert_workshop);
        if($execute)
        {
            ?>
            <script>
                alert(' Workshop inserted successfully');
                window.location.href ='manage-workshop.php';
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
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Add Workshop</header>
									
								</div>
								 <form action="" method="post" enctype="multipart/form-data">
								<div class="card-body row">
								        <div class="col-lg-6 p-t-20">
                                        <select class="form-control  select2" name="category">
                                                <option value="Category Name">Category Name</option>
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
											<input class="mdl-textfield__input" type="text" name="workshop_name">
											<label class="mdl-textfield__label">Workshop Name</label>
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
											<input class="mdl-textfield__input" type="text" name="title">
											<label class="mdl-textfield__label">Title </label>
										</div>
									</div>
                                    <div class="col-lg-12 p-t-20">
                                        <label class="control-label col-md-3" >Upload Photo
                                        </label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="image"></div>
                                        </div>
                                    </div>
									<div class="col-md-12 col-sm-12">
                            <textarea name="description" id="summernote" cols="30" rows="10">
                               
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