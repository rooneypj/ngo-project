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
      $tagline=$_POST['tagline'];
     $gmap=$_POST['gmap'];
      $state=$_POST['state'];
       $city=$_POST['city'];
     $date=$_POST['date'];
     $short_desc=$_POST['short_desc'];
      $short_data = str_replace("'", "\'", $short_desc);
     $loc=$_POST['location'];             
     $add_by='Admin';
     
      $ac_no=$_POST['ac_no'];
     $ifsc=$_POST['ifsc'];
     $bank=$_POST['bank_name'];
     $corona=$_POST['corona'];
     
     $long_desc=$_POST['long_desc'];
     $trim_data = str_replace("'", "\'", $long_desc);
      $location='uploads/';
     $_FILES['image']['name'];
    $final= time().$_FILES['image']['name'];
     $tmp_name=$_FILES['image']['tmp_name'];
     $original='uploads/'.$final;
    move_uploaded_file($tmp_name,$original);
    
    // hell0 test
 $targetDir = "uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."', NOW()),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $db->query("INSERT INTO ngo (gallary) VALUES $insertValuesSQL"); 
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
    // Display status message 
    echo $statusMsg;
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
 
 
    // hello test
         $insert_project="INSERT INTO ngo(title,short_desc,location,add_by,long_desc,image,tagline,gmap,date,state,city,gallary,ac_no,ifsc,bank,corona)
         VALUES('$title','$short_data','$loc','$add_by','$trim_data','$final','$tagline','$gmap','$date','$state','$city','$filename','$ac_no','$ifsc','$bank','$corona')";
        $execute=mysqli_query($conn, $insert_project);
        if($execute)
        
        {
            ?>
             <script>
                alert(' NGO inserted successfully');
                window.location.href ='ngo.php';
            </script> 
            <?php
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
									<header>Add NGO</header>
									
								</div>
								 <form action=" " method="post" enctype="multipart/form-data">
								<div class="card-body row">
								       
									<div class="col-lg-6 p-t-20">
                    <label class="control-label col-md-12">Title</label>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="form-control" type="text" name="title" required>
											
										</div>
									</div>
                  <div class="col-lg-6 p-t-20">
                     <label class="control-label col-md-12">Tagline</label>
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="form-control" type="text" name="tagline" required>
                     
                    </div>
                  </div>
                 
                  <div class="col-lg-6 p-t-20">
                 
                                            <label class="control-label col-md-3" >State
                                        </label>
                                            <div class="col-lg-12 col-md-12">
                                                <select class="form-control select2"  name="state" onchange="choosecity()" id="state_name" required>
                                                    <option value="">Select a state</option>
                                                     <?php
                          
                           $query1="SELECT city_state, COUNT(city_state) 
FROM cities
GROUP BY city_state
HAVING COUNT(city_state) > 1 ORDER BY city_state ASC ";
                           $result1=mysqli_query($conn,$query1);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row = $result1->fetch_assoc()) {
                           
                            ?>
                                                      <option value="<?php echo $row['city_state'];?>"><?php echo $row['city_state'];?></option>
                                                    <?php }?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-lg-6 p-t-20">
                                       <label class="control-label col-md-12" >District
                                        </label>
                                      <select id="selectcity"  name="city" class=" form-control select2" required>
                                       
                                      </select>
                                    </div>
 <div class="col-lg-6 p-t-20">
                      <label class="control-label col-md-12">Date</label>
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="form-control" type="date" name="date" required>
                     
                    </div>
                  </div>
                  <div class="col-lg-6 p-t-20">
                    <label class="control-label col-md-12">Location(in Googlemap)</label>
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="form-control" type="url" name="gmap" required>
                      
                    </div>
                  </div>
                  
                  
                  <div class="col-md-8 mt"><label>Account number</label>
                                         <input type="number" class="form-control" name="ac_no"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>IFSC</label>
                                         <input type="text" class="form-control" name="ifsc"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>Bank Name</label>
                                         <input type="text" class="form-control" name="bank_name"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>Working On corona</label>
                                         <select name="corona" class="form-control">
                                           <option>yes</option>
                                           <option>no</option>
                                         </select>
                                         </div>
									<div class="col-lg-6 p-t-20">
                    <label class="control-label col-md-12">Short Description</label>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="form-control" type="text" name="short_desc" required>
											
										</div>
									</div>
									
									<div class="col-lg-6 p-t-20">
                    <label class="control-label col-md-12">Location</label>
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="form-control" type="text" name="location" required>
											
										</div>
									</div>
									
                                    <div class="col-lg-6 p-t-20">
                                        <label class="control-label col-md-3" >Upload Photo
                                        </label>
                                        <div class="col-md-12">
                                           <input type="file" class="form-control" name="image" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
                                        </div>
                                    </div>
                                     <div class="col-lg-6 p-t-20">
                                        <label class="control-label col-md-12" >Gallary Images
                                        </label>
                                        <div class="col-md-12">
                                    <input type='file' name='files[]' class="form-control"  id="gallary" onchange="return fileValidationgallary()" required multiple />
                                    <div id="demoimage"></div>
                                  </div>
                                </div>
									<div class="col-md-12 col-sm-12">
                            <textarea name="long_desc" id="summernote" cols="30" rows="10" required>
                               
                            </textarea>
                        </div>
								
									
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
    <script type="text/javascript">
      // var cityselect=$('#selectcity');
      function choosecity(){
        var state = document.getElementById("state_name").value;
         $.ajax({
        url: "district_data.php",
        type: "POST",
        data: {
            'radio': state
        },
        success: function(data) {
            $('#selectcity').html(data);
            
          }
        });
      }
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
function fileValidationgallary(){
    var fileInput = document.getElementById('gallary');
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
                document.getElementById('demoimage').innerHTML = '<img src="'+e.target.result+'" height="100"/>';
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