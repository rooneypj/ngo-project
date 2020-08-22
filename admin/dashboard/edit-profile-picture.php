<?php 
// session_start();
//  if(!isset($_SESSION['login_user'])){
//      echo "<script>alert('login first');
//      window.location.href='index.php';
//      </script>";
//      exit(0);
//  }
include('connection.php');
$id=$_POST['id'];
$location="uploads/";
 $profile=$_FILES['profile']['name'];
$tmp=$_FILES['profile']['tmp_name'];
$original="uploads/".$profile;
move_uploaded_file($tmp,$original);
$query="update admin_profile SET image='$original' where id='$id'";
$excute=mysqli_query($conn,$query);
if($excute)
{
    echo "<script>alert('Profile Picture Updated Successfully');
        window.location.href='profile.php';</script>";
}
?>
