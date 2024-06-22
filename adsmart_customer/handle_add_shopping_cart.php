 <?php  include('../partials-front/after_customer_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $company_id = $_POST['company_id'];    	
    	    $customer_name=$_POST['customer_name'];
    	   	
    	    $company_name=$_POST['company_name'];
    	    $product_name=$_POST['product_name'];
    	    $price1=$_POST['price'];
    	    
    	   
    	  
    	    if(isset($_POST['quantity']) && $_POST['quantity'] > 0){
    	        $quantity=$_POST['quantity'];}
    	       else{
    	           
    	           
    	       }
    
    	   
    	    //updating new image if selected
    	    
    	    
    	    
    	    //update the db
    	    $sql2 ="INSERT INTO shopping_cart 
        (`company_name`, `company_id`, `customer_name`, `product_name`, `price`, `quantity`)
        VALUES
        ('$company_name', '$company_id', '$customer_name', '$product_name', '$price1', '$quantity')";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Item has been added successfully. </div>";
    	        header('location:'.SITEURL.'cart.php');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to add Item to shopping cart. </div>";
    	        header('location:'.SITEURL.'cart.php');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>