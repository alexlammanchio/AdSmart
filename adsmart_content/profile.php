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
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_customer">AdSmart Customer</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#business_partner">Business Partner</a></div>				   
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_new">AdSmart News</a></div>
			
	</div>

<!--             INTRODUCTIONS                          -->
		<div style="margin-left:10px; margin-right:10px;">
		<div class="row" id="adsmart_value">
		
						<div class="col-2" id="intro">
						<?php 
						
						$sql ="SELECT * FROM content WHERE name='AdSmart Value'";
						
						//execute the query
						$res = mysqli_query($conn, $sql);
						
						$row = mysqli_fetch_assoc($res);
						$name = $row['name'];
						$content_description = $row['content_description'];
						$current_image = $row['image_name'];
						
						
							echo " <h2 >".$name."</h2> ";     
					        echo  "<p>".$content_description."</p>";
					            
					          
					          ?>
						</div>	
									
						<div class="col-2" id="intro-img">
							<img src="../admin/images/content/<?php echo $current_image;?>" style="width:500px; height:500px;">	
						</div>
								
			</div>	
</div>

<!--             Mission                                          -->
<div style="margin-left:10px; margin-right:10px;">
		<div class="row" style="background: #f2deff;" id="adsmart_beliefs">
		<?php 
						
						$sql1 ="SELECT * FROM content WHERE name='AdSmart Beliefs'";
						
						//execute the query
						$res1 = mysqli_query($conn, $sql1);
						
						$row1 = mysqli_fetch_assoc($res1);
						$name = $row1['name'];
						$content_description = $row1['content_description'];
						$current_image = $row1['image_name'];
						
						
							
					            
					          
					          ?>
							<div class="col-2" id="mission-img">
								<img src="../admin/images/content/<?php echo $current_image;?>" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="mission-text">
							<?php 
							echo " <h2 >".$name."</h2> ";
							echo  "<p>".$content_description."</p>";
							?>
										
							</div>	
							
								
			</div>
</div>
     <!--            AdSmart  Customers                                          -->
<div style="margin-left:10px; margin-right:10px;">
		<div class="row" style="background: #d0f3ff;" id="adsmart_aspiration">
		<?php 
						
						$sql2 ="SELECT * FROM content WHERE name='AdSmart Aspiration'";
						
						//execute the query
						$res2 = mysqli_query($conn, $sql2);
						
						$row2 = mysqli_fetch_assoc($res2);
						$name = $row2['name'];
						$content_description = $row2['content_description'];
						$current_image = $row2['image_name'];
						
						
							
					            
					          
					          ?>
						<div class="col-2" id="intro">
							<?php 
							echo " <h2 >".$name."</h2> ";
							echo  "<p>".$content_description."</p>";
							?>
							</div>	
									
						<div class="col-2" id="intro-img">
							<img src="../admin/images/content/<?php echo $current_image;?>" style="width:500px; height:500px;">	
						</div>
								
			</div>	
			</div>
    <!--            AdSmart Partners                                    -->   
       <div style="margin-left:10px; margin-right:10px;">
       <div class="row" style="background: #c4fbcd;" id="management">
       <?php 
						
						$sql3 ="SELECT * FROM content WHERE name='Management Concept'";
						
						//execute the query
						$res3 = mysqli_query($conn, $sql3);
						
						$row3 = mysqli_fetch_assoc($res3);
						$name = $row3['name'];
						$content_description = $row3['content_description'];
						$current_image = $row3['image_name'];
						
						
							
					            
					          
					          ?>
							<div class="col-2" id="mission-img">
									<img src="../admin/images/content/<?php echo $current_image;?>" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="mission-text">
								<?php 
							echo " <h2 >".$name."</h2> ";
							echo  "<p>".$content_description."</p>";
							?>		
							</div>	
							
								
			</div>
			</div>
			<!--            AdSmart  Customers                                          -->

	<div class="row" style="background: #d0f3ff; margin-left:10px; margin-right:10px;" id="adsmart_customer">
		<div class="col-2" id="intro">
			<h2>AdSmart Customers</h2>
			<p>
				AdSmart Customers can find <b> Any types of advertisement
					services</b> in AdSmart, And then AdSmart has provided filter function
				for AdSmart Customers to find their targeted Advertisement
				accordance to their requirements.

			</p>
			<p>
				AdSmart Customers can use any devices to browse AdSmart Platform
				that they don't need to install any application in their device
				before they visit. And AdSmart can protect their rights and
				interests when they completed transaction that AdSmart Customers
				don't need to <b>worry</b> about they can't get advertisement
				service after paid. AdSmart Business Partners need to provide <b>Real
					Company Information</b> to AdSmart before their registration,
				therefore, AdSmart Business Partners need to pass AdSmart Platform
				checking before their registration completed.
			</p>
		</div>

		<div class="col-2" id="intro-img">
			<img src="../images/about_customer.png"
				style="width: 500px; height: 500px;">
		</div>

	</div>
	<!--            AdSmart Partners                                    -->

 <div style="margin-left:10px; margin-right:10px;">
       <div class="row" style="background: #c4fbcd;" id="business_partner">
     
							<div class="col-2" id="mission-img">
			<img src="../images/partner.jpg" style="width: 500px; height: 500px;">

		</div>		
							<div class="col-2" id="mission-text" >
								<?php 
							echo " <h2 >AdSmart Business Partners </h2> ";
							echo  "<p style='text-align: left;'>AdSmart Business Partners can sell their advertisement service and promote their service or product via AdSmart Platform and AdSmart can help AdSmart Business Partners to find their potential customers accordance to customer's requirement and provides e-commerce website function for Business Partners.</p>";
							
							?>		
							</div>	
							
								
			</div>
			</div>
	
		
		
	<
       
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