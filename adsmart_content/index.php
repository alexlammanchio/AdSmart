
<?php  

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
  
<div class="small-container" >
			<div class="row" >
				<div class="col-2">
				
					<h1>Find Your Suitable <br>Advertisement Service Provider!</h1>
					<p> You can <b>find</b> any types of Advertisement Service Providers in <a href="#Ads_Provider" style="color:#051986;"><b>HERE.</b></a></p>
					<a href="products.php" class="btn" style="background:#051986;"> Explore Now</a>
					<div class="col-2">
					<h1>Join Us to be <br>Business Partner!</h1>
					<p> You can <b>sell</b> any types of Advertisement Providers in Here.<br>Click <a href="summary.php" style="color:#9adba6;"><b>Here</b></a> to view More Detail.</p>
					<a href="signUp.php" class="btn" style="background:#096f04;"> Join Us Now</a>					
				</div>						
				</div>	
							
				<div class="col-2" >
					<img src="../images/image1.png" >	
				</div>
						
			</div>		
</div>



<!------------- Learn About Our Services ----->
	<div class="services">
			<div class="small-container">
				<h2>Learn about our Services</h2>
				<div class="row">				
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/cs.jpg" style="height:200px">
					              <h4 style="color:#9198e5;">Customers Services</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>Customers can find their targeted advertisement service providers via AdSmart and can negotiate with them. </p>
					              <a
					                href="showcase.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9198e5">Detail</button> </a
					              >
					           
						</div>
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/join.jpg" style="height:200px">
					              <h4 style="color:#9adba6;">Business Partners</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>When Business Partners joined in AdSmart, then AdSmart will auto-match potential customers to business partners accordance to customer's requirements. </p>
					              <a
					                href="summary.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6">Detail</button> </a>
					           
						</div>						
				</div>		
			</div>
	</div>
	

<!------------- Excellent Advertisement Provider ----->	

			<div class="small-container">
				<h2 class="title" id="Ads_Provider">Excellent Advertisement Provider</h2>
				<div class="row">				
						<div class="col-4">
							<a href="product-detail.php"><img src="../images/product-w.png"></a>
							<h4>Macao Advertisement Company - W Company</h4>
							<p> <br>Service quality:</p>
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<br>
							<p> <b> Advertisement Types:</b> Bus Stop Advertisement Panel. </p>
								 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
							</div> 　							
							
						</div>
						<div class="col-4">
							<a href="product-detail.php"><img src="../images/product-b.jpg"></a>
							<h4>Macao Advertisement Company - B Company</h4>
							<p> <br>Service quality:</p>
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								<br>
								 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
							</div> 　							
							
						</div>						
						<div class="col-4">
							<a href="product-detail.php"><img src="../images/mango.jpg"></a>
							<h4>China Advertisement Company - TV Company</h4>
							<p> <br>Service quality:</p>
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>								
								<br>
								 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
							</div> 　							
							
						</div>
				</div>
				

