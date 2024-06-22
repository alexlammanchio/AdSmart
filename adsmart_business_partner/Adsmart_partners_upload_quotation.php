 <?php  include('../partials-front/after_company_login_menu.php');?>
 <div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
<div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
            	   	
<!-- -Cart Items Details -->
<div class="small-container cart-page" style="width:800px;">

<?php
$id =$_GET['id'];
$sql5 = "SELECT *
                from quotation_content a join adsmart_business_partner b on a.company_id = b.shop_code
                where a.quotation_id = '$id'";
$res5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_array($res5);
$req_number = $row5['req_number'];
$quotation_date = $row5['quotation_date'];
$valid_day = $row5['valid_day'];
$subject = $row5['subject'];
$customer_name = $row5['customer_name'];
$item_summary = $row5['Item_summary'];
$price = $row5['price'];
$delivery_terms =$row5['delivery_terms'];
$delivery_time = $row5['delivery_time'];
$company_name = $row5['company_name'];
$company_email = $row5['company_email'];
$customer_email =$row5['customer_email'];
$image_name = $row5['image_name'];
		Echo "<h1>Quotation - Ticket: ".$req_number." </h1>"; 
    	?>	
    	<div class="reg-container">	
					          <form action="handle_partner_upload_pdf.php" method="post" enctype="multipart/form-data">
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
                                                                End as budget_name, a.company_name as business_name, b.email as customer_email, b.contact_number as customer_number
                                                             from qoutation as a 
                                                            inner join adsmart_customer as b on a.customer_name=b.user_id
                                                            where a.id = '$id'";
													    	$res1 = mysqli_query($conn, $sql1);
													    	$row = mysqli_fetch_array($res1);
													    	$id = $row['req_no'];
													    	$customer_name =$row['customer_name'];
													    	$email = $row['email'];
													    	$customer_email =  $row['customer_email'];
													    	$customer_number = $row['customer_number'];
													    	$requirement =$row['requirement'];
													    	$budget= $row['budget_name'];
													    	$deadline_date = $row['deadline_date'];
													    	$type_id = $row['category_id'];
													    	$customer_company = $row['company_name'];
													       $company_name = $row['business_name'];													      													          
													           $req_number = $row['req_number'];
													        
													           $product_name =$row['product_name'];
													   $sql2 = "SELECT *
                                                             from adsmart_category where id = '$type_id'";
													   $res2 = mysqli_query($conn, $sql2);
													   $row2 = mysqli_fetch_array($res2);
													  
													   if(isset($row2['display_name'])){
													       $type =$row2['display_name'];}
													       
													       if(isset($row2['category_name'])){
													   $category_name =$row2['category_name'];
													       }
													   
													   ?> 	
													    	
													   <fieldset style="padding-left:15px;"><legend>Requetor's basic information</legend>
												      <br>
												      	
												    	<div id="customer_name">
												 
													    	
													    	
													    <?php 
													    echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;'>Customer Name:</strong> ".$customer_name."</p>";
													   
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													   
													    </div>
													    <?php if(!empty($customer_company)){
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Customer Type:</strong> Company Level</p>";													       
													        echo "<br>";
                                                        
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Company Name:</strong> ".$customer_company."</p>";														      
													        echo "<br>";
													        
													        
													    }
													    else{
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Customer Type:</strong> Customer Level</p>";	
													        } ?>
													   
													   </fieldset>
													   <br>
													    <fieldset style="padding-left:15px;"><legend>Quotation's information</legend>
												   <br>
												      <div  style ="text-align:left;">	
																							 
													    <?php 
													    echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:blue;'>Subject:</strong> ".$subject."</p> <br>";
													    echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:blue;'>Quotation Number:</strong> ".$req_number."</p> <br>";
													    
													    
													   
													    
													        echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:blue;' >Quotation date:</strong>".$quotation_date."</p> <br>";													       
													        
                                                        
													        echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:blue;' >Quotation Valid for: :</strong> ".$valid_day."</p> <br>";														      
													        
													        
													  ?>
													   
													</div>
												      <div id="requirement">
												    	
													    	<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Item Summary:</strong></p>
													    	
													    	 <?php echo $item_summary; ?>
                                                            
													    	
													    	<br>
												    	</div>		
												    	
													   </fieldset>
													    <br>
												    	<fieldset style="padding-left:15px;"><legend>Upload Quotation file (PDF)</legend>
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
												    	
													    <br>
													    
													    <br>
													   Select PDF file to upload:
                                                        <input type="file" name="uploadedFile" accept=".pdf">                                                       
												    	<input  id="ticket_number" type="hidden" name="ticket_number" value ="<?php echo $req_number;?>">												    	
												    	<input   type="hidden" name="id" value ="<?php echo $id;?>">
												    	
												    	<br>
												    					
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<input type="submit" value="Upload Quotation"   name="submit" class="sub"  >  
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
 <?php  include('../partials-front/footer.php');?>