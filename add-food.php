<?php  include('partials-front/after_company_login_menu.php');?>

	<div class='main-content'>
	   	<div class='wrapper'>
			<h1>Add Food </h1>
    			<br>
    			<br>
    			<?php 
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			
    			?>
    			
    			
    			<form action="" method="POST" enctype="multipart/form-data">
    			
    			<table class="tbl-30">    				
    				<tr>
    					<td>company_name: </td>
    					<td>
    						<input type="text" name="company_name" placeholder="Company name">
    					</td>
    				</tr>
    				<tr>
    					<td>Description: </td>
    					<td>
    						<textarea  name="description" cols="30" rows="10" placeholder="input description"></textarea>
    					</td>
    				</tr>
    				<tr>
    					<td>Country:</td>
    					<td>
    						<input type="text" name="country" >
    					</td>
    				</tr>
    				<tr>
    					<td>Select image: </td>
    					<td>
    						<input type="file" name="image" >
    					</td>
    				</tr>
    				<!--  
    				<tr>
    					<td>Category: </td>
    					<td>
    						<select name="category" >
    						
    						<?php 
    						
    						/*
    						  //create php code to display categories from db
    						  //1. create sql to get all active categories from db
    						  $sql ="SELECT * FROM tbl_catagory WHERE active='Yes'";
    						  
    						  //execute query
    						  $res = mysqli_query($conn, $sql);
    						  
    						  //count rows to check whether we have categories or not 
    						  $count =mysqli_num_rows($res);
    						  
    						  //if count is greater than zero, we have categories else we donnot have categories
    						  if($count>0){
    						      // we have categories
    						      while($row=mysqli_fetch_assoc($res)){
    						          
    						          //get the details of categories
    						          $id = $row['id'];
    						          $title = $row['title'];
    						          ?>
    						          <option value="<?php echo $id;?>"><?php echo $title; ?></option>
    						          
    						          <?php 
    						          
    						      }
    						      
    						  }else{
    						      //we donot have category
    						      ?>
    						      <option value="0">No category found</option>
    						      <?php 
    						  }
    						  
    						  //2. display on dropdown
    						*/
    						?>
    						
    						
    						
    						</select>
    					</td>
    				</tr>
    				
    				-->
    				
    				
    					<tr>    					
    					<td colspan="2">
    						<input type="submit" name="submit" value="Add food" class="btn-secondary">
    					</td>
    				</tr>
    				
    				
    			</table>
    			
    		</form>		
    		
    		<?php 
    		
    		//check whether the button is clicked or not
    		if(isset($_POST['submit']))
    		{
    		    
    		    //add the food in db
    		    
    		    //1. get the data from form
    		    $company_name = $_POST['company_name'];
    		    $description = $_POST['description'];
    		    $country =$_POST['country'];    		    
    		   
    		
    		        //upload the image if selected
    		        if(isset($_FILES['image']['name'])){
    		            //get the deails of the selected image
    		            $image_name = $_FILES['image']['name'];
    		            
    		            //check whether the image is selected or not and upload image only if selected
    		            if($image_name !=""){
    		                
    		                //image is selected
    		                // rename the image
    		                //get the extension of selected image
    		                
    		                
    		                //upload the image
    		                //get the src path and destination path
    		                
    		                
    		                //source path is the current locaiotn of the image
    		                $src = $_FILES['image']['tmp_name'];
    		                
    		                //destination path for the image to be upload
    		                $dst = "images/company/".$image_name;
    		                
    		                //finally upload the food image
    		                $upload =move_uploaded_file($src,$dst);
    		                
    		                //check whether image upload of not
    		                if($upload ==false){
    		                    
    		                    
    		                    //failed to upload the image
    		                    //redirect to add food page with error message
    		                    $_SESSION['upload'] = "<div class='error'> Failed to upload image.</div>";
    		                    header('location:'.SITEURL.'/admin/add-food.php');
    		                    
    		                    //stop process
    		                    die();
    		                    
    		                }
    		                
    		            }
    		            
    		        }else{
    		            
    		            $image_name ="";    	//setting default value as blank
    		        
    		        }
    		        
    		    //insert into db
    		        $sql2 ="INSERT INTO company_info SET 
                            company_name='$company_name', 
                            description='$description', 
                            country= $country, 
                            image_name='$image_name'";
    		     
    		        //execute query
    		        $res2 = mysqli_query($conn, $sql2);
    		        
    		    //redirect with message to manage food page
    		        if($res2==true){
    		            
    		            //Query executed and category added
    		            $_SESSION['add'] = "<div class='success'> Company added successfully. </div>";
    		            
    		            header('location:'.SITEURL.'/admin/manage-food.php');
    		        }else{
    		            $_SESSION['add'] = "<div class='error'> Failed to add company. </div>";
    		            
    		            header('location:'.SITEURL.'/admin/add-food.php');
    		            
    		        }
    		}
    		    
    		
    		
    		
    		?>
    		
    		
			</div>
		</div>





