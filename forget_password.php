<?php 
 include('includes/header.php');
include('includes/connection.php');
?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if(isset($_POST['submit'])){
     $email=$_POST['email'];
    $reset_key=md5(rand(123456,56478963454));
     $qry="select * from user where  email='$email'";
    $result=mysqli_query($conn,$qry);
        if($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
             if($email==$row['email']) {
                  $reset_sql= "UPDATE user SET reset_key='$reset_key' WHERE email='$email'";
        $excute_update_reset = mysqli_query($conn, $reset_sql);
        if($excute_update_reset)
        {
                 $to = "$email";
                         
         $subject = "Reset Your Password";
          $message = "Click on Link and reset your password.";
         
         $message .= '<html><body>';
$message .= "<a href='https://solution.anshuwap.com/khoyapaya/reset_password.php?id=$email&&key=$reset_key'>Click here for reset password.</a>";
$message .= "</body></html>";
         
         $header = "From:admin@khoyapaaya.com \r\n";
        //  $header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
      
                ?>
        <script>
        swal({title:"success",text:"Check Yor Email",type:"success",icon:"success",timer:1700,buttons:false});
             window.setTimeout("xyz()",1000);
             function xyz(){
             window.location.href="index.php";
             }
           
        </script>
        <?php
            } else { ?>
                <script>
               alert('invalid Email');
               window.location.href="forget_password.php";
            </script>
                    
                <?php
            }
        }
        else{
            ?>
                <script>
               alert('wrong credentials userpassword or email');
               window.location.href="login.php";
            </script>
                    
                <?php
        }
         
    
    }
    }


 
 ?>
<div class="bg_color_2">
			 <div class="container margin_60_35">
				 <div id="login">
					 
					 <div class="box_form">
						 <form action="" method="post">
							<h4>Please Fill Your Registered E-mail  </h4>
							<br/>
							 <div class="form-group">
							 	 <label>Email </label>
								 <input type="email" class="form-control" name="email"  required/>
							 </div>
							 
							 <div class="form-group text-center add_top_20">
								 <button class="btn_1 medium" type="submit"name="submit"> Submit</button>
							 </div>
						 </form>
					 </div>
					 <p class="text-center link_bright">Do not have an account yet?  <a href="register.php"><strong>Register now! </strong></a></p>
				 </div>
				 <!-- /login -->
			 </div>
		 </div>
         <?php include('includes/footer.php')?>