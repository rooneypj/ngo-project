<?php include('includes/header.php')?>
<!-- start page container -->
<div class="page-container">
<?php 
    include('includes/sidebar.php');
    include('connection.php');

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
    if(isset($_POST['submit'])){
        
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
            
            $query="INSERT INTO menu(meal_time,week,menu1,day1,menu2,day2,menu3,day3,menu4,day4,menu5,day5,menu6,day6,menu7,day7)VALUES('$mealtime','$week','$menu1','$mealdate1','$menu2','$mealdate2','$menu3','$mealdate3','$menu4','$mealdate4','$menu5','$mealdate5','$menu6','$mealdate6','$menu7','$mealdate7')";
            $result=mysqli_query($conn,$query);
            if($result){
                echo "<script>alert('Meal menu added successfully');
                window.location.href='manage-menu.php';</script>";
            }
            else{
                echo "<script>alert('error occured please try again');
                window.location.href='add-menu.php';</script>";
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
                <header>Add Menu</header>
                
            </div>
            <form action="" method="post">
                <div class="card-body " id="bar-parent2">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <select class="form-control" name="mealtime" required>
                                <option value="">Select Meal Time</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                        
                            <select class="form-control" name="week" required>
                                <option value="">Select Weeks</option>
                                <option value="1">1 week</option>
                                <option value="2"> 2 week</option>
                                <option value="4">3 week</option>
                                <option value="4">4 week</option>
                           </select>
                        </div>
                    </div>
                </div>
                    <div class="appendplace">
                        <fieldset>
                                <legend>First day</legend>
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12">
                                         <div class="form-group">
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate1" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu1" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate2" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu2" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate3" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu3" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate4" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu4" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate5" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu5" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate6" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu6" rows="2" placeholder="Menu"></textarea>
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
                                            <input type="date" id="datepicker" type="text" id="datepicker" name="menudate7" class="form-control"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="menu7" rows="2" placeholder="Menu"></textarea>
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
           
        </div>
    </div>


<script>
    // Add new input with associated 'remove' link when 'add' button is clicked.
$('#append').click(function(e) {
    e.preventDefault();

    $(".appendplace").append('<fieldset><legend>Add new menu</legend><div class="row"><div class="col-md-6 col-sm-12"><div class="form-group"><input type="date" name="date[]"class="form-control"  placeholder=""></div></div><div class="col-md-5 col-sm-12"><div class="form-group"><textarea class="form-control"  name="menu[]" rows="2" placeholder="Menu"></textarea></div></div><div class="col-md-1"><div class="form-group"><button id="closeappend" class="btn btn-danger">-</button></div></div></div></fieldset>');
});

// Remove parent of 'remove' link when link is clicked.
$('.appendplace').on('click', '#closeappend', function(e) {
    e.preventDefault();

    $(this).parent().parent().parent().parent().remove();
});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
    <!-- end page content -->
 <?php include('includes/footer.php')?>