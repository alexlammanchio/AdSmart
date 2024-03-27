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
<script src="js/checkbox.js"></script>
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
	         <li><a href="<?php  echo SITEURL;?>index.php" >Home</a></li>
	         <li><a href="products-category.php" >Products</a></li>	        
	           <li>
	            <a href="#" class="desktop-link1">About US+</a>
	            <input type="checkbox" id="show-features1">
	            <label for="show-features1">ABOUT US+</label>
	            <ul>
	              <li><a href="<?php  echo SITEURL;?>profile.php" >AdSmart Profile</a></li>
				  <li><a href="<?php  echo SITEURL;?>summary.php" >AdSmart Summary</a></li>
				<li><a href="<?php  echo SITEURL;?>adsmart_qualifications.php" >AdSmart Qualifications</a></li>
				<li><a href="<?php  echo SITEURL;?>showcase.php" >AdSmart Showcase</a></li>
	            </ul>
	          </li>
	          
	          <li>
	            <a href="<?php  echo ADSMART_CUSTOMER;?>Adsmart_customers_personal_space.php" class="desktop-link">Personal Space</a>	            
	          </li>
	          
	         
	          
	          <li><a href="<?php  echo SITEURL;?>contact.php" >Contact</a></li>
	          
	          <li><a href="<?php  echo SITEURL;?>logout.php" >Logout</a></li>
	         <li><a href="<?php  echo SITEURL;?>cart.php" ><i class="fas fa-shopping-cart"></i></a></li>  
          
        </ul>
      </div>
      <label >
      <?php 
      $account_name = $_SESSION['user1'];
     
     
      $sql9 ="SELECT image_name, id FROM adsmart_customer where user_id='$account_name'";
     
      //execute the query
      $res9 = mysqli_query($conn, $sql9);
      $count9 =mysqli_num_rows($res9);    
      
      
      //check whether we have data in db or not
      if($count9>0){
      //check wether the query is executed or not
          while($rows=mysqli_fetch_assoc($res9))
          {
          
              $image_name9=$rows['image_name'];
              
        ?>
        <?php //check image is existed or not
    				if($image_name9!=""){
    				             
    				                    //display image
    				                ?>
    				                <img src="<?php  echo IMAGES;?>/images/customer/<?php echo $image_name9;?>" width="35px" height="35px" style="border-radius: 10px;">
    				                <?php 
    				                
    				                
    				                
    				            }else {
    				             
    				                echo "<div class='error'> image not existed </div>";
    				            }
    				            
    				            ?>
          
      <?php 
    				        }
      }
    				
    				?>
    			
    				 
      <a href="Adsmart_customers_personal_space.php" style="color:black; text-transform: uppercase;"><?php echo $_SESSION['user1']; ?> </a>
 
    
    
           
    				</label>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>
	    <!-- Menu Section Ends -->