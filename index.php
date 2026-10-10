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
  <link href="assets/css/fixedbtn.css" rel="stylesheet">
	<link href="assets/css/global.css" rel="stylesheet">
	<link href="assets/css/blog.css" rel="stylesheet">
	<link href="assets/css/index.css" rel="stylesheet">
	<link href="assets/css/list.css" rel="stylesheet">
	<link href="assets/slider/css/external.css" rel="stylesheet">
  <link href="assets/slider/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Home</title>
</head>

<?php include_once('includes/header.php');?>	
<body>

<?php include_once('includes/header-search.php');?>

<section id="properties-carousel" class="properties-carousel bg-light">
            <div class="container">
			<div class="row work_h1 text-center mb-4">
		 <div class="col-md-12 mt-4">
		   <h2>Help & Missing </h2>
		   <hr class="line mx-auto">
		   <p class="mb-0">Latest News</p>
		 </div>
	  </div>
               <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="false" data-space="25" data-loop="true" data-speed="50000">
                    <?php
                      
                      $query = mysqli_query($con, "SELECT * FROM tblproperty WHERE Status IN ('help','missing') order by ListingDate DESC limit 2000");
                      while($row=mysqli_fetch_array($query))
                      
                      {

                        if ($row['Status'] == 'Blog') {
                            $url = 'single-blog-details.php?proid=' . $row['ID'];
                        } else {
                            $url = 'single-pets-detail.php?proid=' . $row['ID'];
                        }

                      ?>
                         
                         <div class="sale_1m shadow-sm bg-white rounded">
			
      <div class="sale_1m1 position-relative ">
      <div class="sale_1m1i ">
        <div class="grid clearfix ">
        <figure class="effect-jazz mb-0 ">
        <a href="<?php echo $url; ?>"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="FeaturedImage" height='300'></a>
        </figure>
      </div>
      </div>
      <div class="sale_1m1i1  position-absolute top-0 w-100 p-3">
       <div class="sale_1m1i1i row">
        <div class="col-md-9 col-9">
       <div class="sale_1m1i1il">
        <ul class="mb-0">
         <li class="d-inline-block bg_blight text-white rounded_10 p-2 font_14 me-2"><?php echo $row['Status'];?></li>
         <li class="d-inline-block bg-danger  text-white rounded_10 p-2 font_14">News</li>
        </ul>
       </div>
      </div>
       </div>
      </div>
      
    </div>

    <div class="sale_1m2 p-4 bg-white">
     <h6 class="font_14 text-muted">
     </h6>
    
     <h4 class="mt-1 mb-3"><a href="<?php echo $url; ?>"><?php echo $row['PropertyTitle'];?></a></h4>
        <p class="font_14"><i class="fa fa-map-marker col_blue me-1"></i><?php echo $row['Bedrooms'];?></p>
      <h6 class="mb-0 mt-3 font_14"><span class="fw-bold"><i class="fa fa-calendar me-2 col_blue" aria-hidden="true"></i></span> <?php  echo $row['ListingDate'];?> <span class="float-end"><span class="fw-bold">Type :</span> <?php echo $row['Type'];?></span></h6>
    </div>
     </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>

		<section id="properties-carousel" class="properties-carousel bg-light">
            <div class="container">
			<div class="row work_h1 text-center mb-0 ">
		 <div class="col-md-12 mt-4">
		   <h2>Latest</h2>
		   <hr class="line mx-auto">
		   <p class="mb-0 mb-4">Latest Pets</p>
		 </div>
	  </div>
               <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="false" data-space="25" data-loop="true" data-speed="1200">
                    <?php
                      
                      $query = mysqli_query($con, "SELECT * FROM tblproperty WHERE Status IN ('free', 'help', 'sale', 'missing', 'blog') order by ListingDate DESC limit 2000");
                      while($row=mysqli_fetch_array($query))
                      
                      {
                        $shortTitle = substr($row['PropertyTitle'], 0, 15);


                        if ($row['Status'] == 'Blog') {
                            $url = 'single-blog-details.php?proid=' . $row['ID'];
                        } else {
                            $url = 'single-pets-detail.php?proid=' . $row['ID'];
                        }
                        
                      ?>
                         
                         <div class="sale_1m shadow-sm bg-white rounded">
			
      <div class="sale_1m1 position-relative">
      <div class="sale_1m1i">
        <div class="grid clearfix">
        <figure class="effect-jazz mb-0">
        <a href="<?php echo $url; ?>"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="FeaturedImage" height='300'></a>
        </figure>
      </div>
      </div>
      <div class="sale_1m1i1  position-absolute top-0 w-100 p-3">
       <div class="sale_1m1i1i row">
        <div class="col-md-9 col-9">
       <div class="sale_1m1i1il">
        <ul class="mb-0">
         <li class="d-inline-block bg_blight text-white rounded_10 p-2 font_14 me-2"><?php echo $row['Status'];?></li>
         <li class="d-inline-block bg-danger  text-white rounded_10 p-2 font_14">News</li>
        </ul>
       </div>
      </div>
       </div>
      </div>
      
    </div>

    <div class="sale_1m2 p-4 bg-white">
     <h6 class="font_14 text-muted">
     </h6>
    
     <h4 class="mt-1 mb-3"><a href="<?php echo $url; ?>"><?php echo $shortTitle . (strlen($row['PropertyTitle']) > 15 ? '...' : ''); ?></a></h4>
        <p class="font_14"><i class="fa fa-map-marker col_blue me-1"></i><?php echo $row['Bedrooms'];?></p>
      <h6 class="mb-0 mt-3 font_14"><span class="fw-bold"><i class="fa fa-calendar me-2 col_blue" aria-hidden="true"></i></span> <?php  echo $row['ListingDate'];?> <span class="float-end"><span class="fw-bold">Type :</span> <?php echo $row['Type'];?></span></h6>
    </div>
     </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
				<div class="row sale_2 text-center">
	   				<div class="col-md-12 mb-4">
		 				<li class="d-inline-block "><a class="button" href="pets-grid.php"><i class="fa fa-paw me-2 align-middle fs-4"></i> All Pets</a></li>
            
		 
					</div>
				</div>
            </div>
        </section>


<section id="contact" class="p_3 bg-light">
          <div class="container-xl">
            <div class="contact_1 row text-center">

            <div class="col-md-6">
              <div class="contact_1l">
              <div class="contact_1l1 bg-white p-4">
              <h4>Talk to Member of Sales Team</h4>
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
              <h6 class="mb-0"><a class="button" href="#"><i class="fa fa-user-plus me-1"></i> Add Pet</a></h6>
              </div>
              <div class="contact_1l1 bg-white p-4 mt-4">
              <h4>Product & Account Support</h4>
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
              <h6 class="mb-0"><a class="button" href="#">Go to  Faq</a></h6>
              </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="contact_1l">
              <div class="contact_1l1 bg-white p-4">
              <h4>Talk to Member of Sales Team</h4>
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
              <h6 class="mb-0"><a class="button" href="#">Contact Sales</a></h6>
              </div>
              <div class="contact_1l1 bg-white p-4 mt-4">
              <h4>Product & Account Support</h4>
              <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis ligula eu lectus vulputate porttitor sed feugiat nunc. Mauris ac consectetur ante,</p>
              <h6 class="mb-0"><a class="button" href="#">Go to  Faq</a></h6>
              </div>
            </div>
            </div>
            </div>
            
        </div>   
</section>
   


 
<section id="work_h" class="p_3">
   <div class="container-xl">
	  <div class="row work_h1 text-center mb-4">
		 <div class="col-md-12">
		   <h2>How To Add A Post Or Pet</h2>
		   <hr class="line mx-auto">
		   <p class="mb-0">Follow these 3 steps to Add your Post Or Pet</p>
		 </div>
	  </div>
	  <div class="row work_h2">
		 <div class="col-md-4">
		    <div class="work_h2i p-4 rounded_10 shadow_box text-center">
			  <span class="d-inline-block bg_blue text-white rounded-circle fs-1">1</span>
			  <h5 class="mt-3 mb-3"><a href="signup.php">Register</a></h5>
			</div>
		 </div>
		 <div class="col-md-4">
		    <div class="work_h2i p-4 rounded_10 shadow_box text-center">
			  <span class="d-inline-block bg-danger text-white rounded-circle fs-1">2</span>
			  <h5 class="mt-3 mb-3"><a href="signin.php">Login</a></h5>
			</div>
		 </div>
		 <div class="col-md-4">
		    <div class="work_h2i p-4 rounded_10 shadow_box text-center">
			  <span class="d-inline-block bg-success text-white rounded-circle fs-1">3</span>
			  <h5 class="mt-3 mb-3"><a href="add-pets.php">Add Pet</a></h5>
			</div>
		 </div>
	  </div>
	  
 </div>   
 </section>

 
 


 <section id="blog" class="p_3">
   <div class="container-xl">
	  <div class="row work_h1 text-center mb-4">
		 <div class="col-md-12">
		   <h2>Blog Post</h2>
		   <hr class="line mx-auto">
		   <p class="mb-0">Recent Reads</p>
		 </div>
	  </div>
	  <div class="blog_1 row">
	  <?php
$query=mysqli_query($con,"SELECT *
FROM tblproperty
WHERE Status = 'blog' order by ListingDate DESC limit 3");
while($row=mysqli_fetch_array($query))
{
?>
	   <div class="col-md-4">
	    <div class="blog_1i border-bottom">
		  <div class="grid clearfix ">
				  <figure class="effect-jazz mb-0 ">
				  <a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="FeaturedImage" height='300' alt="FeaturedImage"></a>
				  </figure>
			  </div>
		  <a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><h6 class="d-inline-block bg_blight text-white rounded_10 p-2 px-3 mt-3">Read More</h6></a>
		  <h4 class="mt-2"><a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a></h4>
		  
		  <hr>
		  <div class="blog_1i1 row">
		   <div class="col-md-9 col-9">
		    <div class="blog_1i1l">
			   
		   <h6 class="mb-0 fw-bold  lh-base"><i class="fa fa-clock-o me-2 col_blue" aria-hidden="true"></i><?php  echo $row['ListingDate'];?></span></h6>
			</div>
		   </div>
		   
		  </div>
		</div>
		
	   </div>
	   
	   <?php } ?>
	   
	  </div>
	  <div class="row sale_2 mt-4 text-center">
	   <div class="col-md-12">
		 <li class="d-inline-block "><a class="button" href="add-blogs.php"><i class="fa fa fa-pencil-square-o me-2 align-middle fs-4"></i>Add Blog Post</a></li>
            
		 
	   </div>
	  </div>
  </div>   
  
 </section>

    .


<?php 
				if (strlen($_SESSION['remsuid']) == 0) { 
				?>
<div class="fxdbuttonr">
  <a href="signup.php"><h6 class="text-white"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</h6></a>
</div>				<?php 
				} elseif ($_SESSION['remsuid'] != 0) { 
				?>
<div class="fxdbuttonp">
  <a href="add-pets.php"><h6 class="text-white"><i class="fa fa-plus" aria-hidden="true"></i> Pet</h6></a>
</div>
<div class="fxdbuttonb">
  <a href="add-blogs.php"><h6 class="text-white"><i class="fa fa-plus" aria-hidden="true"></i> Blog </h6></a>
</div>

<?php } ?>


      
<?php include_once('includes/footer.php');?>
<script src="assets/slider/js/jquery-2.2.4.min.js"></script>
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
<script src="assets/slider/js/jquery-2.2.4.min.js"></script>
    <script src="assets/slider/js/plugins.js"></script>
    <script src="assets/slider/js/functions.js"></script>
    <script src="assets/slider/js/plugins/jquery.gmap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>
