<?php
 include('includes/connection.php');
 
$name=$_POST['rname'];
$mobile=$_POST['rmobile'];
$id=$_POST['ngoid'];
$star=$_POST['rating'];
$message=$_POST['review'];
$query="INSERT into rating(name,mobile,star,message,ngoid,status)VALUES('$name','$mobile','$star','$message','$id','0')";
$result=mysqli_query($conn,$query);
if($result){
    ?>
<script>
alert('review submitted successfully');
// window.location.href='ngo_details.php?id=<?//= $id ?>';
</script>
<?php
}
else{
?>
    
 echo "<script>alert('error occured');
// window.location.href='ngo_details.php?id=<?//= $id ?>';
</script>";   
<?php 
}
?>