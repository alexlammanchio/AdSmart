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
    if(isset($_POST['print_material'])){
        $print_material = $_POST['print_material'];
        $_SESSION['print_material'] = $_POST['print_material'];
    }else{
        
        $print_material = '0';
        
    }
    if(isset($_POST['poster'])){
        $poster = $_POST['poster'];
        $_SESSION['poster'] = $_POST['poster'];
    }else{
        
        $poster = '0';
        
    }
    if(isset($_POST['sticker'])){
        $sticker = $_POST['sticker'];
        $_SESSION['sticker'] = $_POST['sticker'];
    }else{
        
        $sticker = '0';
        
    }
    if(isset($_POST['clothes_product'])){
        $clothes_product = $_POST['clothes_product'];
        $_SESSION['clothes_product'] = $_POST['clothes_product'];
    }else{
        
        $clothes_product = '0';
        
    }
    if(isset($_POST['tnc'])){
        $tnc = $_POST['tnc'];
        $_SESSION['tnc'] = $_POST['tnc'];
    }else{
        
        $tnc = '0';
        
    }
    
  
    
    if(isset($_POST['company_name'])){
        $company_name = $_POST['company_name'];
        $_SESSION['company_name'] = $_POST['company_name'];
    }else{
        
        $company_name = 'NULL';
        
    }
    
    if(isset($_POST['department_name'])){
        $department_name = $_POST['department_name'];
        $_SESSION['department_name'] = $_POST['department_name'];
    }else{
        
        $department_name = 'NULL';
        
    }
    if(isset($_POST['company_country'])){
        $company_country = $_POST['company_country'];
        $_SESSION['company_country'] = $_POST['company_country'];
    }else{
        
        $company_country = 'NULL';
        
    }
    
    if(isset($_POST['staff_number'])){
        $staff_number= $_POST['staff_number'];
        $_SESSION['staff_number'] = $_POST['staff_number'];
    }else{
        
        $staff_number = 'NULL';
        
    }
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $_SESSION['title'] = $_POST['title'];
    }else{
        
        $title = 'NULL';
        
    }
    if(isset($_POST['work_number'])){
        $work_number = $_POST['work_number'];
        $_SESSION['work_number'] = $_POST['work_number'];
    }else{
        
        $work_number = 'NULL';
        
    }
    
    
    $first_name =$_POST['first_name'];
    $_SESSION['first_name'] = $_POST['first_name'];
    
    $last_name =$_POST['last_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    
    $phonecode =$_POST['phonecode'];
    $phonecode1 =$_POST['phonecode1'];
    $_SESSION['phonecode']= $_POST['phonecode'];
    
    $contact_number =$_POST['contact_number'];
    $_SESSION['contact_number'] = $_POST['contact_number'];
    
    $mobile_number = $phonecode.$contact_number;
    $full_work_number = $phonecode1.$work_number;
    $country =$_POST['country'];
    $_SESSION['country'] = $_POST['country'];
    
    $email= $_POST['email'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['customer_name'] = $_POST['customer_name'];
    //check email is repeat or not?
    //connect to db
    $sql3 = "SELECT * FROM adsmart_customer WHERE email = '$email'";
    
    // 執行語句
    $result = mysqli_query($conn, $sql3) or die(mysqli_error());;
    
    // 檢查結果是否存在該帳號
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['fail_email']= "<div style='color:red; font-size:14px;'>The Email <b style='color:black;'>".$email."</b> is already registered. Please provide other email address.</div>";
        $_SESSION['email'] = $_POST['email'];
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    } else {
        
        
        
    }
    //Password encryption with md5
    //button clicked
    //1. Get the data from form
    $first_name =$_POST['first_name'];
    $_SESSION['first_name'] = $_POST['first_name'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($first_name, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character1'] = "<div style='color:red; font-size:14px;'> First name just accept Hyphen - and Underscore _ special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    //1. Get the data from form
    $last_name =$_POST['last_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($last_name, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character2'] = "<div style='color:red; font-size:14px;'> Last name just accept Hyphen - and Underscore _ special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    //1. Get the data from form
    $contact_number =$_POST['contact_number'];
    $_SESSION['contact_number'] = $_POST['contact_number'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($contact_number, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character4'] = "<div style='color:red; font-size:14px;'> Contact Number just accept Hyphen - and Plus sign + special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    
    //1. Get the data from form
    $country =$_POST['country'];
    $_SESSION['country'] = $_POST['country'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($country, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character3'] = "<div style='color:red; font-size:14px;'> Country just accept Hyphen - and Underscore _ special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    
   
    
    //1. Get the data from form
    $customer_name = $_POST['customer_name'];
    $_SESSION['customer_name'] = $_POST['customer_name'];
    // 檢查帳號長度
    if(strlen($customer_name) < 6 || strlen($customer_name) > 16){
        $_SESSION['strlen'] = "<div style='color:red; font-size:14px;'> The length of user id must have 6-16 words</div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    // 定義不允許字元
    $specialChars = "!@#$%^&*() /\\\'\"";
    
    if(strpbrk($customer_name, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character'] = "<div style='color:red; font-size:14px;'> The user id just accept - and _ special characters. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    
    //check name is repeat or not?
    //connect to db
    $sql2 = "SELECT * FROM adsmart_customer WHERE user_id = '$customer_name'";
    
    // 執行語句
    $result = mysqli_query($conn, $sql2) or die(mysqli_error());;
    
    // 檢查結果是否存在該帳號
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['fail_account']= "<div style='color:red; font-size:14px;'>The AdSmart User id:<b style='color:black;'>".$customer_name."</b> is already existed. Please use other user id.</div>";
        $_SESSION['customer_name'] = $_POST['customer_name'];
        
        //檢查資料庫是否已有類似名稱
        $sql = "FROM adsmart_customer WHERE user_id LIKE '$customer_name%'";
        
        //產生建議名稱
        $suggestedName = $customer_name.mt_rand(100,999);
        $_SESSION['suggested_account'] = "Suggested Name:<b style='color:green;'>".$suggestedName."</b>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    } else {
        // 帳號不存在,允許註冊
        
        $suggestedName = mt_rand(1000,9999);
    }
    $company_name =$_POST['company_name'];
    $_SESSION['company_name'] = $_POST['company_name'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($company_name, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character6'] = "<div style='color:red; font-size:14px;'> Company Name just accept Hyphen - and Underscore _ special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    
    
    $work_number =$_POST['work_number'];
    $_SESSION['work_number'] = $_POST['work_number'];
    // 定義不允許字元
    $specialChars = "!@#$%^&*()/\\\'\"";
    
    if(strpbrk($contact_number, $specialChars) !== false) {
        // special char found
        $_SESSION['special_character5'] = "<div style='color:red; font-size:14px;'> Mobile Number just accept Hyphen - and Plus sign + special characters And Space. </div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        die();
    }
    
    
    $password = md5($_POST['password']);
    $password_confirm = md5($_POST['password_confirm']);
    
    if($password != $password_confirm) {
        $_SESSION['fail_password']= "<div style='color:red; font-size:14px;'> Password is not matched confirm password. Please input again.</div>";
        header('location:'.SITEURL.'Adsmart_customers_registration.php');
        exit;
    }
    //2. SQL query to save the data into db
    $sql = "INSERT INTO adsmart_customer SET
            first_name ='$first_name',
            last_name ='$last_name',
            contact_number = '$mobile_number',
            country ='$country',
            user_id ='$customer_name',
            email= '$email',
            password= '$password',
            password_confirm ='$password_confirm',
            print_ads= '$print_ads',
            outdoor_ads= '$outdoor_ads',
            broadcast_ads= '$broadcast_ads',
            telemarketing_ads= '$telemarketing_ads',
           events_ads ='$events_ads',
            placement_ads= '$placement_ads',
            display_ads= '$display_ads',
            search_ads ='$search_ads',
            social_ads= '$social_ads',
            video_ads= '$video_ads',
            native_ads= '$native_ads',
            influencer_ads= '$influencer_ads',
            poster ='$poster',
            sticker ='$sticker',
            clothes_product ='$clothes_product',
            print_material ='$print_material ',
            tnc = '$tnc',
            company_name = '$company_name',
            department_name = '$department_name',
            company_country ='$company_country',
            staff_number ='$staff_number',
            title = '$title',
            work_number = '$full_work_number'
             ";
					
   
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['create']= "<div style='color:green; font-size:28px;'>AdSmart Customer Account created Successfully.</div>";
        
        //Redirect Page
       
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['fail_create']= "<div style='color:red; font-size:28px;'>Failed to create AdSmart Customer Account.</div>";
        header('location:'.USER_MANAGEMENT.'Adsmart_customers_registration.php');
        //Redirect Page
        
    }
}




echo "
<div class='small-container cart-page'>
<div class='reg' >
<h2>AdSmart Customer Signup</h2>
<br>
<h1> Welcome " .$customer_name. "</h1>
<br>
<h3 style='color:red;'>Your AdSmart customer account has been created Successfully!!!</h3>
<br>
<br>
<p> Please click this link <a href='customer_login.php' style='color:blue;'>AdSmart Customer Login Page! </a>. Please go to login your AdSmart customer account!<p>
<br>
<br>
<p> Click this Here to <a href='index.php' style='color:blue;'>home page! </a>.
</div>
</div>
";

?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>