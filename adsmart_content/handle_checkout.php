 <?php  session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}

 ?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	     
    	    // get all value
    	    $cus_card_name = $_POST['cus_card_name'];    	
    	    $card_number=$_POST['card_number'];
    	    $shopIds = $_POST['shop_id']; 
    	    $cvv=$_POST['cvv'];
    	    $card_expiry_date=$_POST['card_expiry_date'];
    	    $cus_user_id=$_POST['cus_user_id'];
    	    $email = $_POST['email'];
    	    $contact_number=$_POST['contact_number'];
    	    $cus_user_id=$_POST['cus_user_id'];
    	    $item_name=$_POST['item_name'];
    	   
    	    if(isset($_POST['quantity'])){
    	        $quantity=$_POST['quantity'];}
    	        else{
    	            $quantity= '0';
    	            
    	        }
    	        
    	            $price=$_POST['price'];
    	            if(isset($_POST['total'])){
    	                $total=$_POST['total'];
    	            }else{
    	                $total=$_POST['price'];
    	            }
    	    
    	    $company_user_id=$_POST['company_user_id'];
    	    $transaction_id=$_POST['transaction_id'];
    	    $cus_address=$_POST['cus_address'];
    	   
    	    $created_dt = date('Y-m-d H:i:s');
    	   
    	    //updating new image if selected
    	    foreach ($shopIds as $index => $id) {
    	        $insertData = [];
    	        $currentId = $id;
    	        $currentquantity = $quantity[$index];
    	        $currentprice = $price[$index];
    	        $currentcompany_user_id = $company_user_id[$index];
    	        $currentitem_name = mysqli_real_escape_string($conn, $item_name[$index]);    	        
    	        $insertData[] = "('$cus_user_id', '$email', '$cus_address', '$currentitem_name', '$currentquantity', '$currentprice', '$total', '$created_dt', '$currentcompany_user_id', '$transaction_id', '$cus_card_name', '$card_expiry_date', '$card_number', '$contact_number', '$cvv')";
    	    //update the db
    	    
    	        $insertValues = implode(',', $insertData);
    	        
    	    $sql2 = "INSERT INTO payment
    (cus_user_id, cus_email, cus_address, item_name, quantity,price, total, created_day, company_user_id, transaction_id, cus_card_name, card_expiry_date, card_number, cus_contact, cvv)
    VALUES $insertValues";
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2);
    	    
    	   
    	    
    	    // 执行查询
    	    
    	    //redirect to manage
    	    if($res2==true){
    	      
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Payment has been checked successfully. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
    	    }else{
    	       
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to checkout the item. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
    	        
    	    }
    	    } 
    	    
    	    $sql = "DELETE FROM shopping_cart WHERE customer_name = '$cus_user_id'";
    	    $res = mysqli_query($conn, $sql);
    	    if($res==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> Payment has been checked successfully. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to checkout the item. </div>";
    	        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=7');
    	        
    	    }
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>