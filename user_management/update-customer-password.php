 <?php  include('../partials-front/after_customer_login_menu.php');?>
 
<div style="background:#1b0075" >
              
             <?php  include('../partials-front/customer_left_bar.php');?>


              <div class='container-fluid' style =" padding-bottom:450px;">
            	   	<div class='reg' style='width: 1000px; margin-top:170px; '>
	   	<div class='reg'>
			<h1>Change AdSmart Customer Password </h1>
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
			
			<form action="handle_customer_update_password.php" method="POST">
					<table class="tbl-30">
					<tr>
						<td> Current Password: </td>
						<td><input type="password" name="current_password" placeholder="old password"></td>
					
					</tr>
					<tr>
						<td> New Password: </td>
						<td><input type="password" name="new_password" placeholder="New password"></td>
					
					</tr>				
					<tr>
						<td> Confirm Password: </td>
						<td><input type="password" name="confirm_password" placeholder="Confirm password"></td>
					
					</tr>	
					<tr>
						<td colspan="2">
    						<input type="hidden" name="id" value="<?php echo $id; ?>">						
					<input type="submit" name="submit"  value="Change Password" class="btn" style="height:50px;font-size:25px; background:#9198e5;"></td>
					</tr>
					
					</table>
			
			</form>
			</div>
			</div>
			</div>
</div>



<?php include('../partials-front/footer.php')?>