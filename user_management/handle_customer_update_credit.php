 <?php  include('../partials-front/after_customer_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $customer_id = $_POST['customer_id'];    	
    	    $customer_name=$_POST['customer_name'];
    	    $card_number = $_POST['card_number'];   	
    	    $expiration_date=$_POST['expiration_date'];
    	    $cvv=$_POST['cvv'];
    	    $card_type=$_POST['card_type'];    	  
    	   
    	    //update the db
    	    $sql2 ="UPDATE customer_credit_card SET                   
                    card_number= '$card_number',    
                    expiration_date ='$expiration_date',               
                   cvv = '$cvv',
                    card_type = '$card_type'
                where customer_id = '$customer_id'               
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> AdSmart Customer Credit Card updated successfully. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update AdSmart Customer Credit Card. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>