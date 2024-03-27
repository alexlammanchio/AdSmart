<?php include('partials/menu.php') ?>

<?php 
    		
    		  if(isset($_GET['id']))
    		  {
    		      //get id and  all other details
    		      //echo "Getting the data";
    		      
    		      $id = $_GET['id'];
    		      //create sql query to get all other details
    		      $sql2 ="SELECT * FROM tbl_food WHERE id=$id";
    		      
    		      //execute the query
    		      $res2 = mysqli_query($conn, $sql2);
    		      
    		      //get the value based on query executed
    		      
    		      $row2 = mysqli_fetch_assoc($res2);
    		      
    		      //get individual values of selected food    		  
    		      $title = $row2['title'];
    		      $price =$row2['price'];
    		      $description =$row2['description'];
    		      $current_image = $row2['image_name'];
    		      $featured = $row2['featured'];
    		      $active = $row2['active'];
    		      $current_category =$row2['category_id'];
    		      
    		      
    		      
    		      
    		      
    		  }else {
    		      
    		      //redirect to manage category
    		      header('location:'.SITEURL.'/admin/manage-food.php');
    		  }
    		
    		
    		?>



    <div class="main-content">
    	<div class="wrapper">
    	
    		<h1>Update Food</h1>
    		<br>
    		<br>
    		
    		
    		
    		
    		
    		<form action="" method="POST" enctype="multipart/form-data">
    		<table class="tbl-30">
    			<tr>
    				<td>Title: </td>
    				<td>
    					<input type="text" name="title" value="<?php echo $title; ?>">
    				</td>
    				
    			
    			
    			</tr>
    			<tr>
    				<td>Description: </td>
    				<td>
    					<textarea name="description" cols="30" rows="5"> <?php echo $description; ?></textarea>
    				</td>   
    			</tr>
    			<tr>
    				<td>Price: </td>
    				<td>
    					<input type="number" name="price" value="<?php echo $price; ?>">
    				</td>   
    			</tr>
    			
    			<tr>
    				<td>Current Image: </td>
    				<td>
    					<?php 
    					   if($current_image != "")
    					   {
    					       //display image
    					       ?>
    					       <img src="<?php echo SITEURL; ?>/admin/images/food/<?php  echo $current_image?>" width="150px">
    					       <?php 
    					   }    					   else{
    					    
    					       echo "<div class='error'> image not available. </div>";
    					   }
    					
    					?>
    				</td>    				
    			
    			
    			</tr>
    			<tr>
    				<td>New Image: </td>
    				<td>
    					<input type="file" name="image">
    				</td>    				
    			
    			
    			</tr>
    			<tr>
    				<td>Category: </td>
    				<td>
    				
    					<select name="category">
    					
    							<?php 
    							
    							     $sql ="SELECT * FROM tbl_catagory WHERE active='YES'";
    							     //execute the query
    							     $res =mysqli_query($conn, $sql);
    							     
    							     //count rows
    							     $count = mysqli_num_rows($res);
    							     
    							     //check whether category availabe or not
    							     if($count>0){
    							         
    							         //category available
    							         while($row=mysqli_fetch_assoc($res)){
    							             
    							             $category_title= $row['title'];
    							             $category_id = $row['id'];
    							             ?>
    							             
    							             <option<?php if($current_category == $category_id) {echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title;?></option>
    							             <?php 
    							         }
    							         
    							     }else{
    							         
    							         //category not available
    							         echo "<option value='0'>Category not available.</option>";
    							         
    							     }
    							?>
    					
    						
    					
    					</select>
    				</td>   				
    			
    			
    			</tr>
    			
    			
    	<tr>
    				<td>Featured: </td>
    				<td>
    					<input <?php  if($featured=="YES"){echo "checked";}?> type="radio" name="featured" value="YES"> Yes
    					<input <?php  if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
    				</td>   				
    			
    			
    			</tr>
    			<tr>
    				<td>Active: </td>
    				<td>
    					<input <?php  if($active=="YES"){echo "checked";}?> type="radio" name="active" value="YES"> Yes
    					<input <?php  if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
    				</td>   				
    			
    			
    			</tr>
    			<tr>
    				
    				<td>
    					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
    					<input type="hidden" name="id" value="<?php echo $id; ?>">
    					<input type="submit" name="submit" value="Update Category" class="btn-secondary">
    					
    				</td>   				
    			
    			
    			</tr>
    		</table>
    	
    	
    	</form>
    	
    	<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $id = $_POST['id'];
    	    $title = $_POST['title'];
    	    $description = $_POST['description'];
    	    $price = $_POST['price'];
    	    $current_image = $_POST['current_image'];
    	    $category = $_POST['category'];
    	    $featured = $_POST['featured'];
    	    $active = $_POST['active'];
    	    
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name']))
    	    {
    	        
    	        //get the image details
    	        $image_name = $_FILES['image']['name'];
    	        
    	        //check whether the image is available or not
    	        if($image_name !="")
    	        {
    	            
    	            //image available
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="Food_Category_".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $src_path=$_FILES['image']['tmp_name'];
    	            
    	            $dest_path ="images/food/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($src_path, $dest_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	               if($upload==false)
    	               {
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.SITEURL.'/admin/manage-food.php');
    	                die();
    	                }
    	            
    	                
    	                //remove the current image
    	                if($current_image !="")
    	                {
    	                    $remove_path = "images/food/".$current_image;
    	                    
    	                    $remove = unlink($remove_path);
    	                    
    	                    //check whether the image is removed or not
    	                    //if failed to remove then dispaly message and stop the process
    	                    IF($remove ==false){
    	                        
    	                        //Failed to remove image
    	                        $_SESSION['remove-failed'] ="<div class='error'> FAILED to remove current food image.</div>";
    	                        header('location:'.SITEURL.'/admin/manage-food.php');
    	                        die();
    	                        
    	                       }
    	                    
    	                    
    	                    }
    	        
    	        }else{
    	            $image_name = $current_image; //default image when image is not selected
    	             }
    	        }else{
    	            
    	            $image_name = $current_image; //default image when button is not clicked 
    	        }
    	        
    	   
    	    
    	    //update the db
    	    $sql3 ="UPDATE tbl_food SET
                    title ='$title',
                    description ='$description',
                    price = $price,
                    image_name='$image_name',
                    category_id =$category,
                    featured = '$featured', 
                    active = '$active'
                    WHERE id=$id
                
                    ";
    		          
    	    //execute the query
    	    $res3 = mysqli_query($conn, $sql3);
    	    
    	    //redirect to manage
    	    if($res3==true){
    	        
    	        $_SESSION['update'] ="<div class='success'> Food Category updated successfully. </div>";
    	        header('location:'.SITEURL.'/admin/manage-food.php');
    	        
    	    }else{
    	        
    	        $_SESSION['update'] ="<div class='error'> Failed to update food category. </div>";
    	        header('location:'.SITEURL.'/admin/manage-food.php');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
    	
    	
    	
    	
    	</div>
    
    
    </div>

<?php include('partials/footer.php')?>