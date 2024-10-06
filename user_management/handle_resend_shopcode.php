<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('../partials-front/menu.php');

?>

<?php 
require "../PHPMailer/vendor/autoload.php";

//Create an instance; passing `true` enables exceptions



if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //Get data from login form;
    if (isset($_POST['reset-request-submit'])) {
        
      
        
        $url = "http://localhost/adsmart/user_management/company_login.php";       
        
        
        $userid = $_POST["user_id"];
        
        $sql ="Select shop_code, email FROM adsmart_business_partner WHERE user_id='$userid'";
        
        $res = mysqli_query($conn, $sql);
        
        $rows=mysqli_fetch_assoc($res);
        
        $userEmail = $rows['email'];
        $shop_code = $rows['shop_code'];
        $mail = new PHPMailer(true);
        
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'adsmartinfo025@gmail.com';                     //SMTP username
        $mail->Password   = 'uids fqhn nsva frkj';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $to = $userEmail;
        $subject = 'Shopcode for AdSmart Business ';
        $mail->setFrom('adsmartInfo025@gmail.com', 'AdSmart');
        $mail->addAddress($to, 'AdSmart Business Partner email');     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        
        
        
        $message ='<p> Your AdSmart Shopcode has been Sent !</p>';
        $message .='<p> Here is the login page link:</br>';
        $message .='<a href="'.$url. '">'.$url.'</a></p>';
        $message .='Your User Id"'.$userid.'" And the shop code is'.$shop_code.'</p>';
        $mail->Body    = $message;
        
        
        $mail->send();
        
        header('Location:'.USER_MANAGEMENT.'resend-bp-shopcode.php?sent=success');
    }
    
    
}else{
    
    header('location:'.USER_MANAGEMENT.'resend-bp-shopcode.php?sent=error');
    
}


?>
<?php  include('../partials-front/footer.php');?>
