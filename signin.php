<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con, "select ID, UserType, Email from tbluser where Email='$email' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    
    if($ret > 0) {
        $_SESSION['ut'] = $ret['UserType'];
        $_SESSION['remsuid'] = $ret['ID'];
        $_SESSION['uemail'] = $ret['Email'];

        // Check if "Remember Me" is checked
        if(isset($_POST['remember'])) {
            // Set cookies for 30 days (86400 seconds = 1 day)
            setcookie("email", $email, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }

        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

// Auto-fill the form if the cookies exist
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
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
    <title>Pet Zone - SignIn</title>
</head>

<?php include_once('includes/header.php');?>

    
<section id="center" class="center_log">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	         <h2 class="text-white">Login</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span> Login </h6>
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
      <form  method="post" name="signin">
	   <h2 class="text-center mb-3">Login </h2>
		  <h6 class="mb-3 fw-bold">Username</h6>
		  <input class="form-control" placeholder="Username" name="email" id="email" required="true" type="text">
		   <h6 class="mb-3 fw-bold mt-4">Password</h6>
		  <input class="form-control" placeholder="Password" name="password" id="password" required="true" type="Password">
		  <div class="login_1mi row mt-3">
		    <div class="col-md-6 col-6">
			  <div class="login_1mil">
			    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="customCheck1">
        <label class="form-check-label" for="customCheck1">Remember Me</label>
    </div>
			  </div>
			</div>
			<div class="col-md-6 col-6">
			  <div class="login_1mir text-end">
			    <h6 class="mb-0"><a href="forgot-password.php">Forgot Password?</a></h6>
			  </div>
			</div>
		  </div>
      <div class="align-items-center">
        <input type="submit" name="signin" class="border-0 mt-3 center_sm button_2 d-block text-center" value="Login">
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
