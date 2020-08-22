<?php session_start();
if(!isset($_SESSION['admin']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
include ('connection.php');
 $tid = $_POST['tid'];
if(isset($_POST['cat_deactive']))
{
	 $sql ="UPDATE cost SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='manage_package.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['workshop_deactive']))
{
	 $sql ="UPDATE workshop SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='manage-workshop.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>