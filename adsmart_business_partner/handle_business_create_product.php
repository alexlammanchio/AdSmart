 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    //echo "button clicked";
    	    $product_name = $_POST['product_name'];
    	    $company_id = $_POST['company_id'];
    	    $company_name = $_POST['company_name'];
    	    $description = $_POST['description'];
    	    $price   =$_POST['price'];
    	    $quantity   =$_POST['quantity'];
    	    $active   =$_POST['active'];
    	    $product_display_name =$_POST['product_display_name'];
    	    $product_category_name =$_POST['product_category_name'];
    	 
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name'])){
    	        //upload the image
    	        $image_name=$_FILES['image']['name'];
    	        
    	        //Upload the image only if image is selected
    	        if($image_name !="")
    	        {
    	            
    	            
    	            //Auto Rename our image
    	            //Get the extension of our image(jpg,png) e.g "special.jpg"
    	            
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="AdSmart_business_product".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $source_path=$_FILES['image']['tmp_name'];
    	            
    	            $destination_path ="../images/business_product/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($source_path, $destination_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	            if($upload==false){
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.ADSMART_BUSINESS.'add_partner_products.php');
    	                die();
    	            }
    	            
    	        }
    	    }else{
    	        //don't upload image and set the image_name values as blank
    	        $image_name="";
    	        
    	    }
    	    
    	    
    	    //update the db
    	    //2. create sql query to insert category into db
    	    $sql ="INSERT INTO adsmart_business_product SET
    	    
                category_id='$product_display_name',
                product_category_name='$product_category_name',
                 product_name ='$product_name',
                company_name='$company_name',
                company_id='$company_id',
                active ='$active',
                image_name='$image_name',
                 description ='$description',
                    quantity ='$quantity',
                    price='$price'";
    	    
    	    //3. execute the query and save in db
    	    $res =mysqli_query($conn, $sql);
    	    
    	    //4. check whether the query executed or not and data added or not
    	    if($res==true){
    	        
    	        //Query executed and category added
    	        $_SESSION['add'] = "<div class='success'> Product added successfully. </div>";
    	        
    	        header('location:'.ADSMART_BUSINESS.'add_partners_products.php');
    	    }else{
    	        $_SESSION['error'] = "<div class='error'> Failed to add product. </div>";
    	        
    	        header('location:'.ADSMART_BUSINESS.'add_partners_products.php');
    	        
    	    }
    	}
    	
    	
    	
    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>