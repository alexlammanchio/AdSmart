 <?php  include('../partials-front/after_company_login_menu.php');?>
<div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
<div class='container-fluid'>
<!-- -Cart Items Details -->
<div class="small-container cart-page" style="width:800px;">
		<div class="reg">		
		<?php
		$id =$_GET['id'];
		Echo "<h1>Advertisement Request - Ticket: ".$id." </h1>";  
		
    	?>	
    		<div class="reg-container">	
					          <form action="handle_reject_bid_adsrequest.php" method="post">
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Advertisement Request Detail</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    
												    <?php 
												            $id=$_GET['id'];
												           
													    	$sql1 = "SELECT *, a.id as req_no,
                                                             case budget 
                                                                WHEN 1 Then 'Less Than \$HK 5000'
                                                                WHEN 2 Then 'Less Than \$HK 10000'
                                                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                                                WHEN 5 Then 'No Budget Limited'
                                                                End as budget_name ,a.company_name as business_name
                                                             from qoutation as a 
                                                            inner join adsmart_customer as b on a.customer_name=b.user_id
                                                            where a.id = '$id'";
													    	$res1 = mysqli_query($conn, $sql1);
													    	$row = mysqli_fetch_array($res1);
													    	$id = $row['req_no'];
													    	$customer_name =$row['customer_name'];
													    	$email = $row['email'];
													    	$requirement =$row['requirement'];
													    	$budget= $row['budget_name'];
													    	$deadline_date = $row['deadline_date'];
													    	$type_id = $row['category_id'];
													       $company_name = $row['business_name'];
													          $company_country = $row['company_country'];
													          $department_name =$row['department_name'];
													          $title =$row['title'];
													          $work_number = $row['work_number'];
													   
													   $sql2 = "SELECT *
                                                             from adsmart_category where id = '$type_id'";
													   $res2 = mysqli_query($conn, $sql2);
													   $row2 = mysqli_fetch_array($res2);
													   $type =$row2['display_name'];
													   $category_name =$row2['category_name'];
													   ?> 	
													    	
													   <fieldset style="padding-left:15px;"><legend>Requetor's basic information</legend>
												      <br>
												      	
												    	<div id="customer_name">
												    	
													    	<label>Customer Name: </label>
													    	
													    	
													    <?php 
													    echo "<input type='text' value='".$customer_name."' name='customer_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													    <div id="email">
												    	
													    	<label>Email: </label>
													    	
													    	<?php 
													    	echo "<input type='text' value='".$email."' name='email' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    	
													    	
													    	?>
													    	
													    	
													    	<br>
													    	
													    <br>
													    </div>
													    <?php if(!empty($company_name)){
													      echo  "<label>Customer Type: </label>";
													        echo "<input type='text' value='Company Level' name='company_level' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
                                                        
													        echo  "<label>Customer Name: </label>";
													        echo "<input type='text' value='".$company_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													        
													        echo  "<label>Customer country: </label>";
													        echo "<input type='text' value='".$company_country."' name='company_country' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													        
													        echo  "<label>Department Name: </label>";
													        echo "<input type='text' value='".$department_name."' name='department_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													        
													        echo  "<label>Title: </label>";
													        echo "<input type='text' value='".$title."' name='title' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													        
													        echo  "<label>Work Contact Number: </label>";
													        echo "<input type='text' value='".$work_number."' name='work_contact_number' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													    }
													    else{echo  "<label>Customer Type: </label>";
													        echo "<input type='text' value='Customer Level' name='customer_level' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>"; } ?>
													    <div id="email">
												    	
													    	<label>Email: </label>
													    	
													    	<?php 
													    	echo "<input type='text' value='".$email."' name='email' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    	
													    	
													    	?>
													    	
													    	
													    	<br>
													    	
													    <br>
													    </div>
													   </fieldset>
													   
													    <fieldset style="padding-left:15px;"><legend>Ticket's information</legend>
												      <br>
												      <div id="customer_id">
												    	
													    	<label>Ticket ID: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$id."' name='ticket_id' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    <div id="customer_id">
												    	
													    	<label>Advertisement Type: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$type."' name='type' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
												      <div id="req">
												    	
													    	<label>Requirement: </label> <br>
													    	
													    <?php 
													    echo " <textarea required id='requirement'  name='requirement'rows='14' cols='65' readonly>";
													    echo $requirement;
													    echo	"</textarea>";
                                                        
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>		
												    	<div id="budget">
												    	
													    	<label>Budget: </label>
													    	
													    	
													    <?php 
													    echo "<input type='text' value='".$budget."' name='budget' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													    <div >
												    	
													    	<label>Deadline Date: </label>
													    	
													    	<?php 
													    	echo "<input type='text' value='".$deadline_date."' name='deadline_date' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    	
													    	
													    	?>
													    	
													    	
													    	<br>
													    	
													    <br>
													    </div>
													   </fieldset>
													    <br>
												    	<fieldset style="padding-left:15px;"><legend>Company's information</legend>
												    	  <br>
												    	<?php 
												    	$account_name = $_SESSION['user2'];
												    	$sql3 = "SELECT *
                                                             from adsmart_business_partner where user_id = '$account_name'";
												    	$res3 = mysqli_query($conn, $sql3);
												    	$row3 = mysqli_fetch_array($res3);
												    	$account_name =$row3['user_id'];
												    	$company_name =$row3['company_name'];
												    	$company_reg_number =$row3['company_reg_number'];												    	
												    	$company_reg_address =$row3['company_reg_address'];
												    	$company_email =$row3['email'];
												    	$country = $row3['country'];
												    	$shop_code =$row3['shop_code'];
												    	
												    	?>
												    	<div id="company_id">
												    	
													    	<label>Company ID: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$shop_code."' name='company_id' readonly style=' color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>		
												    	<div id="company_name">
													    	<label>Company Name: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$company_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>		
												    	<div id="company_email">
													    	<label>Email: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$company_email."' name='company_email' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>	
													    <div id="company_reg_number">
													    	<label>Company Registration Number: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$company_reg_number."' name='company_reg_number' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>		
													    <div id="company_reg_address">
													    	<label>Registration Country: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$country."' name='country' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>		
												    	<div id="requirement">
												    	
													    	<label><b style="color:red;">*</b>Reject Reason:</label><br>
													    	
													    	<textarea required id="reject_msg"  name="reject_msg" rows="14" cols="65">
													    	</textarea>
													    	<span id="email-error" style="color: red;"></span>
													    	<br>
												    	</div>		
												    	<BR>
												    	
													    
												    	
												    	
												    	</fieldset>
												    	<br>
												    					
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
</div>

	


<!--------------------- footer -------------->
 <?php  include('partials-front/footer.php');?>