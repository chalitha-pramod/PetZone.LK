<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $cfullname=$_POST['cfullname'];
    $cemail=$_POST['cemail'];
    $cmobilenumber=$_POST['cmobilenumber'];
    $csubject=$_POST['csubject'];
	$cdescri=$_POST['cdescri'];
	$cdate=$_POST['cdate'];
    

$query=mysqli_query($con,"insert into tblcontact(CFullName,CEmail,CMobileNumber,CSubject,CDescri,CDate)value('$cfullname','$cemail','$cmobilenumber','$csubject','$cdescri',CURDATE())");
if ($query) {
 echo '<script>alert("Your enquiry successfully send.")</script>';
  }
  else
    {
echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="robots" content="noindex,nofollow" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" >
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" >
	<link href="assets/css/global.css" rel="stylesheet">
	<link href="assets/css/contact.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	
    <link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Contact</title>

</head>

<?php include_once('includes/header.php');?>	
<body>


<section id="center" class="center_cont">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	          <h2 class="text-white">Contact Us</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span> Contact Us </h6>
	 </div>
  </div>
 </div>
   </div>   
</section>



<section id="contact_o" class="p_3">
   <div class="container-xl">
	  <div class="contact_2 row">
	   <div class="col-md-6">



	    <div class="contact_2l border_1 p-4">
		   <h4>Get In Touch</h4>
		   <hr>
		   <form class="mb-0" method="post">
		   <div class="contact_2li row">
		    <div class="col-md-12">
			 <div class="contact_2lil">
			  <h6 class="fw-bold font_14 mb-2">Your Name *</h6>
			  <input class="form-control rounded_10 border-0 bg-light" name="cfullname" id="cfullname" placeholder="Your Name" type="text" required>
			 </div>
			</div>
		   </div>
		   <div class="contact_2li row mt-4">
		    <div class="col-md-6">
			 <div class="contact_2lil">
			  <h6 class="fw-bold font_14 mb-2">Your Mobile Number *</h6>
			  <input class="form-control rounded_10 border-0 bg-light" name="cmobilenumber" id="cmobilenumber" placeholder="Your Mobile Number" type="text" required>
			 </div>
			</div>
			<div class="col-md-6">
			 <div class="contact_2lil">
			  <h6 class="fw-bold font_14 mb-2">Your Email Address *</h6>
			  <input class="form-control rounded_10 border-0 bg-light" name="cemail" id="cemail" placeholder="Your Email" type="text" required>
			 </div>
			</div>
		   </div>
		   <div class="contact_2li row mt-4">
		    <div class="col-md-12">
			 <div class="contact_2lil">
			  <h6 class="fw-bold font_14 mb-2">Select Subject</h6>
			  	<select class="form-select border-0 rounded_10 bg-light" name="csubject" id="csubject" aria-label="Default select example">
				<option selected="">Select</option>
				<option value="1">Technical Support</option>
				<option value="2">Medical Support</option>
				<option value="3">Advice Support</option>
				<option value="4">Other Support</option>
				</select>
			 </div>
			</div>
		   </div>
		   <div class="contact_2li row mt-4">
		    <div class="col-md-12">
			 <div class="contact_2lil">
			  <h6 class="fw-bold font_14 mb-2">Description</h6>
			  <textarea class="form-control rounded_10 border-0 bg-light form_text" name="cdescri" id="cdescri" placeholder="Add Your Description"></textarea>
			  <input type="submit" name="submit" type="submit" class="border-0 center_sm button_2 d-block center_sm mt-3" value="Submit Enquiry">

			</div>
			</div>
		   </div>
		   </form>
		</div>






	   </div>

	   <div class="col-md-6">
       <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	    <div class="contact_2r">
		  <h4 class="mb-4">Contact Details</h4>
		  <div class="contact_2ri row">
		   <div class="col-md-2 col-2">
		    <div class="contact_2ril">
			 <span class="d-inline-block border_1 text-center col_blue fs-4 rounded_10"><i class="fa fa-phone"></i></span>
			</div>
		   </div>
		   <div class="col-md-10 col-10">
		    <div class="contact_2rir">
			 <h5>Call Us </h5>
			 <h6 class="mb-0"><a href="#"><?php  echo $row['MobileNumber'];?></a></h6>
			</div>
		   </div>
		  </div>
		  <div class="contact_2ri row mt-4">
		   <div class="col-md-2 col-2">
		    <div class="contact_2ril">
			 <span class="d-inline-block border_1 text-center col_blue fs-4 rounded_10"><i class="fa fa-envelope"></i></span>
			</div>
		   </div>
		   <div class="col-md-10 col-10">
		    <div class="contact_2rir">
			 <h5>Email Us</h5>
			 <h6 class="mb-0"><a href="#"><?php  echo $row['Email'];?></a> </h6>
			</div>
		   </div>
		  </div>
		  <div class="contact_2ri row mt-4">
		   <div class="col-md-2 col-2">
		    <div class="contact_2ril">
			 <span class="d-inline-block border_1 text-center col_blue fs-4 rounded_10"><i class="fa fa-map"></i></span>
			</div>
		   </div>
		   <div class="col-md-10 col-10">
		    <div class="contact_2rir">
			 <h5>Location</h5>
			 <h6 class="mb-0"><?php  echo $row['PageDescription'];?> </h6>
			</div>
		   </div>
		  </div>
</div>
		  <?php } ?>
		  <h4 class="mt-4 mb-4">Find Us On</h4>
		  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126325.5165590576!2d80.32091125293309!3d8.335313209070906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afcf4f99360e159%3A0xc111fe9ebc6dcf0e!2sAnuradhapura!5e0!3m2!1sen!2slk!4v1723284485465!5m2!1sen!2slk" height="330" style="border:0; width:100%;" allowfullscreen=""></iframe>
		   </div>

		</div>
	   </div>
       
	  </div>
	  </div>
	  
 </div>   
</section>

 
<?php include_once('includes/footer.php');?>
   


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
window.onscroll = function() {myFunction()};
var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;
function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}
</script>
</body>

</html>
