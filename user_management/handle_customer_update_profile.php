 <?php  include('../partials-front/after_customer_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $id = $_POST['id'];    	
    	    $email=$_POST['email'];
    	    $current_image = $_POST['current_image'];   	
    	    $company_name=$_POST['company_name'];
    	    $department_name=$_POST['department_name'];
    	    $title=$_POST['title'];
    	    $work_number=$_POST['work_number'];
    	   $first_name =$_POST['first_name'];
    	   $last_name =$_POST['last_name'];
    	   $contact_number =$_POST['contact_number'];
    	  
    	   if(isset($_POST['country'])){
    	       $country =$_POST['country'];}
    	       else{
    	           
    	           
    	       }
    	   
    	   $company_country =$_POST['company_country'];
    	   $staff_number =$_POST['staff_number'];
    	   
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name'])){
    	        
    	        //get the image details
    	        $image_name = $_FILES['image']['name'];
    	        
    	        //check whether the image is available or not
    	        if($image_name !=""){
    	            
    	            //image available
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="AdSmart_Customer_".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $source_path=$_FILES['image']['tmp_name'];
    	            
    	            $destination_path ="../images/customer/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($source_path, $destination_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	            if($upload==false){
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
    	                die();
    	            }
    	            
    	            //remove the current image
    	            if($current_image !="" and $current_image != 'user-3.PNG'){
    	                $remove_path = "../images/customer/".$current_image;
    	                
    	                $remove = unlink($remove_path);
    	                
    	                //check whether the image is removed or not
    	                //if failed to remove then dispaly message and stop the process
    	                IF($remove ==false){
    	                    
    	                    //Failed to remove image
    	                    $_SESSION['failed-remove'] ="<div class='error'> FAILED to remove current image.</div>";
    	                    header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
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
    	    $sql2 ="UPDATE adsmart_customer SET
                   first_name ='$first_name',
                 last_name ='$last_name',
                    email= '$email',    
                    image_name ='$image_name',               
                   company_name = '$company_name',
                    department_name = '$department_name',
                    title = '$title',
                    work_number = '$work_number',
                   country ='$country',
                    contact_number ='$contact_number',
                    company_country ='$company_country',
                    staff_number ='$staff_number',
                    work_number ='$work_number'
                    WHERE id=$id
                
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div style='color:green; font-size:28px;'> AdSmart Customer Profile updated successfully. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
    	    }else{
    	        
    	        $_SESSION['update'] ="<div style='color:red; font-size:28px;'> Failed to update AdSmart Customer Profile. </div>";
    	        header('location:'.USER_MANAGEMENT.'Adsmart_customers_personal_space.php?page=6');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>