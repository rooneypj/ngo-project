<?php 
include('connection.php');
include('includes/header.php');
if(isset($_POST['submit']))
{
     $title=$_POST['title'];
     $note=$_POST['note'];
     $location="uploads/";
 $profile=$_FILES['profile']['name'];
$tmp=$_FILES['profile']['tmp_name'];
$original="uploads/slider/".$profile;
move_uploaded_file($tmp,$original);
if( $title!='' && $note!='')
  {
    $sql_query="INSERT INTO slider (title,note,image)
    VALUES ('$title','$note','$profile')";
    $execute_query=mysqli_query($conn, $sql_query);
    if($execute_query)
    {
      echo "<script>alert(' Your Slider Added successfully');
        window.location.href = 'slider.php';
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
											<input class="mdl-textfield__input" type="text" name="title">
											<label class="mdl-textfield__label">Slider title </label>
										</div>
									</div>
								<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										    <label>Slider Image </label>
											<input type="file" class="form-control" name="profile" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
											
										</div>
									</div>
                                   
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="note">
											<label class="mdl-textfield__label">Slider note </label>
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
     <script type="text/javascript">
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" height="100"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>