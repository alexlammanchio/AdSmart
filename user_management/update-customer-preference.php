 <?php  include('../partials-front/after_customer_login_menu.php');?>
<div style="background:#1b0075">
             <?php  include('../partials-front/customer_left_bar.php');?>

          

              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
	   	<div class='reg'>
    	
    		<h1>Update AdSmart Customer Preference</h1>
    		<br>
    		<br>
    		
    		<?php 
    		
    		  if(isset($_GET['id']))
    		  {
    		      //get id and  all other details
    		      //echo "Getting the data";
    		      
    		      $id = $_GET['id'];
    		      //create sql query to get all other details
    		      $sql ="SELECT * FROM adsmart_customer WHERE id=$id";
    		      
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
    		          
    		          
    		          
    		          
    		          
    		          
    		      }else {
    		          
    		          //redirect to manage category with session message
    		          $_SESSION['no-category-found'] = "<div class='error'> AdSmart Customer Profile cannot find. </div>";
    		          header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=6');
    		          
    		      }
    		      
    		      
    		  }else {
    		      
    		      //redirect to manage category
    		      header('location:'.ADSMART_CUSTOMER.'Adsmart_customers_personal_space.php?page=6');
    		  }
    		
    		
    		?>
    		
    		
    		
    		<form action="handle_customer_update_preference.php" method="POST" enctype="multipart/form-data">
    		<table class="tbl-30">
    			<tr>
    				<td>Customer Name: </td>
    				<td>
    					<?php echo $customer_name; ?>
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
    					   }    					   else{
    					    
    					       echo "<div class='error'> No Image available. </div>";
    					   }
    					
    					?>
    				</td>   
    			</tr>   			
    			
    			
    			
    			<tr>
    				<td>Looking for Traditional Ads: </td>
    				<td>
    					Status
    				</td>   				
    			
    			</tr> 
    			
    			<tr>
    				<td>Print Ads: </td>
    				<td>
    					<input <?php  if($print_ads=="1"){echo "checked";}?> type="radio" name="print_ads" value="1">Yes
    					<input <?php  if($print_ads=="0"){echo "checked";}?> type="radio" name="print_ads" value="0">No
    				</td>  
    			</tr>    	
    			
    			<tr>
    				<td>Outdoor Ads: </td>
    				<td>
    					<input <?php  if($outdoor_ads=="1"){echo "checked";}?> type="radio" name="outdoor_ads" value="1">Yes
    					<input <?php  if($outdoor_ads=="0"){echo "checked";}?> type="radio" name="outdoor_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Broadcast Ads: </td>
    				<td>
    					<input <?php  if($broadcast_ads=="1"){echo "checked";}?> type="radio" name="broadcast_ads" value="1">Yes
    					<input <?php  if($broadcast_ads=="0"){echo "checked";}?> type="radio" name="broadcast_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Telemarketing Ads: </td>
    				<td>
    					<input <?php  if($telemarketing_ads=="1"){echo "checked";}?> type="radio" name="telemarketing_ads" value="1">Yes
    					<input <?php  if($telemarketing_ads=="0"){echo "checked";}?> type="radio" name="telemarketing_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Events Ads: </td>
    				<td>
    					<input <?php  if($events_ads=="1"){echo "checked";}?> type="radio" name="events_ads" value="1">Yes
    					<input <?php  if($events_ads=="0"){echo "checked";}?> type="radio" name="events_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Placement Ads: </td>
    				<td>
    					<input <?php  if($placement_ads=="1"){echo "checked";}?> type="radio" name="placement_ads" value="1">Yes
    					<input <?php  if($placement_ads=="0"){echo "checked";}?> type="radio" name="placement_ads" value="0">No
    				</td>   				
    			
    			</tr>   
    			<tr>
    				<td>Looking for Digital Ads: </td>
    				<td>
    					Status
    				</td>   				
    			
    			</tr> 
    			<tr>
    				<td>Display Ads: </td>
    				<td>
    					<input <?php  if($display_ads=="1"){echo "checked";}?> type="radio" name="display_ads" value="1">Yes
    					<input <?php  if($display_ads=="0"){echo "checked";}?> type="radio" name="display_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Search Ads: </td>
    				<td>
    					<input <?php  if($search_ads=="1"){echo "checked";}?> type="radio" name="search_ads" value="1">Yes
    					<input <?php  if($search_ads=="0"){echo "checked";}?> type="radio" name="search_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    			<tr>
    				<td>Video Ads: </td>
    				<td>
    					<input <?php  if($video_ads=="1"){echo "checked";}?> type="radio" name="video_ads" value="1">Yes
    					<input <?php  if($video_ads=="0"){echo "checked";}?> type="radio" name="video_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Native Ads: </td>
    				<td>
    					<input <?php  if($native_ads=="1"){echo "checked";}?> type="radio" name="native_ads" value="1">Yes
    					<input <?php  if($native_ads=="0"){echo "checked";}?> type="radio" name="native_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    			<tr>
    				<td>Social Ads: </td>
    				<td>
    					<input <?php  if($social_ads=="1"){echo "checked";}?> type="radio" name="social_ads" value="1">Yes
    					<input <?php  if($social_ads=="0"){echo "checked";}?> type="radio" name="social_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Influence Ads: </td>
    				<td>
    					<input <?php  if($influencer_ads=="1"){echo "checked";}?> type="radio" name="influencer_ads" value="1">Yes
    					<input <?php  if($influencer_ads=="0"){echo "checked";}?> type="radio" name="influencer_ads" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Looking for AdSmart Product: </td>
    				<td>
    					Status
    				</td>   				
    			
    			</tr> 
    			
    			<tr>
    				<td>Print Material: </td>
    				<td>
    					<input <?php  if($print_material=="1"){echo "checked";}?> type="radio" name="print_material" value="1">Yes
    					<input <?php  if($print_material=="0"){echo "checked";}?> type="radio" name="print_material" value="0">No
    				</td>  
    			</tr>    	
    			
    			<tr>
    				<td>Poster: </td>
    				<td>
    					<input <?php  if($poster=="1"){echo "checked";}?> type="radio" name="poster" value="1">Yes
    					<input <?php  if($poster=="0"){echo "checked";}?> type="radio" name="poster" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Sticker: </td>
    				<td>
    					<input <?php  if($sticker=="1"){echo "checked";}?> type="radio" name="sticker" value="1">Yes
    					<input <?php  if($sticker=="0"){echo "checked";}?> type="radio" name="sticker" value="0">No
    				</td>   				
    			
    			</tr>    
    			<tr>
    				<td>Clothes Product: </td>
    				<td>
    					<input <?php  if($clothes_product=="1"){echo "checked";}?> type="radio" name="clothes_product" value="1">Yes
    					<input <?php  if($clothes_product=="0"){echo "checked";}?> type="radio" name="clothes_product" value="0">No
    				</td>   				
    			
    			</tr>    
    					
    		</table>
    	<input type="hidden" name="id" value="<?php echo $id; ?>">	
    	<input type="submit" name="submit" value="SAVE" class="btn" style="height:50px;font-size:25px; background:#9198e5;">
    	</form>
    	
    	
    	
    	
    	
    	</div>
    	</div>
    
    
    </div>
<?php include('../partials-front/footer.php')?>