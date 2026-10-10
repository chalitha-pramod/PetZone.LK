<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Detect if HTTPS is used
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the current URL
$current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $message=$_POST['message'];
    $enquirynumber = mt_rand(100000000, 999999999);
$proid=$_GET['proid'];
    $query1=mysqli_query($con,"insert into  tblenquiry(PropertyID,FullName,Email,MobileNumber,Message,EnquiryNumber) value('$proid','$fullname','$email','$mobilenumber','$message','$enquirynumber')");
        if ($query1) {
 echo '<script>alert("Your enquiry successfully send. Your Enquiry number is "+"'.$enquirynumber.'")</script>';
echo "<script>window.location.href='pets-grid.php'</script>";
  }
  else
    {
echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}


//Submit Feedback
if(isset($_POST['submitreview']))
{
if (strlen($_SESSION['remsuid']==0)) 
{
 echo '<script>alert("Login required for publish review")</script>';
  } else {
$review=$_POST['reviewcomment'];
$uid=$_SESSION['remsuid'];
$pid=$_GET['proid'];
$query=mysqli_query($con,"insert into tblfeedback(UserId,PropertyId,UserRemark) value('$uid','$pid','$review')");
 echo '<script>alert("Your review successfully submited, after review it will publish")</script>';
 echo "<script>window.location.href='pets-grid.php'</script>";
}
}
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
    <title>Pet Zone - Pet Details</title>
</head>
<?php include_once('includes/header.php');?>	


<body>





<section id="detail" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="detail_1 row">
	  <div class="col-md-8">
	   <div class="detail_1l">
	   <?php 

$proid=$_GET['proid'];
$query=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblstate.StateName 
    from tblproperty 
    left join tblcountry on tblcountry.ID=tblproperty.Country 
    left join tblstate on tblstate.ID=tblproperty.State 
    where tblproperty.ID='$proid'");
