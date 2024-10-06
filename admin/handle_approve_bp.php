<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 include('partials/menu.php')

?>

<?php 
require "../PHPMailer/vendor/autoload.php";

//Create an instance; passing `true` enables exceptions



if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //Get data from login form;
    if (isset($_POST['reset-request-submit'])) {
        
       
        $url = "http://localhost/adsmart/adsmart_content/company_login.php";
        
       
        $user_id = $_POST['user_id'];
        $shop_code = $_POST['shop_code'];
        $userEmail = $_POST["email"];
       
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
            $subject = 'AdSmart Business Account';
            $mail->setFrom('adsmartInfo025@gmail.com', 'AdSmart');
            $mail->addAddress($to, 'AdSmart Business Partner email');     //Add a recipient
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            
            
            
        $message ='<p> Your AdSmart Business Partner Account has been Approve !</p>';
        $message .='<p> Here is the login page link:</br>';
        $message .='<a href="'.$url. '">'.$url.'</a></p>';
        $message .='Your User Id"'.$user_id.'" And the shop code is'.$shop_code.'</p>';
        $mail->Body    = $message;
        
        
        $mail->send();
        
        $sql= "UPDATE adsmart_business_partner SET
            apply_status = 'approve'
            WHERE user_id='$user_id'";
        
        $res = mysqli_query($conn, $sql);
        
        header('Location:'.ADMIN.'admin/manage-bp.php?sent=success');
        }
        
        
    }else{
        
        header('location:'.ADMIN.'admin/manage-bp.php?sent=error');
        
    }


?>
<?php  include('partials/footer.php');?>
