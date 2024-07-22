<?php  include('../partials-front/menu.php');?>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){

    //get data from login form;
if (isset($_POST['account_name']) && isset($_POST['shopcode'])&& isset($_POST['password']) ){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$sname = validate($_POST['account_name']);
	$spass = validate($_POST['password']);
	$shopcode = validate($_POST['shopcode']);
	if(empty($spass) && empty($shopcode) && empty($sname)){
	    $_SESSION['login']= "<div style='color:red;'>Username, Shopcode and Password are empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else	if(empty($sname) && empty($shopcode)){
	    $_SESSION['login']= "<div style='color:red;'>Username and Shopcode are empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else	if(empty($spass) && empty($shopcode)){
	    $_SESSION['login']= "<div style='color:red;'>Shopcode and Password are empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else	if(empty($spass) && empty($sname)){
	    $_SESSION['login']= "<div style='color:red;'>Username and Password are empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else	if (empty($sname)) {
	    $_SESSION['login']= "<div style='color:red;'>Username is empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else if(empty($spass)){
	    $_SESSION['login']= "<div style='color:red;'>Password is empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}else if(empty($shopcode)){
	    $_SESSION['login']= "<div style='color:red;'>Shopcode is empty.</div>";
	    header('location:'.USER_MANAGEMENT.'company_login.php');
	    exit();
	}
	
	else{
	    $account_name =  $_POST['account_name'];
	    $raw_password = md5($_POST['password']);
	    $password =mysqli_real_escape_string($conn,$raw_password);
	    $shopcode = $_POST['shopcode'];
	    //sql to check whether username and password exist or not
	    
		$sql = "SELECT * FROM adsmart_business_partner WHERE (user_id='$account_name' AND shop_code='$shopcode') AND password='$password' ";

		//execute the query
		$res = mysqli_query($conn, $sql);

		//4. count rows to check whether the user exist or not
		$count = mysqli_num_rows($res);
		
		if($count ==1 ){
		    
                $_SESSION['login']= "<div class='success'>Login Successfully.</div>";
                $_SESSION['user2'] = $account_name;
				$_SESSION['shopcode'] = $shopcode;
            	
            	
            	header('location:'.SITEURL.'partials-front/after_company_login_menu.php');   
            	header('location:'.SITEURL.'index.php');
            	header('location:'.USER_MANAGEMENT.'after_login_company.php');
            	
		        
                
            
            }else {
		    //fail to login
		    $_SESSION['login']= "<div style='color:red;'>Username, Shopcode or Password did not match.</div>";
		    header('location:'.USER_MANAGEMENT.'company_login.php');
		  }
		}
	}
}

?>
<?php  include('../partials-front/footer.php');?>
