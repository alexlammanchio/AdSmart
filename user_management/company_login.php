<?php  include('../partials-front/menu.php');?>

<!-- -Login Page -->

	<div class="small-container">
		<div class="row">				
				
				<div class="col-6">
		          <img src="../images/business_reg.jpg" alt="contact_us" />
		        </div>
						<div >
					
					<h2>Business Parnter</h2>		
					<form id="LoginForm" action="handle_business_partner_login.php" method="post">
							<?php if(isset($_SESSION['login']))
                        			{
                        			    
                        			    echo $_SESSION['login'];
                        			    unset($_SESSION['login']); //removing seesion
                        			}
    		                  	?>
    			
							<br><label>AdSmart Business Account:</label> <br>
							<input type="text" placeholder="Username" name="account_name">
							<br><label>AdSmart Shopcode:</label> <br>
							<input type="text" placeholder="Shop Code" name="shopcode">
							<br><label>AdSmart Business Password:</label> <br>
							<input type="password" placeholder="Password" name="password">
							<button type="submit" class="btn">Login</button>
							<button type="button"   class="btn" onclick="window.location.href='Adsmart_partners_registration.php';">Registry</button>
							<br>
							<p style="text-align:center; "><a href="resend-bp-shopcode.php" style="font-size:18px; color:Green;" ><b>Forget Shopcode</b></a></p>
							<br>
							<p style="text-align:center; "><a href="reset-bp-password.php" style="font-size:18px; color:Green;" ><b>Forget Password</b></a></p>
						</form>				
						
						
					
				</div>
		</div>
	</div>
	


	
	

<!--------------------- footer -------------->
	<?php  include('../partials-front/footer.php');?>