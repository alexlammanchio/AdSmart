 <?php  include('../partials-front/after_company_login_menu.php');?>
<div style="background:#1b0075">
               <?php  include('../partials-front/company_left_bar.php');?>


              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px; padding-bottom:300px;'>
		<div class="reg-container" style ="padding-bottom:300px;">		
		
		<?php
		$id =$_GET['qoutation_id'];
		$sql2 = "SELECT * from qoutation where id = '$id'";
		$res2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_array($res2);
		$req_number =$row2['req_number'];
		Echo "<h1>Advertisement Request - Ticket: <b style ='text-transform: uppercase;'> ".$req_number."</b> </h1>";  
    		?>
    		
    		<div class="reg-container">	
					        


    <?php 
    // Get topic details
    $qoutation_Id = $_GET['qoutation_id'];
    $sql ="SELECT *, a.id as topic_id,
            case budget 
                        WHEN 1 Then 'Less Than \$HK 5000'
                        WHEN 2 Then 'Less Than \$HK 10000'
                        WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                        WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                        WHEN 5 Then 'No Budget Limited'
                        End as budget_name , b.company_name as business_name
 from topics a join qoutation b on a.qoutation_id = b.id WHERE a.qoutation_id='$qoutation_Id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $topic_id =$row['topic_id'];
    $subject = $row['subject'];
    $product_name = $row['product_name'];
    $requirement =$row['requirement'];
    $budget =$row['budget_name'];
    $deadline_date = $row['deadline_date'];
    $customer_name =$row['customer_name'];
    $customer_id = $row['customer_id'];
    $company_name =$row['business_name'];
    $company_id = $row['company_id'];
    $company_name = $row['company_name'];
    $create_datetime = $row['create_datetime'];
    $company_price =$row['company_price'];
    $implementation_plan = $row['implementation_plan'];
    if ($row) {
        if($subject != '')
        {
        echo "<h2> Subject: ".$row['title']."</h2>";        

        
        }       
        ELSEIF($product_name != ' '){
            
            echo "<h1> Proudct Name: ".$row['product_name']."</h1>";
           
        }
    }
        
     else {
        echo "<p>Topic not found.</p>";
    }
    
    
    ?>
    
     <?php 
    // Get topic details
     $qoutation_Id = $_GET['qoutation_id'];
    $sql1 ="SELECT * from qoutation a join adsmart_customer b on a.customer_id = b.id 
              WHERE a.id='$qoutation_Id' ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($res1);
    $image_cs = $row1['image_name'];
    
    
    ?>
  <?php 
    // Get topic details
     $qoutation_Id = $_GET['qoutation_id'];
    $sql2 ="SELECT * from qoutation a join adsmart_business_partner b on a.company_id = b.shop_code 
              WHERE a.id='$qoutation_Id' ";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($res2);
    $image_name = $row2['image_name'];
    
    
    ?>
    <hr>
   <div id="req">
   <?php 
    			if(isset($_SESSION['fail_Reply']))
    			{
    			    
    			    echo $_SESSION['fail_Reply'];
    			    unset($_SESSION['fail_Reply']); //removing seesion
    			}
    			if(isset($_SESSION['Reply']))
    			{
    			    
    			    echo $_SESSION['Reply'];
    			    unset($_SESSION['Reply']); //removing seesion
    			}
    ?>
 <fieldset style="padding-left:15px;"><legend>Customer Request's information</legend>
												    	
													     <?php 
													     echo  "<img src=".IMAGES."/images/customer/".$image_cs." width='70px' height='70px' style='border-radius: 10px;float: left; margin-left: 20px;'>";
													    echo "<input type='hidden' value='".$customer_name."' name='customer_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    echo "<p style='text-transform:none; font-size:18px; text-align:left; margin-top:80px;'><strong style='color:blue; ' >Customer Name: </strong> ".$customer_name."</p>";
													    	 
													    	
													    	?>
													    	<br>
													    	<div id="budget">
												    	
													    
													    	
													    	
													    <?php 
													    if(!empty($subject)){	
													    echo "<input type='hidden' value='".$subject."' name='budget' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Subject:</strong> ".$subject."</p>";		
													    }else{
													        
													        echo "<input type='hidden' value='".$product_name."' name='budget' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													        
													        echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Product Name:</strong> ".$product_name."</p>";
													    }
													    
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													     <div id="budget">
												    	
													    
													    	
													    	
													    <?php 
													    echo "<input type='hidden' value='".$budget."' name='budget' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													   
													    echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Budget:</strong> ".$budget."</p>";		
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													    </div>		
													    											    
													    
													    <div id="email">
												    	
													    	
													    	
													    	<?php 
													    	echo "<input type='hidden' value='".$deadline_date."' name='deadline_date' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    	echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Deadline Date:</strong> ".$deadline_date."</p>";		
													    	
													    	?>
													    	
													    	
													    	
													    	
													 
													    </div>
													    	
													    	<br>
													    	<p style='text-transform:none; font-size:18px;  text-align:left;'><strong style='color:blue;' >Advertisement Requirement:</strong></p>
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
                                                                
                                                                height: 250,
                                                                image_caption: true,
                                                               
                                                                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                                                            });

                                                            tinymce.init({
                                                                selector: '#myTextarea1',   
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
                                                                
                                                                height: 250,
                                                                image_caption: true,
                                                               
                                                                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                                                            });

                                                            tinymce.init({
                                                                selector: '#myTextarea2',
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
													    
													    
												
													    	
													    	
													    	
													 
									</fieldset>			
																			    
													    </div>	
													      <div id="req">
													    <fieldset style="padding-left:15px;"><legend>AdSmart Bussiness Reply's information</legend>
												    	
													     <?php 
													     if($image_name ==''){
													         echo  "<img src=".IMAGES."/images/customer/".$image_cs." width='70px' height='70px' style='border-radius: 10px;float: left; margin-left: 20px;'>";
													     }else{
													     echo  "<img src=".IMAGES."/images/company/".$image_name." width='70px' height='70px' style='border-radius: 10px;float: left; margin-left: 20px;'>";
													     }
													     echo "<input type='hidden' value='".$company_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
													    echo "<p style='text-transform:none; font-size:18px; text-align:left; margin-top:80px;'><strong style='color:blue; ' >Customer Name: </strong> ".$company_name."</p>";
													    	 
													    	
													    	?>
													    	<br>												    
												    	
													    
													    	
													    	
													    <?php 
													   
													   
													    echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Reply Date:</strong> ".$create_datetime."</p>";		
													    	
													    	?>
													    	
													  
													    	
													    	<br>
													    
													  
												    	
													    	
													    	
													    	<?php 
													    	echo "<p style='text-transform:none; font-size:18px; text-align:left;'><strong style='color:blue;' >Company Want to Charge:</strong> $".$company_price."</p>";		
													    	
													    	?>
													    	
													    	
													    	
													    	
													 
												
													    	<br>
													    	<p style='text-transform:none; font-size:18px;  text-align:left;'><strong style='color:blue;' >Advertisement Requirement:</strong></p>
													    	<script src="tinymce/tinymce.min.js">

                                                            </script>
                                                            
													    
													   
													    <?php echo "<textarea  id ='myTextarea1' name='requirement'>".$implementation_plan."</textarea>"; ?>
													    
													    </fieldset>
												
													  
													    	
													    	
									
									</div>
    
    <h2>Replies:</h2>
     <fieldset style="padding-left:15px;"><legend>Reply's information</legend>
    <?php
    // Get replies for the topic
    
    $sql3 ="SELECT *, a.content as reply_content, a.created_dt as reply_date, a.customer_name, a.company_name from replies a join topics b on a.topic_id= b.id
 where a.topic_id='$topic_id' ";
    $res3 = mysqli_query($conn, $sql3);
    
    if ($res3) {
        if (mysqli_num_rows($res3) > 0) {
            while ($row3 = mysqli_fetch_assoc($res3)) {
                
                echo "<fieldset style='margin:10px 10px 10px 10px;'>";
                if ($row3['reply_content'] != 'NULL'){
                if($row3['customer_name'] =='NULL'){echo  "<img src=".IMAGES."/images/company/".$image_name." width='70px' height='70px' style='border-radius: 10px;float: left; margin-left: 20px;'>";
                
                    }else{
                     echo  "<img src=".IMAGES."/images/customer/".$image_cs." width='70px' height='70px' style='border-radius: 10px;float: left; margin-left: 20px;'>";
                    }
                echo "<input type='hidden' value='".$company_name."' name='company_name' readonly style='color:Green; font-size: 16px; width:450px;height:30px; font-weight:bold; border: 2px solid black;'>";
                if($row3['customer_name'] =='NULL'){
                    echo "<p style='text-transform:none; font-size:18px; text-align:left; margin-top:80px;'><strong style='color:blue; ' >Company Name: </strong> ".$row3['company_name']."</p>";
                }else{
                     echo "<p style='text-transform:none; font-size:18px; text-align:left; margin-top:80px;'><strong style='color:blue; ' >Customer Name: </strong> ".$row3['customer_name']."</p>";
                    
                }
               
                echo "<p style='text-transform:none; font-size:18px; text-align:left; '><strong style='color:blue; ' >Reply's Date: </strong> ".$row3['reply_date']."</p>";
               
                echo "<textarea id='myTextarea1' style='text-transform:none; font-size:18px; text-align:left;padding-bottom:20px;'><strong style='color:blue; ' > Content:</strong> <b>".$row3['reply_content']."</b></textarea>";
                }
                echo "</fieldset>";
            }
        } else {
            echo "<p>No replies yet.</p>";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
    ?>
</fieldset>    
    <?php 
			$sql4 = "SELECT *
    FROM replies
    where topic_id = '$topic_id'
    order by created_dt DESC
    LIMIT 1;";
    $res4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($res4);
    
    
    $sql5 = "SELECT *
    FROM quotation_content
    where req_number = '$req_number'";
    $res5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_assoc($res5);
    
    if(isset($row5['bp_filename'])){
        $bp_filename = $row5['bp_filename'];
    }else{
        $bp_filename = 'NA';
    }
    
    
    
    if(isset($row4['status'])){
        $status = $row4['status'];
    }else { $status = 'NA';}
    
    if($status =='progress' || $status =='NA' ||$status =='' ){
 
        echo "<h2>Reply to this Topic:</h2>";
       echo  "<form action='handle_create_new_bp_reply.php' method='post'>";
       echo "<input type='hidden' name='topic_id' value='.$topic_id.'>";
       echo "<input type='hidden' value=".$company_name." name='company_name' >";
       echo  "<input type='hidden' value=".$company_id." name='company_id' >";echo  "<input type='hidden' value=".$qoutation_Id." name='qoutation_Id' >";
        echo "<label for='reply_content' style='font-size:25px;'>Content:</label>";
         echo "<textarea required id='myTextarea2'  name='content' rows='14' cols='65'> </textarea>";
													    	
     echo "<input  style='background:#096f04; color:white; width:250px; height:50px; text-align:center; font-size:25px;border-radius: 10px;' type='submit' value='Reply'>";
    echo  "</form>";  
    }elseif ($row4['status'] =='accept' && $bp_filename == 'NA' ){
        echo "<b style='color:Black; font-size:25px;'>The request has been accepted! Please Click <a href='".ADSMART_BUSINESS."Adsmart_partners_create_quotation.php?id=".$qoutation_Id." '><b style='color:blue;'>here </b></a> to generate a contract! </b>";
        
    }elseif($row4['status'] =='accept' && $bp_filename != 'NA') {
        echo "<b style='color:Black; font-size:25px;'>The request has been accepted! Please Click <a href='".ADSMART_BUSINESS."Adsmart_partners_after_created_quotation.php?id=".$qoutation_Id." '><b style='color:blue;'>here </b></a> to check the status of contract! </b>";
    }    
    elseif($row4['status'] == 'reject') {
        echo "<b style='color:Red; font-size:25px;'> The Ticket has been rejected!</b>";
    }?>
   		        
						</div>
						
		
</div>
</div>
</div>

	


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>