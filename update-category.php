<?php include('partials/menu.php') ?>

  <div class='small-container cart-page'>
	   	<div class='reg'>
    	
    		<h1>Update Category</h1>
    		<br>
    		<br>
    		
    		<?php 
    		
    		  if(isset($_GET['id']))
    		  {
    		      //get id and  all other details
    		      //echo "Getting the data";
    		      
    		      $id = $_GET['id'];
    		      //create sql query to get all other details
    		      $sql ="SELECT * FROM adsmart_category WHERE id=$id";
    		      
    		      //execute the query
    		      $res = mysqli_query($conn, $sql);
    		      
    		      //count the rows to check whether the id is valid or not
    		      
    		      $count = mysqli_num_rows($res);
    		      
    		      if($count ==1)
    		      {
    		          //get all the data
    		          $row = mysqli_fetch_assoc($res);
    		          $title = $row['category_name'];
    		          $display_name = $row['display_name'];
    		          $current_image = $row['image_name'];    		          
    		          $active = $row['active'];
    		          $type = $row['advertisement_type'];
    		          
    		          
    		          
    		          
    		      }else {
    		          
    		          //redirect to manage category with session message
    		          $_SESSION['no-category-found'] = "<div class='error'> Category not found. </div>";
    		          header('location:'.SITEURL.'admin/manage-category.php');
    		          
    		      }
    		      
    		      
    		  }else {
    		      
    		      //redirect to manage category
    		      header('location:'.SITEURL.'admin/manage-category.php');
    		  }
    		
    		
    		?>
    		
    		
    		
    		<form action="" method="POST" enctype="multipart/form-data">
    		<table class="tbl-30">
    			<tr>
    				<td>Category Name: </td>
    				<td>
    					<input type="text" name="title" value="<?php echo $title; ?>">
    				</td>
    				
    			
    			
    			</tr>
    			<tr>
    				<td>Category Display Name: </td>
    				<td>
    					<input type="text" name="display_name" value="<?php echo $display_name; ?>">
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
    					       <img src="<?php echo SITEURL; ?>/admin/images/category/<?php  echo $current_image?>" width="150px">
    					       <?php 
    					   }    					   else{
    					    
    					       echo "<div class='error'> image not added. </div>";
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
    				<td>Advertisement Type: </td>
    				<td>
    					<input <?php  if($type=="traditional"){echo "checked";}?> type="radio" name="type" value="traditional"> Traditional
    					<input <?php  if($type=="digital"){echo "checked";}?> type="radio" name="type" value="digital"> Digital
    				</td>   				
    			
    			
    			</tr>    	
    			<tr>
    				<td>Active: </td>
    				<td>
    					<input <?php  if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
    					<input <?php  if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
    				</td>   				
    			
    			
    			</tr>
    			<tr>
    				
    				<td>
    					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
    					<input type="hidden" name="id" value="<?php echo $id; ?>">
    					
    					
    				</td>   				
    			
    			
    			</tr>
    		</table>
    	
    	<input type="submit" name="submit" value="Update Category" class="btn" style="height:50px;font-size:25px; background:#9198e5;">
    	</form>
    	
    	<?php 
    	IF(isset($_POST['submit'])){
    	    
    	    // get all value
    	    $id = $_POST['id'];
    	    $title = $_POST['title'];
    	    $display_name = $_POST['display_name'];
    	    $current_image = $_POST['current_image'];    	  
    	    $active = $_POST['active'];
    	    $type = $_POST['type'];
    	    
    	    //updating new image if selected
    	    if(isset($_FILES['image']['name'])){
    	        
    	        //get the image details
    	        $image_name = $_FILES['image']['name'];
    	        
    	        //check whether the image is available or not
    	        if($image_name !=""){
    	            
    	            //image available
    	            $ext =end(explode('.', $image_name));
    	            
    	            //Rename the Image
    	            $image_name ="AdSmart_Category_".rand(000,999).'.'.$ext; // food_category_834
    	            
    	            
    	            $source_path=$_FILES['image']['tmp_name'];
    	            
    	            $destination_path ="images/category/".$image_name;
    	            
    	            //finally upload the image
    	            $upload = move_uploaded_file($source_path, $destination_path);
    	            
    	            //check whether the image is uploaded or not
    	            // and if the image is not uploaded then we will stop the process and redirect with error message
    	            if($upload==false){
    	                
    	                //Set message
    	                $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
    	                header('location:'.SITEURL.'admin/manage-category.php');
    	                die();
    	            }
    	            
    	            //remove the current image
    	            if($current_image !=""){
        	                $remove_path = "images/category/".$current_image;
        	                
        	                $remove = unlink($remove_path);
        	                
        	                //check whether the image is removed or not
        	                //if failed to remove then dispaly message and stop the process
        	                IF($remove ==false){
        	                    
        	                    //Failed to remove image
        	                    $_SESSION['failed-remove'] ="<div class='error'> FAILED to remove current image.</div>";
        	                    header('location:'.SITEURL.'admin/manage-category.php');
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
    	    $sql2 ="UPDATE adsmart_category SET
                    category_name ='$title',
                    display_name ='$display_name',
                    image_name='$image_name',
                    advertisement_type = '$type',
                    active = '$active'
                    WHERE id=$id
                
                    ";
    		          
    	    //execute the query
    	    $res2 = mysqli_query($conn, $sql2);
    	    
    	    //redirect to manage
    	    if($res2==true){
    	        
    	        $_SESSION['update'] ="<div class='success'> Category updated successfully. </div>";
    	        header('location:'.SITEURL.'admin/manage-category.php');
    	        
    	    }else{
    	        
    	        $_SESSION['update'] ="<div class='error'> Failed to update category. </div>";
    	        header('location:'.SITEURL.'admin/manage-category.php');
    	        
    	    }
    	    
    	    
    		          
    	}
    	
    	
    	?>
    	
    	
    	
    	
    	</div>
    
    
    </div>

<?php include('partials/footer.php')?>