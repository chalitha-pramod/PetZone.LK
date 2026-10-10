

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbluser set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
        header("Location: signin.php");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>



<head>
	<meta name="robots" content="noindex,nofollow" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" >
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" >
	<link href="assets/css/global.css" rel="stylesheet">
	<link href="assets/css/contact.css" rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Reset Password</title>
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<?php include_once('includes/header.php');?>

    
<section id="center" class="center_log">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	         <h2 class="text-white">Reset Password</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href=" ">Home</a> <span class="mx-2 text-warning">/</span>Reset Password</h6>
	 </div>
  </div>
 </div>
   </div>   
</section>

<section id="login" class="p_3">
 <div class="container-xl">
  <div class="row login_1">
    <div class="col-md-12">
      <div class="login_1m p-4 bg-light w-50 mx-auto">
      <h2 class="text-center mb-3">Reset Password </h2>
      <form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
      <p style="font-size:16px; color:red" text="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
		  <h6 class="mb-3 fw-bold">New Password</h6>
		  <input class="form-control" type="password" name="newpassword"  placeholder="New Password" required="true">
		   <h6 class="mb-3 fw-bold mt-4">Confirm Password</h6>
		  <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true">
		  
      <div class="align-items-center">
      <input type="submit" name="submit" class="border-0 mt-3 center_sm button_2 d-block text-center" value="Reset">

      </div>
		  </form>
    </div>
   </div>
  </div>
 </div>
</section>    

        
      
   
<?php include_once('includes/footer.php');?>
    <!-- Footer Scripts
============================================= -->
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

 