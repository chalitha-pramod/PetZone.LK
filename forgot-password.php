<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
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
    <title>Pet Zone - Forgot Password</title>
</head>

<?php include_once('includes/header.php');?>

    
<section id="center" class="center_log">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	         <h2 class="text-white">Forgot Password</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="#">Home</a> <span class="mx-2 text-warning">/</span>Forgot Password </h6>
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
      <form role="form" method="post" action="">
	   <h2 class="text-center mb-3">Forgot Password </h2>
       <?php if($msg){
    echo $msg;
  }  ?>
		  <h6 class="mb-3 fw-bold">Email</h6>
		  <input class="form-control" placeholder="Email" name="email" id="email" type="email" name="email" required="true">
		   <h6 class="mb-3 fw-bold mt-4">Mobile Number</h6>
		  <input class="form-control" type="type" name="contactno" required="true" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number">
		  
      <div class="align-items-center">
      <input type="submit" name="submit" class="border-0 mt-3 center_sm button_2 d-block text-center" value="Reset">

      </div>
		  <p class="mt-3 mb-0 text-center">Don't have an account? <a class="fw-bold a_tag col_blue" href="signup.php">Create One</a></p>
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
