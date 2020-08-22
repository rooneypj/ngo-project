<?php 
include('connection.php');
     $id=$_POST['radio'];
    $sql = "SELECT * FROM cities WHERE city_state='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
<option value="<?= $row['city_name']?>"><?= $row['city_name']?></option>
<?php
}
}
else{
?>
<option value="">No data found</option>
<?php
}
?>