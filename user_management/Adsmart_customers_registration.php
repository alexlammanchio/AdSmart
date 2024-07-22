<?php  include('../partials-front/menu.php');?>
 
 <!-- AdSmart  header  --> 

<!-- -Cart Items Details -->
<div class="small-container cart-page">
		<div class="reg" >
				<h2>AdSmart Customers Signup Page</h2>
								<?php if(isset($_SESSION['fail_create']))
                        			{
                        			    
                        			    echo $_SESSION['fail_create'];
                        			    unset($_SESSION['fail_create']); //removing seesion
                        			}
                        			if(isset($_SESSION['create']))
                        			{
                        			    
                        			    echo $_SESSION['create'];
                        			    unset($_SESSION['create']); //removing seesion
                        			}
    		                  	?>
						<div class="reg-container">	
					          <form action="handle_customer_reg.php" method="post">
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Adsmart Customers</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    <fieldset style="padding-left:15px;"><legend>applicant's basic personal information</legend>
												      <br>
												    	<div id="frist_name">
												    	
													    	<label><b style="color:red;">*</b>First Name</label><br>
													    	 <?php 
													    	 
													    	 if(isset($_SESSION['special_character1']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character1'];
													    	     unset($_SESSION['special_character1']); //removing seesion
													    	 }
													    	 
                                                        	?>
													    	
													    	<input required id="input_0" type="text" name="first_name" placeholder="please input your first name" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['first_name'])) {
													    	    echo $_POST['first_name'];} elseif(isset($_SESSION['first_name'])){
													    	        
													    	        echo $_SESSION['first_name'];
													    	        unset($_SESSION['first_name']);
													    	    }
													    	
													    	?>"
													    	
													    	>
													    	
													    	<br>
													    
													    </div>
													    <div id="last_name">
												    	
													    	<label><b style="color:red;">*</b>Last Name</label><br>
													    	 <?php 
													    
													    	 if(isset($_SESSION['special_character2']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character2'];
													    	     unset($_SESSION['special_character2']); //removing seesion
													    	 }
													    	
                                                        	?>
													    	
													    	<input required id="input_0" type="text" name="last_name" placeholder="please input your Last name" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['last_name'])) {
													    	    echo $_POST['last_name'];} elseif(isset($_SESSION['last_name'])){
													    	        
													    	        echo $_SESSION['last_name'];
													    	        unset($_SESSION['last_name']);
													    	    }
													    	
													    	?>"
													    	
													    	>
													    	
													    	<br>
													    
													    </div>
													    
													    <div id="email">
												    	
													    	<label><b style="color:red;">*</b>Email address</label><br>
													    	<?php 
                                                        			if(isset($_SESSION['fail_email']))
                                                        			{
                                                        			    
                                                        			    echo $_SESSION['fail_email'];
                                                        			    unset($_SESSION['fail_email']); //removing seesion
                                                        			}
                        			                         ?>
													    	<input required id="email" type="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" placeholder="please input your email address" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['email'])) {
													    	    echo $_POST['email'];} elseif(isset($_SESSION['email'])){
													    	        
													    	        echo $_SESSION['email'];
													    	        unset($_SESSION['email']);
													    	    }
													    	    
													    	
													    	?>"
													    	
													    	>
													    	<span id="email-error" style="color: red;"></span>
													    	<br>
												    	</div>		
												    	
													    <div id="Contact_number">
												    	
													    	<label><b style="color:red;">*</b>Contact Number</label><br>
													    	 <?php 
													    	$sql5 = "SELECT distinct(phonecode) from country_numcode order by phonecode  ";
													    	$res5 = mysqli_query($conn, $sql5);
													    	
													   
													 echo "<label>Phone Code:</label>";
													 echo "<select required name='phonecode' >";;
													 If(isset($_SESSION['phonecode'])){
													     $phonecode = $_SESSION['phonecode'];													 
													     echo "<option value='".$phonecode."'>".$phonecode."</option>";
													 }else{
													     echo "<option value=''>Select One</option>";}
													     
                        			                  while($row5 = mysqli_fetch_array($res5)){{
													    	   $row5['phonecode'];
													    	   echo  "<option value='".$row5['phonecode']."' name='".$row5['phonecode']."'>";
													    	   echo "+".$row5['phonecode'];
													    	   echo   "</option>";
													    	   
                        			                  }
													    	 
													    	
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
												    	
													    	<label><b style="color:red;">*</b>Country</label><br>
													    	  <?php 
													    	$sql2 = "SELECT * from country  ";
													    	$res2 = mysqli_query($conn, $sql2);
													    	
													    	?>
													 <?php 
													 echo "<select required name='country'  >";
													 IF(isset($_SESSION['country'])){
													     $country =   $_SESSION['country'];
													     echo "<option value='".$country."'>".$country."</option>";
													 }else{
													     echo "<option value=''>Select One</option>";}
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
													    	<br>
													    
													    </div>
													   </fieldset>
													    <br>
												    	<fieldset style="padding-left:15px;"><legend>AdSmart Customer Account information</legend>
												    	  <br>
												    	<div id="user_id">
												    	
													    	<label><b style="color:red;">*</b>User Id</label><br>
													    	 <?php 
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
                                                        	?>
													    	
													    	<input required id="input_0" type="text" name="customer_name" placeholder="please input your user id" style="width:250px" 
													    	value="<?php 
													    	if(isset($_POST['customer_name'])) {
													    	    echo $_POST['customer_name'];} elseif(isset($_SESSION['customer_name'])){
													    	        
													    	        echo $_SESSION['customer_name'];
													    	        unset($_SESSION['customer_name']);
													    	    }
													    	
													    	?>"
													    	
													    	>
													    	<?php 
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
													    	<input required id="password" type="password" name="password" placeholder="please input your pasword" style="width:250px"><span class="eye">🙈</span><br>
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
													    	<input required id="password_confirm" type="password" name="password_confirm" placeholder="input same as above password" style="width:250px"><span class="eye2">🙈</span><br>
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
												    	<fieldset style="margin-left:10px; margin-right:300px;margin-bottom:10px; padding-left:15px;">
												    	<div id="employee">
												    	
												    	<label>Are you company representative?</label><br>					    						            	
                    					               <input type="checkbox" name="check_t1" id="check_t1" value="1" 
                    					               
                    					               onclick="checkboxTable()"><label>Yes</label><br>
                    					               <label id="label1" style = "display:none"> Your Company Name:<br>  <?php 
													    	 
													    	 if(isset($_SESSION['special_character6']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character6'];
													    	     unset($_SESSION['special_character6']); //removing seesion
													    	 }
													    	 
                                                        	?></label> 
                    					               <input type ="text" name="company_name" id="space_size0" style="display:none; width:250px;" placeholder = "please input company name" 
                    					               value="<?php 
                    					               if(isset($_POST['company_name'])) {
                    					                   echo $_POST['company_name'];} elseif(isset($_SESSION['company_name'])){
                    					                       
                    					                       echo $_SESSION['company_name'];
                    					                       unset($_SESSION['company_name']);
                    					                   }
													    	    
													    	
													    	?>"
                    					               > 
                    					               
                    					             <label id="label5" style = "display:none"> <br>Your Company's Country: <br></label>
                    					             <?php 
													    	$sql1 = "SELECT * from country  ";
													    	$res1 = mysqli_query($conn, $sql1);
													    	
													    	?>
													 <?php 
													 echo "<select name='company_country' id='table_p4' style='display:none;' >";
													 echo "<option value=''>Select One</option>";
                    					             while($row1 = mysqli_fetch_array($res1) ) {
													    	   $row1['countrycode'];
													    	   $row1['countryname'];
													    	   echo  "<option value='".$row1['countrycode']."' name='".$row1['countrycode']."'>";
													    	   echo $row1['countryname'];;
													    	   echo   "</option>";
													    	           
													    	  
													    	 
													    	
													    	 }
													    	 echo "</select>";
													   ?>
                    					               
                    					                
                    					               <label id="label2" style = "display:none"> <br>Your Department Name: <br></label>
                    					                <input type ="text" name="department_name" id="table_p1" style="display:none; width:250px;" placeholder = "please input your department name"
                    					                value="<?php 
                    					                if(isset($_POST['department_name'])) {
                    					                    echo $_POST['department_name'];} elseif(isset($_SESSION['department_name'])){
                    					                        
                    					                        echo $_SESSION['department_name'];
                    					                        unset($_SESSION['department_name']);
                    					                    }
													    	    
													    	
													    	?>"
                    					                > 
                    					                
                    					                 <label id="label6" style = "display:none"><br> Staff Number: <br></label> 
                    					                <input type ="text" name="staff_number" id="table_p5" style="display:none; width:250px;" placeholder = "please input your staff number"
                    					                value="<?php 
                    					                if(isset($_POST['staff_number'])) {
                    					                    echo $_POST['staff_number'];} elseif(isset($_SESSION['staff_number'])){
                    					                        
                    					                        echo $_SESSION['staff_number'];
                    					                        unset($_SESSION['staff_number']);
                    					                    }
													    	
													    	?>"
                    					                > 
                    					                
                    					               <label id="label3" style = "display:none"><br> Your Title: <br></label> 
                    					                <input type ="text" name="title" id="table_p2" style="display:none; width:250px;" placeholder = "please input your title"
                    					                value="<?php 
                    					                if(isset($_POST['title'])) {
                    					                    echo $_POST['title'];} elseif(isset($_SESSION['title'])){
                    					                        
                    					                        echo $_SESSION['title'];
                    					                        unset($_SESSION['title']);
                    					                    }
													    	
													    	?>"
                    					                > 
                    					                
                    					                 <label id="label4" style = "display:none"> <br>Your Work Mobile Number: <br> <?php 
                    					                 $sql6 = "SELECT distinct(phonecode) from country_numcode order by phonecode  ";
                    					                 $res6 = mysqli_query($conn, $sql6);
                    					                 
                    					                 
                    					                 echo "<label>Phone Code:</label>";
                    					                 echo "<select  name='phonecode1'  >";
                    					                 echo "<option value=''>Select One</option>";
                    					                 while($row6 = mysqli_fetch_array($res6) ) {
                    					                     $row6['phonecode'];
                    					                     echo  "<option value='".$row6['phonecode']."' name='".$row6['phonecode']."'>";
                    					                     echo "+".$row6['phonecode'];
                    					                     echo   "</option>";
                    					                     
                    					                     
                    					                     
                    					                     
                    					                 }
                    					                 echo "</select>";
                    					                 
                    					                 echo   "+";
													    	 if(isset($_SESSION['special_character5']))
													    	 {
													    	     
													    	     echo $_SESSION['special_character5'];
													    	     unset($_SESSION['special_character5']); //removing seesion
													    	 }
													    	
                                                        	?></label> 
                    					                <input type ="text" name="work_number" id="table_p3" style="display:none; width:250px; height:30px;" placeholder = "please input your Work Mobile Number"
                    					                value="<?php 
                    					              
                    					                
                    					                if(isset($_POST['work_number'])){
                    					                    echo $_POST['work_number'];} elseif(isset($_SESSION['work_number'])){
                    					                        
                    					                        echo $_SESSION['work_number'];
                    					                        unset($_SESSION['work_number']);
                    					                    }
													    	    
													    	
													    	?>"
                    					                > 
                    												    	
												    	</div>
												    	</fieldset>
												    	</fieldset>
												    	<br>
												    	<fieldset style="padding: 6px 6px 10px 6px;">
												    	
												    	<div id="preference">
													    	<label>Looking for Advertisement Service (Optional):</label><br>
													    	
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
													    	<label>Looking for Advertisement Products (Optional):</label><br>
													    	
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
													    	   echo "<img src='..\images\question.png' style='margin-left:5px; width:20px; height:20px;'>";
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
												    		<label>I accept the <a href="TnC.php" style="color:red;">term and condition</a></label><input required type="checkbox" style="margin-left:15px;width:20px; height:15px;" name="tnc" value="1"  
												    		<?php 
												    		if(isset($_POST['tnc']) && isset($_POST['tnc']) =='1' ){
												    		    echo 'checked=checked';}
												    		    elseif( isset($_SESSION['tnc']) && isset($_SESSION['tnc']) =='1'){
												    		        
												    		        echo 'checked=checked';
												    		        unset($_SESSION['tnc']);
												    		    }
													    	    
													    	
													    	?> >
												    	</div>
												    </td>
												</tr>					
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<input type="submit" value="Submit"   name="submit" class="sub"  >  <input type="reset" value="Clear Form"   class="clear" >
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
 
 