$num=mysqli_num_rows($query);
while ($row=mysqli_fetch_array($query)) {

?>
		<div class="detail_1l2 p-4 rounded_10 bg-white mt-0">
		  <h4>Title - <?php echo $row['PropertyTitle'];?></h4>
		  <div class="detail_1l2i row mt-3">
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			  <h6 class="mt-3"> <span class="fw-bold"></i> Status :</span> <?php echo $row['Status'];?></h6>
			  <h6 class="mt-3"><span class="fw-bold"></i> Price :</span><?php echo $row['RentorsalePrice'];?>
			   

			  
			</div>
		   </div>
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			  <h6 class="mt-3"> <span class="fw-bold">Pet ID :</span> <?php echo $row['PropertyID'];?></h6>
			  <h6 class="mt-3"> <span class="fw-bold"></i> District :</span> <?php echo $row['Bedrooms'];?></h6>

			</div>
		   </div>

		   <div class="col-md-4">
		    <div class="detail_1l2il">
			<h6 class="mt-3"> <span class="fw-bold">Date & Time :</span> <?php  echo $row['ListingDate'];?></h6>

			</div>
		   </div>
		  </div>
		 </div>

	   <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  
		 </div>
	     <div class="property-single-carousel inner-box">
                            <div class="row">
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="property-single-carousel-content">
                                        <div class="carousel carousel-thumbs slider-navs" data-slide="1" data-slide-res="1" data-autoplay="true" data-thumbs="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="800" data-slider-id="1">
                                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="FeaturedImage">
                                            <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" alt="FeaturedImage">
                                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" alt="FeaturedImage">
                                            <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" alt="FeaturedImage">
                                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>" alt="FeaturedImage">
                                             <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" alt="FeaturedImage">
                                        </div>
                                        <!-- .carousel end -->
                                        <div class="owl-thumbs thumbs-bg text-center" data-slider-id="1">
                                            <button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="FeaturedImage thumb" width="45" height='45'>
											</button>
															<button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['GalleryImage1'];?>" alt="FeaturedImage thumb" width="45" height='45'>
										</button>
															<button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['GalleryImage2'];?>" alt="FeaturedImage thumb" width="45" height='45'>
											</button>
															<button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['GalleryImage3'];?>" alt="FeaturedImage thumb" width="45" height='45'>
											</button>
															<button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['GalleryImage4'];?>" alt="FeaturedImage thumb" width="45" height='45'>
											</button>
											<button class="owl-thumb-item">
												<img src="propertyimages/<?php echo $row['GalleryImage5'];?>" alt="FeaturedImage thumb" width="45" height='45'>
											</button>
                                        </div>
                                    </div>
                                </div>
							</div>	
						</div>



		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  <h4>Description</h4>
		  <p class="mb-0"><?php echo $row['PropertDescription'];?></p>
		 </div>



		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  <h4>Size & Age</h4>
		  <div class="detail_1l2i row mt-3">
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			  <h6> <span class="fw-bold">Age (years):</span> <?php echo $row['Area'];?></h6>
			  
			</div>
		   </div>


		   <div class="col-md-4">
		    <div class="detail_1l2il">
			  <h6> <span class="fw-bold">Height (cm):</span> <?php echo $row['Size'];?></h6>
			  
			</div>
		   </div>

		   
		  </div>
		 </div>


		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  <h4>Colors</h4>
		  <div class="detail_1l2i row mt-3">
		   <div class="col-md-4">
		    <div class="detail_1l2il">

			   <h6><?php if($row['CenterCooling']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>                
				<?php } ?>Black </h6>

		       <h6 class="mt-3"><?php if($row['Balcony']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i>
				<?php } ?>White</h6>

				<h6 class="mt-3"><?php if($row['PetFriendly']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>
				<?php } ?>Gray</h6>

				<h6 class="mt-3"><?php if($row['Barbeque']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Pink</h6>
   
			</div>
		   </div>

		   <div class="col-md-4">
		    <div class="detail_1l2il">

			   <h6><?php if($row['FireAlarm']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>                
				<?php } ?>Brown </h6>

		       <h6 class="mt-3"><?php if($row['ModernKitchen']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Red</h6>

				<h6 class="mt-3"><?php if($row['Storage']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Orange</h6>

				<h6 class="mt-3"><?php if($row['Dryer']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Blue</h6>
   
			</div>
		   </div>

		   <div class="col-md-4">
		    <div class="detail_1l2il">

			   <h6><?php if($row['Heating']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>                
				<?php } ?>Green </h6>

		       <h6 class="mt-3"><?php if($row['Pool']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Purple</h6>

				<h6 class="mt-3"><?php if($row['Laundry']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Yello</h6>

				<h6 class="mt-3"><?php if($row['Sauna']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
					<i class="fa fa-times col_red me-1" aria-hidden="true"></i> 
				<?php } ?>Dark</h6>
   
			</div>
		   </div>

		  </div>
		 </div>

		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  <h4>Gender</h4>
		  <div class="detail_1l2i row mt-3">
		   <div class="col-md-4">
		    <div class="detail_1l2il">

			   <h6><?php if($row['DishWasher']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>                
				<?php } ?>Male </h6>

   
			</div>
		   </div>

		   <div class="col-md-4">
		    <div class="detail_1l2il">

			   <h6><?php if($row['EmergencyExit']==1){?>
				<i class="fa fa-check col_green me-1"></i>
				<?php } else { ?>
				<i class="fa fa-times col_red me-1" aria-hidden="true"></i>                
				<?php } ?>Female </h6>

			</div>
		   </div>
		     
		  </div>
		 </div>

		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
		  <h4>Location Details</h4>
		  <div class="detail_1l2i row mt-3">
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			<h6 class="mt-3"> <span class="fw-bold"><i class="fa fa-map" aria-hidden="true"> </i>District :</span> <?php echo $row['Bedrooms'];?></h6>

			  
			</div>
		   </div>
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			  <h6 class="mt-3"> <span class="fw-bold"><i class="fa fa-map-signs" aria-hidden="true"></i> City :</span> <?php echo $row['Address'];?></h6>

			</div>
		   </div>
		   <div class="col-md-4">
		    <div class="detail_1l2il">
			<h6 class="mt-3"> <span class="fw-bold"><i class="fa fa-map-marker" aria-hidden="true"></i> Nearby Place :</span> <?php echo $row['Neighborhood'];?></h6>
			  
			</div>
		   </div>
		  </div>
		 </div>

		 <?php $pid=intval($_GET['proid']);
$qry=mysqli_query($con,"select tblfeedback.UserRemark,tblfeedback.PostingDate,tbluser.FullName from tblfeedback join tbluser on tbluser.ID=tblfeedback.UserId where tblfeedback.PropertyId='$pid' and tblfeedback.Is_Publish='1'"); 
$countreview=mysqli_num_rows($qry);
?>
		 <div class="detail_1l4 p-4 rounded_10 bg-white mt-4">
		  <h4 class="mb-3">Reviews <?php echo $countreview;?></h4>
		   <div class="detail_1l4i border_1 p-3">


		   <?php
while($rw=mysqli_fetch_array($qry)){
?>

		    <div class="detail_1l4i1 row">
			 <div class="col-md-6 col-sm-6">
			  <div class="detail_1l4i1l mt-3">
			    <span><img src="assets/logo/user.png" alt="abc" class="rounded_10 me-3 float-start"></span>

				<h6 class="mb-0 fw-bold  lh-base"> <?php echo $rw['FullName'];?> <br> <span class="text-muted font_14 fw-normal"><?php echo $rw['PostingDate'];?></span></h6>
			  </div>
			 </div>
			 
			</div>
			<div class="detail_1l4i1 row">
			 <div class="col-md-12">
			  <p class="mb-0 bg-light p-3 mt-1"><?php echo $rw['UserRemark'];?></p>
			 </div>
			</div>
			<?php } ?>
		   </div>
		   
		   

								

		   <h4 class="mb-3 mt-4">Add Your Review</h4>
		    <div class="detail_1l4b">
			 
			 <div class="detail_1l4b1 row mt-4">
			 <form id="post-comment" class="mb-0" method="post">
			  <div class="col-md-12">
			   <div class="detail_1l4b1l">
			   <textarea class="form-control rounded_10 border-0 bg-light form_text" placeholder="Enter Your Comments" id="reviewcomment" name="reviewcomment" rows="2" required></textarea>
			   <button type="submit" name="submitreview" class="button d-block text-center border-0 mt-3">Submit</button>
			   </div>
			  </div>
			  </form>
			 </div>
			</div> 
		 </div>
		 
		 
	   </div>
	  </div>


	  <div class="col-md-4">
	   <div class="detail_1r">
	   <?php                
$ret1=mysqli_query($con,"select * from tbluser join tblproperty on tblproperty.UserID=tbluser.ID where tblproperty.ID=$proid");
$cnt=1;
while ($row1=mysqli_fetch_array($ret1)) {

?>
	   <div class="detail_1r1 bg-white rounded_10 p-4 mt-0">

		  <h5 class="text-center">Contact Details</h5>
		  <hr>
		  <div class="detail_1r1i  detail_1l4i1l">
			    <span><img src="assets/logo/agent.png" alt="agent" class="rounded-circle me-3 float-start"></span>
				<?php if($row1['UserType']=="1"){?>
				<h6 class="mb-0 fw-bold  lh-base text-center">Posted by Blogger <br> <span class="text-muted font_14 fw-normal"> <span class="text-warning me-1"></h6>
			    <?php } else{ ?>
				<h6 class="mb-0 fw-bold  lh-base text-center">Posted by Owner <br> <span class="text-muted font_14 fw-normal"> <span class="text-warning me-1"></h6>
				<?php } ?>

			</div>
		 <h6 class="mt-4 fw-bold">Name<span class="pull-right fw-normal"><?php echo $row1['FullName'];?></span></h6><hr>

		   <h6 class="fw-bold">Mobile Number <span class="pull-right fw-normal">
			
		   <?php 
        if (strlen($_SESSION['remsuid']) != 0) {
            echo $row['Bathrooms'];
        } else {
            echo '<a href="signin.php">Login here</a>';
        } 
        ?>
		</span></h6><hr>

		   <h6 class="fw-bold">About Me <span class="pull-right fw-normal"><?php  echo $row1['Aboutme'];?></span></h6><hr>
		    <h6 class="fw-bold mb-0">Verification <span class="pull-right fw-normal text-success">Verified</span></h6>
			<?php }?>
		 </div>


<?php if($_SESSION['remsuid']==0)
{ ?>

		 <div class="detail_1r1 bg-white rounded_10 p-4 text-center mt-4">
				<div class="detail_1r1i text-start bg-light p-3 rounded_10 detail_1l4i1l">
		   			<h6 class="mb-0 fw-bold  lh-base text-center"><i class="fa fa-wechat"></i> Request a Showing</h6>
			  	</div>
				    <form method="post">
					<input class="form-control rounded_10 border-0 bg-light mt-3" placeholder="Your Name" type="text" name="fullname" id="fullname" required="true>
					<input class="form-control rounded_10 border-0 bg-light mt-3" placeholder="Your Email" type="email" name="email" id="email" required="true">
					<input class="form-control rounded_10 border-0 bg-light mt-3" placeholder="Your Phone" type="text" name="mobnum" id="mobnum" required="true" maxlength="10" pattern="[0-9]+">
					<textarea class="form-control rounded_10 border-0 bg-light form_text mt-3" placeholder="Yes I'am Interested" name="message" id="message" rows="2" required="true"></textarea>
					   	<div class="align-items-center">
							<input class="mb-4 mt-4 border-0 button d-block text-center align-items-center w-100" type="submit" value="Send Request" name="submit" >
						</div>
	   				</form>
		 </div>




		 <?php } else {
//If user is logged in
$uid=$_SESSION['remsuid'];
$sqlq=mysqli_query($con,"select * from tbluser where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FullName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
} 
?>
		 <div class="detail_1r1 bg-white rounded_10 p-4 text-center mt-4">
				<div class="detail_1r1i text-start bg-light p-3 rounded_10 detail_1l4i1l">
		   			<h6 class="mb-0 fw-bold  lh-base text-center"><i class="fa fa-wechat"></i> Request a Showing</h6>
			  	</div>
				  	<form class="mb-0" method="post">
					<input class="form-control rounded_10 border-0 bg-light mt-3" type="text" value="<?php echo $fname;?>" name="fullname" id="fullname" required="true" readonly="true">
					<input class="form-control rounded_10 border-0 bg-light mt-3" type="text" value="<?php echo $mnumebr;?>"  name="mobnum" id="mobnum" required="true" maxlength="10" pattern="[0-9]+" readonly="true">
					<textarea class="form-control rounded_10 border-0 bg-light form_text mt-3" name="message" id="message" rows="2" required="true" placeholder="Yes I'am Interested"></textarea>
						<div class="align-items-center">
							<input class="mb-4 mt-4 border-0 button d-block text-center align-items-center w-100" type="submit" value="Send Request" name="submit" >
						</div>
				</form>
		 </div>
<?php } ?>


		
		  
		 
		 
		 <div class="detail_1r2 bg-white rounded_10 p-4 mt-4">
		  <h5>Share Post</h5>
		 <hr>
		 <ul class="mb-0  tags text-center">
	    <li class="d-inline-block"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url); ?>"><i class="fa fa-facebook"></i></a></li>
		<li class="d-inline-block"><a href="https://api.whatsapp.com/send?text=<?php echo urlencode($current_url); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
		<li class="d-inline-block"><a href="javascript:void(0);" onclick="prompt('Copy this URL and share it on Instagram:', '<?php echo $current_url; ?>');"><i class="fa fa-instagram"></i></a></li>
		
	   </ul>
		 </div>
		 




	    
			  
			  
			 
		   </div>
		 </div>
	  </div>
	  <?php } ?>
  </div>   
</section>





        <section id="properties-carousel" class="properties-carousel mt-4">
            <div class="container">
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="2000">
                            <?php
                      
$query=mysqli_query($con,"SELECT * FROM tblproperty WHERE Status IN ('free', 'help', 'sale', 'missing') order by ListingDate DESC limit 3"); 
while($row=mysqli_fetch_array($query))
{
?>

	


                            <div class="property-item">
                                <div class="property--img">
									<a href="single-pets-detail.php?proid=<?php echo $row['ID'];?>">
                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="FeaturedImage" width='300' height='300' class="rounded" >
                        </a>
						<div class="list_1i2 bg_back position-absolute top-0 px-3 rounded_10   h-100 w-100">
			                  <h5><a class="text-white" href="single-pets-detail.php?proid=<?php echo $row['ID'];?>"><?php echo $row['PropertyTitle'];?></a></h5>
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


		<section id="properties-carousel" class="properties-carousel mt-4">
            <div class="container">
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="2000">
                            


                        </div>
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
