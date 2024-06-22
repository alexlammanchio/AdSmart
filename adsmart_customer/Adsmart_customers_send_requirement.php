<?php  include('../partials-front/after_customer_login_menu.php');?>
    <!-- fOOD MEnu Section Starts Here -->
 
 <?php 
            
                //get the serach keyword
                $search =$_POST['search'];
              
            ?>
         <div style="background:#1b0075">
                <?php  include('../partials-front/customer_left_bar.php');?>


              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>   

<!-- -Cart Items Details -->
<div class="small-container cart-page" style="width:800px;">
		<div class="reg">		
		
		<h1>Create An Advertisement Request</h1>   
    		
    		<div class="reg-container">	
					          <form action="handle_create_new_adsrequest.php" method="post">
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Advertisement Request Detail</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    <fieldset style="padding-left:15px;"><legend>Requestor's basic information</legend>
												    <?php 
													    	$sql1 = "SELECT * from adsmart_customer where user_id = '$account_name'";
													    	$res1 = mysqli_query($conn, $sql1);
													    	$row = mysqli_fetch_array($res1);
													    	$customer_name = $row['user_id'];
													    	$customer_id=$row['id'];
													    	$email = $row['email'];
													    	$contact_number = $row['contact_number'];
													    	?>
												      <br>
												      <div id="customer_id">
												    	
													    	
													    
													    </div>		
												    	<div id="customer_name">
												    	
													    	<label>Customer Name: </label>
													    	
													    	
													    <?php 
													    echo "<input type='text' value='".$customer_name."' name='customer_name' readonly style='color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    <div id="Contact_number">
												    	
													    	<label>Contact Number:</label>
													    	
													    	 <?php 
													    	 echo "<input type='text' value='".$contact_number."' name='contact_number' readonly style='color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
													    	
													    	
													    	
													    
													    <br>
													    </div>
													    <div id="country">
												    	
													    	<label>Email: </label>
													    	
													    	<?php 
													    	echo "<input type='text' value='".$email."' name='email' readonly style='color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    	
													    	
													    	?>
													    	
													    	
													    	<br>
													    	
													    <br>
													    </div>
													   </fieldset>
													    <br>
												    	<fieldset style="padding-left:15px;"><legend>Advertisement's information</legend>
												    	<div id="req_number">
												    	<label>Request Number: </label>
												    	
												    	<?php 
												    	$sql2 = "SELECT req_number FROM qoutation ORDER BY req_number ASC LIMIT 1";
												    	
												    	$res2 = mysqli_query($conn, $sql2);
												    	$row2 = mysqli_fetch_array($res2);
												    	$datetime = date("Y-m-d");
												    	if (isset($row2['req_number'])) {
												    	    $lastTicket = $row2['req_number'];
												    	} else {
												    	    $lastTicket = 'cus_req-' . $datetime . '-SN000000';
												    	}
												    	
												    	$lastNumber = intval(substr($lastTicket, -4));
												    	$newNumber = $lastNumber + 1;
												    	$paddedNumber = str_pad($newNumber, 6, "0", STR_PAD_LEFT);
												    	$newTicket = "cus_req-" . $datetime . "-SN" . $paddedNumber;
												    	echo "<input type='text' value='".$newTicket."' name='req_number' readonly style='color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    	 
													    	
													    	?>
												    	</div>
												    	  <br>
												    	  <div id="subject">
												    	
													    	<label><b style="color:red;">*</b>Company Name: </label>
													    	<?php 
													    	$id1 =$_GET['company_id'];
													    	$sql1 = "SELECT company_name from adsmart_business_product where company_id ='$id1' ";
													    	$res1 = mysqli_query($conn, $sql1);
													    	$row1 = mysqli_fetch_array($res1);
													    	
													    	echo "<input type='text'  name='company_name' readonly style='color:Green; font-size: 16px; width:250px;height:30px; font-weight:bold; border: 2px solid black;' value='".$row1['company_name']."' >";
													    	?>
													    	 
													    	 
													    	 
													    	
													    	
													    	
													    	
													    	
													    
													    <br>
													    </div>
												    	   <br>
												    	<div id="user_id">
												    	
													    	<label><b style="color:red;">*</b>Product Name: </label>
													    	<?php 
													    	$id =$_GET['company_id'];
													    	$sql = "SELECT * from adsmart_business_product where company_id ='$id' ";
													    	$res = mysqli_query($conn, $sql);
													    	
													    	?>
													    	<?php 
													    	echo "<select required name='product_name'>";
													    	echo "<option value=''>Select One</option>";
													    	while($row = mysqli_fetch_array($res) ) {
													    	    
													    	    $row['display_name'];
													    	    $row['id'];
													    	    
													    	    
													    	    echo  "<option value='".$row['product_name']."' name='".$row['product_name']."'>";
													    	    echo $row['product_name'];;													    	    
                                                                  echo   "</option>";
													    	}
                                                           echo "</select>";
													  ?>
													    </div>
													    <br>
													    <!--  
													    <div id="user_id">
												    	
													    	<label>Adverisement Service Provider: (optional) </label>
													    	
													    	<input type="text"  name="company_name" style=" font-size: 10px; width:450px;height:30px; font-weight:bold;" placeholder="please input the company name" >
													    </div>
													    -->
													    
													    
													    
												    	<div id="requirement">
												    	
													    	<label><b style="color:red;">*</b>Advertisement Requirement:</label><br>
													    	
													    	<script src="../tinymce/tinymce.min.js">

                                                            </script>
                                                            <script>
                                                            
                                                            tinymce.init({
                                                                selector: '#myTextarea',
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
                                                            
                                                            <textarea  id ="myTextarea" name="requirement"></textarea>
                                                            
													    	<span id="email-error" style="color: red;"></span>
													    	<br>
												    	</div>		
												    	<BR>
												    	
													    <div class="input-group">
													    	<label><b style="color:red;">*</b>Budget</label>
													    	<select required name="budget">

                                                              <option value="">Select One</option>
                                                            
                                                              <option value="1">Less Than $HK 5000</option>
                                                            
                                                              <option value="2">Less Than $HK 10000</option>
                                                            
                                                            	<option value="3">Great Than $HK 10000 and Less Than $HK 50000</option>
                                                            	
                                                           
                                                           	 <option value="4">Great Than $HK 50000 and Less Than $HK 200000</option>
                                                           	 
                                                              <option value="5">No Budget Limited</option>
                                                            
                                                            </select>	</div>
												    	<br>
												    	<div class="input-group">
													    	<label><b style="color:red;">*</b>need an Advertisement Supplier's reply before any given day:</label>
													    	<input required id="deadline" type="date" name="deadline" placeholder="input deadline date" style="width:250px">
													    	
												    	</div>
												    	
												    	<input type="hidden" value="<?php echo $customer_id?>"   name="customer_id"  > 
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
