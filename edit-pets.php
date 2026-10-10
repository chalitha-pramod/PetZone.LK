<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
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


$query=mysqli_query($con,"update tblproperty set PropertyTitle='$protitle',PropertDescription='$prodec',Type='$type',Status='$status',Location='$location',Bedrooms='$bedrooms',Bathrooms='$bathrooms',Floors='$floors',Garages='$garages',Area='$area',Size='$size',RentorsalePrice='$srprice',BeforePricelabel='$beforepricelabel',AfterPricelabel='$afterpricelabel',CenterCooling='$ccolling',Balcony='$balcony',PetFriendly='$petfrndly',Barbeque='$barbeque',FireAlarm='$firealarm',ModernKitchen='$modkitchen',Storage='$storage',Dryer='$dryer',Heating='$heating',Pool='$pool',Laundry='$laundry',Sauna='$sauna',Gym='$gym',Elevator='$elevator',DishWasher='$dishwasher',EmergencyExit='$eexit',Address='$proaddress',Country='$procountry',City='$procity',State='$prostate',ZipCode='$prozipcode',Neighborhood='$neighborhood' where ID='$eid'");
   if ($query) {
    echo '<script>alert("Pet / Blog Post detail has been updated.")</script>';
echo "<script>window.location.href ='my-pets.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
    <title>Pet Zone - Edit Details</title>
    <script>
function getsate(val) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$countryid='+val,
success:function(data){
$("#state").html(data);
}

  });
}
</script>

<script>
function getcity(val1) {
  $.ajax({
type:"POST",
url:"get-sate.php",
data:'$stateid='+val1,
success:function(data){
$("#city").html(data);
}

  });
}
</script>
</head>

<?php include_once('includes/header.php');?>


<body>
          




