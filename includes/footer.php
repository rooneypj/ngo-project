</main>
<style type="text/css">
	.footer_link{
		color:#fff!important;
	}
</style>
	 <!-- /main content -->
	
	 <footer style="background-color: #091111 !important;">
		 <div class="container margin_60_35">
			 <div class="row">
				 <div class="col-lg-3 col-md-12">
					 <p>
						 <a href="index.php" class="footer_link" style="font-size: 25px;">
							SUNSHINE NGO PORTAL
						 </a>
					 </p>
				 </div>
				 <div class="col-lg-3 col-md-4">
					 <h5>About </h5>
					 <ul class="links">
						 <li><a href="contact.php" class="footer_link">Contact us </a></li>
						 <li><a href="ngo.php" class="footer_link">NGO's </a></li>
						 <li><a href="about.php" class="footer_link">About Us </a></li>
						<!--  <li><a href="register.php" class="footer_link">Register </a></li> -->
					 </ul>
				 </div>
				 <div class="col-lg-3 col-md-4">
					 <h5>Useful links </h5>
					 <ul class="links">
					 	 <?php  $query1="SELECT * FROM links where status='0'";
                           $result1=mysqli_query($conn,$query1);
                            while($row = $result1->fetch_assoc()) {
                            ?>
						 <li><a href="<?php echo $row['link'];?>" class="footer_link"><?php echo $row['title'];?> </a></li>
						<?php }?>
					 </ul>
				 </div>
				 <div class="col-lg-3 col-md-4">
					 <h5>Contact with Us </h5>
					 <ul class="contacts">
						 <li><a href="tel://61280932400" class="footer_link"><i class="icon_mobile"></i> + 91 9452889151</a></li>
						 <li><a href="mailto:info@binplus.in" class="footer_link"><i class="icon_mail_alt"></i> priyanshjain343@gmail.com</a></li>
					 </ul>
					 <div class="follow_us">
						 <h5>Follow us </h5>
						 <ul>
							 <li><a href="#0"><i class="social_facebook"></i></a></li>
							 <li><a href="#0"><i class="social_twitter"></i></a></li>
							 <li><a href="#0"><i class="social_linkedin"></i></a></li>
							 <li><a href="#0"><i class="social_instagram"></i></a></li>
						 </ul>
					 </div>
				 </div>
			 </div>
			 <!--/row-->
			 <hr />
			 <div class="row">
				 <div class="col-md-8">
				Developed By	<a style="color:white;">PRIYANSH JAIN<BR>NIRAJ KUMAR</a> 
				 </div>
				 <div class="col-md-4">
					 <div id="copy">© 2020 mm Ngo </div>
				 </div>
			 </div>
		 </div>
	 </footer>
	 <!--/footer-->
	 </div>
	 <!-- page -->

	 <div id="toTop"></div>
	 <!-- Back to top button -->

	 <!-- COMMON SCRIPTS -->
	<script type="text/javascript">
		$(document).ready( function () {
    $('#myTable').DataTable();
} );
	</script>
<script src="admin/assets/js/pages/table/table_data.js"></script>
	 <script src="js/jquery-2.2.4.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	 <script src="js/common_scripts.min.js"></script>
	 <script src="js/functions.js"></script>
	  <script src="cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	  <script>
	      $('.select2').selectpicker();

	  </script>

 </body>

 </html>