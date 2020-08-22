<?php include('includes/header.php');
include('includes/connection.php');
 $query1="SELECT * FROM user";
 $result1=mysqli_query($conn,$query1);
 while($row = $result1->fetch_assoc()) {
  $r_email= $row['email'];
 }
if(isset($_POST['submit']))
{
     $name=$_POST['name'];
     $mobno=$_POST['mobno'];
     $email=$_POST['email'];             
     $address=$_POST['address'];
     $adhar=$_POST['adhar'];
     $state=$_POST['state'];             
     $pin=$_POST['pincode'];
     $password=md5($_POST['password']);
      $location='admin/uploads/';
     $_FILES['image']['name'];
    $final= time().$_FILES['image']['name'];
     $tmp_name=$_FILES['image']['tmp_name'];
     $original='admin/uploads/'.$final;
    move_uploaded_file($tmp_name,$original);
    if($email==$r_email)
    {?>
       <script>
                alert(' You Are Already Registered');
                window.location.href ='login.php';
            </script>
   <?php  }
    else{
        if($name!='' && $mobno!='' && $email!='' && $address!='' && $adhar!='' && $state!='' && $pin!='' && $password!='' && $final!='' )
    {
        $sql_query="INSERT INTO user(name,mobile,email,address,adhar,state,pin,password,file)
         VALUES('$name','$mobno','$email','$address','$adhar','$state','$pin','$password','$final')";
       $execute_query=mysqli_query($conn, $sql_query);
    if($execute_query)
        
        {
            ?>
            <script>
                alert(' Registered successfully');
                window.location.href ='login.php';
            </script>
            <?php
        }
    
}

    }
 
}

?>
<div class="bg_color_2">
			 <div class="container margin_60_35">
				 <div>
					
					 <div class="row justify-content-center">
						 <div class="col-md-8">
							

								 <div class="">
                                    <div class="box_form">
                                         <h3>Please register to Binplus NGO </h3>
                                         <br/>
                                         <form  action=""method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name </label>
                                            <input type="text" name="name" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile No </label>
                                            <input type="number" name="mobno" class="form-control" required />
                                        </div>
                                        </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control"required />
                                        </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Aadhaar No </label>
                                            <input type="number" name="adhar" class="form-control" required/>
                                        </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Photo ID Proof</label>
                                            <input type="file" class="form-control" name="image" id="file" onchange="return fileValidation()" required>
                                           <div id="imagePreview"></div>
                                        </div>
                                        </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" required></textarea>
                                        </div>
                                        </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State </label>
                                           <select class="form-control" name="state" required>
                                               <option value="">Select State</option>
                                                 <option value="UP">UP</option>
                                                   <option value="Delhi">Delhi</option>
                                           </select>
                                        </div>
                                        </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pincode </label>
                                            <input type="number" name="pincode" class="form-control" required/>
                                        </div>
                                        </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password </label>
                                            <input type="password" name="password" class="form-control" id="password1" required/>
                                        </div>
                                    </div>
                                    </div>
                                        
                                        <div id="pass-info" class="clearfix"></div>
                                        <div class="checkbox-holder text-left">
                                            <div class="checkbox_2">
                                                <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked="" />
                                                <label for="check_2"><span>I Agree to the  <strong>Terms &amp; Conditions </strong></span></label>
                                            </div>
                                        </div>
                                        <div class="form-group text-center add_top_30">
                                            <button class="btn_1 medium"  id="btnUpload" type="submit" name="submit"> Submit</button>
                                        </div>
                                    </form>
                                    </div>
                                 </div>
							
						 </div>
					 </div>
					 <!-- /row -->
				 </div>
				 <!-- /register -->
			 </div>
         </div>
         <script type="text/javascript">
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png only.');
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
         <?php include('includes/footer.php')?>