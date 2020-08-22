<?php session_start();
if(!isset($_SESSION['admin']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
include('connection.php');
if(isset($_POST['submit']))
{   
    $id = $_POST['id'];
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    $mobile=$_POST['mobile'];
   
    
    $sql ="UPDATE admin_profile SET name='$name',designation='$designation',mobile='$mobile' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Profile updated successfully');
        window.location.href ='Profile.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   
}

?>