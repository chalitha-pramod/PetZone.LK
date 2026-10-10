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
	<link href="assets/css/blog.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - All Pets</title>
</head>

<?php include_once('includes/header.php');?>	
<body>
	

    
<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
		<div class="col-md-4">
	   <div class="blog_1r">
	    
		 <div class="blog_1r1 p-4 bg-white rounded_10 mt-1">
		  <h5>Pet By Type</h5>
		  <hr>
          <?php
$query3=mysqli_query($con,"select distinct Type from  tblproperty");
while($row3=mysqli_fetch_array($query3))
{
?>                                                                                          
	    <h6 class="font_14"><i class="fa fa-chevron-right  font_10 col_blue me-1"></i> <a href="protypewise-pets-detail.php?protypeid=<?php echo $row3['Type'];?>"><?php echo $row3['Type'];?></a>

        
</h6>
<?php } ?>		 
    </div>

		 <div class="blog_1r1 p-4 bg-white rounded_10 mt-1">
		  <h5>Pet By Status</h5>
		  <hr>
          <?php
$query4=mysqli_query($con,"select distinct Status from  tblproperty WHERE Status IN ( 'free', 'sale' , 'help' ,'blog')");
while($row4=mysqli_fetch_array($query4))
{
?>
		<h6 class="font_14"><i class="fa fa-chevron-right  font_10 col_blue me-1"></i> <a href="statuswise-pets-detail.php?stproid=<?php echo $row4['Status'];?>"><?php echo $row4['Status'];?></a>
    
    </h6>
    <?php } ?>
    </div>

		 <div class="blog_1r1 p-4 bg-white rounded_10 mt-1">
		  <h5>Pet By District</h5>
		  <hr>
          <?php
$query5=mysqli_query($con,"select distinct Bedrooms from  tblproperty");
while($row5=mysqli_fetch_array($query5))
{
?>
		  <h6 class="font_14"><i class="fa fa-chevron-right  font_10 col_blue me-1"></i> <a href="citywise-pets-detail.php?cityproid=<?php echo $row5['Bedrooms'];?>"><?php echo $row5['Bedrooms'];?></a>
        </h6>
        <?php } ?>


    	</div>
		</div>
	  </div>
	  
	  <div class="col-md-8">
	    <div class="blog_1dt">
		  
		  
		  
		  <div class="blog_1dt4 mt-4">
		   <h3 class="mb-3">All Pets</h3>
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


$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName 
    from tblproperty 
    left join tblcountry on tblcountry.ID=tblproperty.Country 
    left join tblstate on tblstate.ID=tblproperty.State 
	ORDER BY tblproperty.ListingDate DESC
	LIMIT $offset, $no_of_records_per_page");
while($row=mysqli_fetch_array($query))
{
	if ($row['Status'] == 'Blog') {
		$url = 'single-blog-details.php?proid=' . $row['ID'];
	} else {
		$url = 'single-pets-detail.php?proid=' . $row['ID'];
	}
?>


	   	<div class="col-md-6 mt-2">
	    	<div class="blog_1i">
		  		<div class="grid clearfix">
						<figure class="effect-jazz mb-0">
						<a href="<?php echo $url; ?>" target="_blank">
							<img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="<?php echo $row['PropertyTitle'];?>"></a>
						</figure>
			  	</div>
				<div class="blog_1io p-4 bg-white">
				<a href="<?php echo $url; ?>" target="_blank"><h6 class="d-inline-block bg_blight text-white rounded_10 p-2 px-3"><?php echo $row['Status'];?></h6></a>
				<h4 class="mt-2"><a href="<?php echo $url; ?>" target="_blank"><?php echo $row['PropertyTitle'];?></a></h4>
				<hr>
				<span class="text-muted font_14 fw-normal">Posted on : <?php  echo $row['ListingDate'];?></span>
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

	  
			

	  
	 </div>
  </div>   
</section>
     

      
<?php include_once('includes/footer.php');?>
   


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
