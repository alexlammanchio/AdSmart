 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $tran_id = $_POST['tran_id'];    	
    	    
    	    $item_name = $_POST['item_name'];   	
    	    $company_user_id =$_POST['company_user_id'];
    	    $status=$_POST['status'];   	  
    	    if($status != 'no_receive' or $status!='completed'){
    	        date_default_timezone_set('Asia/Hong_Kong');
    	        $created_time = date('Y-m-d H:i:s');
    	        
    	    }
    	    //update the db
    	    $sql2 ="UPDATE payment SET
                   order_status = '$status', bp_update_time ='$created_time'
                where company_user_id = '$company_user_id'  AND   item_name = '$item_name' AND    transaction_id = '$tran_id'
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Payment status updated successful. </div>";
    	        header('location:'.ORDER_TICKET.'Adsmart_bp_order_info.php?trans_id='.$tran_id);
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update Payment status. </div>";
    	        header('location:'.ORDER_TICKET.'Adsmart_bp_order_info.php?trans_id='.$tran_id);
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>