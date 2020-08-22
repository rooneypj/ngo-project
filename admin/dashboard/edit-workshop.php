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
$tid = $_POST['id'];
// if(isset($_POST['submit']))
// {   
//     $id = $_POST['id'];
//     $workshop_name=$_POST['workshop_name'];
//     $category=$_POST['category'];
//     $date=$_POST['date'];
//     $title=$_POST['title'];
//     $description=$_POST['description'];
    
//     $sql ="UPDATE workshop SET workshop_name='$workshop_name',category='$category',date='$date',title='$title',description='$description' WHERE id='$id'";
//     if (mysqli_query($conn, $sql)) {
//         ?>
//         <script>alert(' Category updated successfully');
//         window.location.href ='manage-workshop.php';</script>
//         <?php
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    
   
// }
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
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Update Workshop</header>
									
								</div>
								<?php 
                                  $s= "select * from user where id='$tid'";
                                  $result = mysqli_query($conn, $s);
                            
                                   ?>
							<form action=" " method="post" enctype="multipart/form-data">
							 
								<div class="card-body row">
								       <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                                //$category= $row['workshop_name'];
                            ?>
                            <div class="col-lg-6 p-t-20">
											<!--<label > Category</label>-->
           <!--                             <select class="form-control  select2" name="category" value="<?php echo $row['category'] ?>">-->
           <!--                               <option value="<?php echo $row1['category']?> <?= ($row1['category']=='$category')?'selected':''?>"><?php echo $row1['category']; ?></option>-->
                                       
           <!--                             </select>-->
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="workshop_name"  value="<?php echo $row['name'] ?>" >
											<label class="mdl-textfield__label">Workshop Name</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="date" name="date"  value="<?php echo $row['email'] ?>" >
											<!--<label class="mdl-textfield__label">Date</label>-->
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="title"  value="<?php echo $row['mobile'] ?>" >
											<label class="mdl-textfield__label">Title </label>
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
                            <textarea name="description" id="summernote" cols="30" rows="10">
                               <?php echo $row['description'] ?>
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