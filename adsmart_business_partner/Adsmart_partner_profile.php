<div class="small-container cart-page">
	<div class="reg" >	
<h1 style="color:#333; text-align:center;">AdSmart Business Partners Profile </h1>
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
    				    $sql ="SELECT * FROM adsmart_business_partner   where user_id = '$account_name'";
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
    				                $id=$rows['shop_code'];
    				                $account_name=$rows['user_id'];
    				                $company_name = $rows['company_name'];
    				                $company_chinese_name =$rows['company_chinese_name'];
    				                $company_reg_address =$rows['company_reg_address'];
    				                $company_reg_number =$rows['company_reg_number'];
    				                $password=$rows['password'];
    				                $country=$rows['country'];
    				                $contact_number =$rows['contact_number'];
    				                $image_name=$rows['image_name'];
    				                $password=$rows['password'];
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
    				                $description=$rows['description'];
    				                $id2=$rows['shop_code'];
    				                ?>
    				                
                 <tr>
				    <td>Account Name</td>
				    <td><?php echo $account_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>Company Name</td>
				    <td><?php echo $company_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>Company Chinese Name</td>
				    <td><?php echo $company_chinese_name;?></td>
				    
				  
				  </tr>
				  <tr>
				    <td>Company Image</td>
				    <td><?php //check image is existed or not
    				            if($image_name!=""){
    				             
    				                    //display image
    				                ?>
    				                <img src="<?php  echo IMAGES;?>/images/company/<?php echo $image_name;?>" width="150px">
    				                <?php 
    				                
    				                
    				                
    				            }else {
    				             
    				                echo "<div class='error'> image not added </div>";
    				            }
    				            
    				            ?></td>
				    
				  
				  </tr>
				  		 			   
				  <tr>
				    <td>Description</td>
				    <td><?php echo $description;?></td>	
				  </tr>		
				   
				   <tr>
				    <td>Company Registration Address</td>
				    <td><?php echo $company_reg_address;?></td>	
				  </tr>			   
				     <tr>
				    <td>Company Registration Number</td>
				    <td><?php echo $company_reg_number;?></td>	
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
				    <td>Can Provide for Advertisement Service:</td>
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
				    <td>Can Provide for Advertisement Product:</td>
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
				
    				                <?php 
    				                
    				             
    				        }
    				        else 
    				        {
    				            // we do not have data indb
    				        }
    				    
    				?>    				
    				
          		
          		 <?php      
          		 //select all admin
          	
          		 $sql1 ="SELECT * FROM business_bank_info   where business_name = '$account_name'";
          		 //execute the query
          		 $res1 = mysqli_query($conn, $sql1);
          		 
          		 //check wether the query is executed or not
          		 
          		 if($res1 == TRUE){      
          		     
          		    
          		     $rows1=mysqli_fetch_assoc($res1);
          		     
          		     
          		     //using while loop to get all the data from db
          		     // and while loop will run as long as we have data in db
          		     // get individual data
          		     if(isset($rows1['id'])){$id=$rows1['id'];}else{ $id = '';}
          		     if(isset($rows1['credit_account'])){$credit_account=$rows1['credit_account'];}else{ $credit_account ='';}
          		     if(isset($rows1['bank_name'])){$bank_name = $rows1['bank_name'];}else{ $bank_name ='';}
          		     if(isset($rows1['counterparty'])){  $counterparty =$rows1['counterparty'];}else{$counterparty='';}
          		     if(isset($rows1['credit_currency'])){$credit_currency =$rows1['credit_currency'];}else{$credit_currency ='';}
          		               		     
          		   
          		     
          		     
          		 
          		     if($credit_account != NULL){
				  echo "<tr>";
				  echo  "<td style='color:green;'>Bank Account Information</td>";
				  echo  "<td>";
				  if($credit_account != NULL){echo "HAVE";}else{echo "NA";}
				  
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				  echo "<tr>";
				  echo  "<td>Credit AccounT:</td>";
				  echo  "<td>";
				  if($credit_account != NULL){echo $credit_account;}else{echo "NA";}
				 echo "</td>";				 
				 echo  "</tr>";
				 
				 echo "<td>Bank Name:</td>";
				 echo "<td>";
				 if($bank_name != NULL){echo $bank_name;}else{echo "NA";}
				 echo "</td>";
				 echo "</tr>";
				 
				  echo "<tr>";
				  echo  "<td>Counterparty:</td>";
				   echo  "<td>";
				   if($counterparty != NULL){echo $counterparty;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  
				  
				 echo "<tr>";
				 echo   "<td>Credit Currency:</td>";
				 echo   "<td>";
				 if($credit_currency != NULL){echo $credit_currency;}else{echo "NA";}
				  echo "</td>";	
				  echo "</tr>";
				  echo "<tr>";
				  
				 
				  }else{
				      echo "<tr>";
				      echo  "<td style='color:red;'>Bank Account Information </td>";
				      echo  "<td> NA </td>";
				      
				  }
          		 }else{
				      
				  }
          		 
				 
			
    				             
    				        
    				       
          		           		 
    				?>    
				  
			
			</table>
			 <a href="<?php echo ADSMART_BUSINESS; ?>update-partner-info.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:120px; height:80px;font-size:16px;">Update Account Info</a>				 
				  <a href="<?php echo ADSMART_BUSINESS; ?>update-partner-bankinfo.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:120px; height:80px;font-size:16px;">Update Bank Info </a> 
				 <a href="<?php echo ADSMART_BUSINESS; ?>update-partner-preference.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:160px; height:80px;font-size:16px;">Update Service & Product Types</a>
			 <a href="<?php echo ADSMART_BUSINESS; ?>update-partner-password.php?id=<?php echo $id2; ?>" class="btn" style="background:#9198e5; width:180px; height:80px;font-size:16px;">Change AdSmart Business Parnter Password</a>
		</div>
		
		
		
</div>
</div>