 <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>



<section id="footer">
   <div class="footer_m bg_back p_3">
     <div class="container-xl">
	  <div class="footer_1 row">
	    <div class="col-md-4">
		 <div class="footer_1l">
			
		  <a href="index.php"><h4 class="text-white mb-4"><img id="Logo" width="50" height="50" src="assets/logo/footer-logo.png">
		  PetZone.lk</h4></a>
		
		  <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
		  

	   <h6 class="text-light"><i class="fa fa-phone-square col_blue me-1"></i> Office: <?php  echo $row['MobileNumber'];?></h6>
	   <h6 class="text-light mt-3"><i class="fa fa-envelope col_blue me-1"></i> <?php  echo $row['Email'];?></h6>
	   <h6 class="text-light mt-3 mb-0"><i class="fa fa-map col_blue me-1"></i> <?php  echo $row['PageDescription'];?></h6>
<?php } ?>

		<ul class="mb-0 mx-3 mt-3">
	    <li class="d-inline-block"><a href="#"><i class="fa fa-facebook mt-2"></i></a></li>
		<li class="d-inline-block"><a href="#"><i class="fa fa-instagram  mt-2"></i></a></li>
		<li class="d-inline-block"><a href="#"><i class="fa fa-linkedin  mt-2"></i></a></li>
	  	 </ul>


	</div>
		</div>
		<div class="col-md-8">
		 <div class="footer_1r">
		  <div class="footer_1ri row">
		   <div class="col-md-3">
		    <div class="footer_1ri1">
			 <h4 class="text-white mb-2 text-start">Explore</h4>
			 <div class="row footer_3ism">
			 
			 <h6 class="col-md-12 "><a class="text-light" href="index.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i>Home</a></h6>
			 <h6 class="col-md-12  mt-2"><a class="text-light" href="pets-grid.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> About</a></h6>
			 <?php 
				if (strlen($_SESSION['remsuid']) == 0) { 
				?>
					<h6 class="col-md-12 col-6 mt-2"><a class="text-light" href="signin.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Login</a></h6>
				<?php 
				} elseif ($_SESSION['remsuid'] != 0) { 
				?>
					<h6 class="col-md-12 col-6 mt-2"><a class="text-light" href="pets-grid.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Pets</a></h6>
				<?php 
				} 
				?>
				
				<h6 class="col-md-12  mt-2"><a class="text-light" href="add-pets.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Posting</a></h6>


			
	    </div>
			</div>
		   </div>
		   <div class="col-md-3">
		    <div class="footer_1ri1">
			 <h4 class="text-white mb-2 text-start">Services</h4>
			 <div class="row footer_3ism">
		 	<h6 class="col-md-12 "><a class="text-light" href="add-pets.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Help</a></h6>
			<h6 class="col-md-12  mt-2"><a class="text-light" href="add-pets.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Blog</a></h6>
			<h6 class="col-md-12  mt-2"><a class="text-light" href="add-pets.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Buy</a></h6>
			<h6 class="col-md-12  mt-2"><a class="text-light" href="add-pets.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Sell</a></h6>
	    </div>
			</div>
		   </div>
		   
		   <div class="col-md-3">
		    <div class="footer_1ri1">
			 <h4 class="text-white mb-2 text-start">Quick Links</h4>
			 <div class="row footer_3ism">
			 <h6 class="col-md-12  mt-2"><a class="text-light" href="blog.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Blog</a></h6>
			<h6 class="col-md-12  mt-2"><a class="text-light" href="privacy.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Privacy Policy</a></h6>
			<h6 class="col-md-12  mt-2"><a class="text-light" href="terms.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Terms & Conditions</a></h6>
			<h6 class="col-md-12  mt-2 mb-0"><a class="text-light" href="contact.php"><i class="fa fa-chevron-right me-1 font_12 text-warning"></i> Contact</a></h6>
	    </div>
			</div>
		   </div>

		   <div class="col-md-3 text-center">
		    <div class="footer_1ri1">
			 <img id="Logo" class=""width="150" height="150" src="assets/logo/footer-logo.png">
				
			</div>
		   </div>
		  </div>
		 </div>
		</div>
	  </div>
  </div>
   </div>   
 </section>
 
  <section id="footer_b" class="bg_dark pt-3 pb-3">
 <div class="container-xl">
    <div class="row footer_b1">
	 <div class="col-md-12">
	  <div class="footer_b1l text-center">
	    <p class="mb-0 text-light">© <?php $year = date("Y");echo $year;?> PetZone.lk. All Rights Reserved | Design by <a class="text-warning fw-bold" href="https://www.petzone.lk">PETZONE.LK_IT</a></p>
	  </div>
	 </div>
	</div>
 </div>
</section>
</body>