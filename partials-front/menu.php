<?php include('../config/constants.php'); 

 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AdSmart | Ecommerce Platform</title>
<link href="../css/style.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/checkbox.js"></script>

</head>
<body>
<div class="navbar">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#"><img src="../images/AdSmart_logo.png" style="width:60px; height:60px;"></a></div>
      <div class="logo"><a href="#">ADSMART</a></div>
        <ul class="links">
	         <li><a href="index.php" >Home</a></li>
	         <li><a href="products-category.php" >Products</a></li>
	          <li>
	            <a href="#" class="desktop-link">About US+</a>
	            <input type="checkbox" id="show-features">
	            <label for="show-features">ABOUT US+</label>
	            <ul>
	              <li><a href="profile.php" >AdSmart Profile</a></li>
				  <li><a href="summary.php" >AdSmart Summary</a></li>
				<li><a href="adsmart_qualifications.php" >AdSmart Qualifications</a></li>
				<li><a href="showcase.php" >AdSmart Showcase</a></li>
	            </ul>
	          </li>
	          <li><a href="contact.php" >Contact</a></li>
	          <li><a href="signUp.php" >Account</a></li>
	         <li><a href="cart.php" ><i class="fas fa-shopping-cart"></i></a></li>  
          
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>
	    <!-- Menu Section Ends -->