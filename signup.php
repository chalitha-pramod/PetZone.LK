
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['signup']))
  {
      
    $fname=$_POST['fullname'];
     $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $usertype=$_POST['usertype'];
       $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
 echo "<script>alert('This email already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, Email, MobileNumber, Password,UserType) value('$fname', '$email','$mobno', '$password','$usertype' )");
    if ($query) {
 echo "<script>alert('You have successfully registered');
      window.location.href ='signin.php';
      </script>";
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
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
    <title>Pet Zone - SignUp</title>
</head>

<?php include_once('includes/header.php');?>


<section id="center" class="center_reg">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	         <h2 class="text-white">Register</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="#">Home</a> <span class="mx-2 text-warning">/</span> Register </h6>
	 </div>
  </div>
 </div>
   </div>   
</section>

<section id="login" class="p_3">
 <div class="container-xl">
  <div class="row login_1">
    <div class="col-md-12">
      <div class="login_1m p-4 w-50 mx-auto bg-light">
      <form method="post" name="signup">
	      <h2 class="text-center mb-3">Register </h2>
		  <h6 class="mb-3 fw-bold">Username</h6>
		  <input class="form-control" placeholder="Username" name="fullname" id="fullname" type="text">
		  <h6 class="mb-3 fw-bold mt-4">Email</h6>
		  <input class="form-control" placeholder="Email Address" name="email" id="email" required="true" type="email">
		  <h6 class="mb-3 fw-bold mt-4">Mobile Number</h6>
		  <input class="form-control" placeholder="Mobile Number" name="mobilenumber" id="mobilenumber" maxlength="10" required="true" type="text">
		   <h6 class="mb-3 fw-bold mt-4">Password</h6>
		  <input class="form-control" placeholder="Password" name="password" id="password" required="true" type="text">
		  <div class="form-check mt-3">
        <input type="radio" name="usertype" value="1" checked="true">Blogger &nbsp; &nbsp;<input type="radio" name="usertype" value="2" >Owner / Helper 
		
        
    </div>
    <div class="align-items-center">
      <input type="submit"  class="border-0 mt-3 center_sm button_2 d-block text-center" name="signup" value="Register">

      </div>
		  <p class="mt-3 mb-0 text-center">Already have an account?  <a class="fw-bold col_blue" href="signin.php"> Login</a></p>
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