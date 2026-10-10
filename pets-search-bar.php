<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Get the search query
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if ($query) {
    // Prepare and execute the search query
    $sql = "SELECT * FROM tblproperty 
            WHERE PropertyTitle LIKE :query 
            OR PropertyDescription LIKE :query 
            OR ListingDate LIKE :query
            ORDER BY ListingDate DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => "%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = [];
}

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

<?php include_once('includes/header-search-bar.php');?>





<section id="blog" class="p_3 bg-light">
   <div class="container-xl">
	 <div class="blog_1 row">
		


		 
		 
	
	  <div class="col-md-12">
	    <div class="blog_1dt">
		  
		  
		  
		  <div class="blog_1dt4 mt-4">
		   <div class="blog_1 row">

		   
    <?php if ($results): ?>
        <ul>
            <?php foreach ($results as $result): ?>
                <li>
                    <h2><?php echo htmlspecialchars($result['PropertyTitle']); ?></h2>
                    <p>Listed on: <?php echo htmlspecialchars($result['ListingDate']); ?></p>
                    <a href="property-details.php?id=<?php echo htmlspecialchars($result['ID']); ?>">View Details</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found for "<?php echo htmlspecialchars($query); ?>".</p>
    <?php endif; ?>
			
		  
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
</body>

</html>
