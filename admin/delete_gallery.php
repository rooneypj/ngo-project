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
$sql = "DELETE FROM gallery WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('data deleted successfilly');
        window.location.href = 'manage_gallery.php';</script>";
    echo "";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>