<!-- New product -->
<h2 class="title">New Advertisement Service Providers</h2>
<div class="row">
<?php 

			     //create sql query to display categories from db
			     $sql = "SELECT *
                          FROM  adsmart_business_partner   
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
			             $id= $row['shop_code'];
			             $print_ads =$row['print_ads'];
			             $outdoor_ads = $row['outdoor_ads'];
			             $broadcast_ads = $row['broadcast_ads'];
			             $telemarketing_ads = $row['telemarketing_ads'];
			             $events_ads = $row['events_ads'];
			             $placement_ads = $row['placement_ads'];
			             $display_ads = $row['display_ads'];
			             $search_ads = $row['search_ads'];
			             $social_ads = $row['social_ads'];
			             $video_ads = $row['video_ads'];
			             $native_ads = $row['native_ads'];
			             $influencer_ads = $row['influencer_ads']
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
							if($print_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Print Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($outdoor_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Outdoor Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($broadcast_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Broadcast Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($telemarketing_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Telemarketing Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($events_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Events Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($placement_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Placement Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($display_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Display Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($search_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Search Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($social_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Social Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($video_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Video Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($native_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Native Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($influencer_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Influencer Ads</b>&nbsp;";
							}
							
							?>							
							</p>
							 <b>Description:	</b> <p style="color:blue;">  <?php echo $desc;?>	<p>		
			               <a href="<?php echo SITEURL; ?>explore-business.php?id=<?php echo $id; ?>"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
                            
                            </div>
                                
                       
                           
                			             
			             
			             
			             <?php 
			         }
			         
			     }else{
			         
			         //No shop are avilable
			         echo "<div class='error'> No shops are available. </div>";
			     }
			
			?>
			    </div>
				
				
			<!--  
				<div class="row">				
						<div class="col-4">
							<img src="../images/company-2.jpg">
							<h4>MANO Ads Company</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  China entertainment company. The company produces comedic videos in Chinese that can be between a few seconds to a few minutes. It has a dozen performing artists under management.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						</div>
						<div class="col-4">
							<img src="../images/company-3.jpg">
							<h4>US Company - ZAG Ads Company</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  ZAG are recognized for asking the right questions to unearth exactly where brands need to be. By starting with strategy, zag makes sure every campaign, social post, and line of copy is crafted with an aligned purpose, eye-catching design, and powerful creative.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						</div>
						<div class="col-4">
							<img src="../images/company-4.jpg">
							<h4>US Company - Creative Promotional Marketing Agency</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  CREATIVE is an experienced team of Overachievers, Creative Geniuses & Dog Lovers. They are also very effective BRAND STORYTELLERS!	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						
						</div>						
				</div>
				<div class="row">				
						<div class="col-4">
							<img src="../images/company-5.jpg">
							<h4>Hong Kong Company - IMPACT COMMUNICATIONS LTD.</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  Hong Kong Advertisement Comapny that it can provide full-service advertisement service. (Sucn ac Hong Kong Bus Advertisement service).	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						
						</div>
						<div class="col-4">							
							<img src="../images/company-6.jpg">
							<h4>Hong Kong Designer - Alex Lam</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  Hong Kong Famous Designer. I can provide Advertisement proposal accordance to client's requirement.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						
						</div>
					
						<div class="col-4">
							<img src="../images/company-8.jpg">
							<h4>CAFE E.S.KIMO </h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;"> CAFE E.S.KIMO is Macao cafe shop that its target customers are student, the older and can provide table advertisement service.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						
						</div>
				</div>
			-->
				<div class="row">
				<div class="ads-btn">
					<span>1</span>
					<span>2</span>
					<span>3</span>
					<span>4</span>
					<span>&#8594;</span>
				</div>		
				</div>
			</div>

<!--------------------- Promotion -------------->
	<div class="promotion">
		<h1>AdSmart Promotion Events</h1>
		<div class="small-container">
			<div class="row">			
				<div class="col-2">
				<b style="font-size: 34px;"> Promotion Provided by Special Advertisement Service Providers</b>
						<img src="../images/A_company.png" class="offer-img">
						</div>
						<div class="col-2">
						<br>
							<h3>A Company - Provide ADs Agency Services </h3>
							<br>
							<p>
								New Customers can <b style="font-size:22px; color:red;">save 15% cost</b> for any Ads Services.
								<br>Click the below Button to see more detail!!!!
							</p> <br>
							<a href="" class="btn" style="background:#9198e5"> More Detail</a>
						</div>			
			</div>
			
		</div>
<div style="text-align:center;">
		<div class="ads-btn">
					<span><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
					<span style="width:200px;">Find More Promotions </span>
					<span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
				</div>	
	</div>	
</div>

<!--------------------- testimonial -------------->
	<div class="bp_showcase">
		<div class="small-container" >
			<div style=" height:80px; text-align:center; padding-top:15px;">
			<h1>Customers Feedbacks</h1>
			</div>
			<br>
			<br>
			<div class="row">
					<div class="col-3">		
							<img src="../images/AdSmart_logo.png" class="cs_logo">	
							<p style="text-align:center; font-weight:bold; color:#061768;">AdSmart Customer</p>
							<p style="font-weight:bold; color:#061768;">Post Date: 2023-03-31 </p>				
							<p> I can find targeted advertisement service providers very easy!!!!!!</p>
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-1.png" >
							<h3 style="color:#061768;">Sean Parker</h3> 　		
						</div>
						<div class="col-3">		
							<img src="../images/AdSmart_logo.png" class="cs_logo">
							<p style="text-align:center; font-weight:bold; color:#061768;">AdSmart Customer</p>
							<p style="font-weight:bold; color:#061768;">Post Date: 2023-03-31 </p>							
							<p> Service charge fee is very low and I can compare different provider offer in AdSmart.</p>
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-2.png" >
							<h3 style="color:#061768;">Mike Smith</h3> 　		
						</div>
						<div class="col-3">		
							<img src="../images/AdSmart_logo.png">
							<p style="text-align:center; font-weight:bold; color:#061768;">AdSmart Customer</p>
							<p style="font-weight:bold; color:#061768;">Post Date: 2023-03-31 </p>					
							<p>AdSmart Platform can help me to promote our product to different area or country. AdSmart Platform is very nice platform for products promotion.</p>
							
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-3.png" >
							<h3 style="color:#061768;">Mablel Joe</h3> 　		
						</div>
			</div>
			<div class="row">
				<a href="" class="btn" style="background:#9198e5;"> Find More Feedbacks</a>
			</div>
		</div>
	</div>
<!--------------------- Awards and Certification  -------------->
	<div class="brands"style="background:#0C2290;">
	
	<h1 style="text-align: center; margin-top:20px; margin-buttom:25px; color:#fff;">Awards and Certification</h1>
		<div class="small-container">
			<div class="row">
					
					<div class="col-7" style="width:220px;">									
							<a href="adsmart_qualifications.php">
							<img src="../images/medal2.png" >	
							</a>
							<p> Macao Advertisement Service Awards 2023		</p>						　		
					</div>	
					<div class="col-7" style="width:220px;">
					<a href="adsmart_qualifications.php">									
							<img src="../images/medal3.png" >
							</a>
						<p> Macao IT Awards 2023		</p>			　		
					</div>	
					<div class="col-7" style="width:220px;">	
					<a href="adsmart_qualifications.php">								
							<img src="../images/medal4.png" >
							</a>
						<p> ISO 27701		</p>							　		
					</div>	
					<div class="col-7" style="width:220px;">	
					<a href="adsmart_qualifications.php">								
							<img src="../images/medal5.png">
							</a>
						<p> ISO 27001	</p>							　		
					</div>		
					<div class="col-7" style="width:220px;">	
					<a href="adsmart_qualifications.php">								
							<img src="../images/medal6.png">
							</a>
					<p> ISO 9001	</p>							　		
					</div>						
			</div>
		</div>
	</div>	
<!--------------------- Business Partners  -------------->
	
 <div class="exadp" id="adsmart_member">
		<div style=" height:100px; text-align:center; padding-top:15px; margin-bottom:15px;">
			<h1 style="color:#333; font-size:36px;">AdSmart Business Partners</h1>
			</div>
				<div class="row" id="adsmart_history">					
					<div class="col-2"  style="width:1300px;">	
       					<img src="../images/bp_showcase.jpg" >
       				</div>      				       			
       			</div>
	</div>			
	
	
<!-- 
	<div class="small-container" style="padding-bottom:80px;">
		<h2 class="title">Business Partners</h2>
				<div class="row" >	
						
						<img src="../images/bp_showcase.jpg">
						
				</div>	
							
								
</div>

 -->
<!--------------------- footer -------------->
	<?php  include('../partials-front/footer.php');?>