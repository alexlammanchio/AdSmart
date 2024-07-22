 <?php  include('../partials-front/after_company_login_menu.php');?>
<div style="background:#1b0075">
              <?php  include('../partials-front/company_left_bar.php');?>


              <div class='container-fluid' style ='padding-bottom:500px;'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
	   	<div class='reg'>
    	
    		<h1>Update AdSmart Business Partner Bank Information</h1>
    		<br>
    		<br>
    		
    		<?php 
    		
    		  if(isset($_GET['id']))
    		  {
    		      //get id and  all other details
    		      //echo "Getting the data";
    		      
    		      $id = $_GET['id'];
    		      //create sql query to get all other details
    		      $sql ="SELECT * FROM adsmart_business_partner  WHERE shop_code=$id";
    		      
    		      //execute the query
    		      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); ;
    		      
    		      //count the rows to check whether the id is valid or not
    		      
    		      $count = mysqli_num_rows($res);
    		      
    		      if($count ==1)
    		      {
    		          //get all the data
    		          $rows = mysqli_fetch_assoc($res);
    		          
    		          $id=$rows['shop_code'];    		         
    		          $account_name=$rows['user_id'];   
    		          $company_name=$rows['company_name'];
    		          $current_image = $rows['image_name'];
    		          $id2=$rows['shop_code']; 
    		          
    		      }else {
    		          
    		          //redirect to manage category with session message
    		          $_SESSION['no-category-found'] = "<div class='error'> AdSmart Business Partner Profile cannot find. </div>";
    		          header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php');
    		          
    		      }
    		      
    		      
    		  }else {
    		      
    		      //redirect to manage category
    		      header('location:'.USER_MANAGEMENT.'Adsmart_partners_personal_space.php');
    		  }
    		
    		
    		?>
    		
    		
    		
    		<form action="handle_partner_update_bankinfo.php" method="POST" enctype="multipart/form-data">
    		<table class="tbl-30">
    			<tr>
    				<td>Account Name: </td>
    				<td>
    					<?php echo $account_name; 
    				
    				
    					
    					?>
    				</td>
    			</tr>
    			<tr>
    				<td>Company Name: </td>
    				<td>
    					<?php echo $company_name; 
    				
    				
    					
    					?>
    				</td>
    			</tr>
    			
    			
    			</tr>
    			<?php 
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
          		     if(isset($rows1['bank_name'])){$bank_name=$rows1['bank_name'];}else{ $bank_name ='';}
          		     if(isset($rows1['credit_account'])){$credit_account = $rows1['credit_account'];}else{ $credit_account ='';}
          		     if(isset($rows1['counterparty'])){  $counterparty =$rows1['counterparty'];}else{$counterparty='';}
          		     if(isset($rows1['credit_currency'])){$credit_currency =$rows1['credit_currency'];}else{$credit_currency ='';}
          		 }else{}
    			?>
				  <tr>
				    <td>Bank Name</td>
				    <td><?php if($bank_name != NULL){echo "<input type='text' name='bank_name' value='".$bank_name."'>";}else{echo "<input type='text' name='bank_name' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>Credit Account</td>
				    <td><?php if($credit_account != NULL){echo "<input type='number' name='credit_account' value='".$credit_account."'>";}else{echo "<input type='number' name='credit_account' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>Counterparty</td>
				    <td><?php if($counterparty != NULL){echo "<input type='text' name='counterparty' value='".$counterparty."'>";}else{echo "<input type='text' name='counterparty' value='NA'>";}?></td>	
				  </tr>
				  <tr>
				    <td>Credit currency</td>
				    <td><?php if($credit_currency  != NULL){echo "<input type='text' name='credit_currecny' value='".$credit_currency."'>";}else{echo "<input type='text' name='credit_currecny' value='NA'>";}?></td>	
				  </tr>
    			<tr>
    			   
    			
    			
    				<td>
    					
    					<input type="hidden" name="business_id" value="<?php echo $id2; ?>">
    					
    					<input type="hidden" name="account_name" value="<?php echo $account_name; ?>">
    				</td>   				
    			
    			
    			</tr>
    		</table>
    	
    	<input type="submit" name="submit" value="SAVE" class="btn" style="height:50px;font-size:25px; background:#9198e5;">
    	</form>
    	
    	
    	
    	
    	
    	
    	</div>
    </div>	
    
    </div>

<?php include('../partials-front/footer.php')?>