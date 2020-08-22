<?php include('includes/header.php');
$date_today = date('Y-m-d ', time());
$query22="SELECT * FROM khoyapaya WHERE  child_type='Paaya'";
   $result22=mysqli_query($conn,$query22);
    $total22=mysqli_num_rows($result22);
    $query23="SELECT * FROM khoyapaya WHERE  child_type='Paaya' AND updated_at='$date_today'";
   $result23=mysqli_query($conn,$query23);
    $total23=mysqli_num_rows($result23);
    $query24="SELECT * FROM khoyapaya WHERE  child_type='Khoya'";
   $result24=mysqli_query($conn,$query24);
    $total24=mysqli_num_rows($result24);
    $query25="SELECT * FROM khoyapaya WHERE  child_type='Khoya' AND updated_at='$date_today'";
   $result25=mysqli_query($conn,$query25);
    $total25=mysqli_num_rows($result25);
?>
<style>
.font-size-1{
    font-size:15px;
    color:#fff;
}
.font-size-2{
    font-size:15px;
    float:right;
    color:#fff;
}
.card-footer{
    background: white;
    padding: 4px;
    margin-top: 10px;
}
.card{
    margin-bottom:20px;
    
}

.dashboard-head{
  border-top:0px; 
  background:#3f4079; 
  margin-top: 25px; 
  padding-top: 10px;
}
.box-1{
    background:#f3655d;
    #d25852
  }
  .box-2{
    background:#b64740;
    9e3731
  }
  .box-3{
    background:#99cc2c ;
    7da724
  }
  .box-4{
    background:#70961f;
    #5d7d17
  }
  .boxfooter-1{
    background:#d25852;
   
  }
  .boxfooter-2{
    background:#9e3731;
    
  }
  .boxfooter-3{
    background:#7da724 ;
    
  }
  .boxfooter-4{
    background:#5d7d17;
   
  }
  #missing_today{
    display: none;
  }
   #missing_total{
    display: none;
  }
   #sighted_today{
    display: none;
  }
   #sighted_total{
    display: none;
  }
</style>
<main>
 <div id="breadcrumb">
       <div class="container">
         <ul>
           <li><a href="index.php">Home </a></li>
           <li><a href="dashboard.php">Dashboard</a></li>
           
         </ul>
       </div>
     </div>
     <div class="container">
			 <div class="row">
             <div class="col-lg-12 col-md-12">
					 <a class="card card-body text-center dashboard-head">
            <?php $query12="SELECT * FROM user ";
                           $result12=mysqli_query($conn,$query12);
                            $total=mysqli_num_rows($result12);
                         ?>
						 <h5 style="color:white;">Total Number of Registered Users : <?= $total;?></h5>
					</a>
				 </div>
				 <div class="col-lg-3 col-md-3">
					 <div class="card box-1">
                        <div class="card-body">
                           <h5 class="text-white">Missing Today</h5>
                           <h6 class="text-white"><?=$total25?></h6>
                             <div class="row">
                                <div class="col-6">
                                 <!--  <span class="font-size-1">Verified : 0</span> -->
                                </div>
                                <div class="col-6">
                               <!--  <span class="font-size-2">Unverified : 0</span> -->
                              </div>
                             </div>
                        </div>

                        <div class="card-footer text-center boxfooter-1" onclick="miss_today()">
                           <a class="text-white">View details</a>
                        </div>
                     </div>
                     <div class="card box-2">
                        <div class="card-body">
                           <h5 class="text-white">Missing Total</h5>
                           <h6 class="text-white"><?=$total24?></h6>
                             <div class="row">
                                <div class="col-6">
                                 <!--  <span class="font-size-1">Verified : 0</span> -->
                                </div>
                                <div class="col-6">
                                <!-- <span class="font-size-2">Unverified : 0</span> -->
                              </div>
                             </div>
                        </div>
                        <div class="card-footer text-center boxfooter-2" onclick="miss_total()">
                           <a class="text-white">View details</a>
                        </div>
                     </div>
                   
                     <div class="card box-3">
                        <div class="card-body">
                           <h5 class="text-white">Sighting Today</h5>
                           <h6 class="text-white"><?=$total23?></h6>
                             <div class="row">
                                <div class="col-6">
                                  <!-- <span class="font-size-1">Verified : 0</span> -->
                                </div>
                                <div class="col-6">
                               <!--  <span class="font-size-2">Unverified : 0</span> -->
                              </div>
                             </div>
                        </div>
                        <div class="card-footer text-center boxfooter-3" onclick="sight_today()">
                           <a class="text-white">View details</a>
                        </div>
                     </div>

                     <div class="card box-4">
                        <div class="card-body">
                           <h5 class="text-white">Sighting Total</h5>
                           <h6 class="text-white"><?=$total22?></h6>
                             <div class="row">
                                <div class="col-6">
                                  <!-- <span class="font-size-1">Verified : 0</span> -->
                                </div>
                                <div class="col-6">
                                <!-- <span class="font-size-2">Unverified : 0</span> -->
                              </div>
                             </div>
                        </div>
                        <div class="card-footer text-center boxfooter-4" onclick="sight_total()">
                           <a class="text-white">View details</a>
                        </div>
                     </div>
                     
				 </div>
				 <div class="col-lg-9 col-md-3">
           <div class="card" id="chart">
              
                         <div class="card-body">
                         <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                         </div>
            </div>
					  <div class="card" id="missing_today">
              <div class="card-header bg-white">
                <h3>Missing Today</h3>
               </div>
                         <div class="card-body">
                           <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">State</th>
                                      <th scope="col">Boy</th>
                                      <th scope="col">Girl</th>
                                      <th scope="col">Transgender</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                      $date = date('Y-m-d ', time());
                               $query1="
