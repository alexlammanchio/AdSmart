<?php  include('../partials-front/menu.php');?>
<!--  header -->
<?php 

    //Process the value from form and save it in db


 
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
   
    
   
   
    // 定義不允許字元
    $quotation_date = $_POST['quotation_date'];
    $company_id =$_POST['company_id'];  
    $company_name =$_POST['company_name'];  
    $company_email =$_POST['company_email']; 
    $reg_number =$_POST['reg_number']; 
    $reg_address =$_POST['reg_address']; 
    $customer_name =$_POST['customer_name'];
    $customer_email =$_POST['customer_email'];
    $customer_number =$_POST['customer_number'];
    $subject =$_POST['subject'];
    $item_summary =$_POST['item_summary'];
    $delivery_time =$_POST['delivery_time'];  
    $delivery_term =$_POST['delivery_term']; 
    $price =$_POST['price'];
    
    date_default_timezone_set('Asia/Hong_Kong');
    $created_time = date('Y-m-d H:i:s'); 
   
    $valid_date = $_POST['valid_date'];
    $req_number = $_POST['ticket_number'];
    $id =$_POST['id'];
    //2. SQL query to save the data into db
    $sql = "INSERT INTO quotation_content set quotation_id ='$id',
 req_number = '$req_number', 
quotation_date = '$quotation_date',
valid_day = '$valid_date',
company_id = '$company_id', 
company_name = '$company_name',
company_email = '$company_email',
reg_number ='$reg_number', 
reg_country = '$reg_address', 
customer_name ='$customer_name',
customer_email ='$customer_email',
customer_number ='$customer_number',
subject ='$subject', 
Item_summary = '$item_summary', 
price ='$price', 
delivery_terms = '$delivery_term', 
delivery_time = '$delivery_time',
created_date = '$created_time'";
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['create']= "<div style='color:green; font-size:28px;'>The Quotation has been created.</div>";
        
        //Redirect Page
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=3');
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_create']= "<div style='color:red; font-size:28px;'>Failed to create the Quotation.</div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=2');
        //Redirect Page
        
    }
}





?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>