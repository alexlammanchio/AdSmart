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
		$sql5 = "SELECT *, a.id as req_no,
                                                             case budget
                                                                WHEN 1 Then 'Less Than \$HK 5000'
                                                                WHEN 2 Then 'Less Than \$HK 10000'
                                                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                                                WHEN 5 Then 'No Budget Limited'
                                                                End as budget_name
                                                             from qoutation as a
                                                            inner join adsmart_customer as b on a.customer_name=b.user_id
                                                            where a.id = '$id'";
		$res5 = mysqli_query($conn, $sql5);
		$row5 = mysqli_fetch_array($res5);
		$req_number = $row5['req_number'];
		$created_date = $row5['create_datetime'];
		Echo "<h1>Advertisement Request - Ticket: ".$req_number." </h1>"; 
		Echo "<h3> Created Date: ".$row5['create_datetime']."</h3> <br>";
		
    	?>	
    		<div class="reg-container">	
					          <form action="bid_adsrequest.php" method="post">
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Advertisement Request Detail</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    
												    <?php 
												            $id=$_GET['id'];
												           
													    	$sql1 = "SELECT *, a.id as req_no,a.email as q_email,
                                                             case budget 
                                                                WHEN 1 Then 'Less Than \$HK 5000'
                                                                WHEN 2 Then 'Less Than \$HK 10000'
                                                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                                                WHEN 5 Then 'No Budget Limited'
                                                                End as budget_name, b.company_name as customer_company_name
                                                             from qoutation as a 
                                                            inner join adsmart_customer as b on a.customer_name=b.user_id
                                                            where a.id = '$id'";
													    	$res1 = mysqli_query($conn, $sql1);
													    	$row = mysqli_fetch_array($res1);
													    	$id = $row['req_no'];
													    	$customer_name =$row['customer_name'];													    
													    	$requirement =$row['requirement'];
													    	$budget= $row['budget_name'];
													    	$budget1 = $row['budget'];
													    	$deadline_date = $row['deadline_date'];
													    	$type_id = $row['category_id'];
													       $company_name = $row['customer_company_name'];	
													      
													           $req_number = $row['req_number'];
													           $subject =$row['subject'];
													           $product_name =$row['product_name'];
													           $email = $row['q_email'];
													           $contact_number = $row['contact_number'];
													           $customer_id = $row['customer_id'];
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
													    <?php if(!empty($company_name) And $company_name != 'NA'){
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Customer Type:</strong> Company Level</p>";													       
													        echo "<br>";
                                                        
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Company Name:</strong> ".$company_name."</p>";														      
													        echo "<br>";
													        
													        
													    }
													    else{
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Customer Type:</strong> Customer Level</p>";	
													        } ?>
													   
													   </fieldset>
													   
													    <fieldset style="padding-left:15px;"><legend>Ticket's information</legend>
												      <br>
												      <div id="customer_id">
												    	
													    	
													    	
													    <?php 
													    echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Ticket Number: </strong>".$req_number."</p><br>";	
													    echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Created Date: </strong>".$row5['create_datetime']."</p>";	
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    <div id="customer_id">
												    	
													    	
													    	
													    <?php 
													    if (isset($company_name) && isset($product_name) && $company_name !== '' && $product_name !== '') {
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;'>Company Name: </strong>".$company_name."</p><br>";
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;'>Product Name: </strong>".$product_name."</p>";
													    } else if (isset($type) && $type !== '') {
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;'>Advertisement Type: </strong>".$type."</p><br>";
													        echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;'>Subject: </strong>".$subject."</p>";
													    }
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
												      <div id="requirement">
												    	
													    	<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Advertisement Requirement:</strong></p>
													    	
													    	<script src="../tinymce/tinymce.min.js">

                                                            </script>
                                                            <script>
                                                            
                                                            tinymce.init({
                                                                selector: '#myTextarea',   
                                                                readonly: true,
                                                                image_advtab: true,
                                                                link_list: [
                                                                  { title: 'My page 1', value: 'https://www.codexworld.com' },
                                                                  { title: 'My page 2', value: 'http://www.codexqa.com' }
                                                                ],
                                                                image_list: [
                                                                  { title: 'My page 1', value: 'https://www.codexworld.com' },
                                                                  { title: 'My page 2', value: 'http://www.codexqa.com' }
                                                                ],
                                                                image_class_list: [
                                                                  { title: 'None', value: '' },
                                                                  { title: 'Some class', value: 'class-name' }
                                                                ],
                                                                importcss_append: true,
                                                                file_picker_callback: (callback, value, meta) => {
                                                                  /* Provide file and text for the link dialog */
                                                                  if (meta.filetype === 'file') {
                                                                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                                                                  }
                                                              
                                                                  /* Provide image and alt text for the image dialog */
                                                                  if (meta.filetype === 'image') {
                                                                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                                                                  }
                                                              
                                                                  /* Provide alternative source and posted for the media dialog */
                                                                  if (meta.filetype === 'media') {
                                                                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                                                                  }
                                                                },
                                                                
                                                                height: 400,
                                                                image_caption: true,
                                                               
                                                                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                                                            });

                                                            tinymce.init({
                                                                selector: '#myTextarea1',
                                                                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
                                                                menubar: 'file edit view insert format tools table help',
                                                                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                                                                toolbar_sticky: true,
                                                                autosave_ask_before_unload: true,
                                                                autosave_interval: '30s',
                                                                autosave_prefix: '{path}{query}-{id}-',
                                                                autosave_restore_when_empty: false,
                                                                autosave_retention: '2m',
                                                                image_advtab: true,
                                                                link_list: [
                                                                  { title: 'My page 1', value: 'https://www.codexworld.com' },
                                                                  { title: 'My page 2', value: 'http://www.codexqa.com' }
                                                                ],
                                                                image_list: [
                                                                  { title: 'My page 1', value: 'https://www.codexworld.com' },
                                                                  { title: 'My page 2', value: 'http://www.codexqa.com' }
                                                                ],
                                                                image_class_list: [
                                                                  { title: 'None', value: '' },
                                                                  { title: 'Some class', value: 'class-name' }
                                                                ],
                                                                importcss_append: true,
                                                                file_picker_callback: (callback, value, meta) => {
                                                                  /* Provide file and text for the link dialog */
                                                                  if (meta.filetype === 'file') {
                                                                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                                                                  }
                                                              
                                                                  /* Provide image and alt text for the image dialog */
                                                                  if (meta.filetype === 'image') {
                                                                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                                                                  }
                                                              
                                                                  /* Provide alternative source and posted for the media dialog */
                                                                  if (meta.filetype === 'media') {
                                                                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                                                                  }
                                                                },
                                                                templates: [
                                                                  { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                                                                  { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                                                                  { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                                                                ],
                                                                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                                                                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                                                                height: 400,
                                                                image_caption: true,
                                                                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                                                                noneditable_class: 'mceNonEditable',
                                                                toolbar_mode: 'sliding',
                                                                contextmenu: 'link image table',
                                                                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                                                            });
                                                            
                                                            </script>
                                                            
                                                            <?php echo "<textarea  id ='myTextarea' name='requirement'>".$requirement."</textarea>"; ?>
                                                            
													    	<span id="email-error" style="color: red;"></span>
													    	<br>
												    	</div>		
												    	<div id="budget">
												    	
													   
													    	
													    	
													    <?php 
													    echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Budget:</strong> ".$budget."</p>";
													    
													  
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													    <div >
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='text-transform:none; font-size:18px;'><strong style='color:blue;' >Need Supplier to Response before that's date:</strong> *".$deadline_date."</p>";
													    
													    	
													    	?>
													    	<input  type="hidden" name="customer_name" value ="<?php echo $customer_name;?>">
												    	<input  type="hidden" name="subject" value ="<?php echo $subject;?>">
												    	<input  type="hidden" name="requirement" value ="<?php echo $requirement;?>">
												    	<input  type="hidden" name="deadline" value ="<?php echo $deadline_date;?>">
												    	<input  type="hidden" name="budget1" value ="<?php echo $budget1;?>">
												    	<input  type="hidden" name="category_id" value ="<?php echo $type_id;?>">
												    	<input  type="hidden" name="email" value ="<?php echo $email;?>">
												    	<input  type="hidden" name="contact_number" value ="<?php echo $contact_number;?>">
													    	<input  type="hidden" name="customer_id" value ="<?php echo $customer_id;?>">
													    	<input  type="hidden" name="created_date" value ="<?php echo $created_date;?>">
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
													    echo "<input type='text' value='".$account_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
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
												    	
													    	<label><b style="color:red;">*</b>Implementation Plan:</label><br>
													    	
													    	<textarea required id="myTextarea1"  name="implementation" rows="14" cols="65">
													    	</textarea>
													    	<span id="email-error" style="color: red;"></span>
													    	<br>
												    	</div>		
												    	<BR>
												    	
													    <div class="input-group">
													    	<label><b style="color:red;">*</b>Price</label>
													    		<input required id="price" type="text" name="price" placeholder="input price" style="width:250px">
													    		</div>
												    	
												    	<div class="input-group">
													    	<label><b style="color:red;">*</b>Target Date:</label>
													    	<input required id="target_date" type="date" name="target_date" placeholder="input target_date" style="width:250px">
													    	
												    	</div>
												    	<input  type="hidden" name="ticket_number" value ="<?php echo $req_number;?>">
												    	<input  type="hidden" name="product_name" value ="<?php echo $product_name;?>">
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
</div>

	


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>