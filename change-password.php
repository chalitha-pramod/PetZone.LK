<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['remsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$uid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
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
	<link href="assets/css/blog.css" rel="stylesheet">
	<link href="assets/css/index.css" rel="stylesheet">
	<link href="assets/css/list.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	

	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Change Password</title>

</head>
<?php include_once('includes/header.php');?>	

<body>




<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
	  <div class="col-md-4">
	    <div class="blog_1dt">
		  
		  
        <?php include_once('includes/sidebar.php');?>
			
		  
		  
		</div>
	  </div>
	  <div class="col-md-8">
	   <div class="blog_1r">
	
		<div class="col-md-12">
			<div class="contact_2l border_1 p-4">
			   <h4>Change Password</h4>
			   <hr>
               <form class="mb-0" method="post">
               <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
   <?php
$uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			   <div class="contact_2li row">
				<div class="col-md-12">
				 <div class="contact_2lil">
				  <h6 class="fw-bold font_14 mb-2">Current Password</h6>
				  <input class="form-control rounded_10 border-0 bg-light" type="text"name="currentpassword" id="currentpassword" class="form-control" value="" required='true'>
				 </div>
				</div>
			   </div>
			   <div class="contact_2li row mt-4">
				<div class="col-md-12">
				 <div class="contact_2lil">
				  <h6 class="fw-bold font_14 mb-2">New Password</h6>
				  <input class="form-control rounded_10 border-0 bg-light" name="newpassword" id="newpassword" class="form-control" value="" required='true'>
				 </div>
				</div>
			   </div>
			   <div class="contact_2li row mt-4">
				<div class="col-md-12">
				 <div class="contact_2lil">
				  <h6 class="fw-bold font_14 mb-2">Confirm Password</h6>
				  <input class="form-control rounded_10 border-0 bg-light" name="confirmpassword" id="confirmpassword" class="form-control" value="" required='true'>
				 </div>
				</div>
			   </div>
			   
			   <div class="contact_2li row mt-4">
				<div class="col-md-12">
				 <div class="contact_2lil">
                  <?php }?>

                  <div class="align-items-center">
							<input class="mb-4 mt-4 border-0 button d-block text-center align-items-center w-100" type="submit" value="Save Edits" name="submit">
				  </div>
				 </div>
				</div>
			   </div>
            </form>
			</div>
		   </div>

		   
		
		 
		 
	   </div>
	  </div>
	 </div>
  </div>   
</section>
 
 

<?php include_once('includes/footer.php');?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>

<?php }  ?>