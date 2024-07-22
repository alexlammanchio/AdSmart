<?php  include('../partials-front/after_company_login_menu.php');?>
 <div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
<div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>

   <div class='small-container cart-page'>
   
	   	<div class='reg'>
			<h1>Update Product's Information </h1>
    			<br>
    			<br>
    			<?php 
                		
                		  if(isset($_GET['product_id']))
                		  {
                		      //get id and  all other details
                		      //echo "Getting the data";
                		      
                		      $id = $_GET['product_id'];
                		      //create sql query to get all other details
                		      $sql ="SELECT * FROM adsmart_business_product  WHERE id=$id";
                		      
                		      //execute the query
                		      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); ;
                		      
                		      //count the rows to check whether the id is valid or not
                		      
                		      $count = mysqli_num_rows($res);
                		      
                		      if($count ==1)
                		      {
                		          //get all the data
                		          $rows = mysqli_fetch_assoc($res);
                		          
                		          $id=$rows['id'];
                		          $product_name =$rows['product_name'];
                		          $company_name =$rows['company_name'];
                		          $product_category_name=$rows['product_category_name'];
                		          $description=$rows['description'];
                		          $current_image = $rows['image_name'];
                		          $active=$rows['active'];
                		         $price = $rows['price'];
                		       $quantity = $rows['quantity'];
                		          
                		      }else {
                		          
                		          //redirect to manage category with session message
                		          $_SESSION['no-category-found'] = "<div class='error'> AdSmart Business Partner Product cannot find. </div>";
                		          header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php');
                		          
                		      }
                		      
                		      
                		  }else {
                		      
                		      //redirect to manage category
                		      header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php');
                		  }
                		
                		
                		?>
    			
    			
    			<form action="handle_business_update_product.php" method="POST" enctype="multipart/form-data">
    			
    		   				
    				<table class="tbl-30">
                			<tr>
                				<td>Product Name: </td>
                				<td>
                					<?php echo "<input type='text' name='product_name' value='".$product_name."'>"; ?>
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
                					       <img src="<?php  echo IMAGES;?>/images/business_product/<?php  echo $current_image?>" width="150px">
                					       <?php 
                					   }    elseif($current_image != "" ){
                					       ?>
                					       <img src="<?php  echo IMAGES;?>/images/business_product/<?php  echo $current_image?>" width="150px">
                					       <?php 
                					       
                					   }	else{
                					    
                					       echo "<div class='error'> No Image available. </div>";
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
                				<td>Advertiement Type: </td>
                				<td>
                					<input type="text" name="product_category_name" value="<?php echo $product_category_name; ?>">
                				</td>
                			</tr>
                			
                			
                			
                			<tr>
                				<td>Description: </td>
                				<td>
                					<?php if($description != NULL){ echo "<textarea rows='10' cols='120' name='description'>".$description."</textarea>";}else{echo "<input type='text' name='description' value='NA'>";}?>
                				</td>
                			</tr>
                			
                			
            				  
            				 
            				  <tr>
            				    <td>price</td>
            				    <td><?php if($price != NULL){echo "<input type='text' name='price' value='".$price."'>";}else{echo "<input type='text' name='price' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>quantity</td>
            				    <td><?php if($quantity != NULL){echo "<input type='text' name='quantity' value='".$quantity."'>";}else{echo "<input type='text' name='quantity' value='NA'>";}?></td>	
            				  </tr>
            				  
            				  
                			<tr>
                			   
                			
                			
                				<td>
                					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                					<input type="hidden" name="id" value="<?php echo $id; ?>">
                					
                					
                				</td>   				
                			
                			
                			</tr>
                	
    				<tr>
    					
    					<?php 
    					//"select * From tbl_food where title like '%burger'%' or description like '%burger'%'";
    					$sql2 ="Select * from product_category  ";
    					
    					//Execute the query
    					$res2 = mysqli_query($conn, $sql2);
    					
    					echo "<td><label>Item Category:</label><td>";
    				
    					echo "<select required name='product_category_name'  >";
    					
    					echo "<option value='".$product_category_name."'>".$product_category_name."</option>";
    					while($row = mysqli_fetch_array($res2) ) {
    					   
    					    echo  "<option value='". $row['category_name']."' name='product_category_name'>";
    					    echo   $row['category_name'];
    					    echo   "</option>";
    					    
    					    
    					    
    					    
    					}
    					
    					echo "</select>";
    					
    					echo "<input type='hidden' name='id' value='$id' >";
    					
    					?>
    					
    				</tr>
    				
    				
    				<tr>
					<td>Active: </td>
					<td>
						<input <?php  if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
    					<input <?php  if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
    			
					</td>
				</tr>
    				
    				
    				
    				
    					<tr>    					
    					<td colspan="2">
    						<input type="submit" name="submit"  value="Update Product's Information" class="btn" style="height:50px;font-size:25px; background:#9198e5;"></td>
    					</td>
    				</tr>
    				
    				
    				
    			</table>
    			
    		</form>		
    		
    		
    		
    		
			</div>
		</div>

</div>
</div>


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>
