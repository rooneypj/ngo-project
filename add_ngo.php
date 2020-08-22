<?php
@session_start();
if(!isset($_SESSION['user']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
else{
    $user_id=$_SESSION['user'];
}include ('includes/header.php');
 include ('includes/sidebar.php');
 if(isset($_POST['submit']))
{
     $title=$_POST['title'];
     $tagline=$_POST['tagline'];
     $gmap=$_POST['gmap'];
     $ac_no=$_POST['ac_no'];
     $ifsc=$_POST['isfc'];
     $bank=$_POST['bank_name'];
     $corona=$_POST['corona'];
     
     $date=$_POST['date'];
     $short_desc=$_POST['short_desc'];
      $short_data = str_replace("'", "\'", $short_desc);
     $loc=$_POST['location'];             
     $add_by=$user_id;
     $long_desc=$_POST['long_desc'];
     $trim_data = str_replace("'", "\'", $long_desc);
      $location='admin/uploads/';
     $_FILES['image']['name'];
    $final= time().$_FILES['image']['name'];
     $tmp_name=$_FILES['image']['tmp_name'];
     $original='admin/uploads/'.$final;
    move_uploaded_file($tmp_name,$original);
    
         $insert_project="INSERT INTO ngo(title,short_desc,location,add_by,long_desc,image,tagline,gmap,date,ac_no,ifsc,bank,corona)
         VALUES('$title','$short_data','$loc','$add_by','$trim_data','$final','$tagline','$gmap','$date','$ac_no','$ifsc','$bank','$corona')";
        $execute=mysqli_query($conn, $insert_project);
        if($execute)
        
        {
            ?>
            <script>
                alert(' NGO inserted successfully');
                window.location.href ='my_ngo.php';
            </script>
            <?php
        }
    
}
 ?>

              <div class="col-md-9 sidebar_body">
                 <div class="card">
                    <div class="card-header"><div class="row">
                        <div class="col-md-6">
                             <h4 class="pull-left"> Add NGO</h4>
                        </div>
                    <div class="col-md-6">
                     
                     </div>
                     </div>
                   
                    </div>
                    <form action=" " method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-8 mt"> <label>Title</label>
                                         <input type="text" class="form-control"  name="title"  spellcheck="false" required> </div>
                                         <div class="col-md-8 mt"><label>Tagline</label>
                                         <input type="text" class="form-control" name="tagline"   spellcheck="false" required> </div>
                                         <div class="col-md-8 mt"><label>Start Date</label>
                                         <input type="date" class="form-control" name="date"   spellcheck="false" required> </div>
                                          <div class="col-md-8 mt"><label>Short Description</label>
                                        <textarea class="form-control" name="short_desc"   spellcheck="false" required></textarea> </div>
                                           <div class="col-md-8 mt"><label>Location</label>
                                         <input type="text" class="form-control" name="location"   spellcheck="false" required> </div>
                                         <div class="col-md-8 mt"><label>Location(googlemap)</label>
                                         <input type="url" class="form-control" name="gmap"   spellcheck="false" required> </div>
                                         qwertyu
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
                                         
                                         
                                          <div class="col-md-8 mt"><label>Long Description</label>
                                        <textarea class="form-control" rows="3" name="long_desc"  spellcheck="false" required></textarea> </div>
                                   <div class="col-md-8 mt"> <label>Image</label>
                                         <input type="file" class="form-control" name="image" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div></div>
                                         <div class="col-md-12 mt mb">
                     <button type="submit"  name="submit" class="btn_1 medium">Submit</button>
                     </div>
                                            
                            </div>
                        </div>
                    </form>
                        </div>
            </div>
            </div>
            
            </div>
        </div>
</section>
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
<?php include ('includes/footer.php')?>