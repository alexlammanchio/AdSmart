<?php  include('../partials-front/after_company_login_menu.php');?>

<div style="background:#1b0075">
        <?php  include('../partials-front/company_left_bar.php');?>


              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
                	
                		<h1>Update AdSmart Business Partner Profile</h1>
                		<br>
                		<br>
                		
                		<?php 
                		
                		  if(isset($_GET['id']))
                		  {
                		      //get id and  all other details
                		      //echo "Getting the data";
                		      
                		      $id = $_GET['id'];
                		      //create sql query to get all other details
                		      $sql ="SELECT * FROM adsmart_business_partner  WHERE shop_code=$shop_code";
                		      
                		      //execute the query
                		      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); ;
                		      
                		      //count the rows to check whether the id is valid or not
                		      
                		      $count = mysqli_num_rows($res);
                		      
                		      if($count ==1)
                		      {
                		          //get all the data
                		          $rows = mysqli_fetch_assoc($res);
                		          
                		          $id=$rows['shop_code'];
                		          $account_name =$rows['user_id'];
                		          $company_name =$rows['company_name'];
                		          $company_chinese_name=$rows['company_chinese_name'];
                		          $description=$rows['description'];
                		          $current_image = $rows['image_name'];
                		          $company_reg_address=$rows['company_reg_address'];
                		          $company_reg_number=$rows['company_reg_number'];                		         
                		          $country =$rows['country'];
                		          $contact_number =$rows['contact_number'];
                		         $email =$rows['email'];
                		          
                		      }else {
                		          
                		          //redirect to manage category with session message
                		          $_SESSION['no-category-found'] = "<div class='error'> AdSmart Business Partner Profile cannot find. </div>";
                		          header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php');
                		          
                		      }
                		      
                		      
                		  }else {
                		      
                		      //redirect to manage category
                		      header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php');
                		  }
                		
                		
                		?>
                		
                		
                		
                		<form action="handle_partners_update_profile.php" method="POST" enctype="multipart/form-data">
                		<table class="tbl-30">
                			<tr>
                				<td>Account Name: </td>
                				<td>
                					<?php echo $account_name; ?>
                				</td>
                			</tr>
                			<tr>
                				<td>Company Name: </td>
                				<td>
                					<?php if($company_name != NULL){echo "<input type='text' name='company_name' value='".$company_name."'>";}else{echo "<input type='text' name='company_name' value='NA'>";}?>
                				</td>
                			</tr>
                			<tr>
                				<td>Company Chinese Name: </td>
                				<td>
                					<?php if($company_chinese_name != NULL){echo "<input type='text' name='company_chinese_name' value='".$company_chinese_name."'>";}else{echo "<input type='text' name='company_chinese_name' value='NA'>";}?>
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
                					       <img src="<?php  echo IMAGES;?>/images/company/<?php  echo $current_image?>" width="150px">
                					       <?php 
                					   }    elseif($current_image != "" and $current_image != 'user-3.PNG'){
                					       ?>
                					       <img src="<?php  echo IMAGES;?>/images/company/<?php  echo $current_image?>" width="150px">
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
                				<td>Email: </td>
                				<td>
                					<input type="text" name="email" value="<?php echo $email; ?>">
                				</td>
                			</tr>
                			
                			<tr>
                				<td>Country: </td>
                				<td>
            												    	
            													    	
            					<?php 
            				          
            				          $sql3 = "SELECT * from country  ";
            				          $res3 = mysqli_query($conn, $sql3);
            				          
            				          
            				      
            				          echo "<select  name='country'  style='border: 1px solid black;'>";
            				      
            				          
            				          if($country != ''){ 
            				              echo "<option value='".$country."'>".$country."</option>";
            				          }else{
            				              
            				              echo "<option value=''>Select One</option>";
            				          }
            				         
            				          while($row3 = mysqli_fetch_array($res3) ){
            				              $row3['countrycode'];
            				              $row3['countryname'];
            				              echo  "<option value='".$row3['countryname']."' name='".$row3['countryname']."'>";
            				              echo $row3['countryname'];;
            				              echo   "</option>";
            				          }
            				          echo "</select>";
            				    						   ?>
            													    	
            													  </td>
                			</tr>
                			
                			<tr>
                				<td>Contact Number: </td>
                				<td>
                					<?php if($contact_number != NULL){echo "<input type='text' name='contact_number' value='".$contact_number."'>";}else{echo "<input type='text' name='contact_number' value='NA'>";}?>
                				</td>
                			</tr>
                			
                			
            				  
            				 
            				  <tr>
            				    <td>Description</td>
            				    <td><?php if($description != NULL){echo "<textarea rows='10' cols='120' name='description'>".$description."</textarea>";}else{echo "<input type='text' name='description' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Company Registration address</td>
            				    <td><?php if($company_reg_address != NULL){echo "<input type='text' name='company_reg_address' value='".$company_reg_address."'>";
                                                                            }else{echo "<input type='text' name='company_reg_address' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Company Registration Number</td>
            				    <td><?php if($company_reg_number != NULL){echo "<input type='text' name='company_reg_number' value='".$company_reg_number."'>";}else{echo "<input type='text' name='company_reg_number' value='NA'>";}?></td>	
            				  </tr>
            				  
                			<tr>
                			   
                			
                			
                				<td>
                					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                					<input type="hidden" name="id" value="<?php echo $id; ?>">
                					
                					
                				</td>   				
                			
                			
                			</tr>
                		</table>
                	
                	<input type="submit" name="submit" value="SAVE" class="btn" style="height:50px;font-size:25px; background:#9198e5;">
                	</form>
                	
                	
                	
                	
                	
                	
                	</div>
                
                
                </div>
 </div>

<?php include('../partials-front/footer.php')?>