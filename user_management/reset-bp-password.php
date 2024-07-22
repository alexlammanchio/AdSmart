<?php  include('../partials-front/menu.php');?>


  <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1> AdSmart Business Partner Reset Password </h1>
			<br>
			<br>
			<?php 
			 if(isset($_GET['id']))
			 {
			     $id=$_GET['id'];
			 }
			 
			 if(isset($_SESSION['pwd-not-match']))
			 {
			     
			     echo $_SESSION['pwd-not-match'];
			     unset($_SESSION['pwd-not-match']); //removing seesion
			 }
			 if(isset($_SESSION['wrong_old_password']))
			 {
			     
			     echo $_SESSION['wrong_old_password'];
			     unset($_SESSION['wrong_old_password']); //removing seesion
			 }
			 
			?>
		
			<br>
			
			<?php 
			
			if(isset($_GET["reset"]))
			{
			    if($_GET["reset"] == "success"){
			        
			        echo "<p style='color:green; font-size:35px; font-weight: bold;'> Please Check your email to reset password</p> <br>";
			    }
			}
			
			?>
			<form action="handle_reset_bp_request.php" method="POST">
					<table class="tbl-30">
					<tr>
						<td> Reset Password description: </td>
						<td><p>An email will be sent to you with instructions on how to reset your password.</p></td>
					
					</tr>
					<tr>
						<td> Email Address: </td>
						<td><input type="text" name="email" placeholder="Enter your email address"></td>
					
					</tr>				
					
					<tr>
						<td colspan="2">
    						<input type="hidden" name="id" value="<?php echo $id; ?>">						
					<button type="submit" name="reset-request-submit"  value="Change Admin Password" class="btn" style="height:50px;font-size:25px; background:#9198e5;">Receive new password by email</button></td>
					</tr>
					
					</table>
			
			</form>
			
		
			
			</div>
</div>



<?php include('../partials-front/footer.php')?>