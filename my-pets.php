<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  } else{

if(isset($_GET['del']))
{
mysqli_query($con,"delete from tblproperty where ID ='".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='my-pets.php'</script>";
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
    <title>Pet Zone - My Pets</title>

</head>
<?php include_once('includes/header.php');?>	

<body>


<section id="center" class="center_myblog_dt">
   <div class="center_om bg_backo">
     <div class="container-xl">
  <div class="row center_o1 m-auto text-center">
     <div class="col-md-12">
	       <h2 class="text-white">My Pets</h2>
		  <h6 class="text-white mb-0 mt-3"><a class="text-white" href="index.php">Home</a> <span class="mx-2 text-warning">/</span>My Pets </h6>
	 </div>
  </div>
 </div>
   </div>   
</section>

<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
	  <div class="col-md-4">
	    <div class="blog_1dt">
		  
		  
        <?php include_once('includes/sidebar.php');?>
			
		  
		  
		</div>
	  </div>


	  <div class="col-md-8 mt-1">
	  
      
      <?php
                      $uid=$_SESSION['remsuid'];
$query=mysqli_query($con,"select * from tblproperty where UserID='$uid'");
$num=mysqli_num_rows($query);
if($num>0){
while($row=mysqli_fetch_array($query))
{
?>
      <div class="agent_dt1 row mx-0 p-4 mt-1 px-3 bg-white shadow_box">
	   <div class="col-md-3">
	    <div class="agent_dt1l">
        <a href="single-pets-detail.php?proid=<?php echo $row['ID'];?>">
		  <img src="propertyimages/<?php echo $row['FeaturedImage'];?>" alt="FeaturedImage" class="w-100 rounded_10" alt="abc">
        </a>
		</div>
	   </div>
	   <div class="col-md-9 ">
	    <div class="agent_dt1r">
		  <div class="agent_dt1ri row">
		   <div class="col-md-4">
		    <div class="agent_dt1ril ">
			  
			 <h4 class="mt-0"><?php echo $row['PropertyTitle'];?></h4>
			 <h6 class="text-muted"><i class="fa fa-calendar me-1" aria-hidden="true"></i><?php  echo $row['ListingDate'];?></h6>
             <h6 class="text-muted "><i class="fa fa-user-plus me-1"></i>Status :<span class="col_blue fw-bold">&nbsp;<?php echo $row['Status'];?></span></h6>

            </div>
		   </div>
		   <div class="col-md-8">
		    <div class="agent_dt1rir text-end">
			  <ul class="mb-0 mt-2">
              <li class="d-inline-block "><a class="button" href="edit-pets.php?editid=<?php echo $row['ID'];?>"><i class="fa fa-pencil me-1 align-middle fs-5"></i>Edit</a></li> 
              <li class="d-inline-block "><a class="button" href="my-pets.php?id=<?php echo $row['ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash me-1 align-middle fs-5"></i>Delete</a></li>
		</ul>
			</div>
		   </div>
		  </div><hr class="mt-2 mb-2">
		  <div class="agent_dt1ri1 row">
		   <div class="col-md-4">
		     <div class="agent_dt1ri1i">
			   <ul class="mb-0">
			 <li class="font_14"><span class="fw-bold">Pet Type :</span> <?php echo $row['Type'];?></li>
			</ul>
			 </div>
		   </div>
		   
		   
		  </div>
		</div>
	   </div>
	 </div>


     <?php } } else { ?>
   <h3 style="color:red" align="center"> No Pet added yet </h3>
        <?php } ?>    




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