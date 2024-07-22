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
						   <h1 style="font-size: 36px;">AdSmart Summary</h1>
						   
					</div>						
				</div>						
</div>		

	<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_clientele">AdSmart Classic Clientele </a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_business_models">AdSmart Business Models</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#learn_about_service">Learn About Service</a></div>
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_strength">AdSmart Strength</a></div>
	</div>

<!--             Navigation                          
		<div class="exadp" id="adsmart_clientele">
			<h1>AdSmart Classic Clientele </h1>
			<div class="exadp-nav">
       			<div class="slider">
       				<div class="slides">
       				-->
       					<!-- radio buttons start 
       					
       					<input type="radio" name="radio-btn" id="radio1">
       					<input type="radio" name="radio-btn" id="radio2">
       					<input type="radio" name="radio-btn" id="radio3">
       					<input type="radio" name="radio-btn" id="radio4">
       					-->
       					<!-- img Start 
       					<div class="slide first">
       						<img src="../images/summary_nav1.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/summary_nav2.png" alt="">
       						
       					</div>
       					<div class="slide">
       						<img src="../images/summary_nav3.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/summary_nav4.png" alt="">
       					</div>
       					
       					-->
       					<!-- auto navigation Start 
       					<div class="navigation-auto">
       						<div class="auto-btn1"></div>
       						<div class="auto-btn2"></div>
       						<div class="auto-btn3"></div>
       						<div class="auto-btn4"></div>
       					</div>   
       				</div>
       				
       				<div class="navigation-manual">
       					<label for="radio1" class="manual-btn"></label>
       					<label for="radio2" class="manual-btn"></label>
       					<label for="radio3" class="manual-btn"></label>
       					<label for="radio4" class="manual-btn"></label>
       				</div>
       			
       			
       			</div>
       		</div>	
     
</div>
-->
<div class="exadp" id="adsmart_clientele">
	<h1>AdSmart Classic Clientele </h1>		
			<div class="blog-post">			
				<div class="blog-img">
					            <img src="../images/haidilao.png" >
				 </div>
				
				<div class="col-2">
				<div class="client-info">
					<h1>Haidilao Macao shop</h1>
					<p> <b style="font-size:30px;">Case description:</b></p>
					<br>
					<p> Haidilao Macao shop finds advertisement provider via AdSmart to promote their new product. Due to they use AdSmart that AdSmart can quickly help them to find sutiable Advertisement service provider, then make its profit to increase <b style="color:red; font-size:40px;">20%</b>. </p>
					<br>
					
					<table class="client-table">
						  <tr>
						    <th>Haidilao Membership</th>
						    <th>Haidilao Profits</th>
						    <th>Haidilao New member</th>
						  </tr>
						  <tr>
						    <td>Incrase <b>30%</b></td>
						    <td>Incrase <b>20%</b></td>
						     <td>Incrase <b>50%</b></td>
						  </tr>
				 </table>
					<a href="" class="btn" style="background:#333; width:40%; height:50px; padding-top:15px;"> Detail</a>
					</div>
				</div>
			</div>
			<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-arrow-left"></i><a href="#"></a></div>
				    <div class="catagory_con"><a href="#">See More Case</a></div>
				    <div class="catagory_con"><i class="fas fa-arrow-right"></i><a href="#"></a></div>
			
			</div>
</div>
<!------------- Business model ----->
	<div class="services" id="adsmart_business_models">
			<div class="small-container">
				<h2>AdSmart Business Models</h2>
				<div class="row">				
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/shopping.png" style="height:200px">
					              <h4 style="color:#9198e5;">Customers Services</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>Chatroom With Service provider function  </p>
					             <p><i class="fas fa-hand-point-right"></i>AI search function </p>
					             <p><i class="fas fa-hand-point-right"></i>Price transparent  </p>
					             <p><i class="fas fa-hand-point-right"></i>Service Analysis report  </p>
					             
					             <br>
					           <a
					                href="profile.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9198e5">Detail</button> </a
					              >
						</div>
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/business.png" style="height:200px">
					              <h4 style="color:#9adba6;">Business Partners</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>Subscription program  </p> <!-- 產品暴光 網頁內提介 和放頭版 -->
					             <p><i class="fas fa-hand-point-right"></i>Artificial Intelligence Customer Service</p>
					             <p><i class="fas fa-hand-point-right"></i>Inventory  management Service</p>
					             <p><i class="fas fa-hand-point-right"></i>E-commerce Service  </p>
					             <br>
					           <a
					                href="profile.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6">Detail</button> </a>
					           
						</div>	
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/agency_service.jpg" style="height:200px">
					              <h4 style="color:#9adba6;">Other Service</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>AdSmart WebSite Advertisement Service</p>
					              <p><i class="fas fa-hand-point-right"></i>AdSmart shop ranking service </p>
					              <p><i class="fas fa-hand-point-right"></i>Set up AdSmart shop service</p>
					              <br>
					              <br>
					           <a
					                href="profile.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6">Detail</button> </a>
					           
						</div>						
				</div>		
			</div>
	</div>
	
    <!------------- Learn About Our Services ----->
	<div class="services" id="learn_about_service">
			<div class="small-container">
				<h2>Learn about our Services</h2>
				<div class="row">				
						<div class="col-3" style="background:#FFFFFF;">	
					           
					            <img src="../images/cs.jpg" style="height:200px">
					              <h4 style="color:#9198e5;">Customers Services</h4>
					              <hr>
					              <p><i class="fas fa-hand-point-right"></i>Customers can find their targeted advertisement service providers via AdSmart and can navigate with them. </p>
					              <a
					                href="profile.php"                
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
					                href="profile.php"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6">Detail</button> </a>
					           
						</div>						
				</div>		
			</div>
	</div>
	
       <!--             AdSmart Strength                                         -->
       
<div class="small-container" style="padding-bottom:80px;" id="adsmart_strength">
<?php 
						
						$sql ="SELECT * FROM content WHERE name='ADSMART STRENGTH'";
						
						//execute the query
						$res = mysqli_query($conn, $sql);
						
						$row = mysqli_fetch_assoc($res);
						$name = $row['name'];
					
						$current_image = $row['image_name'];
						
						
							echo "<h2 class='title'>".$name."</h2> ";     
					        
					            
					          
					          ?>
					          
		
		
				<div class="row" >	
						<div class="strength_img">
						<img src="../admin/images/content/<?php echo $current_image;?>" style="width:800px; height:500px;">	
						</div>
				</div>	
							
								
</div>
       

<!--  auto-navigation -->	
		<script>
			var img_no=1;
			setInterval(function(){
				document.getElementById('radio' + img_no).checked =true;
				img_no++;
				if (img_no >4){
					img_no =1;
					
				}
				
			}, 5000);
		
		
		
		</script>
		
    <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>