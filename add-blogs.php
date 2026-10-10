<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  
echo "<script>window.location.href ='signin.php'</script>";

  }
  else{

if(isset($_POST['submit']))
  {
$uid=$_SESSION['remsuid'];
$protitle=$_POST['propertytitle'];
$prodec=addslashes($_POST['propertydescription']);
$type=$_POST['selecttype'];
$status=$_POST['status'];
$location=$_POST['location'];
$bedrooms=$_POST['bedrooms'];
$bathrooms=$_POST['bathrooms'];
$floors=$_POST['floors'];
$garages=$_POST['garages'];
$area=$_POST['area'];
$size=$_POST['size'];
$srprice=$_POST['salerentprice'];
$beforepricelabel=$_POST['beforepricelabel'];
$afterpricelabel=$_POST['afterpricelabel'];
$ccolling=$_POST['centercolling'];
$balcony=$_POST['balcony'];
$petfrndly=$_POST['petfrndly'];
$barbeque=$_POST['barbeque'];
$firealarm=$_POST['firealarm'];
$modkitchen=$_POST['modkitchen'];
$storage=$_POST['storage'];
$dryer=$_POST['dryer'];
$heating=$_POST['heating'];
$pool=$_POST['pool'];
$laundry=$_POST['laundry'];
$sauna=$_POST['sauna'];
$gym=$_POST['gym'];
$elevator=$_POST['elevator'];
$dishwasher=$_POST['dishwasher'];
$eexit=$_POST['eexit'];

$proaddress=$_POST['address'];
$procountry=$_POST['country'];
$procity=$_POST['city'];
$prostate=$_POST['state'];
$prozipcode=$_POST['zipcode'];
$neighborhood=$_POST['neighborhood'];

$proid=mt_rand(100000000, 999999999);
//fetured Image
$pic=$_FILES["featuredimage"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Property  Image 1
$pic1=$_FILES["galleryimage1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Property  Image 2
$pic2=$_FILES["galleryimage2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Property  Image 3
$pic3=$_FILES["galleryimage3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Property  Image 4
$pic4=$_FILES["galleryimage4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Property  Image 5
$pic5=$_FILES["galleryimage5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Property gallery image1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Property gallery image2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Property gallery image3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Property gallery image4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Property gallery image5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename property images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
$propic4=md5($pic4).time().$extension4;
$propic5=md5($pic5).time().$extension5;
     move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
     move_uploaded_file($_FILES["galleryimage1"]["tmp_name"],"propertyimages/".$propic1);
     move_uploaded_file($_FILES["galleryimage2"]["tmp_name"],"propertyimages/".$propic2);
     move_uploaded_file($_FILES["galleryimage3"]["tmp_name"],"propertyimages/".$propic3);
     move_uploaded_file($_FILES["galleryimage4"]["tmp_name"],"propertyimages/".$propic4);
     move_uploaded_file($_FILES["galleryimage5"]["tmp_name"],"propertyimages/".$propic5);

    $query=mysqli_query($con,"insert into tblproperty(UserID,PropertyTitle,PropertDescription,Type,Status,Location,Bedrooms,Bathrooms,Floors,Garages,Area,Size,RentorsalePrice,BeforePricelabel,AfterPricelabel,PropertyID,CenterCooling,Balcony,PetFriendly,Barbeque,FireAlarm,ModernKitchen,Storage,Dryer,Heating,Pool,Laundry,Sauna,Gym,Elevator,DishWasher,EmergencyExit,FeaturedImage,GalleryImage1,GalleryImage2,GalleryImage3,GalleryImage4,GalleryImage5,Address,Country,City,State,ZipCode,Neighborhood)value('$uid','$protitle','$prodec','$type','$status','$location','$bedrooms','$bathrooms','$floors','$garages','$area','$size','$srprice','$beforepricelabel','$afterpricelabel','$proid','$ccolling','$balcony','$petfrndly','$barbeque','$firealarm','$modkitchen','$storage','$dryer','$heating','$pool','$laundry','$sauna','$gym','$elevator','$dishwasher','$eexit','$propic','$propic1','$propic2','$propic3','$propic4','$propic5','$proaddress','$procountry','$procity','$prostate','$prozipcode','$neighborhood')");
   if ($query) {
    echo '<script>alert("Pet detail has been added.")</script>';
echo "<script>window.location.href ='add-pets.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}



?>


 <!DOCTYPE html>
<html dir="ltr" lang="en-US">


    <meta name="robots" content="noindex,nofollow" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" >
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" >
	<link href="assets/css/global.css" rel="stylesheet">
	<link href="assets/css/list.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
	<link href="assets/css/index.css" rel="stylesheet">
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Add</title>
    
</head>

<?php include_once('includes/header.php');?>


<body>
          



 <section id="faq" class="p_2 bg-light ">
   <div class="container-xl ">
	  <div class="faq_1 row ">
	   
	   <div class="col-md-12 mt-3">
	      <div class="faq_1r">
		    <h2>Add Your Blog Post</h2>
		   <hr class="line">
		   
		  </div>
	   </div>
	  </div>
  </div>   
 </section>



<section id="detail" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="detail_1 row">
	  <div class="col-md-8">
	   <div class="detail_1l">

       <form class="mb-0" method="post"  enctype="multipart/form-data">
       <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
                <div class="detail_1l2 rounded_10 bg-white mt-2">
                <h4>Blog Post Details</h4>
               </div>
               <hr>
               <h6>Add Blog Post Details</h6>
            <div class="contact_2li row">
                <div class="col-md-12 mt-2">
                  <h6 class="fw-bold font_14 mb-1">Blog Post Title *</h6>
                  <input class="form-control rounded_10 border-0 bg-light" placeholder="Pet Title" type="text" name="propertytitle" id="propertytitle" required>
                </div>
            </div>

            <div class="contact_2li row mt-2">
                <div class="col-md-12">
                  <h6 class="fw-bold font_14 mb-1">Blog Post Description *</h6>
                  <textarea class="form-control rounded_10 border-0 bg-light form_text" placeholder="Pet Description" name="propertydescription" id="propertydescription" rows="2" required></textarea>
                </div>
            </div>

            <div class="contact_2li row mt-2">

            <div class="col-md-6 mt-2">
                        <h6 class="fw-bold font_14 mb-1">Status * (What You Expect)</h6>
                            <select class="form-select border-0 rounded_10 bg-light" aria-label="Default select example" id="status" name="status">
                            
                                            <option>Blog</option>
                            </select>
                </div>

                <div class="col-md-6 mt-2">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-1">Type *</h6>
                      <select class="form-select border-0 rounded_10 bg-light" aria-label="Default select example" id="selecttype" name="selecttype" required="true">
                        <option value="">Select Pet Type *</option>
                        <?php $query1=mysqli_query($con,"select * from tblpropertytype");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                      </select>
                 </div>
                </div>
                
            </div>

             
                <div class="contact_2li row mt-4">
                    <hr>
               <h6>Pet Gallary</h6>
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-1">Featured Image *</h6>
                            <input class="form-control rounded_10 bg-light" type="file"  name="featuredimage" required>
                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-1">Gallery Image 1 *</h6>
                      <input class="form-control rounded_10 bg-light" type="file" name="galleryimage1" required>
                     </div>
                    </div>
                   </div>
                
                   <div class="contact_2li row mt-2">
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-1">Gallery Image 2 *</h6>
                            <input class="form-control rounded_10 bg-light" type="file"  name="galleryimage2" required>
                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-1">Gallery Image 3 *</h6>
                      <input class="form-control rounded_10 bg-light" type="file"  name="galleryimage3" required>
                     </div>
                    </div>
                   </div>
                   <div class="contact_2li row mt-2">
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-1">Gallery Image 4 *</h6>
                            <input class="form-control rounded_10 bg-light" type="file" name="galleryimage4" required>
                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-1">Gallery Image 5 *</h6>
                      <input class="form-control rounded_10 bg-light" type="file" name="galleryimage5" required>
                     </div>
                    </div>
                   </div>   


                   
                

                   <hr>
                   <h6>Submit Your Blog Post Details</h6>
               <div class="contact_2li row mt-2">
                <div class="col-md-12">
                  <h6 class="mb-0 mt-3 center_sm">
                    <div class="align-items-center">
                    <input type="submit"  class="border-0 mt-3 center_sm button_2 d-block text-center" name="submit" value="Submit">
                    </div>
                </div>
               </div>
               <?php } ?>
		 </div> 
	 
	   </div>
	  </div>
      </form>
	  <div class="col-md-4">
	   <div class="detail_1r">
	   
    
           


                     




		 <div class="detail_1r1 bg-white rounded_10 p-4 mt-4">
     <?php 
//If user is logged in
$uid=$_SESSION['remsuid'];
$sqlq=mysqli_query($con,"select * from tbluser where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FullName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
$aboutme=$ret['Aboutme'];

} 
?>
     <?php if($row['UserType']=="1"){?>
                              <h5 class="text-center">I'm Blogger</h5>
                            <?php } else{ ?>
                             <h5 class="text-center">I'm Owner</h5>
                         <?php } ?>
		  <hr>
      
		  <div class="detail_1r1i  detail_1l4i1l">
			    <span><img src="assets/logo/user.png" alt="user" class="rounded-circle me-3 float-start"></span>
		   <h6 class="mb-0 fw-bold lh-base text-center"> <?php echo $fname;?> <br> <span class="text-muted font_14 fw-normal"> <span class="text-warning me-1">
			</h6>
			  </div>
      
		 <h6 class="mt-4 fw-bold">Name <span class="pull-right fw-normal"><?php echo $fname;?></span></h6><hr>
		  <h6 class="fw-bold">Email<span class="pull-right fw-normal"><?php echo $uemail;?></span></h6><hr>
		   <h6 class="fw-bold">Phone <span class="pull-right fw-normal"><?php echo $mnumebr;?></span></h6><hr>
       <h6 class="fw-bold">About Me <span class="pull-right fw-normal"><?php  echo $aboutme;?></span></h6><hr>
		    <h6 class="fw-bold mb-0">Verification <span class="pull-right fw-normal text-success">Verified</span></h6>
        <?php  ?>

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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>



