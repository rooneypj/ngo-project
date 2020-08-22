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
                    <!--<li class="nav-item">-->
                    <!--    <a href="app-users.php" class="nav-link nav-toggle">-->
                    <!--    <i class="material-icons">person</i>-->
                    <!--        <span class="title">App users</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a href="size-manage.php" class="nav-link nav-toggle">-->
                    <!--    <i class="material-icons">person</i>-->
                    <!--        <span class="title">Manage size</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a href="manage-client.php" class="nav-link nav-toggle">
                        <i class="material-icons">person</i>
                            <span class="title">Manage Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_package.php" class="nav-link nav-toggle">
                        <i class="material-icons">list</i>
                            <span class="title">Manage Packages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_orders.php" class="nav-link nav-toggle">
                        <i class="material-icons">dns</i>
                            <span class="title">Manage orders</span>
                        </a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a href="manage-_students.php" class="nav-link nav-toggle">-->
                    <!--    <i class="material-icons">people</i>-->
                    <!--        <span class="title">Manage Students</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a href="manage_contactus.php" class="nav-link nav-toggle">
                        <i class="material-icons">autorenew</i>
                           <span class="title">Manage Inquiry</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="slider.php" class="nav-link nav-toggle">
                        <i class="material-icons">person</i>
                            <span class="title">Manage sliders</span>
                        </a>
                    </li>
                    <li class="nav-item open">
                        <a href="#" class="nav-link nav-toggle"> <i class="material-icons">local_library</i>
                            <span class="title">Manage Menu</span> <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu" style="display: block;">
                            <li class="nav-item">
                                <a href="manage-menu.php" class="nav-link "> <span class="title">Total Menu</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="add-menu.php" class="nav-link "> <span class="title">Add Menu
                                 </span>
                                </a>
                            </li>
                          
                        </ul>
                </li>
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- end sidebar menu -->