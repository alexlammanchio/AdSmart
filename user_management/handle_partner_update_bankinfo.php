 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $business_id = $_POST['business_id'];    	
    	    
    	    $bank_name = $_POST['bank_name'];   	
    	    $credit_account=$_POST['credit_account'];
    	    $counterparty=$_POST['counterparty'];
    	    $credit_currency=$_POST['credit_currecny'];    	  
    	   
    	    //update the db
    	    $sql2 ="UPDATE business_bank_info SET
                   credit_account = '$credit_account',    
                    counterparty ='$counterparty',               
                 credit_currency = '$credit_currency',
                    bank_name = '$bank_name'
                where business_id = '$business_id'        
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> AdSmart Business Partner Bank Info updated successfully. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update AdSmart Business Partner Bank Info. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>