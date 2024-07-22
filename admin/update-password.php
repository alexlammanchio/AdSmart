<?php include('partials/menu.php'); ?>


  <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>Change AdSmart Adminstration Password </h1>
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
			
			<form action="" method="POST">
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
					<input type="submit" name="submit"  value="Change Admin Password" class="btn" style="height:50px;font-size:25px; background:#9198e5;"></td>
					</tr>
					
					</table>
			
			</form>
			
			
			</div>
</div>

<?php 

    //check whether the submit button u=is clicked
if(isset($_POST['submit'])){
    
    //echo "button clicked";
   $id = $_POST['id'];
   $current_password =md5($_POST['current_password']);
   $new_password = md5($_POST['new_password']);
   $confirm_password = md5($_POST['confirm_password']);
   
   //check current id and current password exists or not
   $sql= "SELECT * FROM adsmart_admin            
    WHERE id='$id' AND password='$current_password'";
   
   
   //execute the query
   $res = mysqli_query($conn, $sql);
   
   //check whether the query executed successfully or not
   if($res==true){
        // check whether data is available or not 
           $count =mysqli_num_rows($res);
       if($count==1)
       {
           //User exists and password can be changed
           //echo "user found";
           if($new_password == $confirm_password)
           {
               //echo "password is match";
               $sql2 ="UPDATE adsmart_admin SET password='$new_password'
                WHERE id=$id
            ";
               
               //execute the query
               $res2 = mysqli_query($conn, $sql2);
               
               //check whether the query execute
               if($res2==true){
                   
                   $_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully.</div>";
                   header('location:'.SITEURL.'/admin/manage-admin.php');
               }else{
                   
                   $_SESSION['change-pwd'] = "<div class='error'>Fail to change password.</div>";
                   header('location:'.SITEURL.'/admin/manage-admin.php');
               }
           }else {
               
               $_SESSION['pwd-not-match']= "<div class='error'>New Password not match.</div>";
               header('location:'.SITEURL.'/admin/update-password.php');
           }
           
           
           
       }else
       {
           $_SESSION['wrong_old_password']= "<div class='error'>Old Password is not correct.</div>";
           header('location:'.SITEURL.'/admin/update-password.php');
       }
        
   }
}

?>
<?php include('partials/footer.php'); ?>