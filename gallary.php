<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en-US">

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <link href="assets/slider/css/external.css" rel="stylesheet">
    <link href="assets/slider/css/style.css" rel="stylesheet">
    
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Gallary</title>
</head>
<?php include_once('includes/header.php');?>	


<body>

	    
<section id="list" class="p_3">
   <div class="container-xl">
	 <div class="row work_h1 text-center mb-0">
		 <div class="col-md-12">
		   <h2>Slider</h2>
		   <hr class="line mx-auto">
		   
		 </div>
	  </div> 
  </div>   
 </section>			  
			  
			 
	



        <section id="properties-carousel" class="properties-carousel mt-4">
            <div class="container">
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="false" data-space="25" data-loop="true" data-speed="1000">
                    <?php
                      
                      $query = mysqli_query($con, "SELECT * FROM tblproperty WHERE Status IN ('free', 'help', 'sale', 'blog' , 'missing') order by RAND () LIMIT 2000");
                      while($row=mysqli_fetch_array($query))
                      
                      {

                        if ($row['Status'] == 'Blog') {
                            $url = 'single-blog-details.php?proid=' . $row['ID'];
                        } else {
                            $url = 'single-pets-detail.php?proid=' . $row['ID'];
                        }

                      ?>
                         
                            <div class="property-item rounded_10">
                                <div class="property--img rounded_10">
                                    <a href="<?php echo $url; ?>">
                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="FeaturedImage" width='300' height='300' class="rounded" >
                        </a>
                        <div class="list_1i2 bg_back position-absolute top-0 px-3 rounded_10   h-100 w-100">
			                  <h5><a class="text-white" href="<?php echo $url; ?>"><?php echo $row['PropertyTitle'];?></a></h5>
                        <h6 class="text-white mb-0"><?php echo $row['Status'];?></h6>
			                  </div>
                                </div>
                                
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="list" class="p_3">
   <div class="container-xl">
	 <div class="row work_h1 text-center mb-4">
		 <div class="col-md-12">
		   <h2>Gallary</h2>
		   <hr class="line mx-auto">
		   
		 </div>
	  </div> 


	 <div class="row list_1 mt-4">
   <?php
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM tblproperty";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName 
    from tblproperty 
    left join tblcountry on tblcountry.ID=tblproperty.Country 
    left join tblstate on tblstate.ID=tblproperty.State LIMIT $offset, $no_of_records_per_page");
while($row=mysqli_fetch_array($query))
{
	if ($row['Status'] == 'Blog') {
		$url = 'single-blog-details.php?proid=' . $row['ID'];
	} else {
		$url = 'single-pets-detail.php?proid=' . $row['ID'];
	}
?>
		 <div class="col-md-4 mt-4">
		   <div class="list_1i position-relative">
		     <div class="list_1i1">
			  <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100 rounded_10" alt="FeaturedImage" height='300'>
			 </div>
			 <div class="list_1i2 bg_back position-absolute top-0 px-3 rounded_10   h-100 w-100">
			   <h5><a class="text-white" href="<?php echo $url; ?>"><?php echo $row['PropertyTitle'];?></a></h5>
               <h6 class="text-white mb-0"><?php echo $row['Status'];?></h6>
			 </div>
		   </div>
		 </div>
         <?php } ?>	 
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
 </section>        
      
       
         <?php include_once('includes/footer.php');?>
    </div>
    
    <script src="assets/slider/js/jquery-2.2.4.min.js"></script>
    <script src="assets/slider/js/plugins.js"></script>
    <script src="assets/slider/js/functions.js"></script>
    <script src="assets/slider/js/plugins/jquery.gmap.min.js"></script>
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
