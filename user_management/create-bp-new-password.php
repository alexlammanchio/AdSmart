<?php  include('../partials-front/menu.php');?>


  <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1> AdSmart Business Partner Create New password </h1>
			<br>
			<br>			
		<?php if(isset($_SESSION['login']))
                        			{
                        			    
                        			    echo $_SESSION['login'];
                        			    unset($_SESSION['login']); //removing seesion
                        			}
                        			?>
			<br>
			<?php 
			 $selector =$_GET["selector"];
			 $validator =$_GET["validator"];
			 
			 if(empty($selector) || empty($validator)){
			     
			     echo "Could not validate your request!";
			     
			 }else{
			     
			     if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
			         ?>
			         
			         <form action="handle_reset_bp_password.php" method="POST">
					<table class="tbl-30">
					<tr>
						<td><input type="hidden" name="selector" value="<?php echo $selector;?>"></td>
						<td><input type="hidden" name="validator" value="<?php echo $validator;?>"></td>
					</tr>
					<tr>
						<td> New Password: </td>
						<td><input type="password" name="pwd" placeholder="New password"></td>
					
					</tr>				
					<tr>
						<td> Confirm Password: </td>
						<td><input type="password" name="pwd-repeat" placeholder="Confirm password"></td>
					
					</tr>		
					
					<tr>
						<td colspan="2">
    						<input type="hidden" name="id" value="<?php echo $id; ?>">						
					<button type="submit" name="reset-passowrd-submit"  value="Change Admin Password" class="btn" style="height:50px;font-size:25px; background:#9198e5;">Reset Password</button></td>
					</tr>
					
					</table>
			
			</form>
			         <?php 
			     }
			     
			 }
			
			
			
			?>
			
			
			
			
			
			
			
			
			</div>
</div>



<?php include('../partials-front/footer.php')?>