<?php  include('../partials-front/menu.php');?>


  <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1> Resend Shopcode to AdSmart Business Partner  </h1>
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
			
			if(isset($_GET["sent"]))
			{
			    if($_GET["sent"] == "success"){
			        
			        echo "<p style='color:green; font-size:35px; font-weight: bold;'> The Shopcode has sent to your email. Please Check your email </p> <br>";
			    }
			}
			
			?>
			<form action="handle_resend_shopcode.php" method="POST">
					<table class="tbl-30">
					<tr>
						<td> Resent Shopcode description: </td>
						<td><p>An email will be sent Shopcode to you according to your user id.</p></td>
					
					</tr>
					<tr>
						<td> User Id: </td>
						<td><input type="text" name="user_id" placeholder="Enter your user Id"></td>
					
					</tr>				
					
					<tr>
						<td colspan="2">
    						<input type="hidden" name="id" value="<?php echo $id; ?>">						
					<button type="submit" name="reset-request-submit"  value="Change Admin Password" class="btn" style="height:50px;font-size:25px; background:#9198e5;">Resend A Shopcode by email</button></td>
					</tr>
					
					</table>
			
			</form>
			
		
			
			</div>
</div>



<?php include('../partials-front/footer.php')?>