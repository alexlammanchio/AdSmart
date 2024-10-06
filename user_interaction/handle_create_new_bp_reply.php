<?php  include('../partials-front/menu.php');?>
<!--  header -->
<?php 

    //Process the value from form and save it in db


 
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(isset($_POST['qoutation_Id'])){
        $qoutation_Id = $_POST['qoutation_Id'];
        
    }else{
        
        $qoutation_Id = 'NULL';
        
    }
    
    
    if(isset($_POST['topic_id'])){
        $topic_id = $_POST['topic_id'];
        
    }else{
        
        $topic_id = 'NULL';
        
    }
    
    if(isset($_POST['customer_name'])){
        $customer_name = $_POST['customer_name'];
        
    }else{
        
        $customer_name = 'NULL';
        
    }
    
    
    if(isset($_POST['customer_id'])){
        $customer_id= $_POST['customer_id'];
       
    }else{
        
        $customer_id = 'NULL';
        
    }
    
    if(isset($_POST['content'])){
        $content = $_POST['content'];
        
    }else{
        
        $content = 'NULL';
        
    }
    
    if(isset($_POST['company_id'])){
        $company_id = $_POST['company_id'];
        
    }else{
        
        $company_id = 'NULL';
        
    }
    
    if(isset($_POST['company_name'])){
        $company_name = $_POST['company_name'];
        
    }else{
        
        $company_name = 'NULL';
           }
    
    
           if(isset($_POST['topic_id'])){
               $topic_id = $_POST['topic_id'];
               
           }else{
               
               $topic_id = 'NULL';
           }
           date_default_timezone_set('Asia/Hong_Kong');
           $created_dt = date('Y-m-d H:i:s');

   
    //2. SQL query to save the data into db
    $sql = "INSERT INTO replies (topic_id,user_id, customer_name, company_name, company_id, content, created_dt)
          VALUES ('$topic_id','$customer_id', '$customer_name', '$company_name', '$company_id', '$content', '$created_dt')          
             ";
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['Reply']= "<div style='color:green; font-size:28px;'>Reply This Ticket  Successfully.</div>";
        header('location:'.USER_INTERACTION.'Adsmart_business_discuss_quotation.php?qoutation_id='.$qoutation_Id);
        //Redirect Page
       
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_Reply']= "<div style='color:red; font-size:28px;'>Failed to Reply This Ticket .</div>";
        header('location:'.USER_INTERACTION.'Adsmart_business_discuss_quotation.php?qoutation_id='.$qoutation_Id);
        //Redirect Page
        
    }
}






?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>