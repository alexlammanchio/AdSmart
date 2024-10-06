<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
<div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
  <div class='container-fluid' style ="padding-bottom:300px;">
            	   	<div class='reg' style='width: 1000px; margin-top:100px; text-align:left;'>
 <!-- item information  --> 

			
			<?php 
			$req_number = $_GET['req_number'];
			$sql2 = "SELECT * From quotation_content a join adsmart_business_partner b on a.company_id = b.shop_code where a.req_number = '$req_number' ";
			$res2 = mysqli_query($conn, $sql2);
			
			echo "<div class='small-container cart-page'>";
		
			echo "<h1>Quotaiton Detail</h1>";
			echo "<div class='checkout_form' style='padding-bottom:15px;'>";
			echo "<form action='handle_checkout_item.php' method='post'>";
			
			
			if($res2==TRUE){
			    
			    $rows=mysqli_fetch_assoc($res2); //function to get all the rows
			    
			    $sn=1;
			    $contact_number = $rows['contact_number'];
			    $shop_id=$rows['shop_code'];
			    $company_user_id = $rows['user_id'];
			    $cus_user_id =$rows['customer_name'];
		          $id= $rows['quotation_id'];
			    $company_id = $rows['company_id'];
			    $company_name = $rows['company_name'];
			    $company_email = $rows['company_email'];
			    $country= $rows['reg_country'];
			    $reg_number = $rows['reg_number'];
			     $price = $rows['price'];			   
			    $item_summary = $rows['Item_summary'];
			    $valid_day = $rows['valid_day'];
			    $subject = $rows['subject'];
			    $quotation_date = $rows['quotation_date'];
			    $delivery_terms = $rows['delivery_terms'];
			    $delivery_time = $rows['delivery_time'];
			    $created_date = $rows['created_date'];
			    echo "<label>Request Number</label>:<b>". $req_number."</b><br>";
			    echo "<label>Quotation Created Date</label>:<b>". $created_date."</b><br>";
			    echo "<label>Company Name</label>:<b>". $company_name."</b><br>";
			    echo "<label>Subject</label>:<b>". $subject."</b><br>";
			    echo "<label>Item Summary</label>:<br>";
			    ?>
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
                                                            </script>
			    <?php 
			    echo "<textarea   id ='myTextarea' name='item_summary' rows='14' cols='65' readonly>";
			    echo $item_summary;
			    echo "</textarea><br>";
			  
			    echo "<label>Email</label>:<b>".$company_email."</b><br>";
			    echo "<label>Contact Number</label>:<b>".$contact_number."</b><br>";
			    echo "<label>Address</label>:<b>".$country."</b><br>";
			    echo "<label>Price</label>:<b>".$price."</b><br>";
			    echo "<label>Valid Date</label>:<b>".$valid_day."</b><br>";
			    echo "<label>Quotation Date</label>:<b>".$quotation_date."</b><br>";
			    echo "<label>Delivery Terms:</label>:<br>";
			    echo "<textarea   id ='myTextarea'  rows='14' cols='65' readonly>";
			    echo $delivery_terms;
			    echo "</textarea><br>";
			    echo "<label>Delivery Time</label>:<b>".$delivery_time."</b><br><br>";
			    echo  "<p style='text-transform:none; font-size:24px; color:Blue;'>Click to download full signoff version quotation: <a href='".USER_INTERACTION."handle_bp_download_full_signoff.php?id=".$id."' style='background:red; color:white;'>Download PDF</a></p>";
			    echo  "<input type='hidden' value=".$req_number." name='req_number' >";
			    echo "<input type='hidden' value=".$company_user_id." name='company_user_id' >";
			    echo  "<input type='hidden' value=".$subject." name='item_name' >";
			    echo  "<input type='hidden' value=".$price." name='price' >";
			    echo  "<input type='hidden' value=".$price." name='total' >";
			    echo  "<input type='hidden' value=".$shop_id." name='shop_id' >";
			    echo "<input type='hidden' value='0' name='quantity' >";
			    echo "</div>";      
                           
                       
                        }?>
                     
		
		

 
		
		
    
 
<!-- -Cart Items Details -->

<h1>Cutomer Information</h1>
				<div class="checkout_form" style='padding-bottom:15px;'>
		
			
			<?php 
			$sql3 = "SELECT * from adsmart_customer where user_id = '$cus_user_id'";
			$res3 = mysqli_query($conn, $sql3);			
			
			        
			       
			        $row2=mysqli_fetch_assoc($res3);
			            
			            $customer_user_id = $row2['user_id'];
			            $first_name =$row2['first_name'];
			            $last_name =$row2['last_name'];
			            $cs_email =$row2['email'];
			            $contact_number =$row2['contact_number'];			            
			            $id = $row2['id'];
			            $cus_address = $row2['country'];
			            echo "<label>Status</label>:<b>Pending Customer to Checkout</b><br>";
			            echo "<label>First Name</label>:<b>".$first_name."</b><br>";
			            echo "<label>Last Name</label>:<b>".$last_name."</b><br>";
			            echo "<label>Email</label>:<b>".$cs_email."</b><br>";
			            echo "<label>Contact Number</label>:<b>".$contact_number."</b><br>";
			            echo "<label>Country</label>:<b>".$cus_address."</b><br>";
			            ?>
			            
		
		
		
				
		</div>
		
		
		
				
</div>
</div>
		
</div>

	


     <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>