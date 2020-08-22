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
   $location="uploads/";
    $image=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
     $original="uploads/".$image;
    move_uploaded_file($temp_name,$original);
   
    
    $sql ="UPDATE admin_profile SET image='$original' WHERE id='$id'";
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