<?php  include('../partials-front/menu.php');?>
<!--  header -->
 <?php 
					           
    	IF(isset($_POST['submit'])){
    	    if($_POST['customer_action'] != 'discuss'){
    	    // get all value
    	    $req_number = $_POST['ticket_id'];    	
    	    $customer_comment=$_POST['customer_comment'];
    	    $customer_action = $_POST['customer_action'];
    	   
    	    date_default_timezone_set('Asia/Hong_Kong');
    	    $reply_time = date('Y-m-d H:i:s'); 
    	   
    	    $id = $_POST['id'];
    	    
    	    //update the db
    	    $sql4 ="UPDATE qoutation SET                   
                    customer_comment= '$customer_comment',    
                    customer_action ='$customer_action',
                       reply_date ='$reply_time'
                    WHERE id='$id'                
                    ";
    		          
    	    //execute the query
    	    $res4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res4==true){
    	        
    	        $_SESSION['reply'] ="<div style='color:green; font-size:28px;'> The Ticket has been replied successfully. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=3');
    	    }else{
    	        
    	        $_SESSION['reply'] ="<div style='color:red; font-size:28px;'> Failed to reply the ticket. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=3');
    	        
    	    }
    	    
    	}else{
    	    $req_number = $_POST['ticket_id'];
    	    $customer_comment=$_POST['customer_comment'];
    	    $customer_action = $_POST['customer_action'];
    	    $id = $_POST['id'];
    	    date_default_timezone_set('Asia/Hong_Kong');
    	    $reply_time = date('Y-m-d H:i:s');
    	    
    	    
    	    
    	    //update the db
    	    $sql4 ="UPDATE qoutation SET
                    customer_comment= '$customer_comment',
                    customer_action ='$customer_action',
                       reply_date ='$reply_time'
                    WHERE id='$id'
                    ";
    	    
    	    //execute the query
    	    $res4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
    	    
    	    $sql = "Select * from qoutation where id='$id'";
    	    
    	    $res = mysqli_query($conn, $sql);
    	    $row = mysqli_fetch_array($res);
    	    
    	    $req_number = $row['req_number'];
    	    $customer_name =$row['customer_name'];
    	    $customer_id = $row['customer_id'];
    	    $id =$row['id'];
    	    $title= $row['title'];
    	    $content = $row['content'];
    	   
    	    $sql2 ="INSERT INTO `topics`(`customer_id`, `customer_name`, `qoutation_id`, `req_number`, `title`, `content`) VALUES ('$customer_id','$customer_name','$id','$req_number','$title','$content')
                    ";
    	    
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['reply'] ="<div style='color:green; font-size:28px;'> The Ticket has been replied successfully. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=3');
    	    }else{
    	        
    	        $_SESSION['reply'] ="<div style='color:red; font-size:28px;'> Failed to reply the ticket. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=3');
    	        
    	    }
    	    
    	}
    		          
    	}
    	
    	
    	?>
				
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>