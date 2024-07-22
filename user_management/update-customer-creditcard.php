 <?php  include('../partials-front/after_customer_login_menu.php');?>
<div style="background:#1b0075">
              <?php  include('../partials-front/customer_left_bar.php');?>


              <div class='container-fluid' style ="padding-bottom:350px;">
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
	   	<div class='reg'>
    	
    		<h1>Update AdSmart Customer Card Information</h1>
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
    		          $customer_name=$rows['user_id'];    		         
    		          $current_image = $rows['image_name'];
    		         
    		          
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
    		
    		
    		
    		<form action="handle_customer_update_credit.php" method="POST" enctype="multipart/form-data">
    		<table class="tbl-30">
    			<tr>
    				<td>Customer Name: </td>
    				<td>
    					<?php echo $customer_name; 
    				
    				
    					
    					?>
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
    			<?php 
    			$sql1 ="SELECT * FROM customer_credit_card   where customer_name = '$account_name'";
          		 //execute the query
          		 $res1 = mysqli_query($conn, $sql1);
          		 
          		 //check wether the query is executed or not
          		 
          		 if($res1 == TRUE){      
          		     
          		    
          		     $rows1=mysqli_fetch_assoc($res1);
          		     
          		     
          		     //using while loop to get all the data from db
          		     // and while loop will run as long as we have data in db
          		     // get individual data
          		     if(isset($rows1['id'])){$id=$rows1['id'];}else{ $id = '';}
          		     if(isset($rows1['card_number'])){$card_number=$rows1['card_number'];}else{ $card_number ='';}
          		     if(isset($rows1['expiration_date'])){$expiration_date = $rows1['expiration_date'];}else{ $expiration_date ='';}
          		     if(isset($rows1['cvv'])){  $cvv =$rows1['cvv'];}else{$cvv='';}
          		     if(isset($rows1['card_type'])){$card_type =$rows1['card_type'];}else{$card_type ='';}
          		 }else{}
    			?>
				  <tr>
				    <td>Card Number</td>
				    <td><?php if($card_number != NULL){echo "<input type='text' name='card_number' value='".$card_number."'>";}else{echo "<input type='text' name='card_number' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>Expiration Date</td>
				    <td><?php if($expiration_date != NULL){echo "<input type='date' name='expiration_date' value='".$expiration_date."'>";}else{echo "<input type='text' name='expiration_date' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>CVV</td>
				    <td><?php if($cvv != NULL){echo "<input type='text' name='cvv' value='".$cvv."'>";}else{echo "<input type='text' name='cvv' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>Card Type</td>
				    <td><?php if($card_type != NULL){echo "<input type='text' name='card_type' value='".$card_type."'>";}else{echo "<input type='text' name='card_type' value='NA'>";}?></td>	
				  </tr>
    			<tr>
    			   
    			
    			
    				<td>
    					
    					<input type="hidden" name="customer_id" value="<?php echo $_GET['id']; ?>">
    					
    					<input type="hidden" name="customer_name" value="<?php echo $customer_name; ?>">
    				</td>   				
    			
    			
    			</tr>
    		</table>
    	
    	<input type="submit" name="submit" value="SAVE" class="btn" style="height:50px;font-size:25px; background:#9198e5;">
    	</form>
    	
    	
    	
    	
    	
    	
    	</div>
    </div>	
    </div>
    </div>

<?php include('../partials-front/footer.php')?>