<?php
// session_start();
// if(!isset($_SESSION['login_user'])){
//     echo "<script>alert('login first');
//     window.location.href='../login.php';
//     </script>";
// }
include ('includes/header.php');
include ('connection.php');
$tid = $_POST['tid'];
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $category=$_POST['category'];
    $date=$_POST['date'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql ="UPDATE category SET category='$category',date='$date',title='$title',description='$description' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Category updated successfully');
        window.location.href ='category-manage.php';</script>
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
									<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">Update Category</header>
									
								</div>
								<?php 
$s= "select * from category where id='$tid'";
$result = mysqli_query($conn, $s);
?>
							<form action=" " method="post" enctype="multipart/form-data">
							    <?php 
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
								<div class="card-body row">
								    
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" name="category"  value="<?php echo $row['category'] ?>" >
											<label class="mdl-textfield__label">Category Name</label>
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
											<input class="mdl-textfield__input" type="text" name="title"  value="<?php echo $row['title'] ?>" >
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
								
								</div>
									</form>
									
									 <?php }
                        ?>  
							</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
    <?php include('includes/tools.php')?>
  
<!-- end page container -->
<?php include('includes/footer.php')?>