<?php session_start();
if(!isset($_SESSION['admin']))
{
    echo"<script>alert('login first');
  window.location.href = 'login.php';
  </script>";
   exit(0);
}
include('connection.php');
$id=$_GET['id'];
$sql = "DELETE FROM slider WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('slider data deleted successfilly');
        window.location.href = 'slider.php';</script>";
    echo "";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>
