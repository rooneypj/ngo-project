<?php 
// session_start();
//  if(!isset($_SESSION['login_user'])){
//      echo "<script>alert('login first');
//      window.location.href='index.php';
//      </script>";
//      exit(0);
//  }
include('connection.php');
include('includes/header.php');
$id=$_POST['id'];
$select="select * from admin_profile where id='$id'";
$excute=mysqli_query($conn,$select);
while($row=mysqli_fetch_array($excute)){
    $name=$row['name'];
    $designation=$row['designation'];
    $mobile=$row['mobile'];
    $email=$row['email'];
    $address=$row['address'];
  
    // $image=$row['image'];
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $address=$_POST['address'];
  
    if($name!='' && $designation!='' && $mobile!='' && $email!='' && $address!='')
    {
       $update_admin_profile="update admin_profile SET name='$name', designation='$designation',mobile='$mobile', email='$email',address='$address' where id='$id'";
      $excute_update=mysqli_query($conn,$update_admin_profile);
      if($excute_update)
      {
        echo "<script>alert('Profile Updated Successfully');
        window.location.href='profile.php';</script>";
      }
    }
}
?>