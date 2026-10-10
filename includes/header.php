<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



?>

<section id="header">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow_box" id="navbar_sticky">
  <div class="container-xl">
    <a class="text-black p-0 navbar-brand fw-bold logo_position_rel" href="index.php"><img id="Logo" width="50" height="50" src="assets/logo/petzone.png">&nbsp;<span class="col_red">Pet Zone.lk</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	   <ul class="navbar-nav mb-0 nav_left">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Home</a>
        </li>
		 
		<li class="nav-item">
          <a class="nav-link" href="about.php">About </a>
        </li>
		
		<li class="nav-item">
			<a class="nav-link" href="pets-grid.php">Pets </a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="blog.php">Blog </a>
		</li>

    <li class="nav-item">
			<a class="nav-link" href="gallary.php">Gallary</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="contact.php">Contact </a>
		</li>
        <li class="nav-item dropdown">
        <?php if (strlen($_SESSION['remsuid']!=0)) {?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Account
          </a>
          <ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item border-0" href="myprofile.php"> User Profile</a></li>
            <li><a class="dropdown-item border-0" href="change-password.php">Change Password</a></li>            
            <li><a class="dropdown-item border-0" href="logout.php"> Logout</a></li>

          </ul>
          <?php } ?>
        </li>
        <?php if (strlen($_SESSION['remsuid']==0)) {?>
            <?php } ?>                
                            
	   </ul>	
        
		
      <ul class="navbar-nav mb-0 ms-auto">
		<li class="nav-item">
        <?php if (strlen($_SESSION['remsuid']==0)) {?> 
			<a class="nav-link" href="signin.php">Login</a>
            <?php } ?>
		</li>
    <li class="nav-item">
        <?php if (strlen($_SESSION['remsuid']==0)) {?> 
			<a class="nav-link" href="signup.php">Register</a>
            <?php } ?>
		</li>
          
          <?php 
        if (strlen($_SESSION['ut']!=3)) {
             ?>
		<li class="nav-item">
          <a class="nav-link button mx-3" href="add-pets.php"><i class="fa fa-user-plus me-1"></i> Add Pet  </a>
        </li>
        <?php  }
                       ?>
      </ul>
    </div>
  </div>
</nav>
</section>        
