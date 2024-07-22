<?php  include('../partials-front/menu.php');?>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    //Get data from login form;
    if (isset($_POST['customer_name']) && isset($_POST['password'])) {
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $uname = validate($_POST['customer_name']);
        $pass = validate($_POST['password']);
        if(empty($pass) && empty($uname)){
            $_SESSION['login']= "<div style='color:red;'>Username and Password are empty.</div>";
            header('location:'.USER_MANAGEMENT.'customer_login.php');
            exit();
        }else if (empty($uname)) {
            
            $_SESSION['login']= "<div style='color:red;'>Username is empty.</div>";
            header('location:'.USER_MANAGEMENT.'customer_login.php');
            exit();
        }else if(empty($pass)){
            $_SESSION['login']= "<div style='color:red;'>Password is empty.</div>";
            header('location:'.USER_MANAGEMENT.'customer_login.php');
            exit();
        } else
        
     {
            $username = mysqli_real_escape_string($conn, $_POST['customer_name']);
            
            $raw_password = md5($_POST['password']);
            $password =mysqli_real_escape_string($conn,$raw_password);
            //sql to check whether username and password exist or not
            
            
            
            
            
            $sql ="SELECT * FROM adsmart_customer WHERE user_id='$username'  AND password='$password'";
            
            //execute the query
            $res = mysqli_query($conn, $sql);
            
            //4. count rows to check whether the user exist or not
            $count = mysqli_num_rows($res);
            $rows=mysqli_fetch_assoc($res);
            $id = $rows['id'];
            if($count ==1 ){
                //User available and login success
                $_SESSION['login']= "<div class='success'>Login Successfully.</div>";
                $_SESSION['user1']=$username;
                $_SESSION['customer_id'] = $id;
                header('location:'.SITEURL.'partials-front/after_customer_login_menu.php');
                header('location:'.USER_MANAGEMENT.'after_login_client.php');
               
            }else {
                //fail to login
                $_SESSION['login']= "<div style='color:red;'>Username or Password did not match.</div>";
                header('location:'.USER_MANAGEMENT.'customer_login.php');
            }
     }
    }
}
?>
<?php  include('../partials-front/footer.php');?>
