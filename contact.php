<?php include('includes/header.php');
include('includes/connection.php');
if(isset($_POST['submit']))
{
     $name=$_POST['name'];
     $email=$_POST['email'];
     $mobile=$_POST['mobno'];
     $message=$_POST['message'];
if( $name!='' && $email!='' && $mobile!='' && $message!='')
  {
    $sql_query="INSERT INTO contactus (name,email,mobile,message)
    VALUES ('$name','$email','$mobile','$message')";
    $execute_query=mysqli_query($conn, $sql_query);
    if($execute_query)
    {
      echo "<script>alert(' Your Detail Sent successfully');
        window.location.href = 'index.php';
        </script>";
    }
    else{
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

}?>
<div class="container margin_60_35">
			 <div class="row">
				 <aside class="col-lg-3 col-md-4">
					 <div id="contact_info">
						 <h3>Contacts info </h3>
						 <p>
                           
                            <a href="telto:+ 9999999999 ">+ 9452889151 </a>
                              <br />
							 <a href="mailto:user@gmail.com ">priyanshjain343@gmail.com </a>
						 </p>
						
						 <ul>
							 <li><strong>Address </strong>
								 <h6>Greater Noida Institute Of Technology</h6>
							 </li>
						 </ul>
					 </div>
				 </aside>
				 <!--/aside -->
				 <div class=" col-lg-8 col-md-8 ml-auto">
					 <div class="box_general">
						 <h3>Contact us </h3>
						 
						 <div>
							 <div id="message-contact"></div>
							 <form method="post" action="" >
								 <div class="row">
									 <div class="col-md-12 col-sm-12">
										 <div class="form-group">
											 <input type="text" class="form-control" name="name" placeholder="Name"required/>
										 </div>
									 </div>
									
								 </div>
								 <div class="row">
									 <div class="col-md-6 col-sm-6">
										 <div class="form-group">
											 <input type="email" name="email" class="form-control" placeholder="Email" required />
										 </div>
									 </div>
									 <div class="col-md-6 col-sm-6">
										 <div class="form-group">
											 <input type="number"  name="mobno" class="form-control" placeholder="Phone number" required />
										 </div>
									 </div>
								 </div>
								 <div class="row">
									 <div class="col-md-12">
										 <div class="form-group">
											 <textarea rows="5"  name="message" class="form-control" style="height:100px;" placeholder="Type your message!" required></textarea>
										 </div>
									 </div>
								 </div>
								 
								 <button type="submit" name="submit" class="btn_1 add_top_20">Submit</button>
							 </form>
						 </div>
						 <!-- /col -->
					 </div>
				 </div>
				 <!-- /col -->
			 </div>
			 <!-- End row -->
         </div>
         <?php include('includes/footer.php')?>