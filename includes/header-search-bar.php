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
	<link href="assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Search</title>
</head>

<?php include_once('includes/header.php');?>	
<body>

<?php include_once('includes/header-search-bar.php');?>
<section id="center" class="center_h">
   <div class="center_om ">
     <div class="container-xl">
 

  <div class="row center_h2 mt-4 rounded_10 bg-white p-4 px-3 mx-0 ">
   <div class="col-md-12">
   <form method="post" action="pets-search-bar.php">

    <div class="center_h2l">
	 <div class="center_h2li row ">
	  
	 <div class="col-md-8">
	    <div class="center_h2lil">
        <div class="col-md-12">
			 <div class="contact_2lil">
			  <input class="form-control rounded_10 border-0 bg-light" action="search-bar.php" method="get" placeholder="Your Name" required>
			 </div>
			</div>
		   </div>
	   </div>

	   

	   

   <div class="col-md-4 ">
    <div class="center_h2r d-flex justify-content-center align-items-center">
	 <div class="center_h2ri  row">


	  <div class="col-md-2">
	   
	    <span>
			
        <input type="submit" name="search" type="submit" class="border-0 center_sm button_2 d-block" value="FIND  Keyword ">
      </a></span>
			</div>

			</div>
			</div>
            		</form>

		</div>
		</div>
		</div>
		</div>   
 </section>
 
 
 

    
    

        
      
   


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
