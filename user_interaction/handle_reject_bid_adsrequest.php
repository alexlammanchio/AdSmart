<?php  include('../partials-front/menu.php');?>
<!--  header -->
<?php 

    //Process the value from form and save it in db


 
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
   
    
    $reject_msg =$_POST['reject_msg'];
    $_SESSION['reject_msg'] = $_POST['reject_msg'];
   
    // 定義不允許字元
  
    $company_id =$_POST['company_id'];  
    $company_name =$_POST['company_name'];  
   
     
    
    date_default_timezone_set('Asia/Hong_Kong');
    $reject_time = date('Y-m-d H:i:s'); 
   
   
    $id = $_POST['ticket_id'];
    
    //2. SQL query to save the data into db
    $sql = "Update qoutation SET
            company_id ='$company_id',
            company_name= '$company_name',
            company_reject_msg= '$reject_msg', 
            company_reject_time ='$reject_time'
           where id ='$id'
             ";
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['create']= "<div style='color:green; font-size:28px;'>Advertisement Request has been rejected.</div>";
        
        //Redirect Page
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=3');
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_create']= "<div style='color:red; font-size:28px;'>Failed to reject an Advertisement Request.</div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=2');
        //Redirect Page
        
    }
}





?>
<!--------------------- footer -------------->
 <?php  include('partials-front/footer.php');?>