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

<?php include_once('includes/header-search.php');?>






<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
		


		 
		 
	
	  <div class="col-md-12">
	    <div class="blog_1dt">
		  
		  
		  
		  <div class="blog_1dt4 mt-4">
		   <h3 class="mb-3 text-center">Search Results</h3>
		   <div class="blog_1 row">

		   <?php
$bedrooms=$_POST['bedrooms'];
$type=$_POST['type'];
$status=$_POST['status'];
$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName from 
    tblproperty 
    left join tblcountry on tblcountry.ID=tblproperty.Country 
    left join tblstate on tblstate.ID=tblproperty.State 
    where(tblproperty.Bedrooms='$bedrooms' and tblproperty.Type='$type' and tblproperty.Status='$status')
	ORDER BY tblproperty.ListingDate DESC");
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>
	   <div class="col-md-4">
			<div class="blog_1i">
					<div class="grid clearfix">
					<figure class="effect-jazz mb-0">
					<a href="single-pets-detail.php?proid=<?php echo $row['ID'];?>" target="_blank"><img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="w-100" alt="<?php echo $row['PropertyTitle'];?>"></a>
					</figure>
					</div>
				<div class="blog_1io p-4 bg-white">
				<h6 class="d-inline-block bg_blight text-white rounded_10 p-2 px-3"><?php echo $row['Status'];?></h6>
			<h4 class="mt-2"><a href="single-pets-detail.php?proid=<?php echo $row['ID'];?>" target="_blank"><?php echo $row['PropertyTitle'];?></a></h4>
			<hr>
			<span class="text-muted font_14 fw-normal">Posted on : <?php  echo $row['ListingDate'];?></span>
			</div>
			</div>
			</div>
	    </div>
		<?php }} else{ ?>

<h2 class="text-center" style="color:red">No Record found</h2>

<?php }?>
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
