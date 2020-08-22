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
if(isset($_POST['sighted_deactive']))
{
	 $sql ="UPDATE khoyapaya SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='manage_sighted.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['missing_deactive']))
{
     $sql ="UPDATE khoyapaya SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='manage_missing.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['announce_deactive']))
{
     $sql ="UPDATE announcement SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='announcement.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['ngo_deactive']))
{
     $sql ="UPDATE ngo SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='ngo.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['link_deactive']))
{
     $sql ="UPDATE links SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='important_links.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['slider_deactive']))
{
     $sql ="UPDATE slider SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='slider.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
elseif(isset($_POST['user_deactive']))
{
     $sql ="UPDATE user SET status='1' WHERE id='$tid'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Status updated successfully');
        window.location.href ='manage-client.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>