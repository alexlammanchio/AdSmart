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
<div class="small-container" >
				<div class="row">
					<div class="about_head">
						   <h1 style="font-size: 36px;">AdSmart Profile</h1>
						   
					</div>						
				</div>						
			</div>		
	
		
	<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#advsmart_value">AdSmart Value</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_beliefs">AdSmart Beliefs</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_aspiration">AdSmart Aspiration</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#management">Management Concept</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_new">AdSmart News</a></div>
			
	</div>

<!--             INTRODUCTIONS                          -->
		<div style="margin-left:10px; margin-right:10px;">
		<div class="row" id="adsmart_value">
						<div class="col-2" id="intro">
							 <h2 >AdSmart Value</h2>         
					          <p>
					            AdSmart Platform integrates all kind of advertisement service providers and provide bargain function for customers that they can use it to negotiate with advertisement service providers.
					            And AdSmart Platform make an advertisement price transparently and ensure every transactions under the law protection, so that customers don't need to worry service providers that they do not provide service after paid.
					            
					          </p>				
						</div>	
									
						<div class="col-2" id="intro-img">
							<img src="../images/value.png" style="width:500px; height:500px;">	
						</div>
								
			</div>	
</div>

<!--             Mission                                          -->
<div style="margin-left:10px; margin-right:10px;">
		<div class="row" style="background: #f2deff;" id="adsmart_beliefs">
							<div class="col-2" id="mission-img">
								<img src="../images/belief.png" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="mission-text">
								<h2 >AdSmart Beliefs</h2>         
						          <p>
						          		Hope every customers can find their targeted advertisement service providers in AdSmart and Hope every Business Partners to increase their profits because of AdSmart Platform.
						          </p>				
							</div>	
							
								
			</div>
</div>
     <!--            AdSmart  Customers                                          -->
<div style="margin-left:10px; margin-right:10px;">
		<div class="row" style="background: #d0f3ff;" id="adsmart_aspiration">
						<div class="col-2" id="intro">
							 <h2 id="customer">AdSmart Aspiration</h2>         
					          <p>		We hope to use AI function to optimize our search function that make customer to find targeted advertising service providers more accurate, promote AdSmart Platform to more country and can able to list in Hong Kong in the future.			          					            </p>			
						</div>	
									
						<div class="col-2" id="intro-img">
							<img src="../images/future.png" style="width:500px; height:500px;">	
						</div>
								
			</div>	
			</div>
    <!--            AdSmart Partners                                    -->   
       <div style="margin-left:10px; margin-right:10px;">
       <div class="row" style="background: #c4fbcd;" id="management">
							<div class="col-2" id="mission-img">
								<img src="../images/management_concept.png" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="mission-text">
								<h2>Management Concept</h2>         
						          <p>
						          		Caring for the growth of employees, providing a good working environment and incentive mechanism for employees, improving training system and career development channels , enabling employees to grow delightly with Weimob, full respect and trust for employees, giving them constantly guidance and encouragement to achieve the joy of success.
						          </p>				
							</div>	
							
								
			</div>
			</div>
       
     <!------------------           AdSmart News               -->
     
       <div class="blog" id="adsmart_new">
       			<div class="blog-post">
       			<h1>AdSmart News</h1>
       			</div>
       			<div class="blog-post">
       				<div class="blog-img">
       					<img src="../images/blog-img1.png" >
       				</div>
       				<div class="blog-info">
       					<b>Post Date: 2023-02-03 </b>
       					<br>
       					<br>
       					<h2>AdSmart Corporate with Tencent Company</h2>
       					<br>
       					
       					<p> Tencent Company will provide IT technology skill to AdSmart and the technology include AI analyst skill and knowledge. </p>
       					<p>[...]</p>
       					<div class="row">
       					<a href="" class="btn" style="background:#9198e5;"> Read More</a>
       					</div>
       				</div>
       			
       			
       			</div>
       			<div class="blog-post">
       				<div class="blog-img">
       					<img src="../images/blog-img2.png" >
       				</div>
       				<div class="blog-info">
       					<b>Post Date: 2023-01-31 </b>
       					<br>
       					<br>
       					<h2>AdSmart start to study ChatGPT knowledge and skill</h2>
       					<br>
       					
       					<p> AdSmart has noticed ChatGPT Power and capability, so that we need to study how to use ChatGPT In AdSmart. </p>
       					
       					<p>[...]</p>
       					<div class="row">
       					<a href="" class="btn" style="background:#9198e5;"> Read More</a>
       				</div>
       			</div>
       			
       			</div>
       			
       					<a href="" class="btn" style="background:#333; width:40%; height:50px; padding-top:15px;"> See More</a>
      			
       </div>
       
      
      <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>