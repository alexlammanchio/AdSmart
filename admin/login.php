
<?php include('../config/constants.php');?>

<link href="css/style-admin.css" rel="stylesheet" />


<div class='login' style="background: #efffff;">
			
			<br> <br>
			<?php 
    			if(isset($_SESSION['login']))
    			{
    			    
    			    echo $_SESSION['login'];
    			    unset($_SESSION['login']); //removing seesion
    			}
    			
    			if(isset($_SESSION['no-login-message']))
    			{
    			    
    			    echo $_SESSION['no-login-message'];
    			    unset($_SESSION['no-login-message']); //removing seesion
    			}
    			?>
    			<br>
    			<br>
	<!--  login form starts -->
	<form action="" method="POST" class="text-center">
	<div style="text-align: center;"><img src="images/AdSmart_logo.png" style="width:120px; height:120px;"> <h2>Login</h2>
	
	</div>
	
		Username: <br>
		<input type="text" name="username" placeholder="Enter USername" ><br> <br>
		Password: <br>
		<input type="password" name="password" placeholder="enter password"> <br><br>
		
		<input type="submit" name="submit" value="Lgoin" class="btn-backend-0">
	<br><br>
	
	</form>
	
</div>
		

		



<?php 

    //check whether the submit button u=is clicked
if(isset($_POST['submit'])){
    
    //Get data from login form;

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password =mysqli_real_escape_string($conn,$raw_password);
   //sql to check whether username and password exist or not
   $sql ="SELECT * FROM adsmart_admin WHERE display_name='$username' AND password='$password'";

   //execute the query
   $res = mysqli_query($conn, $sql);
   
   //4. count rows to check whether the user exist or not
   $count = mysqli_num_rows($res);
   
   if($count ==1 ){
       //User available and login success
       $_SESSION['login']= "<div class='success'>Login Successfully.</div>";
       $_SESSION['user']= $username;
       header('location:'.SITEURL.'admin/index.php');
       
   }else {
       //fail to login
       $_SESSION['login']= "<div class='error text-center'>Username or Password did not match.</div>";
       header('location:'.SITEURL.'/admin/login.php');
   }
}

?>

	<?php include('partials/footer.php')?>