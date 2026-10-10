<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $pageTitle = getPageTitle($page);
} else {
    $pageTitle = "Pet Zone - Blog";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="pets management platform, pet selling helping buying free missing blog.">
	<meta name="keywords" content="petzone, selling, blog">
	<meta name="robots" content="index, follow">
	<meta name="author" content="Pet Zone">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" >
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" >
	<link href="assets/css/global.css" rel="stylesheet">
	<link href="assets/css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title><?php echo $pageTitle; ?></title>
</head>
<?php include_once('includes/header.php');?>	

<body>


<section id="center" class="center_blog">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	      <h2 class="text-white">Blog </h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span> Blog </h6>
	 </div>
  </div>
 </div>
   </div>   
</section>

<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">

	 <div class="col-md-4">
	   
       <div class="blog_1r1 p-4 bg-white rounded_10 mt-0">
						<h5>Top Article</h5>
						<hr>
          <?php
				$query=mysqli_query($con,"SELECT *
				FROM tblproperty
				WHERE Status = 'blog' order by RAND () LIMIT 2");
				while($row=mysqli_fetch_array($query))
				{
				?>

		
		   <div class="list_1i position-relative mt-4">
		     <div class="list_1i1">
             <a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" height="250" class="w-100 rounded_10" alt="FeaturedImage"> </a>
			 </div>
			 <div class="list_1i2 bg_back position-absolute top-0 px-3 rounded_10   h-100 w-100">
			   <h5><a class="text-white" href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a></h5>
               <h6 class="text-white mb-0 font_14"><i class="fa fa-clock-o me-2 col_blue" aria-hidden="true"></i> <?php  echo $row['ListingDate'];?></h6>
			 </div>

		   </div>
           <?php } ?>


		 </div>
		</div>


	  <div class="col-md-8">
	   <div class="blog_1l">
	     <div class="blog_1 row">
         <?php

if (isset($_GET['pageno'])) {
	$pageno = $_GET['pageno'];
} else {
	$pageno = 1;
}
$no_of_records_per_page = 4;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$query=mysqli_query($con,"SELECT *
FROM tblproperty
WHERE Status = 'blog' order by ListingDate DESC limit 1000");
while($row=mysqli_fetch_array($query))
{
?>
			
	   <div class="col-md-6">
	    <div class="blog_1i">
			
		  <div class="grid clearfix">
				  <figure class="effect-jazz mb-0">
                  <a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="abc"></a>
				  </figure>
			  </div>
		  <div class="blog_1io p-4 bg-white">
          <a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><h6 class="d-inline-block bg_blight text-white rounded_10 p-2 px-3">READ MORE</h6></a>
		  <h4 class="mt-2"><a href="single-blog-details.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a></h4>
		  <hr>
		  <div class="blog_1i1 row">
		   <div class="col-md-9 col-9">
		    <div class="blog_1i1l">
		   <h6 class="mb-0 fw-bold  lh-base">
            <span class="text-muted font_14 fw-normal"><i class="fa fa-clock-o me-2 col_blue" aria-hidden="true"></i> <?php  echo $row['ListingDate'];?></span></h6>
           <?php  ?>        
            </div>
		    </div>
		   <div class="col-md-3 col-3">
		    <div class="blog_1i1r">
			</div>
		   </div>
		  </div>
		  </div>
		 </div>
	   </div>
       <?php } ?> 
	  </div>
	</div>




	<div class="blog_1dt4 mt-3 d-flex justify-content-center">
		   				<div class="blog_1 row al ">								
	   						<nav aria-label="Page navigation example ">
								<ul class="pagination mt-3">
									
									<li class="page-item">
										<a class="page-link" href="?pageno=1"><span class="col_blue fw-bold"><i class="fa fa-fast-backward" aria-hidden="true"></i>|</span></a>
									</li>
									
									<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
										<a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><span class="col_blue fw-bold"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Prev</span></a>
									</li>
									
									<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
										<a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><span class="col_blue fw-bold">Next&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
									</li>
									
									<li class="page-item">
										<a class="page-link" href="?pageno=<?php echo $total_pages; ?>"><span class="col_blue fw-bold">|<i class="fa fa-fast-forward" aria-hidden="true"></i></span></a>
									</li>
								
								</ul>
							</nav>
                        </div>
		  		</div>




	  </div>
	  </div>
	  <div class="row sale_2 mt-4 text-center">
	   <div class="col-md-12">
		 <li class="d-inline-block "><a class="button" href="add-blogs.php"><i class="fa fa fa-pencil-square-o me-2 align-middle fs-4"></i>Add Blog Post</a></li>
            
		 
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