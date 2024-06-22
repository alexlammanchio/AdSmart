<?php  include('../partials-front/menu.php');?>

<!-- -Cart Items Details -->
<div class="small-container cart-page">
		<div class="reg" >
				<h2>AdSmart Business Partner Signup Page</h2>
								<?php 
    		
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			
    			?>
						<div class="reg-container">	
					          <form action="handle_business_partner_reg.php" method="post">
					            <table id="customer_reg">
											<tbody>
												<tr>
												    <tH colspan="2" style="text-align:center;">Adsmart Business Partner</tH>
												</tr>
												<tr>
												    <td colspan="2" >
												    <fieldset style="padding-left:15px;"><legend>applicant's basic company's information</legend>
												    <br>
												    	<div id="name">
													    	<label><b style="color:red;">*</b>Company Name</label><br>
													    	<?php 
													    	 
													    	 if(isset($_SESSION['special_character1']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character1'];
													    	     unset($_SESSION['special_character1']); //removing seesion
													    	 }
													    	 
                                                        	?>
													    	<input  required id="input_0" type="text" name="company_name" placeholder="please input your Company Name" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['company_name'])) {
													    	    echo $_POST['company_name'];} elseif(isset($_SESSION['company_name'])){
													    	        
													    	        echo $_SESSION['company_name'];
													    	        unset($_SESSION['company_name']);
													    	    }
													    	
													    	?>"><br>
													    </div>
													    <br>
													    <div id="name_chn">
													    <?php 
													    	 
													    	 if(isset($_SESSION['special_character2']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character2'];
													    	     unset($_SESSION['special_character2']); //removing seesion
													    	 }
													    	 
                                                        	?>
													    	<label>Company Name in Chinese</label><br>
													    	<input id="input_0" type="text" name="company_chinese_name" placeholder="please input your Company Name in Chinese" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['company_chinese_name'])) {
													    	    echo $_POST['company_chinese_name'];} elseif(isset($_SESSION['company_chinese_name'])){
													    	        
													    	        echo $_SESSION['company_chinese_name'];
													    	        unset($_SESSION['company_chinese_name']);
													    	    }
													    	
													    	?>"><br>
													    </div>
													    <br>
													    <div id="reg_number">
													    	<label><b style="color:red;">*</b>Company Registration Number</label><br>
													    	<input required id="input_0" type="text" name="company_reg_number" placeholder="please input your Company Registration Number" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['company_reg_number'])) {
													    	    echo $_POST['company_reg_number'];} elseif(isset($_SESSION['company_reg_number'])){
													    	        
													    	        echo $_SESSION['company_reg_number'];
													    	        unset($_SESSION['company_reg_number']);
													    	    }
													    	
													    	?>"
													    	><br>
													    </div>
													    <br>
													    <div id="description">
													    	<label><b style="color:red;">*</b>Company Description</label><br>
													    	<textarea required id="description" name="description" rows="8" cols="50" >
													    	<?php 
													    	if(isset($_POST['description'])) {
													    	    echo $_POST['description'];} elseif(isset($_SESSION['description'])){
													    	        
													    	        echo $_SESSION['description'];
													    	        unset($_SESSION['description']);
													    	    }
													    	
													    	?>
													    	</textarea>
													    	<br>
													    </div>
													    <div>
													    	<label>Company Image: </label>
													    	<input type="file" name="image">
													    	<br>
													   
				
						
		
					
													    </div>
													    
													
													     
													 
												    	<div id="Contact_number">
												    	
													    	<label><b style="color:red;">*</b>Contact Number</label><br>
													    	 <?php 
													    	$sql5 = "SELECT distinct(phonecode) from country_numcode order by phonecode  ";
													    	$res5 = mysqli_query($conn, $sql5);
													    	
													   
													 echo "<label>Phone Code:</label>";
													 echo "<select required name='phonecode'  >";
													 If(isset($_SESSION['phonecode'])){
													     $phonecode = $_SESSION['phonecode'];
													     echo "<option value='".$phonecode."'>".$phonecode."</option>";
													 }else{
													     echo "<option value=''>Select One</option>";
													 }
													 
													
                    					             while($row5 = mysqli_fetch_array($res5) ) {
													    	   $row5['phonecode'];
													    	   echo  "<option value='".$row5['phonecode']."' name='".$row5['phonecode']."'>";
													    	   echo "+".$row5['phonecode'];
													    	   echo   "</option>";
													    	   
													    	  
													    	 
													    	
													    	 }
													    	 echo "</select>";
													 
													    	 echo   "+";
													    	 if(isset($_SESSION['special_character4']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character4'];
													    	     unset($_SESSION['special_character4']); //removing seesion
													    	 }
													    	
                                                        	?>
													    	
													    	<input required id="input_0" type="text" name="contact_number" placeholder="please input your contact number" style="width:250px; height:30px;" 
													    	value="<?php 
													    	if(isset($_POST['contact_number'])) {
													    	    echo $_POST['contact_number'];} elseif(isset($_SESSION['contact_number'])){
													    	        
													    	        echo $_SESSION['contact_number'];
													    	        unset($_SESSION['contact_number']);
													    	    }
													    	
													    	?>"
													    	
													    	>
													    	
													    	<br>
													    
													    </div>
													    <div id="country">
												    	
													    	<label><b style="color:red;">*</b>Company Registration Country</label><br>
													    	  <?php 
													    	$sql2 = "SELECT * from country  ";
													    	$res2 = mysqli_query($conn, $sql2);
													    	
													    	?>
													 <?php 
													 echo "<select required name='country'  >";
													 If(isset($_SESSION['country'])){
													     $country = $_SESSION['country'];
													     echo "<option value='".$country."'>".$country."</option>";
													 }else{
													     echo "<option value=''>Select One</option>";
													 }
													 
													 
                    					             while($row2 = mysqli_fetch_array($res2) ) {
													    	   $row2['countrycode'];
													    	   $row2['countryname'];
													    	   echo  "<option value='".$row2['countryname']."' name='".$row2['countryname']."'>";
													    	   echo $row2['countryname'];;
													    	   echo   "</option>";
													    	           
													    	  
													    	 
													    	
													    	 }
													    	 echo "</select>";
													   ?>
                    					               
													    	<br>													    
													    
													    </div>
													    <br>
													    <div id="reg_addres">
													    <?php 
													    	 
													    	 if(isset($_SESSION['special_character4']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character4'];
													    	     unset($_SESSION['special_character4']); //removing seesion
													    	 }
													    	 
                                                        	?>
													    	<label><b style="color:red;">*</b>Company Registration Address</label><br>
													    	<input required id="input_0" type="text" name="company_reg_address" placeholder="please input your Company Registration Number" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['company_reg_address'])) {
													    	    echo $_POST['company_reg_address'];} elseif(isset($_SESSION['company_reg_address'])){
													    	        
													    	        echo $_SESSION['company_reg_address'];
													    	        unset($_SESSION['company_reg_address']);
													    	    }
													    	
													    	?>"
													    	><br>
													    </div>
													    <br>
												    	<div id="email">												    	
													    	<label><b style="color:red;">*</b>Company Email address</label><br>
													    	<input required  id="input_1" type="email" name="email" placeholder="please input your email address" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['email'])) {
													    	    echo $_POST['email'];} elseif(isset($_SESSION['email'])){
													    	        
													    	        echo $_SESSION['email'];
													    	        unset($_SESSION['email']);
													    	    }
													    	
													    	?>"
													    	><br>
												    	</div>		
												    	<br>
												    	</fieldset>
												    	<br>
												    	<fieldset style="padding-left:15px;"><legend>applicant's account information</legend>
													   <br>
													   <div id="name">
													  
													    	<label><b style="color:red;">*</b>User Id</label> <?php 
													    	 if(isset($_SESSION['strlen']))
													    	 {
													    	     
													    	     echo $_SESSION['strlen'];
													    	     unset($_SESSION['strlen']); //removing seesion
													    	 }
													    	 if(isset($_SESSION['special_character']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character'];
													    	     unset($_SESSION['special_character']); //removing seesion
													    	 }
													    	 if(isset($_SESSION['fail_account']))
                                                        			{
                                                        			    
                                                        			    echo $_SESSION['fail_account'];
                                                        			    unset($_SESSION['fail_account']); //removing seesion
                                                        			}
                                                        	?><br>
													    	<input required id="input_0" type="text" name="account_name" placeholder="please input your AdSmart Account Name" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['account_name'])) {
													    	    echo $_POST['account_name'];} elseif(isset($_SESSION['account_name'])){
													    	        
													    	        echo $_SESSION['account_name'];
													    	        unset($_SESSION['account_name']);
													    	    }
													    	
													    	?>"
													    	><?php 
                                                        			if(isset($_SESSION['suggested_account']))
                                                        			{
                                                        			    
                                                        			    echo $_SESSION['suggested_account'];
                                                        			    unset($_SESSION['suggested_account']); //removing seesion
                                                        			}
                        			                         ?>
													    	
													    	<br>
													    </div>
													   
													   
													    <div class="input-group">
													    	<label><b style="color:red;">*</b>Password</label><br><?php 
                                                        			if(isset($_SESSION['fail_password']))
                                                        			{
                                                        			    
                                                        			    echo $_SESSION['fail_password'];
                                                        			    unset($_SESSION['fail_password']); //removing seesion
                                                        			}
                        			                         ?>
													    	<input required id="password" type="password" name="password" placeholder="please input your pasword" style="width:250px"
													    	value="<?php 
													    	if(isset($_POST['password'])) {
													    	    echo $_POST['password'];} elseif(isset($_SESSION['password'])){
													    	        
													    	        echo $_SESSION['password'];
													    	        unset($_SESSION['password']);
													    	    }
													    	
													    	?>"
													    	><span class="eye">🙈</span><br>
												    	</div>
												    	<script>
												    	const password = document.getElementById('password');
												    	const eye = document.querySelector('.eye');

												    	// 默认为密码输入
												    	password.type = 'password'; 

												    	// 点击显示/隐藏密码
												    	eye.addEventListener('click', () => {

												    	  if(password.type === 'password') {
												    	    password.type = 'text';
												    	    eye.textContent = '🙈';  
												    	  } else {
												    	    password.type = 'password';
												    	    eye.textContent = '🙉';
												    	  }

												    	});
												    	</script>
												    	
												    	
												    	<div class="input-group">
													    	<label><b style="color:red;">*</b>Password Confirm</label><br>
													    	<input required id="password_confirm" type="password" name="password_confirm" placeholder="input same as above password" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['password_confirm'])) {
													    	    echo $_POST['password_confirm'];} elseif(isset($_SESSION['password_confirm'])){
													    	        
													    	        echo $_SESSION['password_confirm'];
													    	        unset($_SESSION['password_confirm']);
													    	    }
													    	
													    	?>"
													    	><span class="eye2">🙈</span><br>
												    	</div>
												    		<script>
												    	const password2 = document.getElementById('password_confirm');
												    	const eye2 = document.querySelector('.eye2');

												    	// 默认为密码输入
												    	password2.type = 'password'; 

												    	// 点击显示/隐藏密码
												    	eye2.addEventListener('click', () => {

												    	  if(password2.type === 'password') {
												    	    password2.type = 'text';
												    	    eye2.textContent = '🙈';  
												    	  } else {
												    	    password2.type = 'password';
												    	    eye2.textContent = '🙉';
												    	  }

												    	});
												    	</script>
												    	<br>	
												    	
												    	</fieldset>
												    	<br>
												    	<fieldset style="padding: 6px 6px 10px 6px;">
												    	
												    	<div id="preference">
													    	<label>What kinds of advertisement services the company can provide (optional):</label><br>
													    	
													    	<?php 
													    	$sql = "SELECT * from adsmart_category where active ='Yes' order by category_name ASC ";
													    	$res = mysqli_query($conn, $sql);
													    	
													    	?>
													    	
                                                              
                                                                <!-- 显示3个checkbox -->
                                                                <?php 
                                                                echo "<div id='checkbox-wrapper'>";
                                                                
                                                                echo "<div class='checkbox-group'>";
                                                                
                                                                while($row = mysqli_fetch_array($res) ) {
													    	   $row['category_name'];
													    	   $row['display_name'];
													    	    echo "<div class='item'>";
													    	    
													    	
													    	   echo  "<input type='checkbox' name='".$row['category_name']."'value='1'";												    
													    	   
													    	   if($row['category_name'] == $row['category_name'] ){
													    	       if(isset($_POST[$row['category_name']]) && isset($_POST[$row['category_name']]) =='1' ) {
													    	       echo 'checked=checked';}
													    	       elseif( isset($_SESSION[$row['category_name']]) && isset($_SESSION[$row['category_name']]) =='1'){
													    	           
													    	           echo 'checked=checked';
													    	           unset($_SESSION[$row['category_name']]);
													    	           
													    	       } 
													    	 
													    	   }
													    	   echo "id='".$row['category_name']."' >";   
													    	     
													    	   echo "<label for='printAd'>".$row['display_name'];
													    	   
													    	   echo "<span class='icon'>";
													    	   echo "<img src='..\images\question.png' style='margin-left:5px; width:20px; height:20px;'>";
													    	   echo "</span>";
													    	   
													    	   echo "<div class='pop-up'>";
													    	   echo "<p style='padding-left: 10px; text-transform: none;'>";
													    	   echo $row['description'];
													    	   echo "</p>";
													    	   
													    	   echo "</div>";
													    	   
													    	   echo "</label>";
													    	echo "</div>";
													    	
													    	 }
													    	 
													    	 echo "</div>";
													    	 echo "</div>";
													    	 ?>
															
                                                             
													    	
													    	
													    							    	
														    	
													    
												    	</div>
												    	
												    	</fieldset>
												    	<br>	
												    	
												    	<fieldset style="padding: 6px 6px 10px 6px;">
												    	
												    	<div id="preference">
													    	<label>What kinds of advertisement products the company can provide (optional):</label><br>
													    	
													    	<?php 
													    	$sql3 = "SELECT * from product_type where active ='Yes' order by product_name ASC ";
													    	$res3 = mysqli_query($conn, $sql3);
													    	
													    	?>
													    	
                                                              
                                                                <!-- 显示3个checkbox -->
                                                                <?php 
                                                                echo "<div id='checkbox-wrapper'>";
                                                                
                                                                echo "<div class='checkbox-group'>";
                                                                
                                                                while($row3 = mysqli_fetch_array($res3) ) {
													    	  
													    	    echo "<div class='item'>";
													    	    
													    	
													    	   echo  "<input type='checkbox' name='".$row3['product_name']."'value='1'";												    
													    	   
													    	   if($row3['product_name'] == $row3['product_name'] ){
													    	       if(isset($_POST[$row3['product_name']]) && isset($_POST[$row3['product_name']]) =='1' ) {
													    	       echo 'checked=checked';}
													    	       elseif( isset($_SESSION[$row3['product_name']]) && isset($_SESSION[$row3['product_name']]) =='1'){
													    	           
													    	           echo 'checked=checked';
													    	           unset($_SESSION[$row3['product_name']]);
													    	           
													    	       } 
													    	 
													    	   }
													    	   echo "id='".$row3['product_name']."' >";   
													    	     
													    	   echo "<label for='printAd'>".$row3['display_name'];
													    	   
													    	   echo "<span class='icon'>";
													    	   echo "<img src='../images\question.png' style='margin-left:5px; width:20px; height:20px;'>";
													    	   echo "</span>";
													    	   
													    	   echo "<div class='pop-up'>";
													    	   echo "<p style='padding-left: 10px; text-transform: none;'>";
													    	   echo $row3['description'];
													    	   echo "</p>";
													    	   
													    	   echo "</div>";
													    	   
													    	   echo "</label>";
													    	echo "</div>";
													    	
													    	 }
													    	 
													    	 echo "</div>";
													    	 echo "</div>";
													    	 ?>
															
                                                             
													    	
													    	
													    							    	
														    	
													    
												    	</div>
												    	
												    	</fieldset>
												    	<script>
												    

                                                            //滚动至底部显示隐藏部分
                                                            const wrapper = document.querySelector('#checkbox-wrapper');
                                                            wrapper.addEventListener('scroll', function() {
                                                            
                                                              if(isScrolledToBottom()) {  
                                                                document.querySelector('.all-checkboxes').style.display = 'block';
                                                              }
                                                            
                                                            });
                                                            function isScrolledToBottom() {
                                                            
                                                            	  return wrapper.scrollTop + wrapper.clientHeight >= wrapper.scrollHeight;
                                                            
                                                            	}
                                                            </script>
												    	
												    </td>
												</tr>	
															
												<tr>
												    <td colspan="2">
												    	<div id="TnC">
												    		<label>I accept the <a href="TnC.html" style="color:red;">term and condition</a></label><input type="checkbox" style="margin-left:15px;width:20px; height:15px;" name="tnc" value="1">
												    	</div>
												    </td>
												</tr>					
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<input type="submit" value="Submit"   class="sub" name="submit" >  <input type="reset" value="Clear Form"   class="clear" >
												    	</div>
												    </td>
												</tr>
											</tbody>
									</table>
					              
					           </form> 
						</div>
		</div>
</div>


	


<!--------------------- footer -------------->
	 <?php  include('../partials-front/footer.php');?>