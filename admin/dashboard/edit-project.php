<?php
// session_start();
// if(!isset($_SESSION['login_user'])){
//     echo "<script>alert('login first');
//     window.location.href='../login.php';
//     </script>";
// }
include ('includes/header.php');
include ('connection.php');
// echo "Connected successfully";
$tid = $_POST['tid'];
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $title=$_POST['title'];
    $short_desc=$_POST['short_desc'];
    $category=$_POST['category'];
    $date=$_POST['date'];
    $client_name=$_POST['client_name'];
    $year=$_POST['year'];
    $area=$_POST['area'];
    $long_desc=$_POST['long_desc'];
    
    
    
    $sql ="UPDATE project SET title='$title',short_desc='$short_desc', category='$category',date='$date',client_name='$client_name',year='$year',area='$area',long_desc='$long_desc' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Category updated successfully');
        window.location.href ='manage-project.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   
}
?>



<div class="page-container">
<?php include('includes/sidebar.php')?>
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
           
            <!-- start widget -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card-box">
								<div class="card-head">
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Update Project</header>
									
								</div>
								<?php 
                                  $s= "select * from project where id='$tid'";
                                  $result = mysqli_query($conn, $s);
                            
                                   ?>
							<form action=" " method="post" enctype="multipart/form-data">
							 
								<div class="card-body row">
								       <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                                $category= $row['title'];
                            ?>
                            <div class="col-lg-6 p-t-20">
											<label > Category</label>
                                        <select class="form-control  select2" name="category" value="<?php echo $row['category'] ?>">
                                               
                                                  <?php 
                                        $sql1 = "SELECT * FROM category";
                                        $result1 = $conn->query($sql1);
                                        
                                        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($row1 = $result1->fetch_assoc()) {
                                            
                                        ?>
                                                     <option value="<?php echo $row1['category']?> <?= ($row1['category']=='$category')?'selected':''?>"><?php echo $row1['category']; ?></option>
                                        <?php }} ?>
                                        </select>
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title"  value="<?php echo $row['title'] ?>" >
											<label class="mdl-textfield__label">title</label>
										</div>
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="short_desc"  value="<?php echo $row['short_desc'] ?>" >
											<label class="mdl-textfield__label">Short Description</label>
										</div>
									</div>
									
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="date" name="date"  value="<?php echo $row['date'] ?>" >
											<!--<label class="mdl-textfield__label">Date</label>-->
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="client_name"  value="<?php echo $row['client_name'] ?>" >
											<label class="mdl-textfield__label">Client  </label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="area"  value="<?php echo $row['area'] ?>" >
											<label class="mdl-textfield__label">Location</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="calender" name="year"  value="<?php echo $row['year'] ?>" >
											<label class="mdl-textfield__label">Year</label>
										</div>
									</div>
									
									<div class="col-md-12 col-sm-12">
                            <textarea name="long_desc" id="summernote" cols="30" rows="10">
                               <?php echo $row['long_desc']?>
                            </textarea>
                        </div>
									

								 <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button  m-b-10 m-r-20 btn-pink" name="submit">Submit</button>
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
									</div>
										
									 <?php }
									 
                                           ?> 
                                           
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