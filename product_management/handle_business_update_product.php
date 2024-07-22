 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    //echo "button clicked";
    	    $product_name = $_POST['product_name'];
    	    $current_image = $_POST['current_image']; 
    	   $id = $_POST['id'];
    	    $description = $_POST['description'];
    	    $price   =$_POST['price'];
    	    $quantity   =$_POST['quantity'];
    	    $active   =$_POST['active'];
    	    date_default_timezone_set('Asia/Hong_Kong');
    	    $product_category_name =$_POST['product_category_name'];
    	 
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name'])){
    	        
    	        //get the image details
    	        $image_name = $_FILES['image']['name'];
    	        
    	        //check whether the image is available or not
    	        if($image_name !=""){
    	            
    	            //image available
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="AdSmart_Business_Product".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $source_path=$_FILES['image']['tmp_name'];
    	            
    	            $destination_path ="../images/business_product/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($source_path, $destination_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	            if($upload==false){
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=4');
    	                die();
    	            }
    	            
    	            //remove the current image
    	            if($current_image !="" and $current_image != 'user-3.PNG'){
    	                $remove_path = "../images/business_product/".$current_image;
    	                
    	                $remove = unlink($remove_path);
    	                
    	                //check whether the image is removed or not
    	                //if failed to remove then dispaly message and stop the process
    	                IF($remove ==false){
    	                    
    	                    //Failed to remove image
    	                    $_SESSION['failed-remove'] ="<div class='error'> FAILED to remove current image.</div>";
    	                    header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=4');
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
    	    //2. create sql query to insert category into db
    	    $sql ="update adsmart_business_product SET
    	    
               
                product_category_name='$product_category_name',
                 product_name ='$product_name',                
                active ='$active',
                image_name='$image_name',
                 description ='$description',
                    quantity ='$quantity',
                    price='$price'
                    Where id = '$id'";
    	    
    	    //3. execute the query and save in db
    	    $res =mysqli_query($conn, $sql);
    	    
    	    //4. check whether the query executed or not and data added or not
    	    if($res==true){
    	        
    	        //Query executed and category added
    	        $_SESSION['add'] = "<div class='success'> Product updated successfully. </div>";
    	        
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=4');
    	    }else{
    	        $_SESSION['error'] = "<div class='error'> Failed to update product. </div>";
    	        
    	        header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php?page=4');
    	        
    	    }
    	}
    	
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>