SELECT count(case when gender='Male' then 1 end) as male, count(case when gender='female' then 1 end) as female,count(case when gender='transgender' then 1 end) as other, state FROM `khoyapaya` where child_type='Khoya' AND updated_at='$date' GROUP BY state ";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                            ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['state']?></th>
                                      <td><?php echo $row['male']?></td>
                                      <td><?php echo $row['female']?></td>
                                      <td><?php echo $row['other']?></td>
                                    </tr>
                                  <?php }?>
                                  </tbody>
                                    </table>
                         </div>
            </div>
            <div class="card" id="missing_total">
              <div class="card-header bg-white">
                <h3>Missing Total</h3>
               </div>
                         <div class="card-body">
                           <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">State</th>
                                      <th scope="col">BOY</th>
                                      <th scope="col">Girl</th>
                                      <th scope="col">Transgender</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                           $n=1;
                           $query1="
SELECT count(case when gender='Male' then 1 end) as male, count(case when gender='female' then 1 end) as female,count(case when gender='transgender' then 1 end) as other, state FROM `khoyapaya` where child_type='Khoya' GROUP BY state ";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                            ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['state']?></th>
                                      <td><?php echo $row['male']?></td>
                                      <td><?php echo $row['female']?></td>
                                      <td><?php echo $row['other']?></td>
                                    </tr>
                                  <?php }?>
                                  </tbody>
                                    </table>
                         </div>
            </div>
            <div class="card" id="sighted_today">
              <div class="card-header bg-white">
                <h3>Sighted Today</h3>
               </div>
                         <div class="card-body">
                           <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">State</th>
                                      <th scope="col">Boy</th>
                                      <th scope="col">Girl</th>
                                      <th scope="col">Transgender</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                      $date = date('Y-m-d ', time());
                               $query1="
SELECT count(case when gender='Male' then 1 end) as male, count(case when gender='female' then 1 end) as female,count(case when gender='transgender' then 1 end) as other, state FROM `khoyapaya` where child_type='Paaya' AND updated_at='$date' GROUP BY state ";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                            ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['state']?></th>
                                      <td><?php echo $row['male']?></td>
                                      <td><?php echo $row['female']?></td>
                                      <td><?php echo $row['other']?></td>
                                    </tr>
                                  <?php }?>
                                  </tbody>
                                    </table>
                         </div>
            </div>
            <div class="card" id="sighted_total">
              <div class="card-header bg-white">
                <h3>Sighted Total</h3>
               </div>
                         <div class="card-body">
                           <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">State</th>
                                      <th scope="col">Boy</th>
                                      <th scope="col">Girl</th>
                                      <th scope="col">Transgender</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                           $n=1;
                           $query1="
SELECT count(case when gender='Male' then 1 end) as male, count(case when gender='female' then 1 end) as female,count(case when gender='transgender' then 1 end) as other, state FROM `khoyapaya` where child_type='Paaya' GROUP BY state ";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                            ?>
                                    <tr>
                                      <th scope="row"><?php echo $row['state']?></th>
                                      <td><?php echo $row['male']?></td>
                                      <td><?php echo $row['female']?></td>
                                      <td><?php echo $row['other']?></td>
                                    </tr>
                                  <?php }?>
                                  </tbody>
                                    </table>
                         </div>
            </div>
				 </div>
				 
			 </div>
			 <!-- /row -->
		 </div>
    </main>
    <script type="text/javascript">
       var a = document.getElementById("missing_today");
       var b = document.getElementById("missing_total");
       var c = document.getElementById("sighted_today");
       var d = document.getElementById("sighted_total");
       var e = document.getElementById("chart");
  function miss_today() {
    a.style.display = "block";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
  }
  function miss_total() {
    a.style.display = "none";
    b.style.display = "block";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
  }
  function sight_today() {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "block";
    d.style.display = "none";
    e.style.display = "none";
  }
  function sight_total() {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "block";
    e.style.display = "none";
  }
    </script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Missing & Sighting Trend - Last 12 Months"
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
        indexLabelFontSize: 16,
    indexLabelPlacement: "outside",
    dataPoints: [
      { x: 10, y: 71 },
      { x: 20, y: 55 },
      { x: 30, y: 50 },
      { x: 40, y: 65 },
      { x: 50, y: 92, indexLabel: "\u2605 Highest" },
      { x: 60, y: 68 },
      { x: 70, y: 38 },
      { x: 80, y: 71 },
      { x: 90, y: 54 },
      { x: 100, y: 60 },
      { x: 110, y: 36 },
      { x: 120, y: 49 },
      { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
    ]
  }]
});
chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php include('includes/footer.php')?>