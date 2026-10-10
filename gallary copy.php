<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

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
    <title>Pet Zone - Blog Details</title>
</head>
<?php include_once('includes/header.php');?>	


<body>

	    
			  
			  
			 
	



        <section id="properties-carousel" class="properties-carousel mt-4">
            <div class="container">
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="25" data-loop="true" data-speed="1000">
                    <?php
                      
                      $query = mysqli_query($con, "SELECT * FROM tblproperty WHERE Status IN ('free', 'help', 'sale', 'post') order by ListingDate DESC limit 2000");
                      while($row=mysqli_fetch_array($query))
                      
                      {

                        if ($row['Status'] == 'Post') {
                            $url = 'single-blog-details.php?proid=' . $row['ID'];
                        } else {
                            $url = 'single-pets-detail.php?proid=' . $row['ID'];
                        }

                      ?>
                         
                            <div class="property-item">
                                <div class="property--img">
                                    <a href="<?php echo $url; ?>">
                        <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="<?php echo $row['PropertyTitle'];?>" width='300' height='300' class="rounded" >
                        </a>
                                </div>
                                
                            </div>
                            <?php } ?>


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
