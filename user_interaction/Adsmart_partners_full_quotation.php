 <?php  include('../partials-front/after_company_login_menu.php');?>
<div style="background:#1b0075">
               <?php  include('../partials-front/company_left_bar.php');?>

<!-- -Cart Items Details -->
<div class='container-fluid'>
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
		$create_date = $row5['create_datetime'];
		$reply_date = $row5['company_bid_time'];
		Echo "<h1>Advertisement Request - Ticket: ".$req_number." </h1>"; 
		Echo "<h3> Created Date: ".$create_date."</h3> <br>";
    		?>
		  
    		
    		<div class="reg-container">	
					          <form action="handle_customer_receive_quotation.php" method="POST" enctype="multipart/form-data">
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
                                                                End as budget_name, a.company_name as business_name
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
													   $product_name = $row['product_name'];
													   $sql2 = "SELECT *
                                                             from adsmart_category where id = '$type_id'";
													   $res2 = mysqli_query($conn, $sql2);
													   $row2 = mysqli_fetch_array($res2);
													   if(isset($row2['display_name'])){
													       $type =$row2['display_name'];}
													       if(isset($row2['category_name'])){
													           $category_name =$row2['category_name'];}
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
													    	<?php if(!empty($company_name)){
													      echo  "<label>Customer Type: </label>";
													        echo "<input type='text' value='Company Level' name='company_level' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
                                                        
													        echo  "<label>Company Name: </label>";
													        echo "<input type='text' value='".$company_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        echo "<br>";
													        
													        echo  "<label>Company country: </label>";
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
													    
													   </fieldset>
													   <br>
													    <fieldset style="padding-left:15px;"><legend>Ticket's information</legend>
												      <br>
												      <div id="customer_id">
												    	
													    	<label>Ticket Number: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$req_number."' name='ticket_id' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    <div id="customer_id">
												    	
													    	<label>Create Date: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$create_date."' name='ticket_id' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    <div id="type">
												    	
													    	
													    	
													    <?php 
													    if(isset($type)){
													        echo "<label>Advertisement Type: </label>";
													    echo "<input type='text' value='".$type."' name='type' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													    }else{
													        echo "<label>Prodcut Name: </label>";
													        echo "<input type='text' value='".$product_name."' name='type' readonly style=' color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold;border: 2px solid black;'>";
													        
													    }
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
												     <div id="requirement">
												    	
													    	<label>Advertisement Requirement:</label><br>
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
                                                            tinymce.init({
                                                                selector: '#myTextarea2',   
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
                                                            </script>
                                                            
                                                            <?php echo "<textarea  id ='myTextarea' name='requirement'>".$requirement."</textarea>"; ?>
                                                            
													    	
												    	</div>		
												    	<div id="budget">
												    	
													    	<label>Budget: </label>
													    	
													    	
													    <?php 
													    echo "<input type='text' value='".$budget."' name='budget' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													    <div id="email">
												    	
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
												    	$id=$_GET['id'];
												    	$sql3 = "SELECT *
                                                             from qoutation a
                                                             inner join adsmart_business_partner b 
                                                             on a.company_id = b.shop_code
                                                             where a.id = '$id'";
												    	$res3 = mysqli_query($conn, $sql3);
												    	$row3 = mysqli_fetch_array($res3);
												    	$account_name =$row3['user_id'];
												    	$company_name =$row3['company_name'];
												    	$company_reg_number =$row3['company_reg_number'];												    	
												    	$company_reg_address =$row3['company_reg_address'];
												    	$company_email =$row3['email'];
												    	$country = $row3['country'];
												    	$shop_code =$row3['shop_code'];
												    	$implementation= $row3['implementation_plan'];
												    	$price= $row3['company_price'];
												    	$target_date =$row3['target_date'];
												    	$company_bid_time = $row3['company_bid_time'];
												    	$customer_action =$row3['customer_action'];
												    	$customer_comment =$row3['customer_comment'];
												    	$customer_reply_time =$row3['reply_date'];
												    	if(isset($row3['status'])){
												    	    $status = $row3['status'];
												    	}else{
												    	    $status = '';
												    	}
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
													    <div id="company_name">
													    	<label>Reply Time: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$reply_date."' name='reply_date' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>	
												    	<div id="company_email">
													    	<label>Company Email: </label>
													    	
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
													    	<label>Company Registration Address: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$company_reg_address."' name='company_reg_address' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>			
													    <div id="company_reg_address">
													    	<label>Country: </label>
													    	
													    <?php 
													    echo "<input type='text' value='".$country."' name='country' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	<br>
													    </div>		
												    	<div >
												    	
													    	<label>IMPLEMENTATION PLAN:</label><br>
													    	
													    	<?php echo "<textarea  id ='myTextarea1' name='requirement'>".$implementation."</textarea>"; ?>
                                                            
												    	</div>	
												    	<BR>
												    	
													    <div class="input-group">
													    	<label>Price</label>
													    		 <?php 
													    echo "<input type='text' value='".$price."' name='Price' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    		
													    		</div>
												    	
												    	<div class="input-group">
													    	<label>Target Date:</label>
													    	 <?php 
													    echo "<input type='text' value='".$target_date."' name='Target Date' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	
												    	</div>
												    	
												    	
												    	</fieldset>
												    	<br>
												    	 <fieldset style="padding-left:15px;"><legend>User's Answer</legend>
												      <br>
												      	
												    	<div id="requirement">
												    	
													    	<label>Leave Comment:</label><br>
													    	<?php echo "<textarea  id ='myTextarea2' name='customer_comment'>".$customer_comment."</textarea>"; ?>
                                                           
													    	<br>
												    	</div>		
													    											    
													    
													    <div id="action">
												    	
													    	<label></b>Customer Action: </label>
													    	<?php 
													    	echo "<input type='text' value='".$customer_action."' name='customer_action' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	
													    	</div>
													    	<br>
													    	<div id="action">
												    	
													    	<label></b>Customer Reply Date: </label>
													    	<?php 
													    	echo "<input type='text' value='".$customer_reply_time."' name='customer_reply_date' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   	?>
													    	
													    	</div>
													    	<br>
													    <br>
													    
													   </fieldset>				
												<br>
												<?php 
												$dt = date('Y-m-d');
												if($deadline_date <$dt){
												    echo "<b style ='color:red;'>The ticket is Expired </B>";
												}
												elseif($customer_action =='accept'){
												    echo  	"<div id='button'>";
												    echo "<a href='";
												    echo USER_INTERACTION; echo "Adsmart_partners_create_quotation.php?id=";
												    echo $id; echo "' class='btn-backend-2'>Generate the Contract</a>";
												    echo  "</div>";
												}elseif ($customer_action =='reject'){
												    echo "<b style='color:red;'><a href='" . USER_MANAGEMENT . "Adsmart_partners_personal_space.php?page=3'>Customer Rejected</a></b>";
												}
												elseif ($status =='accept' AND $status != ''){
												  echo  	"<div id='button'>";
												  echo "<a href='";
												  echo USER_INTERACTION; echo "Adsmart_partners_create_quotation.php?id=";
												  echo $id; echo "' class='btn-backend-2'>Generate the Contract</a>";
                                                  echo  "</div>";
												} else{
												    echo "<b style='color:red;'><a href='" . USER_MANAGEMENT . "Adsmart_partners_personal_space.php?page=3'>Customer Rejected</a></b>";
												}
												  
											?>
											</tbody>
									</table>
					              
					           </form> 
					        
						</div>
						
		
</div>
</div>
</div>

	


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>