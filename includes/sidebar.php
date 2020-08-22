
<style>
.list-group-item{
    border:none!important;
}
.list-group{
    font-size: 18px;
    
    color:#333!important;
}

   .hr{
        margin-top:5px!important;
        margin-bottom:5px!important;
    }
.profile{
    font-weight: 600;
    font-size: 20px;
    color: black;
}

.sidebar_body{
    padding-left:0px;
    
}
.sidebar{
  margin-bottom: 30px;
}
@media only screen and (max-width: 600px) {
 .sidebar{
   width:100%;
   margin-left:0px;
   margin-right:0px;
} 
.sidebar_body{
    width:100%;
    padding-left:15px;
}
}
.mt{
  margin-top: 10px!important;
}    
.mb{
  margin-bottom: 10px!important;
} 

</style>
 <div id="breadcrumb">
       <div class="container">
         <ul>
           <li><a href="index.php">Home </a></li>
           <li><a href="user_profile.php">User-Profile </a></li>
           
         </ul>
       </div>
     </div>
<section style="background: linear-gradient(to right, #F2F3F4, #eef2f3);">
    <div class="container-fluid">
        <div class="row" style="margin-top:30px;">
            <div class="col-md-3">
                <div class="card sidebar">
                  <?php
                            $select1="select * from user where id='$user_id'";
                            $excute1=mysqli_query($conn,$select1);
                            while($row1=mysqli_fetch_array($excute1))
                               { ?>
                    <div class="card-header">
                        <div class="profile text-center">
                    <center><img src="admin/uploads/1582794103circle-avatar-png.png" alt="..." class="img-fluid" style="height:100px;"/></center>
                    <span class="text-center"><?= $row1['name']?></span>
                    </div>
                    
                    </div>
                  <?php } ?>
                    <div class="card-body" style="padding:0px!important;">
                        
                       <div class="list-group list-striped">
  <a href="user_profile.php" class="list-group-item list-group-item-action">
   <i class="icon-user"></i>&emsp; Profile
  </a>
  <hr class="hr"/>
 <!--  <a href="my_ngo.php" class="list-group-item list-group-item-action"> <i class="icon-users"></i>&emsp; Your NGO</a>
  <hr class="hr"/> -->
   
  <a href="change_password.php" class="list-group-item list-group-item-action"> <i class="icon-key" aria-hidden="true"></i>&emsp;Change-password</a>
  <hr class="hr"/>
  <a href="logout.php" class="list-group-item list-group-item-action"><i class="icon-export" aria-hidden="true"></i>&emsp;Logout</a>
  
</div>
                        </div>
            </div>
            </div>