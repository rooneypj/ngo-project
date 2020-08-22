<?php include('includes/header.php');
   include('includes/connection.php');
   $id=$_GET['id'];
   ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style type="text/css">
   .bg-overlay {
   background-repeat: no-repeat!important;
   background-size: cover!important;
   color: #fff;
   height: 340px;
   padding-top: 50px;
   }
   #demo {
   height:100%;
   position:relative;
   overflow:hidden;
   }
   .green{
   background-color:#6fb936;
   }
   .thumb{
   margin-bottom: 30px;
   }
   .page-top{
   margin-top:85px;
   }
   .thumbnail{
       height:45px;
       width:45px;
       border-radius:50%;
       padding:3px;
   }
   img.zoom {
   width: 100%;
   height: 200px;
   border-radius:5px;
   object-fit:cover;
   -webkit-transition: all .3s ease-in-out;
   -moz-transition: all .3s ease-in-out;
   -o-transition: all .3s ease-in-out;
   -ms-transition: all .3s ease-in-out;
   }
   .transition {
   -webkit-transform: scale(1.2); 
   -moz-transform: scale(1.2);
   -o-transform: scale(1.2);
   transform: scale(1.2);
   }
   .modal-header {
   border-bottom: none;
   }
   .modal-title {
   color:#000;
   }
   .modal-footer{
   display:none;  
   }
