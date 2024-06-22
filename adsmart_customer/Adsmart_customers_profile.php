<div class="small-container cart-page" style ="margin-bottom:250px;">
	<div class="reg" >	
<h1 style="color:#333; text-align:center;">AdSmart Customer Profile </h1>
		<br>		
	
		<div class="reg" >			
			
				<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['change-pwd'])){
    			    
    			    echo $_SESSION['change-pwd'];
    			    unset($_SESSION['change-pwd']);
    			    
    			}
    			if(isset($_SESSION['remove']))
    			{
    			    
    			    echo $_SESSION['remove'];
    			    unset($_SESSION['remove']); //removing seesion
    			}
    			if(isset($_SESSION['delete']))
    			{
    			    
    			    echo $_SESSION['delete'];
    			    unset($_SESSION['delete']); //removing seesion
    			}
    			if(isset($_SESSION['no-category-found']))
    			{
    			    
    			    echo $_SESSION['no-category-found'];
    			    unset($_SESSION['no-category-found']); //removing seesion
    			}
    			if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			if(isset($_SESSION['failed-remove']))
    			{
    			    
    			    echo $_SESSION['failed-remove'];
    			    unset($_SESSION['failed-remove']); //removing seesion
    			}
    			?>  
				<br>
				<?php 
    			if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
    			
    			if(isset($_SESSION['user1']))
    			{
    			    
    			    $account_name = $_SESSION['user1'];
    			     //removing seesion
    			}
    		?>
           <table style="width:100%">
           <?php 
    				    //select all admin
    				    $sql ="SELECT * FROM adsmart_customer   where user_id = '$account_name'";
    				//execute the query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    //check wether the query is executed or not
    				    if($res==TRUE){
    				        
    				        $count =mysqli_num_rows($res); //function to get all the rows 
    				        
    				        $sn=1;
    				        
    				        
    				      $rows=mysqli_fetch_assoc($res);
    				            
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $id=$rows['id'];
    				                $customer_name=$rows['user_id'];
    				                $first_name = $rows['first_name'];
    				                $last_name =$rows['last_name'];
    				                $country =$rows['country'];
    				                $contact_number =$rows['contact_number'];
    				                $password=$rows['password'];
    				                $email=$rows['email'];
    				                $image_name=$rows['image_name'];
    				                $print_ads=$rows['print_ads'];
    				                $broadcast_ads=$rows['broadcast_ads'];
    				                $outdoor_ads=$rows['outdoor_ads'];
    				                $telemarketing_ads=$rows['telemarketing_ads'];
    				                $events_ads=$rows['events_ads'];
    				                $placement_ads=$rows['placement_ads'];
    				                $display_ads=$rows['display_ads'];
    				                $search_ads=$rows['search_ads'];
    				                $social_ads=$rows['social_ads'];
    				                $video_ads=$rows['video_ads'];
    				                $native_ads=$rows['native_ads'];
    				                $influencer_ads=$rows['influencer_ads'];
    				                $print_material = $rows['print_material'];
    				                $sticker = $rows['sticker'];
    				                $poster =$rows['poster'];
    				                $clothes_product = $rows['clothes_product'];
    				                $company_name=$rows['company_name'];
    				                $department_name=$rows['department_name'];
    				                $title=$rows['title'];
    				                $work_number=$rows['work_number'];
    				                $staff_number = $rows['staff_number'];
    				                $company_country =$rows['company_country'];
    				                
    				                $id2 =$rows['id'];
    				                ?>
    				                
                 <tr>
				    <td>Account Name</td>
				    <td><?php echo $customer_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>First Name</td>
				    <td><?php echo $first_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>Last Name</td>
				    <td><?php echo $last_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>Personal Image</td>
				    <td><?php //check image is existed or not
    				            if($image_name!=""){
    				             
    				                    //display image
    				                ?>
    				                <img src="<?php  echo IMAGES;?>/images/customer/<?php echo $image_name;?>" width="150px">
    				                <?php 
    				                
    				                
    				                
    				            }else {
    				             
    				                echo "<div class='error'> image not added </div>";
    				            }
    				            
    				            ?></td>
				    
				  
				  </tr>
				  		 			   
				  
				   
				   <tr>
				    <td>Email</td>
				    <td><?php echo $email;?></td>	
				  </tr>			   
				     
				      <tr>
				    <td>Country</td>
				    <td><?php echo $country;?></td>	
				  </tr>	
				  
				   <tr>
				    <td>Contact Number</td>
				    <td><?php echo $contact_number;?></td>	
				  </tr>	
				     
				    <tr>
				    <td>Looking for Advertisement Types:</td>
				    <td><?php 
							if($print_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Print Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($outdoor_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Outdoor Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($broadcast_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Broadcast Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($telemarketing_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Telemarketing Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($events_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Events Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($placement_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Placement Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($display_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Display Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($search_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Search Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($social_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Social Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($video_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Video Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($native_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Native Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($influencer_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Influencer Ads</b>&nbsp;";
							}
							
							?>	</td>
				   			
				 
							
				   			
				  </tr> 
				  <tr>
				   <td>Looking for Product Types:</td>
				    <td><?php 
							if($print_material == 1){
							    
							    echo "<b class='btn-backend-1'>Print Material</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($poster == 1){
							    
							    echo "<b class='btn-backend-1'>Poster</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($sticker == 1){
							    
							    echo "<b class='btn-backend-1'>Sticker</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($clothes_product == 1){
							    
							    echo "<b class='btn-backend-1'>Clothes Product</b>&nbsp;";
							}
							
							?>
							<?php 
							if($print_material != 1 && $poster != 1 && $sticker != 1 && $clothes_product != 1){
							    
							    echo "N/A";
							}
							?>
								</td>
				  </tr>
				  
				  <?php      if($company_name != NULL){
				  echo "<tr>";
				  echo  "<td style='color:green;'>Company Information</td>";
				  echo  "<td>";
				  if($company_name != NULL){echo "HAVE";}else{echo "NA";}
				  
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				  echo "<tr>";
				  echo  "<td>Company Name:</td>";
				  echo  "<td>";
				 if($company_name != NULL){echo $company_name;}else{echo "NA";}
				 echo "</td>";				 
				 echo  "</tr>";
				 
				 echo "<td>Company's Country</td>";
				 echo "<td>";
				 if($company_country != NULL){echo $company_country;}else{echo "NA";}
				 echo "</td>";
				 echo "</tr>";
				 
				  echo "<tr>";
				  echo  "<td>Department Name</td>";
				   echo  "<td>";
				  if($department_name != NULL){echo $department_name;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				 echo "<tr>";
				 echo   "<td>Title</td>";
				 echo   "<td>";
				  if($title != NULL){echo $title;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  echo "<tr>";
				  
				  echo "<tr>";
				  echo   "<td>Staff Number</td>";
				  echo   "<td>";
				  if($staff_number != NULL){echo $staff_number;}else{echo "NA";}
				  echo "</td>";
				  echo "</tr>";
				  echo "<tr>";
				  
				   echo "<td>Work Number</td>";
				   echo "<td>";
				    if($work_number != NULL){echo $work_number;}else{echo "NA";}
				    echo "</td>";
				  echo "</tr>";
				  
				  
				  }else{
				      echo "<tr>";
				      echo  "<td style='color:red;'>Company Information</td>";
				      echo  "<td> NA </td>";
				      
				  }
				 
				  ?>
    				                <?php 
    				                
    				             
    				        }
    				        else 
    				        {
    				            // we do not have data indb
    				        }
    				    
    				?>    				
    				
          		
          		 <?php      
          		 //select all admin
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
          		               		     
          		   
          		     
          		     
          		 
          		 if($card_number != NULL){
				  echo "<tr>";
				  echo  "<td style='color:green;'>Credit Card Information</td>";
				  echo  "<td>";
				  if($card_number != NULL){echo "HAVE";}else{echo "NA";}
				  
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				  echo "<tr>";
				  echo  "<td>Card Number:</td>";
				  echo  "<td>";
				  if($card_number != NULL){echo $card_number;}else{echo "NA";}
				 echo "</td>";				 
				 echo  "</tr>";
				 
				 echo "<td>Expiration Date</td>";
				 echo "<td>";
				 if($expiration_date != NULL){echo $expiration_date;}else{echo "NA";}
				 echo "</td>";
				 echo "</tr>";
				 
				  echo "<tr>";
				  echo  "<td>CVV</td>";
				   echo  "<td>";
				   if($cvv != NULL){echo $cvv;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				 echo "<tr>";
				 echo   "<td>Card Type</td>";
				 echo   "<td>";
				 if($card_type != NULL){echo $card_type;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  echo "<tr>";
				  
				 
				  }else{
				      echo "<tr>";
				      echo  "<td style='color:red;'>Credit Card Information</td>";
				      echo  "<td> NA </td>";
				      
				  }
          		 }else{
				      
				  }
          		 
				 
			
    				             
    				        
    				       
          		           		 
    				?>    
				  
			
			</table>
			 <a href="<?php echo ADSMART_CUSTOMER; ?>update-customer-info.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:120px; height:80px;font-size:16px;">Update Account Info</a>				 
				  <a href="<?php echo ADSMART_CUSTOMER; ?>update-customer-creditcard.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:130px; height:80px;font-size:16px;">Update Credit Card Info </a> 
				 <a href="<?php echo ADSMART_CUSTOMER; ?>update-customer-preference.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:180px; height:80px;font-size:16px;">Update Customer's Preference</a>
			 <a href="<?php echo ADSMART_CUSTOMER; ?>update-customer-password.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:180px; height:80px;font-size:16px;">Change AdSmart Customer Password</a>
		</div>
		
		
		
</div>
</div>