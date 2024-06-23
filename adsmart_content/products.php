<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
 
 <!-- AdSmart  header  --> 

			
<div class="small-container">
		<div class="row row-2">
			<h2> All Advertisement Service Providers</h2> <br>	
			 <select class="product_select">
					<option>Default Shorting </option>
					<option>Sort by price </option>
					<option>Sort by advertisement type </option>
					<option>Sort by rating </option>
					<option>Sort by country </option>
					<option>Sort by targeted customers </option>
			</select>
			</div>	
		</div>
  <?php 
  $type_id = $_GET['ads_id'];
  
  $sql2 = "SELECT *
          from adsmart_category where id = '$type_id'";
  $res2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($res2);
  $category_name = $row2['category_name'];
  $display_name =$row2['display_name'];
  if(isset($display_name)){
			              echo "<div class='row'>";   
			           Echo "<h2>AdSmart Service Item on Your Search:";
			           echo "<b style='color:green;'>".$display_name."</b> </h2>"; 
			          echo "</div>";
			             }
			             
			             ?>			
				<div class="row">
<?php 


			     //create sql query to display categories from db
			     $sql = "
select *
From(
select *,
CASE WHEN print_ads = 1 THEN 'print_ads' ELSE print_ads END as print_ads1,
CASE WHEN outdoor_ads = 1 THEN 'outdoor_ads' ELSE outdoor_ads END as outdoor_ads1,
CASE WHEN broadcast_ads = 1 THEN 'broadcast_ads' ELSE broadcast_ads END as broadcast_ads1,
CASE WHEN telemarketing_ads = 1 THEN 'telemarketing_ads' ELSE telemarketing_ads END as telemarketing_ads1,
CASE WHEN events_ads = 1 THEN 'events_ads' ELSE events_ads END as events_ads1,
CASE WHEN placement_ads = 1 THEN 'placement_ads' ELSE placement_ads END as placement_ads1,
CASE WHEN display_ads = 1 THEN 'display_ads' ELSE display_ads END as display_ads1,
CASE WHEN social_ads = 1 THEN 'social_ads' ELSE social_ads END as social_ads1,
CASE WHEN search_ads = 1 THEN 'search_ads' ELSE search_ads END as search_ads1,
CASE WHEN video_ads = 1 THEN 'video_ads' ELSE video_ads END as video_ads1,
CASE WHEN native_ads = 1 THEN 'native_ads' ELSE native_ads END as native_ads1,
CASE WHEN influencer_ads = 1 THEN 'influencer_ads' ELSE influencer_ads END as influencer_ads1
from adsmart_business_partner) t 
where print_ads1 ='$category_name' or outdoor_ads1 ='$category_name' or broadcast_ads1 ='$category_name' or telemarketing_ads1 ='$category_name' or events_ads1 ='$category_name'
or placement_ads1 ='$category_name' or display_ads1 ='$category_name' or social_ads1 ='$category_name' or search_ads1 ='$category_name' or video_ads1 ='$category_name'
or native_ads1 ='$category_name' or influencer_ads1 ='$category_name' 
                          ";
			    
			     //execute query
			     $res = mysqli_query($conn, $sql);
			     
			     //count rows to check whether category is available or not
			     $count =mysqli_num_rows($res);
			     
			     if($count >0){
			         
			         //categories available
			         while($row =mysqli_Fetch_assoc($res)){
			             
			             //Get the values like id
			            
			             $company_name=$row['company_name'];
			             $country=$row['country'];
			             $image_name=$row['image_name'];
			             $desc= $row['description'];
			             $shop_code= $row['shop_code'];
			             $print_ads =$row['print_ads1'];
			             $outdoor_ads = $row['outdoor_ads1'];
			             $broadcast_ads = $row['broadcast_ads1'];
			             $telemarketing_ads = $row['telemarketing_ads1'];
			             $events_ads = $row['events_ads1'];
			             $placement_ads = $row['placement_ads1'];
			             $display_ads = $row['display_ads1'];
			             $search_ads = $row['search_ads1'];
			             $social_ads = $row['social_ads1'];
			             $video_ads = $row['video_ads1'];
			             $native_ads = $row['native_ads1'];
			             $influencer_ads = $row['influencer_ads1']
			             ?>
			           
			             
			             				
						<div class="col-4">
			             <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/images/company/<?php  echo $image_name;?>" alt="AdSmart Business Partner">
                                <?php
                                }
                            ?>
                            <br>
							<h1><?php echo $company_name;?></h1>
							<p class="p-2">Country: <b class="p-2"><?php echo $country;?></b></p>
							<p ><b class="p-2">Advertisement Type:</b></p>
							<p >
							<?php 
							if($print_ads == 'print_ads'){
							    
							    echo "<b class='btn-backend-1'>Print Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($outdoor_ads == 'outdoor_ads'){
							    
							    echo "<b class='btn-backend-1'>Outdoor Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($broadcast_ads == 'broadcast_ads'){
							    
							    echo "<b class='btn-backend-1'>Broadcast Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($telemarketing_ads == 'telemarketing_ads'){
							    
							    echo "<b class='btn-backend-1'>Telemarketing Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($events_ads == 'events_ads'){
							    
							    echo "<b class='btn-backend-1'>Events Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($placement_ads == 'placement_ads'){
							    
							    echo "<b class='btn-backend-1'>Placement Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($display_ads == 'display_ads'){
							    
							    echo "<b class='btn-backend-2'>Display Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($search_ads == 'search_ads'){
							    
							    echo "<b class='btn-backend-2'>Search Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($social_ads == 'social_ads'){
							    
							    echo "<b class='btn-backend-2'>Social Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($video_ads == 'video_ads'){
							    
							    echo "<b class='btn-backend-2'>Video Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($native_ads == 'native_ads'){
							    
							    echo "<b class='btn-backend-2'>Native Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($influencer_ads == 'influencer_ads'){
							    
							    echo "<b class='btn-backend-2'>Influencer Ads</b>&nbsp;";
							}
							
							?>							
							</p>
							 <b>Description:	</b> <p style="color:blue;">  <?php echo $desc;?>	<p>		
			               <a href="<?php echo SITEURL;?>product-detail.php?shop_id=<?php  echo $shop_code;?>"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
                            
                            </div>
                                
                       
                           
                			             
			             
			             
			             <?php 
			         }
			         
			     }else{
			         
			         //No shop are avilable
			         echo "<div class='error'> No shops are available. </div>";
			     }
			
			?>
			    </div>
				
			<div class="row">
				<div class="ads-btn">
					<a href="products.php"><span>1</span></a>
					<a href="products2.php"><span>2</span></a>
					<span>3</span>
					<span>4</span>
					<span>&#8594;</span>
				</div>		
		</div>
	



  <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>