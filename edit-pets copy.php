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
    echo '<script>alert("Pet detail has been updated.")</script>';
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

<head>
 
    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="icon" href="assets/images/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Edit Pet Details</title>
    
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
          <hr />
        <!-- Page Title #1
============================================ -->
        <section id="page-title" style="margin-top:-3%" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/bg1.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Manage Pet Details</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Add Pet</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->
        <section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

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

?>           <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Pet Description</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-title">Pet Title*</label>
                                            <input type="text" class="form-control" name="propertytitle" id="propertytitle" required='true' value="<?php  echo $row['PropertyTitle'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="property-description">Pet Description*</label>
                                            <textarea class="form-control" name="propertydescription" id="propertydescription" rows="2" readonly="true"><?php  echo $row['PropertDescription'];?></textarea>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-type">Type</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select id="selecttype" name="selecttype" required="true">
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
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-status">Status</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
                                                <select id="status" name="status">
                                                    <option value="<?php  echo $row['Status'];?>"><?php  echo $row['Status'];?></option>
                                            <option>Free</option>
                                            <option>Help</option>
                                            <option>Sale</option>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" required="true" value="<?php  echo $row['Location'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Area">Age (years):</label>
                                            <input type="text" class="form-control" name="area" id="area" required="true" value="<?php  echo $row['Height'];?>">
                                        </div>
                                    </div>
                                
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Size">Height(cm):</label>
                                            <input type="text" class="form-control" name="size" id="size" required="true" value="<?php  echo $row['Height'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                        
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Sale-Rent-Price">Sale Price</label>
                                            <input type="text" class="form-control" name="salerentprice" id="salerentprice" required="false" value="<?php  echo $row['RentorsalePrice'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    
                                    
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Pet Color And Gender</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Black</span>
                                        <?php  if($row['CenterCooling']=="1"){ ?>
                                        <input type="checkbox" name="centercolling" id="centercolling" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="centercolling" id="centercolling" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>White</span>
                                        <?php  if($row['Balcony']=="1"){ ?>
                                        <input type="checkbox" name="balcony" id="balcony" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="balcony" id="balcony" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Gray</span>
                                        <?php  if($row['PetFriendly']=="1"){ ?>
                                        <input type="checkbox" name="petfrndly" id="petfrndly" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="petfrndly" id="petfrndly" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Pink</span>
                                        <?php  if($row['Barbeque']=="1"){ ?>
                                        <input type="checkbox" name="barbeque" id="barbeque" value="1"checked='true'>
                                        <?php } else { ?>
                                            <input type="checkbox" name="barbeque" id="barbeque" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Brown</span>
                                         <?php  if($row['FireAlarm']=="1"){ ?>
                                        <input type="checkbox" name="firealarm" id="firealarm" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="firealarm" id="firealarm" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Red</span>
                                        <?php  if($row['ModernKitchen']=="1"){ ?>
                                        <input type="checkbox" name="modkitchen" id="modkitchen" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="modkitchen" id="modkitchen" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Orange</span>
                                        <?php  if($row['Storage']=="1"){ ?>
                                        <input type="checkbox" name="storage" id="storage" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="storage" id="storage" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Blue</span>
                                         <?php  if($row['Dryer']=="1"){ ?>
                                        <input type="checkbox" name="dryer" id="dryer" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="dryer" id="dryer" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Green</span>
                                        <?php  if($row['Heating']=="1"){ ?>
                                        <input type="checkbox" name="heating" id="heating" value="1" checked="true">
                                         <?php } else { ?>
                                            <input type="checkbox" name="heating" id="heating" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Purple</span>
                                        <?php  if($row['Pool']=="1"){ ?>
                                        <input type="checkbox" name="pool" id="pool" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="Pool" id="Pool" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Yellow</span>
                                        <?php  if($row['Laundry']=="1"){ ?>
                                        <input type="checkbox" name="laundry" id="laundry" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="laundry" id="laundry" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Dark</span>
                                        <?php  if($row['Sauna']=="1"){ ?>
                                        <input type="checkbox" name="sauna" id="sauna" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="sauna" id="sauna" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    
                                    <!-- .col-md-3 end -->
                                    
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Male</span>
                                        <?php  if($row['DishWasher']=="1"){ ?>
                                        <input type="checkbox" name="dishwasher" id="dishwasher" value="1" checked="true">
                                        <?php } else { ?>
                                            <input type="checkbox" name="dishwasher" id="dishwasher" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <div class="input-checkbox">
                                            <label class="label-checkbox">
                                        <span>Female</span>
                                        <?php  if($row['EmergencyExit']=="1"){ ?>
                                        <input type="checkbox" name="eexit" id="eexit" value="1" checked>
                                        <?php } else { ?>
                                            <input type="checkbox" name="eexit" id="eexit" value="1">
                                            <?php } ?>
                                        <span class="check-indicator"></span>
                                    </label>
                                        </div>
                                    </div>
                                    <!-- .col-md-3 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Pet Gallery</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Featured Image</label>
                                            <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" width="200" height="150" value="<?php  echo $row['FeaturedImage'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image1</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage1'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage1'];?>"><a href="changeimage1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image2</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage2'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage2'];?>"><a href="changeimage2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image3</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage3'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage3'];?>"><a href="changeimage3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                      <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image4</label>
                                            <img src="propertyimages/<?php echo $row['GalleryImage4'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage4'];?>"><a href="changeimage4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Gallery Image5</label>
                                           <img src="propertyimages/<?php echo $row['GalleryImage5'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage5'];?>"><a href="changeimage5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                    </div>
                                    <!-- .col-md-12 end -->

                                </div>
                                <!-- .row end -->
                            </div>
                            <!-- .form-box end -->

                            <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Pet Location</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address*</label>
                                            <input type="text" class="form-control" name="address" id="address" required="true" value="<?php  echo $row['Address'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="select-country">Country</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
     <select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-select border-0 rounded_10 bg-light">
<option value="<?php  echo $row['cid'];?>"><?php  echo $row['CountryName'];?></option>
<?php $query=mysqli_query($con,"select * from tblcountry");
while($row1=mysqli_fetch_array($query))
{
              ?>      
<option value="<?php echo $row1['ID'];?>"><?php echo $row1['CountryName'];?></option>
                  <?php } ?>
                                         </select>
                                            </div>
                                        </div>
                                    </div>

   <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                             <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
 <select type="text" class="form-control" name="state" id="state" onChange="getcity(this.value)" >
<option value="<?php  echo $row['sid'];?>"><?php  echo $row['StateName'];?></option>
        
</select>
                                        </div>
                                    </div>
                                    </div>

                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <div class="select--box">
                                                <i class="fa fa-angle-down"></i>
  <select class="form-control" name="city" id="city">
<option value="<?php  echo $row['City'];?>"><?php  echo $row['City'];?></option>
</select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                 
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="Zip/Postal-code">Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" required="true" value="<?php  echo $row['ZipCode'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="neighborhood">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood" id="neighborhood" required="true" value="<?php  echo $row['Neighborhood'];?>">
                                        </div>
                                    </div>
                                    <!-- .col-md-4 end -->
                                    
                                    <!-- .col-md-12 end -->
                                </div>
                                <!-- .row end -->
                            </div>
                             <?php } ?>
                            <!-- .form-box end -->
                            <input type="submit" value="Save Edits" name="submit" class="btn btn--primary">
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        
        

        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php');?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
 <?php } ?>