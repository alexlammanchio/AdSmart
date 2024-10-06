<?php  include('../partials-front/menu.php');?>

<!-- -Login Page -->

	<div class="small-container">
		<div class="row">				
				
				<div class="col-6">
		          <img src="../images/customers_reg.jpg" alt="contact_us" />
		        </div>
						<div >
					
					<h2>AdSmart Customer</h2>		
					<form id="LoginForm" action="handle_customer_login.php" method="post">
							<?php if(isset($_SESSION['login']))
                        			{
                        			    
                        			    echo $_SESSION['login'];
                        			    unset($_SESSION['login']); //removing seesion
                        			}
                        			
                        			
                        			if(isset($_GET["newpwd"]))
                        			{
                        			    if($_GET["newpwd"] == "passwordupdated"){
                        			        
                        			        echo "<p style='color:green; font-size:20px; font-weight: bold;'> Your password has been reset!</p>";
                        			    }
                        			}
                        			
                        		
    		                  	?>
    			
							<br><label>AdSmart Cusomter Account:</label> <br>
							<input type="text" placeholder="Username" name="customer_name">
							<br><label>AdSmart Cusomter Password:</label> <br>
							<input type="password" placeholder="Password" name="password">
							<button type="submit" class="btn">Login</button>
							<button type="button"   class="btn" onclick="window.location.href='Adsmart_customers_registration.php';">Registry</button>
							<br>
							<p style="text-align:center; "><a href="reset-password.php" style="font-size:18px; color:Green;"><b>Forget Password</b></a></p>
						</form>				
						
						
					
				</div>
		</div>
	</div>
	


	
	

<!--------------------- footer -------------->
	<?php  include('../partials-front/footer.php');?>