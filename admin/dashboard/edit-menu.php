<?php include('includes/header.php')?>
<!-- start page container -->
<div class="page-container">
<?php include('includes/sidebar.php');
include('connection.php');
  $id=$_GET['id'];
  if(isset($_POST['submit'])){
        $m_id=$_POST['m_id'];
        $mealtime=$_POST['mealtime'];
        $week=$_POST['week'];
        $menu1=$_POST['menu1'];
        $mealdate1=$_POST['menudate1'];
         $menu2=$_POST['menu2'];
        $mealdate2=$_POST['menudate2'];
         $menu3=$_POST['menu3'];
        $mealdate3=$_POST['menudate3'];
         $menu4=$_POST['menu4'];
        $mealdate4=$_POST['menudate4'];
         $menu5=$_POST['menu5'];
        $mealdate5=$_POST['menudate5'];
         $menu6=$_POST['menu6'];
        $mealdate6=$_POST['menudate6'];
         $menu7=$_POST['menu7'];
        $mealdate7=$_POST['menudate7'];

        
        if($mealtime!='' && $week!='' && $menu1!='' && $mealdate1!=''){
            $sql ="UPDATE menu SET meal_time='$mealtime',week='$week',menu1=' $menu1',day1='$mealdate1',menu2=' $menu2',day2='$mealdate2',menu3=' $menu3',day3='$mealdate3',menu4=' $menu4',day4='$mealdate4',menu5=' $menu5',day5='$mealdate5',menu6=' $menu6',day6='$mealdate6',menu7=' $menu7',day7='$mealdate7' WHERE menu_id='$id'";
           
           if (mysqli_query($conn, $sql)) {
        ?>
        <script>alert(' Menu updated successfully');
        window.location.href ='manage-menu.php';</script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
          
        }
    }
?>
<style>
    fieldset{
        border:1px solid grey!important;
        padding:5px!important;
        border-radius:12px!important;
    }
    legend{
        width:auto!important;
    }
    .inner{
        padding-left:0px!important;
        padding-right:0px!important;
    }
    .vertical-center{
        vertical-align:middle!important;
    }
    .mt-minus{
        margin-top:-10px;
    }
</style>
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
           <div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Edit Menu</header>
                <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                    <i class="material-icons">more_vert</i>
                </button>
                <div class="mdl-menu__container is-upgraded">
                    <div class="mdl-menu__outline mdl-menu--bottom-right"></div>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events" data-mdl-for="panel-button3" data-upgraded=",MaterialMenu,MaterialRipple">
                        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">assistant_photo</i>Action
                            <span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span>
                        </li>
                        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">print</i>Another action
                            <span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span>
                        </li>
                        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">favorite</i>Something else here
                            <span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span>
                        </li>
                    </ul>
                </div>
            </div>
             <form action="" method="post">
            <div class="card-body " id="bar-parent2">
                 <?php
                                                   $n=0;
                                                   $query1="SELECT * FROM menu where menu_id='$id'";
                                                   $result1=mysqli_query($conn,$query1);
                                                   //  while($row=mysqli_fetch_array($result1))
                                                    while($row = $result1->fetch_assoc()) 
                                                       {
                                                           $m_time=$row['meal_time'];
                                                           $week=$row['week'];
                                                       $menu1=$row['menu1'];
                                                        $mealdate1=$row['day1'];
                                                        $menu2=$row['menu2'];
                                                        $mealdate2=$row['day2'];
                                                        $menu3=$row['menu3'];
                                                        $mealdate3=$row['day3'];
                                                        $menu4=$row['menu4'];
                                                        $mealdate4=$row['day4'];
                                                        $menu5=$row['menu5'];
                                                        $mealdate5=$row['day5'];
                                                        $menu6=$row['menu6'];
                                                        $mealdate6=$row['day6'];
                                                        $menu7=$row['menu7'];
                                                        $mealdate7=$row['day7'];
                                                       } ?>
                                                       
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <select class="form-control" value="<?php echo $m_time ;?>" name="mealtime" required>
                                <option value="">Select Meal Time</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                        
                            <select class="form-control"  value="<?php echo $week; ?>" name="week" required>
                                <option value="">Select Weeks</option>
                                <option value="1">1 week</option>
                                <option value="2"> 2 week</option>
                                <option value="4">3 week</option>
                                <option value="4">4 week</option>
                           </select>
                        </div>
                    </div>
                    <input type="hidden" name="m_id" value="<?php echo $id;?>">
                </div>
                    <div class="appendplace">
                        <fieldset>
                                <legend>First day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate1" value="<?= $mealdate1;?>" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu1" rows="2" placeholder="Menu"><?= $menu1;?></textarea>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                               
                        </fieldset> 
                        
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Second day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate2" value="<?= $mealdate2;?>" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu2" rows="2" placeholder="Menu"><?= $menu2;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Third day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" value="<?= $mealdate3;?>" name="menudate3" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu3" rows="2" placeholder="Menu"><?= $menu3;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Fourth day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker"  value="<?= $mealdate4;?>"name="menudate4" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu4" rows="2" placeholder="Menu"><?= $menu4;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Fifth day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" value="<?= $mealdate5;?>" name="menudate5" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu5" rows="2" placeholder="Menu"><?= $menu5;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Sixth day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" value="<?= $mealdate6;?>" name="menudate6" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu6" rows="2" placeholder="Menu"><?= $menu6;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div> 
                    <div class="appendplace">
                        <fieldset>
                                <legend>Seventh day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" value="<?= $mealdate7;?>" name="menudate7" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu7" rows="2" placeholder="Menu"><?= $menu7;?></textarea>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                    </div>
                   
                   <div class="col-lg-12 p-t-20 text-center">
                    <button type="submit" class="mdl-button  m-b-10 m-r-20 btn-pink" name="submit">Submit</button>
                    <button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default" data-upgraded=",MaterialButton,MaterialRipple">Reset<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                    </div>
                   
            </div>
            </form>
        </div>
    </div>
</div>
           
        </div>
    </div>
    <!-- end page content -->
 <?php include('includes/footer.php')?>