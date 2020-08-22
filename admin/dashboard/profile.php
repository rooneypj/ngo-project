<?php

include('connection.php');
include ('includes/header.php');
$select_profile="select * from admin_profile";
$excute_profile=mysqli_query($conn,$select_profile);

?>
<style type="text/css">
    .list-group-item{
        border:none!important;
    }
</style>
   <div class="page-container">
<?php include('includes/sidebar.php')?>
    <div class="page-content-wrapper">
        <div class="page-content">

            
                <?php 
                while($row_profile=mysqli_fetch_array($excute_profile))
                {
                ?>
                 <div class="card">
                   
            <div class="card-box">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            
                            <!--<div class="profile-view">-->
                                <!--<div class="profile-img-wrap">-->
                                    <div class="profile-userpic">
                                        <a href="#"><img class="img-responsive" src="<?php echo $row_profile['image']; ?>" alt="" style="width: 130px;
    height: 110px;"></a>
                                        
                                         <br> <br>
                                      <div class="staff-msg">
                                                <button type="button" class="btn btn-outline-danger btn-md" data-toggle="modal" data-target="#exampleModalprofile"><i class="fa fa-picture-o"></i> Edit Image</button>
                                            </div>
                                    </div>
                                   
                                            <br>
                                </div>
                                <!--<div class="profile-basic">-->
                                    <!--<div class="row">-->
                                        <div class="col-md-4">
                                            <div class="profile-info-left" style="text-align:center;">
                                                <h3 class="user-name m-t-0 m-b-0"><?php echo $row_profile['name']; ?></h3>
                                                <small class="text-muted text-center"><?php echo $row_profile['designation']; ?></small>
                                              </div>
                                               <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <span class="title">Mobile:</span>
                                                    <span class="text"><a href="tel:<?php echo $row_profile['mobile']; ?>"><?php echo $row_profile['mobile']; ?></a></span>
                                                </li>
                                                
                                                
                                                <!-- <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php //echo $row_profile['gender']; ?></span>
                                                </li> -->
                                                <li class="list-group-item pull-right" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-pencil"></i></button></li>
                                            </ul>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>
                </div>


<!-- modal area start here -->

<!-- update profile picture area start here -->
<div class="modal fade" id="exampleModalprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit-profile-picture.php" method="post" enctype= "multipart/form-data">
            <input type="file"  name="profile" class="form-control">
            <input type="hidden" name="id" value="<?php echo $row_profile['id']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit"    name="submit" class="btn btn-primary">Update Image</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- update profile picture area end here -->
<!-- modal area end here -->
<!-- edit profile details modal start here -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="edit-profile-details.php" method="post">
      <div class="modal-body">
        <div class="row">
        <input type="hidden" name="id" value="<?php echo $row_profile['id']; ?>">
            <div class="col-md-6 mt-3">
                <label for=""> Name</label>
            <input type="text"  value="<?php echo $row_profile['name']; ?>" name="name"  class="form-control"> 
            </div>
            <div class="col-md-6 mt-3">
            <label for="">Designation</label>
            <input type="text"  value="<?php echo $row_profile['designation']; ?>" name="designation" class="form-control">
            </div>
            <div class="col-md-6 mt-3">
            <label for="">Mobile</label>
            <input type="text"  value="<?php echo $row_profile['mobile']; ?>" name="mobile" class="form-control">
            </div>
            
            
        </div>
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit"   value="" name="submit" class="btn btn-primary">Update Details</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- edit prodile details modal end here -->

                <?php } ?>
                    </div>

                </div>
           


                <?php include ('includes/footer.php')?>