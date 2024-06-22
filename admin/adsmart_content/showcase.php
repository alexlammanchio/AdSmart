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
						   <h1 style="font-size: 36px;">AdSmart Showcase</h1>
						   
					</div>						
				</div>						
</div>		
	
<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#business_partner">AdSmart Business Partners </a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#business_partner_feedbacks">AdSmart Business Partner Feedbacks</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_customer_feedback">AdSmart Customer Feedbacks</a></div>
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_case_study">AdSmart Case Study</a></div>
	</div>		
	
<!--             Business Partner                                          -->
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
		
	

<!--            Business Partner Feedbacks                          -->
		<div class="bp_showcase" id="business_partner_feedbacks">
		<div class="small-container" >
		
			<h1>Business Partner Feedbacks</h1>
		
			<br>
			<br>
			<div class="row">
					<div class="col-3">		
							<img src="../images/bp_feedback.png" class="bp_logophoto">	
							<p style="text-align:center; font-weight:bold; color:#0F6806;">Business Partner</p>
							<p style="font-weight:bold; color:#0F6806;">Post Date: 2023-03-31 </p>				
							<p> I have earned money In AdSmart Platform because I sold my advertisement service via AdSmart Platform. And I love its service charge because it is very low.</p>
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-1.png">
							<h3 style="color:#0F6806;">Sean Parker</h3> 　		
						</div>
						<div class="col-3">		
							<img src="../images/bp_feedback1.png" class="bp_logophoto">
							<p style="text-align:center; font-weight:bold; color:#0F6806;">Business Partner</p>
							<p style="font-weight:bold; color:#0F6806;">Post Date: 2023-03-31 </p>							
							<p> I can find a new customer via AdSmart Platform that it substantially reduce my customer acquisition costs.</p>
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-2.png">
							<h3 style="color:#0F6806;">Mike Smith</h3> 　		
						</div>
						<div class="col-3">		
							<img src="../images/bp_feedback2.png" class="bp_logophoto">
							<p style="text-align:center; font-weight:bold; color:#0F6806;">Business Partner</p>
							<p style="font-weight:bold; color:#0F6806;">Post Date: 2023-03-31 </p>					
							<p>Ad AdSmart Platform is very nice platform for products promotion and they can help my to save a lot of marketing cost.</p>
							
							<div class="rating">
							<p><b>Satisfaction Rating:</b>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								</p>
							</div>
							<img src="../images/user-3.png">
							<h3 style="color:#0F6806;">Joe Ip</h3> 　		
						</div>
			</div>
			<div class="row" >	
			<a href="" class="btn" style="background:#0F6806;"> Find More Feedbacks</a>
			</div>
		</div>
	</div>


    
 
 <!--            Customers Feedbacks                          -->
		<div class="bp_showcase" id="adsmart_customer_feedback">
		<div class="small-container" >
			<div style="background: #9198e5; height:80px; text-align:center; padding-top:15px;">
			<h1>Customers Feedbacks</h1>
			</div>
			<br>
			<br>
			<div class="row">
					<div class="col-3">		
							<img src="../images/AdSmart_logo.png">	
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
							<img src="../images/user-1.png">
							<h3 style="color:#061768;"">Sean Parker</h3> 　		
						</div>
						<div class="col-3">		
							<img src="../images/AdSmart_logo.png">
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
							<img src="../images/user-2.png">
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
							<img src="../images/user-3.png">
							<h3 style="color:#061768;">Mablel Joe</h3> 　		
						</div>
			</div>
			<div class="row" >	
			<a href="" class="btn" style="background:#9198e5; "> Find More Feedbacks</a>
			</div>
		</div>
	</div>
  <!--            Case Study                          -->
 	<div class="services">
			<div class="small-container_cs" id="adsmart_case_study">
				<h2>Case Study</h2>
				<br>
				<br>
				<div class="row" >				
						<div class="col-8" style="background:#FFFFFF; ">
						<div class="iframe-wrapper">					           
					           <iframe src="https://www.youtube.com/embed/z3yqHiQxlhg?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>   
					           </div>
					           <h1>Brand campaign promotion </h1>
					           <h4 style="color:#9adba6; padding-top:20px; font-weight:bold; text-align:left;">Customer's Requirement:</h4>
					          
					              <p style="text-align:left;">Customers need to promote their ads to Online Social Media advertisement. </p>
					            <a
					                href=" "               
					                target="blank"
					                > <button type="button"class="btn_cs" style="background:#9198e5;">Advertisement Provider Company: Youtube </button> </a>
					           
						</div>
						<div class="col-8" style="background:#FFFFFF; ">	
					           <div class="image-container">
					            <img src="../images/bus-1.png" >
					            </div>
					            <h1>Brand campaign promotion </h1>
					              <h4 style="color:#9adba6; padding-top:20px; font-weight:bold; text-align:left;">Customer's Requirement:</h4>
					             
					              <p>Need Advertisement Service provider to launch Advertisement in the bus stop panel. </p>
					              <a
					                href="product-detail.html"                
					                target="blank"
					                > <button type="button"class="btn_cs" style="background:#9198e5;">Advertisement Provider Company: W Company </button> </a>
					           
						</div>						
				</div>	
				<a href="" class="btn" style="background:#9198e5;"> Find More Case Study</a>	
			</div>
	</div>
       
     <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>