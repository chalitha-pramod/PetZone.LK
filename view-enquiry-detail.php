<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status='Answer';
   $query=mysqli_query($con, "update  tblenquiry set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {
    $msg="All remarks has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
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
    <title>Pet Zone - Enquiry Details</title>
    
</head>

<?php include_once('includes/header.php');?>


<body>
          

        <section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblproperty.PropertyTitle,tblenquiry.* from tblenquiry join tblproperty on tblproperty.ID=tblenquiry.PropertyID where tblenquiry.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>        <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Enquiry Detail</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Full Name</th>
                                   <td><?php  echo $row['FullName'];?></td>
                                   </tr>  
                                   <tr>
                                <th>Pet Title</th>
                                   <td><?php  echo $row['PropertyTitle'];?></td>
                                   </tr>                           
<tr>
                                <th>Email</th>
                                   <td><?php  echo $row['Email'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>MobileNumber</th>
                                   <td><?php  echo $row['MobileNumber'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Message</th>
                                      <td><?php  echo $row['Message'];?></td>
                                  </tr>
                                      <tr>  
                                       <th>Enquiry Date</th>
                                        <td><?php  echo $row['EnquiryDate'];?></td>
                                    </tr>


<tr>
    <tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Unanswer Enquiry";
}
if($row['Status']=="Answer")
{
  echo "Answered Enquiry";
}

     ;?></td>
  </tr>
</table>

                                    </div>
   
                                </div>
               <table class="table mb-0" border="1">

<?php if(($row['Status']=="") and ($_SESSION['ut']=='1' || $_SESSION['ut']=="2")){ ?>


<form class="mb-0" method="post"  enctype="multipart/form-data" name="submit">
<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn--primary"></i> Update</button></td>
  </tr>
  </form>
<?php } else { ?>
<tr>
  <td colspan="2" style="text-align: center; color:blue"><strong>Helper / Owner Remark</strong></td>

</tr>
  <tr>
    <th>Remark</th>
    <td><?php if($row['Remark']==''):
    echo "Not Updated yet";
else:
echo $row['Remark'];
endif; ?></td>
  </tr>


<tr>
<th>Remark date</th>
<td><?php if($row['RemarkDate']==''):
    echo "Not Updated yet";
else:
echo $row['RemarkDate'];
endif; ?>

      </td></tr>
<?php } ?>
</table>


  

  

<?php } ?>

                           
                           
                       
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>  
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

<?php } ?>

