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
						   <h1 style="font-size: 50px;">AdSmart Qualifications</h1>
						  
					</div>						
				</div>						
			</div>	
				
	<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_member">AdSmart Major Members  </a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#adsmart_history">AdSmart Development History</a></div>
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#AdSmart_awards_cert">AdSmart Awards and Certification</a></div>
	</div>

<!--             Team management                                          -->

	<div class="exadp" id="adsmart_member">
	<?php 
						
						$sql ="SELECT * FROM content WHERE name='AdSmart Major Members'";
						
						//execute the query
						$res = mysqli_query($conn, $sql);
						
						$row = mysqli_fetch_assoc($res);
						$name = $row['name'];
					
						$current_image = $row['image_name'];
						
						
							echo "<h1 style='color:#333;'>".$name."</h2> ";     
					        
					            
					          
					          ?>
		
		
					
				<div class="row" id="adsmart_history">					
					<div class="col-2"  style="width:1300px;">	
       						<img src="../admin/images/content/<?php echo $current_image;?>" style="width:800px; height:500px;">	
       				</div>      				       			
       			</div>
	</div>		
		



<!--             History timeline                          -->

		<div class="row" id="adsmart_history">	
		<?php 
						
						$sql1 ="SELECT * FROM content WHERE name='ADSMART DEVELOPMENT HISTORY'";
						
						//execute the query
						$res1 = mysqli_query($conn, $sql1);
						
						$row1 = mysqli_fetch_assoc($res1);
					
					
						$current_image = $row1['image_name'];
						
						     
					        
					            
					          
					          ?>				
					<div class="col-2"  style="width:1300px;">			
						
							<img src="../admin/images/content/<?php echo $current_image;?>" style="width:900px; height:500px;">	
						</div>
								
			</div>	





     <!--            office Environment                                       

		<div class="exadp" id="adsmart_environment">
		<h1>AdSmart Office Environment </h1>
		<div class="exadp-nav">
       			<div class="slider">
       				<div class="slides">
       					<!-- radio buttons start 
       					<input type="radio" name="radio-btn" id="radio1">
       					<input type="radio" name="radio-btn" id="radio2">
       					<input type="radio" name="radio-btn" id="radio3">
       					<input type="radio" name="radio-btn" id="radio4">
       					<input type="radio" name="radio-btn" id="radio5">
       					<input type="radio" name="radio-btn" id="radio6">
       					<!-- img Start 
       					<div class="slide first">
       						<img src="../images/environment-1.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/environment-2.png" alt="">
       						
       					</div>
       					<div class="slide">
       						<img src="../images/environment-3.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/environment-4.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/environment-5.png" alt="">
       					</div>
       					<div class="slide">
       						<img src="../images/environment-6.png" alt="">
       					</div>
       					<!-- auto navigation Start 
       					<div class="navigation-auto">
       						<div class="auto-btn1"></div>
       						<div class="auto-btn2"></div>
       						<div class="auto-btn3"></div>
       						<div class="auto-btn4"></div>
       						<div class="auto-btn5"></div>
       						<div class="auto-btn6"></div>
       					</div>   
       				</div>
       				
       				<div class="navigation-manual">
       					<label for="radio1" class="manual-btn"></label>
       					<label for="radio2" class="manual-btn"></label>
       					<label for="radio3" class="manual-btn"></label>
       					<label for="radio4" class="manual-btn"></label>
       					<label for="radio5" class="manual-btn"></label>
       					<label for="radio6" class="manual-btn"></label>
       				</div>
       			
       			
       			</div>
       		</div>	
     </div>
	 -->
	<div class="small-container" id="AdSmart_awards_cert">
				<div class="row">
					<div class="about_head">
						   <h1 style="font-size: 36px;">AdSmart Awards and Certification (Assumption)</h1>
						
						  
					</div>
					
											
				</div>						
			</div>	
	<div class="content_catagory">
			
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#iso27001">ISO 27001 </a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#iso27701">ISO 27701</a></div>
				    <div class="catagory_con"><i class="fas fa-star"></i><a href="#iso9001">ISO 9001</a></div>
					<div class="catagory_con"><i class="fas fa-star"></i><a href="#awards1">Macao Advertisement Service Awards 2023</a></div>
				   </div>
	<div class="row" id="iso27001">
						<div class="col-2" id="awards" >
							 <h2>ISO 27001 (Not achieved)</h2>         
					          <p>
					            ISO/IEC 27001 is the world’s best-known standard for information security management systems (ISMS) and their requirements. Additional best practice in data protection and cyber resilience are covered by more than a dozen standards in the ISO/IEC 27000 family. </a>
					          </p>
					          
						</div>	
									
						<div class="col-2" id="awards-img">
							<img src="../images/awards1.png" style="width:500px; height:500px;">	
						</div>
								
			</div>	


<!--            ISO 27701                                          -->

		<div class="row" style="background: #d0f3ff;" id="iso27701">
							<div class="col-2" id="awards-img">
								<img src="../images/awards2.png" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="award-text">
								<h2>ISO 27701 (Not achieved)</h2>         
						          <p>
						          		ISO/IEC 27701:2019 (formerly known as ISO/IEC 27552 during the drafting period) is a privacy extension to ISO/IEC 27001. The design goal is to enhance the existing Information Security Management System (ISMS) with additional requirements in order to establish, implement, maintain, and continually improve a Privacy Information Management System (PIMS).
						          </p>				
							</div>	
							
								
			</div>

     <!--            ISO 9001                                          -->

		<div class="row" id="iso9001">
						<div class="col-2" id="awards">
							 <h2 id="customer">ISO 9001 (Not achieved)</h2>         
					         
					          <p>
								ISO 9001 sets out the criteria for a quality management system and is the only standard in the family that can be certified to (although this is not a requirement). It can be used by any organization, large or small, regardless of its field of activity. In fact, there are over one million companies and organizations in over 170 countries certified to ISO 9001.			
										          </p>			
						</div>	
									
						<div class="col-2" id="awards-img">
							<img src="../images/awards3.png" style="width:600px; height:500px;">	
						</div>
								
			</div>	
    <!--            Macao Advertisement Service Awards 2023                                  -->   
       
       <div class="row" style="background: #d0f3ff;" id="awards1">
							<div class="col-2" id="awards-img">
								<img src="../images/awards4.png" style="width:500px; height:500px;">	
								 
							</div>			
							<div class="col-2" id="award-text">
								<h2>Macao Advertisement Service Awards 2023 (Not achieved)</h2>         
						          <p>
						          		Macao Advertisement Service Awards is Macao advertisement Industry Award and Award-winning companies are recognized by the industry.
						          		
						          </p>				
							</div>	
							
								
			</div>

    <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>