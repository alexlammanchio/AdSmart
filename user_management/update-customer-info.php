 <?php  include('../partials-front/after_customer_login_menu.php');?>

<div style="background:#1b0075">
              <?php  include('../partials-front/customer_left_bar.php');?>

              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
                	
                		<h1>Update AdSmart Customer Profile</h1>
                		<br>
                		<br>
                		
                		<?php 
                		
                		  if(isset($_GET['id']))
                		  {
                		      //get id and  all other details
                		      //echo "Getting the data";
                		      
                		      $id = $_GET['id'];
                		      //create sql query to get all other details
                		      $sql ="SELECT * FROM adsmart_customer  WHERE id=$id";
                		      
                		      //execute the query
                		      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); ;
                		      
                		      //count the rows to check whether the id is valid or not
                		      
                		      $count = mysqli_num_rows($res);
                		      
                		      if($count ==1)
                		      {
                		          //get all the data
                		          $rows = mysqli_fetch_assoc($res);
                		          
                		          $id=$rows['id'];
                		          $first_name =$rows['first_name'];
                		          $last_name =$rows['last_name'];
                		          $customer_name=$rows['user_id'];
                		          $email=$rows['email'];
                		          $current_image = $rows['image_name'];
                		          $company_name=$rows['company_name'];
                		          $department_name=$rows['department_name'];
                		          $title=$rows['title'];
                		          $work_number=$rows['work_number'];
                		          $country =$rows['country'];
                		          $contact_number =$rows['contact_number'];
                		          $company_country =$rows['company_country'];
                		          $staff_number =$rows['staff_number'];
                		          
                		      }else {
                		          
                		          //redirect to manage category with session message
                		          $_SESSION['no-category-found'] = "<div class='error'> AdSmart Customer Profile cannot find. </div>";
                		          header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php');
                		          
                		      }
                		      
                		      
                		  }else {
                		      
                		      //redirect to manage category
                		      header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php');
                		  }
                		
                		
                		?>
                		
                		
                		
                		<form action="handle_customer_update_profile.php" method="POST" enctype="multipart/form-data">
                		<table class="tbl-30">
                			<tr>
                				<td>Customer Name: </td>
                				<td>
                					<?php echo $customer_name; ?>
                				</td>
                			</tr>
                			<tr>
                				<td>First Name: </td>
                				<td>
                					<?php if($first_name != NULL){echo "<input type='text' name='first_name' value='".$first_name."'>";}else{echo "<input type='text' name='first_name' value='NA'>";}?>
                				</td>
                			</tr>
                			<tr>
                				<td>Last Name: </td>
                				<td>
                					<?php if($last_name != NULL){echo "<input type='text' name='last_name' value='".$last_name."'>";}else{echo "<input type='text' name='last_name' value='NA'>";}?>
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
                					       <img src="<?php  echo IMAGES;?>/images/customer/<?php  echo $current_image?>" width="150px">
                					       <?php 
                					   }    elseif($current_image != "" and $current_image != 'user-3.PNG'){
                					       ?>
                					       <img src="<?php  echo IMAGES;?>/images/customer/<?php  echo $current_image?>" width="150px">
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
            				    <td>Company Information</td>
            				    <td><?php if($company_name != NULL){echo "Have";}else{echo "NA";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Company Name:</td>
            				    <td><?php if($company_name != NULL){echo "<input type='text' name='company_name' value='".$company_name."'>";}else{echo "<input type='text' name='company_name' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Company Country: </td>
            				    <td>
            				      <?php 
            				      
            				          
            				          $sql3 = "SELECT * from country  ";
            				          $res3 = mysqli_query($conn, $sql3);
            				          
            				          
            				    
            				          
            				          echo "<select  name='company_country'  style='border: 1px solid black;'>";
            				      
            				          if($company_country != ''){ 
            				          echo "<option value='".$company_country."'>".$company_country."</option>";
            				         
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
            				    <td>Department Name</td>
            				    <td><?php if($department_name != NULL){echo "<input type='text' name='department_name' value='".$department_name."'>";}else{echo "<input type='text' name='department_name' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Title</td>
            				    <td><?php if($title != NULL){echo "<input type='text' name='title' value='".$title."'>";}else{echo "<input type='text' name='title' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Staff Number</td>
            				    <td><?php if($staff_number != NULL){echo "<input type='text' name='staff_number' value='".$staff_number."'>";}else{echo "<input type='text' name='staff_number' value='NA'>";}?></td>	
            				  </tr>
            				  <tr>
            				    <td>Work Number</td>
            				    <td><?php if($work_number != NULL){echo "<input type='text' name='work_number' value='".$work_number."'>";}else{echo "<input type='text' name='work_number' value='NA'>";}?></td>	
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