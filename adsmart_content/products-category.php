<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>

			
<div class="small-container">
<h2>AdSmart Traditional Advertisement Services</h2>
		<div class="row">
		
			<?php 
			
			     //create sql query to display categories from db
			     $sql = "SELECT * FROM adsmart_category where active='Yes' and advertisement_type='traditional' limit 6";
			     
			     //execute query
			     $res = mysqli_query($conn, $sql);
			     
			     //count rows to check whether category is available or not
			     $count =mysqli_num_rows($res);
			     
			     if($count >0){
			         
			         //categories available
			         while($row =mysqli_Fetch_assoc($res)){
			             
			             //Get the values like id
			             $id=$row['id'];
			             $title=$row['category_name'];
			             $image_name=$row['image_name'];
			             
			             ?>
			              <a href="<?php echo SITEURL;?>products.php?ads_id=<?php echo $id; ?>">
                           <div class="col-9" style="background:#fff;">	
                            <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/admin/images/category/<?php  echo $image_name;?>" alt="AdSmart Categories" style="height:200px">
                                <?php
                                }
                            ?>
                            <br>
                            <br>
                            <hr>
                            <br>
                                <h3 style="color:#000;"><?php  echo $title; ?></h3>
                            </div>
                            </a>
                			             
			             
			             
			             <?php 
			         }
			         
			         
			         
			         
			     }
			
			
			?>
				</div>		
		</div>
		
	<!--  Digital -->
	<div class="small-container" style="background:#fcfde1;">
<h2>AdSmart Digital Advertisement Services</h2>
		<div class="row">
		
			<?php 
			
			     //create sql query to display categories from db
			     $sql = "SELECT * FROM adsmart_category where active='Yes' and advertisement_type='digital' limit 6";
			     
			     //execute query
			     $res = mysqli_query($conn, $sql);
			     
			     //count rows to check whether category is available or not
			     $count =mysqli_num_rows($res);
			     
			     if($count >0){
			         
			         //categories available
			         while($row =mysqli_Fetch_assoc($res)){
			             
			             //Get the values like id
			             $id=$row['id'];
			             $title=$row['category_name'];
			             $image_name=$row['image_name'];
			             
			             ?>
			              <a href="<?php echo SITEURL;?>products.php?ads_id=<?php echo $id; ?>">
                           <div class="col-9" style="background:#fff;">	
                            <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/admin/images/category/<?php  echo $image_name;?>" alt="AdSmart Categories" style="height:200px">
                                <?php
                                }
                            ?>
                            <br>
                            <br>
                            <hr>
                            <br>
                                <h3 style="color:#000;"><?php  echo $title; ?></h3>
                            </div>
                            </a>
                			             
			             
			             
			             <?php 
			         }
			         
			         
			         
			         
			     }
			
			
			?>
				</div>		
		</div>



<!--------------------- footer -------------->
	  <?php  include('../partials-front/footer.php');?>