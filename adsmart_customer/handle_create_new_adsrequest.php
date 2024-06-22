<?php  include('../partials-front/menu.php');?>
<!--  header -->
<?php 

    //Process the value from form and save it in db


 
if($_SERVER["REQUEST_METHOD"]=="POST"){    
    
    if(isset($_POST['print_ads'])){
        $print_ads = $_POST['print_ads'];
        $_SESSION['print_ads'] = $_POST['print_ads'];
    }else{
        
        $print_ads = '0';
        
    }
    if(isset($_POST['outdoor_ads'])){
        $outdoor_ads = $_POST['outdoor_ads'];
        $_SESSION['outdoor_ads'] = $_POST['outdoor_ads'];
    }else{
        
        $outdoor_ads = '0';
        
    }
    if(isset($_POST['broadcast_ads'])){
        $broadcast_ads = $_POST['broadcast_ads'];
        $_SESSION['broadcast_ads'] = $_POST['broadcast_ads'];
    }else{
        
        $broadcast_ads = '0';
        
    }
    if(isset($_POST['telemarketing_ads'])){
        $telemarketing_ads = $_POST['telemarketing_ads'];
        $_SESSION['telemarketing_ads'] = $_POST['telemarketing_ads'];
    }else{
        
        $telemarketing_ads = '0';
        
    }
    if(isset($_POST['events_ads'])){
        $events_ads = $_POST['events_ads'];
        $_SESSION['events_ads'] = $_POST['events_ads'];
    }else{
        
        $events_ads = '0';
        
    }
    if(isset($_POST['placement_ads'])){
        $placement_ads = $_POST['placement_ads'];
        $_SESSION['placement_ads'] = $_POST['placement_ads'];
    }else{
        
        $placement_ads = '0';
        
    }
    if(isset($_POST['display_ads'])){
        $display_ads = $_POST['display_ads'];
        $_SESSION['display_ads'] = $_POST['display_ads'];
    }else{
        
        $display_ads = '0';
        
    }
    if(isset($_POST['search_ads'])){
        $search_ads = $_POST['search_ads'];
        $_SESSION['search_ads'] = $_POST['search_ads'];
    }else{
        
        $search_ads = '0';
        
    }
    if(isset($_POST['social_ads'])){
        $social_ads = $_POST['social_ads'];
        $_SESSION['social_ads'] = $_POST['social_ads'];
    }else{
        
        $social_ads = '0';
        
    }
    if(isset($_POST['video_ads'])){
        $video_ads = $_POST['video_ads'];
        $_SESSION['video_ads'] = $_POST['video_ads'];
    }else{
        
        $video_ads = '0';
        
    }
    if(isset($_POST['native_ads'])){
        $native_ads = $_POST['native_ads'];
        $_SESSION['native_ads'] = $_POST['native_ads'];
    }else{
        
        $native_ads = '0';
        
    }
    if(isset($_POST['influencer_ads'])){
        $influencer_ads = $_POST['influencer_ads'];
        $_SESSION['influencer_ads'] = $_POST['influencer_ads'];
    }else{
        
        $influencer_ads = '0';
        
    }
   
    if(isset($_POST['company_name'])){
        $company_name = $_POST['company_name'];
        $_SESSION['company_name'] = $_POST['company_name'];
    }else{
        
        $company_name = '';
        
    }
    if(isset($_POST['product_name'])){
        $product_name = $_POST['product_name'];
        $_SESSION['product_name'] = $_POST['product_name'];
    }else{
        
        $product_name = '';
        
    }
    
    
    if(isset($_POST['subject'])){
        $subject =$_POST['subject'];
      
    }else{
        
        $subject = '';
        
    }
   
    $req_number = $_POST['req_number'];
    
    $requirement =$_POST['requirement'];
    $_SESSION['requirement'] = $_POST['requirement'];
   
    // 定義不允許字元
  
    $customer_id =$_POST['customer_id'];  
    $customer_name =$_POST['customer_name'];  
    
    $contact_number =$_POST['contact_number'];   
    
    $email =$_POST['email'];  
    
    $category_id =$_POST['category_id'];   
    
    $budget = $_POST['budget'];
    $deadline = $_POST['deadline'];
 
    //2. SQL query to save the data into db
    $sql = "INSERT INTO qoutation SET
            customer_id ='$customer_id',
            customer_name= '$customer_name',
            contact_number= '$contact_number',
            email= '$email',
            category_id= '$category_id',
            requirement ='$requirement',
            budget= '$budget',
            deadline_date= '$deadline',
           subject ='$subject',
            company_name ='$company_name',
            product_name ='$product_name',
            req_number ='$req_number'
             ";
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['create']= "<div style='color:green; font-size:28px;'>Advertisement Request created Successfully.</div>";
        
        //Redirect Page
        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=3');
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_create']= "<div style='color:red; font-size:28px;'>Failed to create Advertisement Request.</div>";
        header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=2');
        //Redirect Page
        
    }
}





?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>