<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0 || $_SESSION['ut']==3)) {
  header('location:logout.php');
  } else{

if(isset($_GET['del']))
{
mysqli_query($con,"delete from tblenquiry where ID = '".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='enquiry.php'</script>";
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
    <title>Pet Zone - Enquiry</title>

</head>
<?php include_once('includes/header.php');?>	

<body>




<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
	  <div class="col-md-4">
	    <div class="blog_1dt">
		  
		  
        <?php include_once('includes/sidebar.php');?>
			
		  
		  
		</div>
	  </div>
	  <div class="col-md-8">
	   <div class="blog_1r">
	
       <div class="col-xs-12 col-sm-12 col-md-12">

                       
                           
  
                          
                           

<div class="form-box">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h4 class="form--title">Total Received Enquiry</h4>
            
            <table  id="dtBasicExample" class="table">
<thead>
            <tr>
                <tr>
<th>S.NO</th>


<th>Enquiry Number</th>
<th>Full Name</th>
<th>Mobile Number</th>

<th>Action</th>
</tr>
            </tr>
            </thead>
<?php
$uid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select tblenquiry.* from  tblenquiry join tblproperty on tblproperty.Id=tblenquiry.PropertyID where tblenquiry.Status is null and tblproperty.UserID='$uid' ");
$num=mysqli_num_rows($ret);
//if($num >0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<tr>
<td><?php echo $cnt;?></td>


<td><?php  echo $row['EnquiryNumber'];?></td>
<td><?php  echo $row['FullName'];?></td>
<td><?php  echo $row['MobileNumber'];?></td>

<td><a href="view-enquiry-detail.php?viewid=<?php echo $row['ID'];?>">View</a> |
<a href="enquiry.php?id=<?php echo $row['ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" style="color:red">Delete</a>

</td>
</tr>
<?php 
$cnt=$cnt+1;
} ?>
</table>             </div>
        

    </div>
   
</div>



</div>

		   
		
		 
		 
	   </div>
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