</style>
<main>
   <div id="breadcrumb">
      <div class="container">
         <ul>
            <li><a href="index.php">Home </a></li>
            <li><a href="ngo.php">NGO </a></li>
            <li>NGO Details </li>
         </ul>
      </div>
   </div>
    <?php 
      $query1="SELECT * FROM ngo where status='0' AND id='$id'";
      $result1=mysqli_query($conn,$query1);
      while($row = $result1->fetch_assoc()) {
          //print_r($row);
    ?>
    
   <!-- /breadcrumb -->
   <div class="container-fluid bg-overlay" style="background: linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url('admin/uploads/<?php echo $row['image'];?>')">
      <div class="row" style="margin-top:75px;">
         <div class="col-md-12 text-center text-white">
            <h1 style="color:#fff;"><?=$row['title'];?></h1>
            <h3 style="color:#fff;">"<?=$row['tagline'];?>"</h3>
         </div>
      </div>
   </div>
   <?php  } ?>
   <br><br>
   
   <div class="container-fluid margin_60">
                        <?php
                            $query1="SELECT * FROM ngo where status='0' AND id='$id'";
                            $result1=mysqli_query($conn,$query1);
                             while($row = $result1->fetch_assoc()) {
                        ?>
                        <div class="col-lg-12 col-md-12">
      <div class="row">
         <div class="col-xl-9 col-lg-8 col-md-12">
            <nav id="secondary_nav">
               <div class="container">
                  <ul class="clearfix">
                     <li style="display:block;color:#fff;">About <?=$row['title'];?></li>
                  </ul>
               </div>
            </nav>
            <div id="section_1" style="padding-bottom:0px">
               <div class="box_general_3">
                  <div class="profile">
                     <div class="row">
                        <div class="col-lg-5 col-md-4">
                           <figure>
                              <img src="admin/uploads/<?php echo $row['image'];?>" alt="" class="img-fluid" style="height:200px;"/>
                           </figure>
                        </div>
                        <div class="col-lg-7 col-md-8">
                           <h1><?=$row['title'];?></h1>
                           <p><?=$row['short_desc'];?> </p>
                        </div>
                     </div>
                  </div>
                  <hr />
                  <h2>NGO Activities</h2>
                  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row">
        <?php 
        //echo "select * from gallery where ngoid='$id'";
        $ngo_g=mysqli_query($conn,"select * from gallery where ngoid='$id'");
        while($ng_gal=mysqli_fetch_array($ngo_g,MYSQLI_BOTH))
        {
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <img src="admin/uploads/gallery/<?php echo $ng_gal['image']; ?>" width="200" height="200"/>
            <?php echo $ng_gal['titles']; ?>
        </div>
        <?php } ?>
    </div>
</div>
                  
                  <br>
                  <!-- /profile -->
                  <div class="indent_title_in">
                     <i class="pe-7s-news-paper"></i>
                     <h3>OUR VISION</h3>
                  </div>
                  <div class="wrapper_indent">
                     <p><?=$row['long_desc'];?> </p>
                  </div>
                  <?php  
            $n=0;
            $query3="SELECT *, (SELECT sum(star) FROM rating where status='0' AND ngoid='$id') as totalstar FROM rating where status='0' AND ngoid='$id'";
            $result3=mysqli_query($conn,$query3);
             $ratecounter=mysqli_num_rows($result3);
            while($row1234=mysqli_fetch_array($result3))
                {
                    $totalstar=$row1234['totalstar'];
                }
            
            
            
            if($ratecounter>0){
            ?>
                  <!--  End wrapper indent -->
                  <div class="footer bg-secondary p-4 text-white">
                     <i class="fa fa-comments-o" aria-hidden="true"></i> <?= $ratecounter ?> &emsp;&emsp;&emsp;<?= $totalstar/$ratecounter ?> <i class="fa fa-star" aria-hidden="true" style="color:yellow"></i> <button class="btn btn-primary btn-sm" id="show_review"><i class="fa fa-eye"></i> Review</button>
                  </div>
               </div>
               <!-- /section_1 -->
            </div>
              



            <div calss="show-review">
                <nav id="secondary_nav">
               <div class="container">
                  <ul class="clearfix">
                     <li style="display:block;color:#fff;">
                        <h5 class="text-white">User reviews</h5>
                     </li>
                  </ul>
               </div>
            </nav>
            <div id="section_1">
               <div class="box_general_3">
                       
              <?php
               $query31="SELECT * FROM rating where status='0' AND ngoid='$id'";
            $result3=mysqli_query($conn,$query31);
                while($row31=mysqli_fetch_array($result3))
                {
                    if($n<=5){
                                    
                ?>
                <div class="card">
                    <div class="card-body">
                        <img src="img/avatar.jpg"  class="thumbnail" > <strong style="font-size:15px"><?php echo $row31['name'] ?> (<?php echo $row31['star']?> <i class="fa fa-star" class="text-warning" style="color:yellow"></i>)</strong>
                        <p style="margin-left:40px"><?php echo $row31['message'] ?></p>
                    </div>
                </div>
                <?php
                                 }
                             }
                            
                            
                            ?>
               </div>
            </div>
            </div>
            <?php } ?>
           
            <nav id="secondary_nav">
               <div class="container">
                  <ul class="clearfix">
                     <li style="display:block;color:#fff;">
                        <h5 class="text-white">Add your review now</h5>
                     </li>
                  </ul>
               </div>
            </nav>
            <div id="section_1">
               <div class="box_general_3">
                  <form action="rating.php" method="post">
                     <div class="row">
                        <div class="col-md-6 mt-2">
                           <label>Name</label>
                           <input type="hidden" name="ngoid" value="<?= $id ?>">
                           <input type="text" class="form-control" name="rname" autocomplete required>
                        </div>
                        <div class="col-md-6 mt-2">
                           <label>Mobile</label>
                           <input type="number" class="form-control" max-length="10" name="rmobile" autocomplete required>
                        </div>
                        <div class="col-md-12 mt-2">
                           <style>
                              .rating{
                              list-style-type:none;
                              }
                              .rating .startlisr{
                              display:inline;
                              margin:2px;
                              }
                              input[type="radio"]{
                              visibility:hidden;
                              }
                              /*input[type="radio"]:checked+label .fa{*/
                              /*color:red;*/
                              /*} */
                           </style>
                           <script>
                              
                               function r1(){
								   var rate1=document.getElementById('rate1');
								   var rate2=document.getElementById('rate2');
								   var rate3=document.getElementById('rate3');
								   var rate4=document.getElementById('rate4');
								   var rate5=document.getElementById('rate5');
                                  rate1.style.color='gray';
                                  rate2.style.color='gray';
                                  rate3.style.color='gray';
                                  rate4.style.color='gray';
                                  rate5.style.color='gray';
                                  
                                  rate1.style.color='red';
                               }
                               
                                 function r2(){
                                 
								 var rate1=document.getElementById('rate1');
								   var rate2=document.getElementById('rate2');
								   var rate3=document.getElementById('rate3');
								   var rate4=document.getElementById('rate4');
								   var rate5=document.getElementById('rate5');

                                  rate1.style.color='gray';
                                  rate2.style.color='gray';
                                  rate3.style.color='gray';
                                  rate4.style.color='gray';
                                  rate5.style.color='gray';
                                  
                                  rate1.style.color='red';
                                  rate2.style.color='red';
                               }
                               
                                   function r3(){
                                   var rate1=document.getElementById('rate1');
								   var rate2=document.getElementById('rate2');
								   var rate3=document.getElementById('rate3');
								   var rate4=document.getElementById('rate4');
								   var rate5=document.getElementById('rate5');

                                  rate1.style.color='gray';
                                  rate2.style.color='gray';
                                  rate3.style.color='gray';
                                  rate4.style.color='gray';
                                  rate5.style.color='gray';
                                  
                                  rate1.style.color='red';
                                  rate2.style.color='red';
                                  rate3.style.color='red';
                               }
                                   function r4(){
                                  var rate1=document.getElementById('rate1');
								   var rate2=document.getElementById('rate2');
								   var rate3=document.getElementById('rate3');
								   var rate4=document.getElementById('rate4');
								   var rate5=document.getElementById('rate5');

                                  rate1.style.color='gray';
                                  rate2.style.color='gray';
                                  rate3.style.color='gray';
                                  rate4.style.color='gray';
                                  rate5.style.color='gray';
                                  
                                  rate1.style.color='red';
                                  rate2.style.color='red';
                                  rate3.style.color='red';
                                  rate4.style.color='red';
                               }
                                   function r5(){
                                 var rate1=document.getElementById('rate1');
								   var rate2=document.getElementById('rate2');
								   var rate3=document.getElementById('rate3');
								   var rate4=document.getElementById('rate4');
								   var rate5=document.getElementById('rate5');

                                  rate1.style.color='gray';
                                  rate2.style.color='gray';
                                  rate3.style.color='gray';
                                  rate4.style.color='gray';
                                  rate5.style.color='gray';
                                  
                                  rate1.style.color='red';
                                  rate2.style.color='red';
                                  rate3.style.color='red';
                                  rate4.style.color='red';
                                  rate5.style.color='red';
                               }
                           </script>
                           <div class="form-group">
                              <ul class="rating">
                                 <li class="startlisr"><input type="radio" name="rating" value="1" id="rt1" ><label for="rt1"><i class="fa fa-star"  onclick="r1()" id="rate1" ></i></label></li>
                                 <li class="startlisr"><input type="radio" name="rating" value="2" id="rt2" ><label for="rt2"><i class="fa fa-star" id="rate2" onclick="r2()"></i></label></li>
                                 <li class="startlisr"><input type="radio" name="rating" value="3" id="rt3" ><label for="rt3"><i class="fa fa-star" id="rate3" onclick="r3()"></i></label></li>
                                 <li class="startlisr"><input type="radio" name="rating" value="4" id="rt4" ><label for="rt4"><i class="fa fa-star" id="rate4" onclick="r4()"></i></label></li>
                                 <li class="startlisr"><input type="radio" name="rating" value="5"  id="rt5"><label for="rt5"><i class="fa fa-star" id="rate5" onclick="r5()"></i></label></li>
                              </ul>
                           </div>
                           <label>Your message</label>
                           <textarea class="form-control" name="review" cols="3" rows="3" placeholder="Write your review here!">
                                             
                                         </textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary mt-3" name="submit" >Submit</button>
                  </form>
               </div>
            </div>
            <!-- /box_general -->
         </div>
         <script>
            $('input[type=radio][name=rating]').change(function() {
                       var starcounter=this.value;
                });
         </script>
         <div class="col-xl-3 col-lg-3 col-md-12" id="sidebar">
            <div class="box_general_3 booking">
               <form>
                  <div class="title">
                     <h3>Account Details </h3>
                  </div>
                  <ul class="contacts">
                     <li style="font-size: 20px;">
                        <h3 style="display: inline;">
                           <strong style="font-weight: 600;"><i class="pe-7s-browser"></i>
                           </strong> 
                        </h3>
                        <?=$row['ac_no'];?>
                     </li>
                     <hr />
                     <li style="font-size: 20px;">
                        <strong style="font-weight: 600;">
                           <h3 style="display: inline;"><i class="pe-7s-map-marker"></i>
                        </strong>
                        </h3>
                        <?=$row['ifsc'];?>&emsp;<?=$row['bank'];?>
                     </li>
                  </ul>
                  <hr />
                  <a href="" class="btn_1 full-width">Donate Now </a>
               </form>
            </div>
            <!-- /box_general -->
         </div>
      </div>
      </div>
      
   </div>
   <!-- /container -->
</main>
<script type="text/javascript">
   $(document).ready(function(){
   $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
   
   $(this).addClass('transition');
   }, function(){
        
   $(this).removeClass('transition');
   });
   });
    
</script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>-->
<?php } include('includes/footer.php')?>