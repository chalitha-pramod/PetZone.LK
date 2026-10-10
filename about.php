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
    <title>Pet Zone - About</title>
</head>

<?php include_once('includes/header.php');?>	
<body>

<section id="center" class="center_about">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	     <h2 class="text-white">About Us</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span> About Us </h6>
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

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
	   <p class="mt-3"><?php  echo $row['PageDescription'];?></p>
       <?php } ?>	  
    </div>
	 </div>  
	 
		
	  

</section>

<section id="spec" class="pt-5 pb-5 bg-light">
   <div class="container-xl">
	 <div class="row spec_1">
		 <div class="col-md-3 col-sm-6">
		    <div class="spec_1i text-center p-5 px-4 rounded_10 shadow_box bg-white">
			 <span class="font_60 col_red lh-1"><i class="fa fa-paw"></i></span>
             <?php $query7=mysqli_query($con,"Select * from tblproperty");
$totalpropertylisted=mysqli_num_rows($query7);
?>
			 <h1 class="mt-3"><?php echo $totalpropertylisted;?> +</h1>
			 <h6 class="mb-0">Pets</h6>
			</div>
		 </div>
		 <div class="col-md-3 col-sm-6">
		    <div class="spec_1i text-center p-5 px-4 rounded_10 shadow_box bg-white">
			 <span class="font_60 col_red lh-1"><i class="fa fa-user"></i></span>
             <?php $query5=mysqli_query($con,"Select * from tbluser where UserType='2'");
$totalowners=mysqli_num_rows($query5);
?>
			 <h1 class="mt-3"><?php echo $totalowners;?> +</h1>
			 <h6 class="mb-0">Owners</h6>
			</div>
		 </div>
		 <div class="col-md-3 col-sm-6">
		    <div class="spec_1i text-center p-5 px-4 rounded_10 shadow_box bg-white">
			 <span class="font_60 col_red lh-1"><i class="fa fa-newspaper-o"></i></span>
             <?php $query4=mysqli_query($con,"Select * from tblproperty where Status='Blog'");
$totalblog=mysqli_num_rows($query4);
?>				
			 <h1 class="mt-3"><?php echo $totalblog;?> +</h1>
			 <h6 class="mb-0">Blog</h6>
			</div>
		 </div>
		 <div class="col-md-3 col-sm-6">
		    <div class="spec_1i text-center p-5 px-4 rounded_10 shadow_box bg-white">
			 <span class="font_60 col_red lh-1"><i class="fa fa-user-plus"></i></span>
             <?php $query5=mysqli_query($con,"Select * from tbluser where UserType='1'");
$totalowners=mysqli_num_rows($query5);
?>
			 <h1 class="mt-3"><?php echo $totalowners;?> +</h1>
			 <h6 class="mb-0">Bloggers</h6>
			</div>
		 </div>
		 
		 
	  </div> 
  </div>   
 </section>
 
 <section id="explore" class="pt-5 pb-5 bg_blue carousel_p">
   <div class="container-xl">
	  <div class="row explore_1">
		 <div class="col-md-4">
		   <div class="explore_1l">
		    <h3 class="text-white">PetZone.lk</h3>
			<hr class="line">
			<h3 class="text-white text-center">Services </h3>
		   </div>
		 </div>
		 <div class="col-md-8">
		   <div class="explore_1r">
		      <div id="carouselExampleCaptions1" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions1" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="explore_1ri row">
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-heart"></i></span>
			<h5 class="mt-3 mb-3">Help</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-paw"></i></span>
			<h5 class="mt-3 mb-3">Sell</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-hand-o-right"></i></span>
			<h5 class="mt-3 mb-3">Buy</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-search"></i></span>
			<h5 class="mt-3 mb-3">Find</h5>
		  </div>
		 </div>
		</div>
    </div>
    <div class="carousel-item">
           <div class="explore_1ri row ">
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-newspaper-o"></i></span>
			<h5 class="mt-3 mb-3">Article</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-pencil-square-o"></i></span>
			<h5 class="mt-3 mb-3">Blog</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-pencil-square"></i></span>
			<h5 class="mt-3 mb-3">Post</h5>
		  </div>
		 </div>
		 <div class="col-md-3 col-sm-6 mt-2">
		  <div class="explore_1ril bg-white rounded_10 p-4 px-3 text-center">
		    <span class="font_50 lh-1 col_blue"><i class="fa fa-file-text-o"></i></span>
			<h5 class="mt-3 mb-3">News</h5>
		  </div>
		 </div>
		</div>
    </div>
  </div>
</div>
		   </div>
		 </div>
	  </div>
 </div>   
 </section>
 
 <section id="about_pg" class="p_3">
 <div class="container-xl">
  <div class="about_pg1 row">
	<div class="col-md-6">
	 <div class="about_pg1l mt-4">
	  <h5 class="mt-4">"As a passionate software developer with a heart for animals, I've combined my tech skills and love for pets to create a platform that serves the pet community. Whether you're looking to buy or sell pet-related products, share your pet stories, or seek advice, this website is designed to make it easier for pet lovers to connect and care for their furry friends" 
</h5>
	  <h5 class="mt-4">"Driven by a deep commitment to animal welfare, I strive to ensure that this space not only meets the needs of pet owners but also supports the well-being of pets everywhere. Welcome to a place where technology meets compassion!"</h5>
	  <p class="mt-4 text-center">Founder Of PetZone.lk <span class="col_blue fw-bold"> Chalitha Dissanayake</p>
	  <?php if (strlen($_SESSION['remsuid']==0)) {?> 
            
		<h6 class="mb-0 mt-4 text-center"><a class="button" href="signup.php">Register</a></h6>
			<?php } ?>
	  
	 </div>
	</div>
	<div class="col-md-6">
	 <div class="about_pg1r">
	   <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="assets/img/about-petzone.jpg" class="w-100" alt="petzone"></a>
		  </figure>
	  </div>
	 </div>
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
