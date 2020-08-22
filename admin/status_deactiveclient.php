<?php  
// session_start();
// if(!isset($_SESSION['login_user'])){
//     echo "<script>alert('login first');
//     window.location.href='../login.php';
//     </script>";
//     exit(0);
// }
include('connection.php');
  $id=$_GET['id'];
  
     $update="UPDATE client SET status='1' WHERE id='$id'";
   $excuteupdate=mysqli_query($conn,$update);
   if($excuteupdate)
   {
      echo "<script>alert('Your Status Changed Successfully');
         window.location.href = 'manage-client.php';
      </script>";
   }
   else{
        echo "<script>alert(' Status not Changed');
         window.location.href = 'manage-client.php';
      </script>";
   }
    




 ?>
 <p><?php echo $dbpassword; ?></p>