 <?php  include('../partials-front/after_customer_login_menu.php');?>
<div style="background:#1b0075">
             <?php  include('../partials-front/customer_left_bar.php');?>


              <div class='container-fluid'style='margin-bottom:67px;'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>
		<div class="reg">		
		<?php
		
		$id =$_GET['id'];
		$sql2 = "SELECT * from qoutation where id = '$id'";
		$res2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($res2);
		$req_number =$row2['req_number'];		
		$create_date = $row2['create_datetime'];
		$reply_date = $row2['company_bid_time'];
		Echo "<h1>Advertisement Request - Ticket: <b style ='text-transform: uppercase;'> ".$req_number."</b> </h1><br>";
		Echo "<h3> Created Date: ".$create_date."</h3> <br>";
		
    	?>
    		<div class="reg-container">	
					          <form action="create_new_adsrequest.php" method="post">
					            <table >
											<tbody>
												<tr>
												     <tH colspan="2" style="text-align:center; background:#9198e5">Advertisement Request Detail</th>
												</tr>
												<tr>
												    <td colspan="2" >
												    <fieldset style="padding-left:15px;"><legend>Requetor's basic information</legend>
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
												     <div id="customer_name">
												    	
													    	
													    	
													    	
													    <?php 
													    echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'> Customer Name: </b>".$customer_name."</p>";
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    <div id="Contact_number">
												    	
													    
													    	
													    	 <?php 
													    	 echo "<p style='color:Green; font-size: 16px; '><b style='color:Black;'>Contact Number: </b>".$contact_number."</p>";
													   
													    	 
													    	
													    	?>
													    	
													    	
													    	
													    
													    <br>
													    </div>
													    <div id="country">
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'> Email: </b>".$email."</p>"; 
													    	?>
													    	
													    	
													    
													    	
													    <br>
													    </div>
													   </fieldset>
													    <br>
												    	<fieldset style="padding-left:15px;"><legend>Advertisement's information</legend>
												    	  <br>
												    	<div id="user_id">
												    	
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
													    	$requiremnt =$row['requirement'];
													    	$budget= $row['budget_name'];
													    	$deadline_date = $row['deadline_date'];
													    	$type_id = $row['category_id'];
													       $company_name = $row['business_name'];
													          $company_country = $row['company_country'];
													          $department_name =$row['department_name'];
													          $title =$row['title'];
													          $work_number = $row['work_number'];
													       $ticket_number = $row['req_number'];
													       $product_name = $row['product_name'];
													       $contact_number =$row['contact_number'];
													       $subject =$row['subject'];
													   $sql2 = "SELECT *
                                                             from adsmart_category where id = '$type_id'";
													   $res2 = mysqli_query($conn, $sql2);
													   $row2 = mysqli_fetch_array($res2);
													   if(isset($row2['display_name'])){ $type=$row2['display_name'];}
													   else{$type ='';};
													   if(isset($row2['display_name'])){
													       $category_name =$row2['display_name'];}
													       else{
													           
													           $category_name='';
													       }
													       
													   ?> 	
													   <div id="ticket_id">
												    	
													    	
													    	
													    <?php 
													   
													    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Ticket Number:</b> ".$id."</p>";
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    <div id="ticket_id">
												    	
													   
													    <?php 
													   
													    
													    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Created Date::</b> ".$create_date."</p>";
													    
													    
													    ?>
													    	
													    	
													    	
													  
													    	
													    	<br>
													    
													    </div>	
													    	
													    	<?php 
													    	if(!empty($type) && !empty($subject)){
													    	    
													    	    
													    	    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Subject:</b> ".$subject."</p>";
													    	    echo "<br>";
													    	    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Advertisement Type:</b> ".$type."</p>";
													    	    echo "<br>";
													    	}
													    	elseif(!empty($product_name)){
													    	    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Company Name:</b> ".$company_name."</p>";
													    	    echo "<br>";
													    	    echo "<p style='color:Green; font-size: 16px;'> <b style='color:Black;'>Product Name:</b> ".$product_name."</p>";
													    	    echo "<br>";
													    	    
													    	} ?>
													   
													    	
													    	
													 
													    </div>
													<div id="budget">
												    	
													    	
													    	
													    	
													    <?php 
													    echo "<p style='color:Green; font-size: 16px; '> <b style='color:Black;'> Budget: </b>".$budget."</p>" 
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    
													    <div >
												    	
													    	
													    	<?php 
													    	echo "<p style='color:Green; font-size: 16px; '> <b style='color:Black;'> Deadline Date: </b>".$deadline_date."</p>"  
													    	
													    	?>
													    	<br>
													    	
													   
													    </div>
													    
												    	<div id="requirement">
												    	
													    	<label style='color:Black;'>Advertisement Requirement:</label><br>
													    	<script src="tinymce/tinymce.min.js">

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
													    	<?php 
													    echo " <textarea  id='myTextarea'  name='requirement'rows='14' cols='65' readonly>";
													    echo $requiremnt;
													    echo	"</textarea>";
                                                        
													    
													    
													    ?>
												    	</div>		
												    	<BR>
												    	
													    
												    	
												    	</fieldset>
												    	<br>
												    					
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<?php                     					
                    					
                    					echo "<a href='"; 
                    					echo ADSMART_CUSTOMER; echo "Adsmart_customers_personal_space.php?page=3";
                    					 echo "' class='btn-backend-1'>Go back to quotation status page</a>";
                    					
                    					
                    					?>
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
<?php include('../partials-front/footer.php')?>