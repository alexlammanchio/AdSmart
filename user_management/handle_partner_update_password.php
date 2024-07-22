 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 

    //check whether the submit button u=is clicked
if(isset($_POST['submit'])){
    
    //echo "button clicked";
   $id = $_POST['id'];
   $current_password =md5($_POST['current_password']);
   $new_password = md5($_POST['new_password']);
   $confirm_password = md5($_POST['confirm_password']);
   
   //check current id and current password exists or not
   $sql= "SELECT * FROM adsmart_business_partner            
    WHERE shop_code='$id' AND password='$current_password'";
  
   
   
   //execute the query
   $res = mysqli_query($conn, $sql);
   
   //check whether the query executed successfully or not
   if($res==true){
        // check whether data is available or not 
           $count =mysqli_num_rows($res);
       if($count==1)
       {
           //User exists and password can be changed
           //echo "user found";
           if($new_password == $confirm_password)
           {
               //echo "password is match";
               $sql2 ="UPDATE adsmart_business_partner SET password='$new_password', password_confirm='$confirm_password'
                WHERE shop_code=$id
            ";
               
               $id2= $_POST['id'];
               
               //execute the query
               $res2 = mysqli_query($conn, $sql2);
              
               //check whether the query execute
               if($res2==true){
                   
                   $_SESSION['change-pwd'] = "<div style='color:green; font-size:28px;'>Password Change Successfully.</div>";
                   header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
               }else{
                   
                   $_SESSION['change-pwd'] = "<div style='color:red; font-size:28px;'>Fail to change password.</div>";
                   header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=6');
               }
           }else {
               $id2= $_POST['id'];
               $_SESSION['pwd-not-match']= "<div style='color:red; font-size:28px;'>New Password does not match.</div>";
               header('location:'.USER_MANAGEMENT."update-partner-password.php?id=".$id2);
           }
           
           
           
       }else
       {
           $id2= $_POST['id'];
           $_SESSION['wrong_old_password']= "<div style='color:red; font-size:28px;'>Old Password is not correct.</div>";
           header('location:'.USER_MANAGEMENT."update-partner-password.php?id=$id2");
       }
        
   }
}

?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>