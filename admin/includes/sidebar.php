<!-- start sidebar menu -->
<div class="sidebar-container">
        <div class="sidemenu-container navbar-collapse collapse fixed-menu">
            <div id="remove-scroll" class="left-sidemenu">
                <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <li class="sidebar-user-panel">
                        <div class="user-panel">
                            <?php
                                     
                                    $qyselect="SELECT * FROM admin_profile WHERE id='$admin_id'";
                                   
                                    $result=mysqli_query($conn,$qyselect);
                                    while($row=mysqli_fetch_array($result))
                                    {
                                    ?>
                            <div class="pull-left image">
                                <img src="<?php echo $row['image'] ?>" class="img-circle user-img-circle" alt="User Image" style="height:70px; width:70px;" />
                            </div>
                            <div class="pull-left info">
                                <p> <?php echo $row['name'] ?></p>
                                <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
												Online</span></a>
                            </div>
                        <?php }?>
                        </div>
                    </li>
                   
                    <li class="nav-item">
                        <a href="index.php" class="nav-link nav-toggle">
                        <i class="material-icons">dashboard</i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    
                   
                   <!--  <li class="nav-item">
                        <a href="manage-client.php" class="nav-link nav-toggle">
                        <i class="material-icons">group</i>
                            <span class="title">Manage Users</span>
                        </a>
                    </li> -->
                   <li class="nav-item">
                        <a href="ngo.php" class="nav-link nav-toggle">
                        <i class="material-icons">account_balance</i>
                            <span class="title">NGO</span>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="manage_contactus.php" class="nav-link nav-toggle">
                        <i class="material-icons">autorenew</i>
                           <span class="title">Manage Inquiry</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_gallery.php" class="nav-link nav-toggle">
                        <i class="material-icons">autorenew</i>
                           <span class="title">NGO gallery</span>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="important_links.php" class="nav-link nav-toggle">
                        <i class="material-icons">launch</i>
                            <span class="title">Important Links</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="review.php" class="nav-link nav-toggle">
                        <i class="material-icons">launch</i>
                            <span class="title">Reviews</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="slider.php" class="nav-link nav-toggle">
                        <i class="material-icons">collections</i>
                            <span class="title">Manage sliders</span>
                        </a>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- end sidebar menu -->