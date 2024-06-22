<?php  include('partials/menu.php')?>
	
	   <!-- Main content Section Starts -->
	   <div class='small-container cart-page'>
	   	<div class='reg'>
			
    		
    		
    			<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['delete'])){
    			    
    			    echo $_SESSION['delete'];
    			    unset($_SESSION['delete']);
    			}
    			if(isset($_SESSION['update'])){
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']);
    			}
    			if(isset($_SESSION['user-not-found'])){
    			    
    			    echo $_SESSION['user-not-found'];
    			    unset($_SESSION['user-not-found']);
    			}
    			if(isset($_SESSION['pwd-not-match'])){
    			    
    			    echo $_SESSION['pwd-not-match'];
    			    unset($_SESSION['pwd-not-match']);
    			}
    			if(isset($_SESSION['change-pwd'])){
    			    
    			    echo $_SESSION['change-pwd'];
    			    unset($_SESSION['change-pwd']);
    			}
    			?>
    			   		
    			   		<br>
    			<?php
		
		$id =$_GET['id'];
		$sql2 = "SELECT * from adsmart_business_partner where shop_code = '$id'";
		$res2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($res2);
	
		Echo "<h1> AdSmart Business Partner - <b>".$row2['user_id']."</h1>";  
    	?>
    		<div class="reg-container">	
					          
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Applicant Detail</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    <fieldset style="padding-left:15px;"><legend>Requetor's basic information</legend>		
												    <div id="customer_name">
												    	<br>
													    	
													    	
													    	
													    <?php 
													    echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'> User Id: </b>".$row2['user_id']."</p>";
													    	
													    	?>
													    	
													  
													    	
													
													    
													    </div>												    
												     <div id="customer_name">
												    	<br>
													    	
													    	
													    	
													    <?php 
													    echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'> Companyr Name: </b>".$row2['company_name']."</p>";
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    <div id="Contact_number">
												    	
													    
													    	
													    	 <?php 
													    	 if($row2['company_chinese_name'] !=''){
													    	 echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'>Chinese Name: </b>".$row2['company_chinese_name']."</p>";
													    	 }else{
													    	     echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'>Chinese Name: </b> NA</p>";
													    	     
													    	 }
													    	 
													    	
													    	?>
													    	
													    	
													    	
													    
													    <br>
													    </div>
													    <div id="country">
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Company Register Number: </b>".$row2['company_reg_number']."</p>"; 
													    	?>
													    	
													    	
													    
													    	
													    <br>
													    </div>
													    <div id="Contact_number">
												    	
													    
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Company Registe rAddress: </b>".$row2['company_reg_address']."</p>"; 
													    	?>
													    	
													    	
													    	
													    	
													    
													    <br>
													    </div>
													    <div id="country">
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Country: </b>".$row2['country']."</p>"; 
													    	?>
													    	
													    	
													    
													    	
													    <br>
													    </div>
													     <div id="Contact_number">
												    	
													    
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Description: </b>".$row2['description']."</p>"; 
													    	?>
													    	
													    	
													    	
													    	
													    
													    <br>
													    </div>
													    <div id="country">
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Email: </b>".$row2['email']."</p>"; 
													    	?>
													    	
													    	
													    
													    	
													    <br>
													    </div>
													    <div id="country">
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Contact Number: </b>".$row2['contact_number']."</p>"; 
													    	?>
													    	
													    	
													    
													    	
													    <br>
													    </div>
													   </fieldset>
													    <br>
												    	
												    	<br>
												    					
												<tr>
												    <td colspan="2">
												    	
												    </td>
												</tr>
											</tbody>
									</table>
					            
						</div>
    			<a href="manage-bp.php" class="btn" style="background:#9198e5; width:80%; height:50px;font-size:25px;">Black to Business Partner page</a>
			</div>
		</div>
		
		
	    <!-- Main content Section Ends -->
	    
	    
	    
	   <?php include('partials/footer.php')?>