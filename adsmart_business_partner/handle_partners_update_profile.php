 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    $id=$_POST['id'];
    	    $account_name =$_POST['account_name'];
    	    $company_name=$_POST['company_name'];
    	    $company_chinese_name=$_POST['company_chinese_name'];
    	    $description=$_POST['description'];
    	    $current_image = $_POST['current_image']; 
    	    $company_reg_address=$_POST['company_reg_address'];
    	    $company_reg_number=$_POST['company_reg_number'];
    	    $country =$_POST['country'];
    	    $contact_number =$_POST['contact_number'];
    	    $email=$_POST['email'];
    	    // get all value
    	     	
    	   
    	   
    	 
    	  
    	   if(isset($_POST['country'])){
    	       $country =$_POST['country'];}
    	       else{
    	           
    	           
    	       }
    	   
    	   
    	   
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name'])){
    	        
    	        //get the image details
    	        $image_name = $_FILES['image']['name'];
    	        
    	        //check whether the image is available or not
    	        if($image_name !=""){
    	            
    	            //image available
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="AdSmart_Company_".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $source_path=$_FILES['image']['tmp_name'];
    	            
    	            $destination_path ="../images/company/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($source_path, $destination_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	            if($upload==false){
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=6');
    	                die();
    	            }
    	            
    	            //remove the current image
    	            if($current_image !="" and $current_image != 'user-3.PNG'){
    	                $remove_path = "../images/company/".$current_image;
    	                
    	                $remove = unlink($remove_path);
    	                
    	                //check whether the image is removed or not
    	                //if failed to remove then dispaly message and stop the process
    	                IF($remove ==false){
    	                    
    	                    //Failed to remove image
    	                    $_SESSION['failed-remove'] ="<div class='error'> FAILED to remove current image.</div>";
    	                    header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=6');
    	                    die();
    	                    
    	                }
    	                
    	                
    	            }
    	            
    	            
    	        }else{
    	            
    	            $image_name = $current_image;
    	        }
    	        
    	    }else
    	    {
    	        $image_name = $current_image;
    	    }
    	    
    	    
    	    //update the db
    	    $sql2 ="UPDATE adsmart_business_partner SET
                  
                 company_name ='$company_name',
                    company_chinese_name= '$company_chinese_name',    
                    image_name ='$image_name',               
                   email = '$email',
                    company_reg_number = '$company_reg_number',
                    company_reg_address = '$company_reg_address',                   
                   country ='$country',
                    contact_number ='$contact_number',
                   
                    description ='$description'
                    WHERE shop_code=$id
                
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> AdSmart Business Partner Profile updated successfully. </div>";
    	        header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=6');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update AdSmart Business Partner Profile. </div>";
    	        header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=6');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>