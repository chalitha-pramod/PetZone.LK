<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['remsuid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['mobilenumber'];
  $aboutme=$_POST['aboutme'];
 
     $query=mysqli_query($con, "update tbluser set FullName ='$fullname', MobileNumber='$mobno',Aboutme ='$aboutme' where ID='$uid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
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
    <title>Pet Zone - My Profile</title>

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
	
      

<div class="col-md-8">
	   <div class="detail_1r">
	   <?php
  $uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");


while ($row=mysqli_fetch_array($ret)) {

?>
	   <div class="detail_1r1 bg-white rounded_10 p-4 mt-0">

		  <h5>My Details</h5>
		  <hr>
		  <div class="detail_1r1i  detail_1l4i1l">
			    <span><img src="assets/logo/agent.png" alt="agent" class="rounded-circle me-3 float-start"></span>
				<?php if($row['UserType']=="1"){?>
				<h6 class="mb-0 fw-bold  lh-base text-center">I am a <br> <span class="col_blue fw-bold"> Blogger </span> @ The PetZone.lk</h6>
			    <?php } else{ ?>
                    <h6 class="mb-0 fw-bold  lh-base text-center">I am an <br> <span class="col_blue fw-bold"> Owner</span> @ The PetZone.lk</h6>
				<?php } ?>

			</div>
            
		    <h6 class="mt-4 fw-bold">Full Name<span class="pull-right fw-normal"><?php echo $row['FullName'];?></span></h6><hr>
		    <h6 class="fw-bold">Email <span class="pull-right fw-normal"><?php echo $row['Email'];?></span></h6><hr>
		    <h6 class="fw-bold">Phone <span class="pull-right fw-normal"><?php echo $row['MobileNumber'];?></span></h6><hr>
			<h6 class="fw-bold">About Me <span class="pull-right fw-normal"><?php echo $row['Aboutme'];?></span></h6><hr>
		    <h6 class="fw-bold mb-0">Verification <span class="pull-right fw-normal text-success">Verified</span></h6>
			
			<?php }?>
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