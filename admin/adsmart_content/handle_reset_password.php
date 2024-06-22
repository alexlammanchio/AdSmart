<?php  include('../partials-front/menu.php');?>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //Get data from login form;
    if (isset($_POST['reset-passowrd-submit'])) {
        
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat =$_POST["pwd-repeat"];
        
        
        if(empty($password) || empty($passwordRepeat)){
            echo "password and confirm password can't emtpy";
            header('location:'.SITEURL.'create-new-password.php?newpwd=empty');
           
            
            exit();
        }elseif($password != $passwordRepeat){
            
            header('location:'.SITEURL.'create-new-password.php?newpwd=pwdnotsame');
            exit();
            
        }
        
        $currentDate = date("U");
        
        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires>=?";
        
        $stmt =mysqli_stmt_init($conn);
      
        IF(!mysqli_stmt_prepare($stmt, $sql)){
            
            echo "There was an error!";
            exit();
            
        }else{
            //$hashedToken = password_hash($token, PASSWORD_DEFAULT);            
           
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            
            mysqli_stmt_execute($stmt);
            $currentDate = date("U");
            $result = mysqli_stmt_get_result($stmt);
            
            if(!$row = mysqli_fetch_assoc($result)){
                echo "You need to re-submit your reset request.";
                
                exit();
                
                
                
            }else{
                
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
                
                if($tokenCheck === false){
                    
                    echo "You need to re-submit your reset request.";
                    
                    exit();
                } elseif($tokenCheck === true){
                    
                    $tokenEmail = $row['pwdResetEmail'];
                    $sql = "SELECT * FROM adsmart_customer WHERE email=?";
                    
                    IF(!mysqli_stmt_prepare($stmt, $sql)){
                        
                        echo "There was an error!";
                        exit();
                        
                    }else{
                        mysqli_stmt_bind_param($stmt, "s",  $tokenEmail);
                        
                        mysqli_stmt_execute($stmt);
                        
                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an error!";
                            
                            exit();
                            
                        }
                        else{
                            
                            $sql = "UPDATE adsmart_customer Set password=? WHERE email=?";
                            $stmt = mysqli_stmt_init($conn);
                            IF(!mysqli_stmt_prepare($stmt, $sql)){
                                
                                echo "There was an error!";
                                exit();
                                
                            }else{
                                $newPwdHash = md5($password);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                
                                mysqli_stmt_execute($stmt);
                                
                                $sql ="DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                
                                $stmt =mysqli_stmt_init($conn);
                                
                                IF(!mysqli_stmt_prepare($stmt, $sql)){
                                    
                                    echo "There was an error!";
                                    exit();
                                    
                                }else{
                                    
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    
                                    mysqli_stmt_execute($stmt);
                                    
                                    header('location:'.SITEURL.'customer_login.php?newpwd=passwordupdated');
                                }
                            }
                        }
                    }
                }
            }
        }
        
    }else{
        header('location:'.SITEURL.'index.php');
        
    }
                        
        

    
} ELSE{
        header('location:'.SITEURL.'Adsmart_customers_registration.php');
 }
  
                     
?>

<?php  include('../partials-front/footer.php');?>
