<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<script src="assets/js/bootstrap.bundle.min.js"></script>

	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Privacy Policy</title>
</head>

<?php include_once('includes/header.php');?>	
<body>

<section id="center" class="center_terms">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	     <h2 class="text-white">Privacy Policy</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span> Privacy Policy </h6>
	 </div>
  </div>
 </div>
   </div>   
</section>


<section id="about" class="p_3">
  <div class="container-xl">
	 <div class="about_1 row">
	  <div class="col-md-12">
      <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='privacy'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	   <p class="mt-3"><?php  echo $row['PageDescription'];?></p>
       <?php } ?>	  
    
	 
	  </div>
	 </div>
 </div>   
</section>



    

        
      
<?php include_once('includes/footer.php');?>
   


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
