<?php  include('../partials-front/menu.php');?>
<!--  header -->
<?php 

    //Process the value from form and save it in db


 
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
   
    
    $implementation =$_POST['implementation'];
    $_SESSION['implementation'] = $_POST['implementation'];
   
    // 定義不允許字元
    $customer_name =$_POST['customer_name'];
       
    $requirement =$_POST['requirement']; 
    $deadline_date =$_POST['deadline'];
    $budget1 =$_POST['budget1'];    
    $category_id =$_POST['category_id']; 
    $req_number =$_POST['ticket_number']; 
    $contact_number =$_POST['contact_number'];
    $email =$_POST['email'];
    $customer_id =$_POST['customer_id'];
    $company_id =$_POST['company_id'];  
    $company_name =$_POST['company_name'];  
    $created_date = $_POST['created_date'];
    if(isset($_POST['product_name'])){
        $product_name = $_POST['product_name'];}
        else{
            $product_name = '';
        }
        
        if(isset($_POST['subject'])){
            $subject = $_POST['subject'];
        }else{
            $subject = '';
        }
    $company_price =$_POST['price'];  
    
    date_default_timezone_set('Asia/Hong_Kong');
    $bid_time = date('Y-m-d H:i:s'); 
   
    $target_date = $_POST['target_date'];
    $id = $_POST['ticket_number'];
    
    //2. SQL query to save the data into db
    $sql = "INSERT INTO qoutation (req_number, customer_name,customer_id,subject, contact_number, email, category_id, requirement,budget,deadline_date, company_id, company_name, implementation_plan, company_price, company_bid_time, target_date,product_name, create_datetime)
          VALUES ('$req_number','$customer_name','$customer_id', '$subject', '$contact_number', '$email', '$category_id','$requirement', '$budget1', '$deadline_date', '$company_id','$company_name', '$implementation', '$company_price', '$bid_time', '$target_date','$product_name','$created_date')
             ";
    
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['create']= "<div style='color:green; font-size:28px;'>Your Advertisement Solution has been sent.</div>";
        
        //Redirect Page
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=3');
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_create']= "<div style='color:red; font-size:28px;'>Failed to bid an Advertisement Request.</div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=2');
        //Redirect Page
        
    }
}





?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>