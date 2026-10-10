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
<section id="center" class="center_h">
   <div class="center_om ">
     <div class="container-xl">
  <div class="row center_h1">
     <div class="col-md-12">
	    <h1 class="text-white font_50">Pets <br> <span class="col_blue">Help Post Buy Sell</span> 100 % Free..</h1>
<ul class="mb-0 mt-4">
		  <li class="d-inline-block"><a class="button" href="gallary.php"><i class="fa fa-picture-o me-1 align-middle fs-5"></i> Gallary  </a></li>
		  <?php if (strlen($_SESSION['remsuid']==0)) {?> 
            
		  <li class="d-inline-block ms-2"><a class="button_1" href="signup.php"><i class="fa fa-sign-in me-1 fs-5 align-middle"></i> Register </a></li>
		  <?php } ?>
		</ul>

	 </div>
  </div>


  <div class="row center_h2 mt-4 rounded_10 bg-white p-4 px-3 mx-0 ">
   <div class="col-md-8">
   <form method="post" name="search" action="pets-search.php">

    <div class="center_h2l">
	 <div class="center_h2li row ">
	  
	 <div class="col-md-4">
	    <div class="center_h2lil">
			<select class="form-select border-0 rounded_10 bg-light"  name="bedrooms" id="bedrooms" required="true">
				<option value="">Select District</option>
				<?php
$query=mysqli_query($con,"select distinct Bedrooms from  tblproperty");
while($row=mysqli_fetch_array($query))
{
?>

<option value="<?php echo $row['Bedrooms'];?>"><?php echo $row['Bedrooms'];?></option>
                  <?php } ?>
			</select>
		   </div>
	   </div>

	   <div class="col-md-4">
	    <div class="center_h2lil">
			<select class="form-select border-0 rounded_10 bg-light" name="type" id="type" required="true">
			<option value="">Select Pet Type</option>
			<?php
			 $query1=mysqli_query($con,"select distinct Type from tblproperty");

              while($row1=mysqli_fetch_array($query1))
              {
              ?>      
                  <option value="<?php echo $row1['Type'];?>"><?php echo $row1['Type'];?></option>
                  <?php } ?>
			</select>
		</div>
	   </div>

	   

		<div class="col-md-4">
			<div class="center_h2lil">
				<div class="center_h2lil">
					<select class="form-select border-0 rounded_10 bg-light" name="status" id="status" required="true">
					<option value="">Select Any Status</option>
 
<?php
$query2=mysqli_query($con,"select distinct Status from  tblproperty WHERE Status IN ('free', 'help', 'sale', 'missing')");
while($row2=mysqli_fetch_array($query2))
{
?>
                                        <option value="<?php echo $row2['Status'];?>"><?php echo $row2['Status'];?></option>
                                        <?php } ?>
					</select>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>

   <div class="col-md-4 ">
    <div class="center_h2r d-flex justify-content-center align-items-center">
	 <div class="center_h2ri  row">


	  <div class="col-md-2">
	   
	    <span>
			
        <input type="submit" name="search" type="submit" class="border-0 center_sm button_2 d-block" value="FIND  YOUR PET ">
      </a></span>
			</div>

			</div>
			</div>
		</div>
		</div>
		</div>
		</form>
		</div>   
 </section>
 
 



    
    

        
      
   


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
