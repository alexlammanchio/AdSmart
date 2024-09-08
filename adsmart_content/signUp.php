<?php  include('../partials-front/menu.php');?>
 
 <!-- AdSmart  header  -->

<div class="signup">
			<div class="small-container" >
				<h2>Signup Page</h2>
				<div class="row" >				
						<div class="col-3" style="background:#FFFFFF; height:auto;" id="reg">	
					           
					            <img src="../images/customers_reg.jpg">
					              <h4 style="color:#9198e5;">AdSmart Customers Registration</h4>
					              <hr>
					              <p>Adsmart Customers can Purchase Advertisement Service via AdSmart and can navigate with AdSmart Business Partners. </p>
					              <a
					                href="<?php echo USER_MANAGEMENT . 'customer_login.php';?>"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9198e5; margin-right:50px;">Login</button> </a
					              >
					              <a
					               href="<?php echo USER_MANAGEMENT . 'Adsmart_customers_registration.php'; ?>"        
					                target="blank"
					                > <button type="button"class="btn" style="background:#9198e5">Signup</button> </a
					              >
					           
						</div>
						<div class="col-3" style="background:#FFFFFF; height:auto;" id="reg">	
					           
					            <img src="../images/business_reg.jpg">
					            <br>
					              
					              <h4 style="color:#9adba6;">Business Partners</h4>
					              <br>
					             
					              <hr>
					              <p>AdSmart Business Partners is to provide Advertisement Service in AdSmart that their main function is to sell Advertisement Services. </p>
					              <a
					                href="<?php echo USER_MANAGEMENT . 'company_login.php'; ?>"            
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6; margin-right:50px;">Login</button> </a>
					              <a
					                href="<?php echo USER_MANAGEMENT . 'Adsmart_partners_registration.php'; ?>"                
					                target="blank"
					                > <button type="button"class="btn" style="background:#9adba6">Signup</button> </a>
					           
						</div>						
				</div>		
			</div>
	</div>          
   
        
    <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>