<section id="detail" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="detail_1 row">
	  <div class="col-md-8">
	   <div class="detail_1l">

       <form class="mb-0" method="post"  enctype="multipart/form-data">
       <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select tblproperty.*,tblcountry.CountryName,tblcountry.ID as cid,tblstate.StateName,tblstate.id as sid 
    from tblproperty 
    left join tblcountry on tblcountry.ID=tblproperty.Country 
    left join tblstate on tblstate.ID=tblproperty.State 
    where tblproperty.ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  

		 <div class="detail_1l2 p-4 rounded_10 bg-white mt-4">
                <div class="detail_1l2 rounded_10 bg-white mt-4">
                <h4>Edit Pet Or Post Details</h4>
               </div>
               <hr>
            <div class="contact_2li row">
                <div class="col-md-12">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-2">Pet Title </h6>
                  <input class="form-control rounded_10 border-0 bg-light" placeholder="Pet Title" type="text" name="propertytitle" id="propertytitle"  value="<?php  echo $row['PropertyTitle'];?>">
                 </div>
                </div>
            </div>

            <div class="contact_2li row mt-4">
                <div class="col-md-12">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-2">Pet Description </h6>
                  <textarea class="form-control rounded_10 border-0 bg-light form_text" placeholder="Pet Description" name="propertydescription" id="propertydescription" rows="2" required readonly="true"><?php  echo $row['PropertDescription'];?></textarea>
                 </div>
                </div>
            </div>

            <div class="contact_2li row mt-4">
                <div class="col-md-6">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-2">Type</h6>
                      <select class="form-select border-0 rounded_10 bg-light" aria-label="Default select example" id="selecttype" name="selecttype" >
                      <option value="<?php  echo $row['Type'];?>"><?php  echo $row['Type'];?></option>
              <?php $query1=mysqli_query($con,"select * from tblpropertytype");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['PropertType'];?>"><?php echo $row1['PropertType'];?></option>
                  <?php } ?>
                      </select>
                 </div>
                </div>
                <div class="col-md-6">
                    <div class="contact_2lil">
                        <h6 class="fw-bold font_14 mb-2">Status</h6>
                            <select class="form-select border-0 rounded_10 bg-light" aria-label="Default select example" id="status" name="status">
                            <option value="<?php  echo $row['Status'];?>"><?php  echo $row['Status'];?></option>
                                            <option>Free</option>
                                            <option>Sale</option>
                                            <option>Help</option>
                                            <option>Missing</option>
                                            <option>Blog</option>
                            </select>
                    </div>
                </div>
            </div>
             
               <div class="contact_2li row mt-4">
               <div class="col-md-6">
                  <div class="contact_2lil">
                        <h6 class="fw-bold font_14 mb-2">Height</h6>
                        <input class="form-control rounded_10 border-0 bg-light" placeholder="cm" type="text" name="size" id="size" value="<?php  echo $row['Height'];?>">
                       </div>
                  </div>
                <div class="col-md-6">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-2">Age</h6>
                  <input class="form-control rounded_10 border-0 bg-light" type="text" name="area" id="area" placeholder="Years" value="<?php  echo $row['Height'];?>">
                 </div>
                </div>
               </div>

               <div class="contact_2li row mt-4">
               
                
                <div class="col-md-6">
                 <div class="contact_2lil">
                  <h6 class="fw-bold font_14 mb-2">Sale Price - Rs (If Sale)</h6>
                  <input class="form-control rounded_10 border-0 bg-light" type="text" name="salerentprice" id="salerentprice" value="<?php  echo $row['RentorsalePrice'];?>">
                 </div>
                </div>
               </div>

               <div class="contact_2li row mt-4">
                <hr>
               <h6>Pet Colors</h6>
                    <div class="col-md-12">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-2">Select The Pet Colors</h6>
                            
                            <div class="detail_1l2 rounded_10 bg-white ">
                                
                                <div class="detail_1l2i row ">
                                <div class="col-md-4">
                                <div class="detail_1l2il">
                                    
                                    <h6>
                                    <?php  if($row['CenterCooling']=="1"){ ?>
                                        <input type="checkbox"  name="centercolling" id="centercolling" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="centercolling" id="centercolling" value="1">
                                            <?php } ?> Black</h6>
                                    
                                    <h6 class="mt-3">
                                    <?php  if($row['Balcony']=="1"){ ?><input type="checkbox" name="balcony" id="balcony" value="1" checked="true"> 
                                        <?php } else { ?>
                                        <input type="checkbox" name="balcony" id="balcony" value="1">
                                        <?php } ?>White</h6>

                                    <h6 class="mt-3">
                                    <?php  if($row['PetFriendly']=="1"){ ?>
                                        <input type="checkbox" name="petfrndly" id="petfrndly" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                            <?php } ?> Gray</h6>
                                        

                                    <h6 class="mt-3">
                                    <?php  if($row['Barbeque']=="1"){ ?>
                                        <input type="checkbox" name="barbeque" id="barbeque" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                            <?php } ?> Pink</h6>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="detail_1l2il">
                                    <h6>
                                    <?php  if($row['FireAlarm']=="1"){ ?>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                            <?php } ?>Brown</h6>

                                    <h6 class="mt-3">
                                    <?php  if($row['Storage']=="1"){ ?>
                                        <input type="checkbox" name="storage" id="storage" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="storage" id="storage" value="1">
                                            <?php } ?>Orange</h6>

                                    <h6 class="mt-3">
                                    <?php  if($row['Dryer']=="1"){ ?>
                                        <input type="checkbox" name="dryer" id="dryer" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="dryer" id="dryer" value="1">
                                            <?php } ?>Blue</h6>

                                    <h6 class="mt-3">
                                    <?php  if($row['Heating']=="1"){ ?>
                                        <input type="checkbox" name="heating" id="heating" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="heating" id="heating" value="1">
                                            <?php } ?> Green</h6>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="detail_1l2il">
                                    <h6>
                                    <?php  if($row['Pool']=="1"){ ?>
                                        <input type="checkbox" name="pool" id="pool" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="Pool" id="Pool" value="1">
                                            <?php } ?>Purple</h6>

                                    <h6 class="mt-3 mb-0">
                                    <?php  if($row['Laundry']=="1"){ ?>
                                        <input type="checkbox" name="laundry" id="laundry" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="laundry" id="laundry" value="1">
                                            <?php } ?> Yellow</h6>

                                    <h6 class="mt-3 mb-0">
                                    <?php  if($row['Sauna']=="1"){ ?>
                                        <input type="checkbox" name="sauna" id="sauna" value="1" checked="true"> 
                                        <?php } else { ?>
                                            <input type="checkbox" name="sauna" id="sauna" value="1">
                                            <?php } ?>Dark</h6>
                                    <h6 class="mt-3 mb-0">
                                    <?php  if($row['ModernKitchen']=="1"){ ?>
                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                            <?php } ?> Red</h6>

                                </div>
                                </div>
                                </div>
                            </div>
                            

                        </div>
                        </div>
                </div>

                <div class="contact_2li row mt-4">
                    <hr>
               <h6>Pet Gender</h6>
                    <div class="col-md-12">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-2">Select The Gender</h6>
                            
                            <div class="detail_1l2 rounded_10 bg-white ">
                                
                                <div class="detail_1l2i row ">

                                <div class="col-md-4">
                                    <div class="detail_1l2il">
                                        <h6>
                                        <?php  if($row['DishWasher']=="1"){ ?><input type="checkbox" name="dishwasher" id="dishwasher" value="1" checked="true">
                                            <?php } else { ?>
                                            <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                            <?php } ?> Male</h6>
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="detail_1l2il">
                                        <h6>
                                        <?php  if($row['EmergencyExit']=="1"){ ?>
                                            <input type="checkbox" name="eexit" id="eexit" value="1" checked="true"> 
                                            <?php } else { ?>
                                            <input type="checkbox" name="eexit" id="eexit" value="1">
                                            <?php } ?>Female</h6>
                                        
                                    </div>
                                </div>
                               
                                
                                </div>
                            </div>
                            

                        </div>
                        </div>
                </div>

                <div class="contact_2li row mt-4">
                    <hr>
               <h6>Pet Gallary</h6>
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-2">Featured Image *</h6>
                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['FeaturedImage'];?>">
                            <a class="button mt-2" href="changeimage.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>
                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-2">Gallery Image 1 *</h6>
                      <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['GalleryImage1'];?>">
                      <a class="button mt-2" href="changeimage1.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>
                    </div>
                    </div>
                   </div>
                
                   <div class="contact_2li row mt-4">
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-2">Gallery Image 2 *</h6>
                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['GalleryImage2'];?>">
                            <a class="button mt-2" href="changeimage2.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-2">Gallery Image 3 *</h6>
                      <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['GalleryImage3'];?>">
                      <a class="button mt-2" href="changeimage3.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>                     </div>
                    </div>
                   </div>
                   <div class="contact_2li row mt-4">
                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <h6 class="fw-bold font_14 mb-2">Gallery Image 4 *</h6>
                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['GalleryImage4'];?>">
                            <a class="button mt-2" href="changeimage4.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>                        </div>
                        </div>
                    <div class="col-md-6 mt-2">
                     <div class="contact_2lil">
                      <h6 class="fw-bold font_14 mb-2">Gallery Image 5 *</h6>
                      <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" class="rounded" width="200" height="150" value="<?php  echo $row['GalleryImage5'];?>">
                      <a class="button mt-2" href="changeimage5.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit Image</a>                     </div>
                    </div>
                   </div>   


                   <div class="contact_2li row mt-4">
                    <hr>
                    <h6>Pet's Location Details</h6>

                    <div class="col-md-6 mt-2">
                      <h6 class="fw-bold font_14 mb-1">District</h6>
                      <select class="form-select border-0 rounded_10 bg-light" aria-label="Default select example" id="bedrooms" name="bedrooms" >
                      <option value="<?php echo $row['Bedrooms'];?>"><?php echo $row['Bedrooms'];?></option>
              <?php $query2=mysqli_query($con,"select * from tblpropertydistrict");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>      
                  <option value="<?php echo $row2['PropertDistrict'];?>"><?php echo $row2['PropertDistrict'];?></option>
                  <?php } ?>
                      </select>
                      
                    </div>
                    <div class="col-md-6 mt-2">
                                <div class="contact_2lil">
                                    <h6 class="fw-bold font_14 mb-1">City</h6>
                                    <input class="form-control rounded_10 border-0 bg-light" name="address" id="address" value="<?php  echo $row['Address'];?>" type="text">
                                </div>
                    </div>

                    
                    
                   </div>
                

                <div class="contact_2li row mt-2">

                    <div class="col-md-6 mt-2">
                        <div class="contact_2lil">
                            <div class="col-md-12">
                                    <h6 class="fw-bold font_14 mb-1">Nearby Place</h6>
                                    <input class="form-control rounded_10 border-0 bg-light" placeholder="Enter Nearby Place" type="text" value="<?php  echo $row['Neighborhood'];?>" name="neighborhood" id="neighborhood">
                            </div>
                        </div>
                    </div>
                    
                   </div>
                   <div class="contact_2li row mt-4">
                    <hr>
                    <h6>Contact Details</h6>

                    <div class="col-md-6 mt-2">
                        
                            
                                <div class="contact_2lil">
                                    <h6 class="fw-bold font_14 mb-1">Mobile Number</h6>
                                    <input class="form-control rounded_10 border-0 bg-light" name="bathrooms" id="bathrooms" placeholder="Enter your Mobile Number" value="<?php  echo $row['Bathrooms'];?>" type="text">
                                </div>
                            
                        
                    </div>

                    
                   </div>
                   <?php } ?>
                   <hr>
                   <h6>Submit Update Your Post Or Pet Details</h6>
               <div class="contact_2li row">
                <div class="col-md-12">
                 <div class="contact_2lil">                  
                  <h6 class="mb-0 center_sm">
                    <div class="align-items-center">
                    <input class="border-0 center_sm button_2 d-block text-center" type="submit" value="Save Edit" name="submit">
                    </div>
                 </div>
                </div>
               </div>
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
} 
?>
     <?php if($row1['UserType']=="1"){?>
                                <h5>You Are An Owner</h5>
                            <?php } else{ ?>
                             <h5>You Are A Blogger</h5>
                         <?php } ?>
		  <hr>
		  <div class="detail_1r1i  detail_1l4i1l">
			    <span><img src="assets/logo/user.png" alt="abc" class="rounded-circle me-3 float-start"></span>
		   <h6 class="mb-0 fw-bold  lh-base"> <?php echo $fname;?> <br> <span class="text-muted font_14 fw-normal"> <span class="text-warning me-1">
			</h6>
			  </div>
      
		 <h6 class="mt-4 fw-bold">Name <span class="pull-right fw-normal"><?php echo $fname;?></span></h6><hr>
		  <h6 class="fw-bold">Email<span class="pull-right fw-normal"><?php echo $uemail;?></span></h6><hr>
		   <h6 class="fw-bold">Phone <span class="pull-right fw-normal"><?php echo $mnumebr;?></span></h6><hr>
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

</body>

</html>
<?php } ?>