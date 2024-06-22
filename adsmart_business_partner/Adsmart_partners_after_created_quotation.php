 <?php  include('../partials-front/after_company_login_menu.php');?>
 <div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
<div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
            	   	
<!-- -Cart Items Details -->
<div class="small-container cart-page" style="width:800px;">
		<div class="reg">		
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
		$create_date = $row5['created_date'];
		$image_name = $row5['image_name'];
		$bp_filename = $row5['bp_filename'];
		$cs_filename = $row5['cs_filename'];
		if($bp_filename == '' And $cs_filename == ''){
		    echo " <form action='handle_partner_upload_pdf.php' method='post' enctype='multipart/form-data'>";
		    echo "<b style='font-size:24px; color:Blue;'>Upload your signoff quotation (PDF file):</b>";
		    echo "<input type='file' name='uploadedFile' accept='.pdf'>";
		    
		    echo "<input  id='ticket_number' type='hidden' name='ticket_number' value ='".$req_number."'>";
		    echo  "<input   type='hidden' name='id' value ='".$id."'>";
		    
		    echo "<input type='submit' value='Upload Quotation'  style ='background : green; color: white; width:300px; height:50px;'  name='submit' class='sub'  > ";
		    echo "<br><a href='handle_gen_quotation.php?id=$id' target='_blank'><b style='font-size:24px; color:Green;'>Click Here to Review the quotation and Download</b></a>";
		    echo "</form>";
		}elseif($bp_filename != '' And $cs_filename != ''){
		    echo  "<p style='text-transform:none; font-size:24px; color:Blue;'>Click to downlad full signoff version quotation: <a href='handle_download_full_signoff.php?id=".$id."' style='background:red; color:white;'>Download PDF</a></p>";
		    
		}elseif($bp_filename != '' and $cs_filename =='') {
		    Echo "<b style='font-size:24px; color:Black;'>Waiting Customer to Signoff ! </b>";
		     echo "<br>";
		     echo "<br>";
		    echo  "<p style='text-transform:none; font-size:24px; color:Blue;'>Review the quotation: <a href='handle_download_signoff.php?id=".$id."' style='background:red; color:white;'>Download PDF</a></p>";
		    echo  "<br>";
		    echo " <form action='handle_partner_upload_pdf.php' method='post' enctype='multipart/form-data'>";
		    echo "<b style='font-size:24px; color:Blue;'>Can re-upload your signoff quotation (PDF file):</b>";
		    echo "<input type='file' name='uploadedFile' accept='.pdf'>";
		    echo "<input  id='ticket_number' type='hidden' name='ticket_number' value ='".$req_number."'>";
		    echo  "<input   type='hidden' name='id' value ='".$id."'>";
		    
		    echo "<input type='submit' value='Upload Quotation'  style ='background : green; color: white; width:300px; height:50px;'  name='submit' class='sub'  > ";
		    
		    echo "</form>";
		    
		}
		Echo "<p style='text-content:center;'><img src='".IMAGES."/images/company/".$image_name."' style='width:100px; height:100px;  '></p><h1>".$company_name."</h1>  <br>"; 
    	?>	
    		<div >	
					        
					           
												<div  style ="text-align:right;">
												 <b style ="font-size:28px;">    Quotation Detail</b>
												
												<br>
												 
													    <?php 
													    echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:black;'>Quotation Number:</strong> ".$req_number."</p>";
													    
													    
													    echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:black;'>Quotation Created Date:</strong> ".$create_date."</p>";
													    
													        echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:black;' >Quotation date:</strong>".$quotation_date."</p>";													       
													        
                                                        
													        echo "<p style='text-transform:none; font-size:18px; color:black;'><strong style='color:black;' >Quotation Valid for: :</strong> ".$valid_day."</p>";														      
													        
													        
													  ?>
													   
													</div>
													  
													    
												      <div id="customer_id">
												    	
													    	
													    	<br>
													    <?php 
													    echo "<table >";
													    echo "<tr>";
													    echo "<th style='background: white;'>Client</th>";
													    echo "<th style='background: white;'>Subject</th>";													    
													    echo "</tr>";	
													   echo "<tr>";
													    echo "<td >".$customer_name."</td>";
													    echo "<td style= ' text-align:left;'>".$subject."</td>";
													    echo "</tr>";
													    echo "</table>";
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    
												    <div style='text-align:left;'>
												    	
													    <p style='text-transform:none; font-size:28px; text-align:left;'><b style="color:black;">Item Summary:</b></p>
													    		<br>	
													    		<fieldset style="padding-left:5px; padding-right:5px;  height: 120px;" >										    	
													    <?php 
													    echo "<p style = 'text-align:left; color:black;'>".$item_summary."</p>";													    
													    ?>		
													    </fieldset>											    	
													    	<br>													    
													    </div>		
												    	<div style ="text-align:right;">	
												    	
													    <?php 
													    echo "<p style='text-transform:none; font-size:20px;'><strong style='color:Black; font-size:24px;' >Total Price:</strong> $".$price."</p>";
													?>
													
													<br>
													    </div>		
													   
													    <br>
												    	
												    	
												    	<div >
												    	
													    <p style='text-transform:none; font-size:28px; text-align:left;'><b style="color:black;">Delivery Item:</b></p>
													    		<br>	
													    		<fieldset style="padding-left:5px; padding-right:5px;  height: 120px;" >										    	
													    <?php 
													    echo "<p style = 'text-align:left; color:black;'>".$delivery_terms."</p>";													    
													    ?>		
													    </fieldset>											    	
													    	<br>													    
													    </div>	
													    <div >
												    	
													    <p style='text-transform:none;  font-size:18px; text-align:left;'><b style="color:black;">Delivery time:</b> 
													    		
													    	 <?php 
													    echo $delivery_time;													    
													    ?>												    	
													    		</p>									    	
													    	<br>													    
													    </div>	
														
						</div>
						
		
</div>
</div>
</div>
</div>

	


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>