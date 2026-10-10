<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
$cid=$_GET['editid'];

//fetured Image
$pic=$_FILES["featuredimage"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}

else
{
//rename property images
$propic=md5($pic).time().$extension;

     move_uploaded_file($_FILES["featuredimage"]["tmp_name"],"propertyimages/".$propic);
   

    $query=mysqli_query($con,"update tblproperty set FeaturedImage='$propic' where ID='$cid'");
  
    if ($query) {
    $msg="Pet Image has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
 }
  ?>
<!DOCTYPE html>
<html lang="en">
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
	<link rel="icon" href="assets/logo/petzone.png" sizes="32x32" type="image/png">
    <title>Pet Zone - Change Image</title>

</head>
<?php include_once('includes/header.php');?>	

<body>



<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
	  


	  <div class="col-md-8 mt-1">
	  
      
      <form class="mb-0" method="post"  enctype="multipart/form-data">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblproperty where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      <div class="agent_dt1 row mx-0 p-4 mt-1 px-3 bg-white shadow_box">
	   <div class="col-md-3">
	    <div class="agent_dt1l">
        <a href="single-pets-detail.php?proid=<?php echo $row['ID'];?>">
		  <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="property image" class="w-100 rounded_10" alt="abc">
        </a>
		</div>
	   </div>
	   <div class="col-md-9 ">
	    <div class="agent_dt1r">
		  <div class="agent_dt1ri row">
		   <div class="col-md-4">
		    <div class="agent_dt1ril ">
			  
			 <h4 class="mt-0">Featured Image</h4>
			 <input type="file" class="form-control rounded_10 border-0 bg-light" name="featuredimage" required='true'>
            </div>
		   </div>
		   <?php } ?>
		   <div class="col-md-8 mt-3">
		    <div class="agent_dt1rir text-end">
			  <ul class="mb-0 ">
			  <input type="submit" value="Save Edit" name="submit" class="border-0 center_sm button_2 d-block text-center">		</ul>
			</div>
		   </div>
		  </div>
		  
		</div>
	   </div>
	 </div>


 
	
					
					
                  
                         
                    </form>


	  </div>
	 </div>
  </div>   
</section>
 


<?php include_once('includes/footer.php');?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>

<?php }  ?>