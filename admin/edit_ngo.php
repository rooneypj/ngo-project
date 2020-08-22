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
$id=$_GET['id'];
if(isset($_POST['submit']))
{
     $title=$_POST['title'];
     $tagline=$_POST['tagline'];
     $gmap=$_POST['gmap'];
     
      $ac_no=$_POST['ac_no'];
     $ifsc=$_POST['ifsc'];
     $bank=$_POST['bank_name'];
     $corona=$_POST['corona'];
     
     $date=$_POST['date'];
      $state=$_POST['state'];
       $city=$_POST['city'];
     $short_desc=$_POST['short_desc'];
     $short_data = str_replace("'", "\'", $short_desc);
     $loc=$_POST['location'];             
     $add_by='Admin';
     $long_desc=$_POST['long_desc'];
     $trim_data = str_replace("'", "\'", $long_desc);
        $sql ="UPDATE ngo SET title='$title',short_desc='$short_data',location='$loc',add_by='$add_by',long_desc='$trim_data',tagline='$tagline',date='$date',gmap='$gmap',city='$city',state='$state',ac_no='$ac_no',ifsc='$ifsc',bank='$bank',corona='$corona' WHERE id='$id'";
        $execute=mysqli_query($conn, $sql);
        if($execute)
        
        {
            ?>
            <script>
                alert(' NGO Updated successfully');
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
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Edit NGO</header>
									
								</div>
								 <form action=" " method="post">
                                     <?php
                          
                           $query1="SELECT * FROM ngo where id='$id'";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                        $state=$row['state'];
                            ?>
								<div class="card-body row">
								       
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title" value="<?php echo $row['title'];?>" required>
											<label class="mdl-textfield__label">Title</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="text" name="tagline" value="<?php echo $row['tagline'];?>"  required>
                      <label class="mdl-textfield__label">Tagline</label>
                    </div>
                  </div>
                  <div class="col-lg-6 p-t-20">
                 
                                            <label class="control-label col-md-3" >State
                                        </label>
                                            <div class="col-lg-12 col-md-12">
                                                <select class="form-control select2"  name="state"  onchange="choosecity()" id="state_name" required>
                                                    <option value="">Select a state</option>
                                                     <?php
                          
                           $query="SELECT city_state, COUNT(city_state) 
FROM cities
GROUP BY city_state
HAVING COUNT(city_state) > 1 ORDER BY city_state ASC ";
                           $result=mysqli_query($conn,$query);
                           //  while($row=mysqli_fetch_array($result1))
                            while($row1 = $result->fetch_assoc()) {
                           
                            ?>
                                                      <option value="<?php echo $row1['city_state'];?>" <?php if ( $row['state'] == $row1['city_state']) echo "selected='selected'";?>><?php echo $row1['city_state'];?></option>
                                                    <?php }?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-lg-6 p-t-20">
                                       <label class="control-label col-md-12" >District
                                        </label>
                                      <select id="selectcity"  name="city" value="<?php echo $row['city'];?>" class=" form-control select2" required>
                                       
                                      </select>
                                    </div>
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="date" value="<?php echo $row['date'];?>"  name="date" required>
                      <label class="mdl-textfield__label">Date</label>
                    </div>
                  </div>
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="url" name="gmap" value="<?php echo $row['gmap'];?>"  required>
                      <label class="mdl-textfield__label">Location(in Googlemap)</label>
                    </div>
                  </div>
                  
                  
                   
                  <div class="col-md-8 mt"><label>Account number</label>
                                         <input type="number" class="form-control" value="<?php echo $row['ac_no'];?>" name="ac_no"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>IFSC</label>
                                         <input type="text" class="form-control" name="ifsc" value="<?php echo $row['ifsc'];?>"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>Bank Name</label>
                                         <input type="text" class="form-control" value="<?php echo $row['bank'];?>" name="bank_name"   spellcheck="false" required> </div>
                                         
                                         <div class="col-md-8 mt"><label>Working On corona</label>
                                         <select name="corona" class="form-control">
                                           <option <?php echo ($row['corona']=="yes")?'selected':'';?>>yes</option>
                                           <option <?php echo ($row['corona']=="no")?'selected':'';?>>no</option>
                                         </select>
                                         </div>
                  
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="short_desc" value="<?php echo $row['short_desc'];?>"required>
											<label class="mdl-textfield__label">Short Description</label>
										</div>
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="location" value="<?php echo $row['location'];?>" required>
											<label class="mdl-textfield__label">Location</label>
										</div>
									</div>
									
                                   
									<div class="col-md-12 col-sm-12">
                            <textarea name="long_desc" id="summernote" cols="30" rows="10" required>
                               <?php echo $row['long_desc'];?>
                            </textarea>
                        </div>
								
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button  m-b-10 m-r-20 btn-pink" name="submit" id="btnUpload">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
								
								</div>
                            <?php } ?>
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
    </script>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>