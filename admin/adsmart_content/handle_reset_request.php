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
        
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        
        $url = "http://localhost/adsmart/adsmart_content/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
        
        $expires = date("U") +1800;
        
        $userEmail = $_POST["email"];
        
        $sql ="DELETE FROM pwdReset WHERE pwdResetEmail=?";
        
        $stmt =mysqli_stmt_init($conn);
        
        IF(!mysqli_stmt_prepare($stmt, $sql)){
            
            echo "There was an error!";
            exit();
            
        }else{
            
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            
            mysqli_stmt_execute($stmt);
        }
        
        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
        
        $stmt =mysqli_stmt_init($conn);
        
        IF(!mysqli_stmt_prepare($stmt, $sql)){
            
            echo "There was an error!";
            exit();
            
        }else{
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            
            mysqli_stmt_execute($stmt);
        }
        $mail = new PHPMailer(true);
        
        try{
            
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
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
            $subject = 'Reset your password for AdSmart';
            $mail->setFrom('adsmartInfo025@gmail.com', 'AdSmart');
            $mail->addAddress($to, 'AdSmart customer email');     //Add a recipient
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            
            
            
        $message ='<p> We received a password reset request. The link is to you to reset password</p>';
        $message .='<p> Here is your password reset link:</br>';
        $message .='<a href="'.$url. '">'.$url.'</a></p>';
        $mail->Body    = $message;
        
        
        $mail->send();
        
        header('Location:'.SITEURL.'reset-password.php?reset=success');
        }catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
        
    }else{
        
        header('location:'.SITEURL.'Adsmart_customers_registration.php');
        
    }
}

?>
<?php  include('../partials-front/footer.php');?>
