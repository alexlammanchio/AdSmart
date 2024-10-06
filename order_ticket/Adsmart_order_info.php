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
<?php  include('../partials-front/customer_left_bar.php');?>
  <div class='container-fluid' style ="padding-bottom:500px;">
            	   	<div class='reg' style='width: 1000px; margin-top:100px; text-align:left;'>
 <!-- item information  --> 

			<?php 
			$tran_id = $_GET['trans_id'];
			$sql2 = "SELECT *,a.quantity as payment_quantity, a.company_user_id from payment a join adsmart_business_product b on a.item_name = b.product_name where a.cus_user_id = '$account_name'  AND transaction_id ='$tran_id' And a.req_number ='' ";
			$res2 = mysqli_query($conn, $sql2);
			
			echo "<div class='small-container cart-page'>";
			
			echo "<h1>Product Detail</h1>";
			echo "<div class='checkout_form' style='padding-bottom:15px; padding-right:15px;width: 1200px;'>";
			
			
			
			if($res2==TRUE){
			    
			    $count =mysqli_num_rows($res2); //function to get all the rows
			    
			    $sn=1;
			    
			    
			    if($count>0){
			        $totalAmount = 0;
			        $dataRows = [];
			        echo "
			<table>
			<tr>
			<th>Item Number</th>
			<th>Company Name</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Price</th>
            <th>Quantity</th>
			<th>Total Amount</th>
			</tr>";
			        while($rows=mysqli_fetch_assoc($res2))
			        {
			            $dataRows[] =[
			                'company_name' => $rows['company_user_id'],
			                'product_name' =>$rows['item_name'],
			                'image_name' =>$rows['image_name'],
			                'price' =>$rows['price'],
			                'quantity' =>$rows['payment_quantity'],
			                'card_number' =>$rows['card_number'],
			                'cus_card_name'  =>$rows['cus_card_name'],
			                'cus_address'  =>$rows['cus_address'],
			                'order_status'  =>$rows['order_status']
			            ];
			            foreach ($dataRows as $data) {
			                $company_name= $data['company_name'];
			                $company_user_id= $data['company_name'];
			                $product_name= $data['product_name'];
			                $image_name= $data['image_name'];
			                $price= $data['price'];
			                $quantity= $data['quantity'];
			                $total_amount = $price*$quantity;
			                $card_number = $data['card_number'];
			                $cus_address  = $data['cus_address'];
			                $cus_card_name = $data['cus_card_name'];
			                $status = $data['order_status'];
			            }
			            $totalAmount += $total_amount;
			            ?>
			            
			           <tr>
			           
			          <?php  
			         
			          echo "<input type='hidden' value=".$product_name." name='item_name[]' >";
			          echo  "<input type='hidden' value=".$quantity." name='quantity[]' >";
			          echo  "<input type='hidden' value=".$price." name='price[]' >";
			          $total =$totalAmount+$totalAmount*0.1+$totalAmount*0.01;
			          echo  "<input type='hidden' value=".$total." name='total' >";
			          echo  "<input type='hidden' value=".$company_user_id." name='company_user_id[]' >";
			          
			          ?>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $company_name; ?></td>
                            <td><?php echo $product_name; ?></td>
                            <td>
                                <div class='cart-info'>
                                    <img src='../images/business_product/<?php echo $image_name; ?>' alt='<?php echo $product_name; ?>'>
                                </div>
                            </td>
                            <td>
                                <?php echo $price; ?>
                                
                            </td>
                            <td>
                             <b> <?php echo $quantity; ?></b>
                            </td>
                            <td id="total_<?php echo $id; ?>">
                                <?php echo $total_amount; ?>
                                
                            </td>
                        </tr>
                        <?php }?>
                        <tr>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td></td>
					<td >Subtotal</td>
					<td id="subtotal"><?php echo $totalAmount;?> </td>				
				
				</tr>
				<tr>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td></td>
					<td>AdSmart Service Charge (10%)</td>
					<td id="serviceCharge"><?php echo "+".$totalAmount*0.1;?> </td>				
				
				</tr>
				<tr>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td></td>
					<td>Tax (1%)</td>
					<td id="tax"><?php echo "+".$totalAmount*0.01;?></td>				
				
				</tr>
				<tr>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td></td>
					<td>Total</td>
					<td id="total"><?php echo $totalAmount+$totalAmount*0.1+$totalAmount*0.01;?> </td>				
				
				</tr>
			</table>
		</div>
		<h1>Payment Information</h1>
		<div class="checkout_form" style='padding-bottom:15px;'>
		
			
		
			
			            <?php 
			     
			            
			            echo "<label>Transaction Id</label>:<b>".$tran_id."</b><br>";
			            echo "<label>Card Number</label>:<b>".$card_number."</b><br>";
			            echo "<label>Name On Card</label>:<b>".$cus_card_name."</b><br>";
			            echo "<label style='color: Red;'>Total Amount</label>:<b>".$totalAmount+$totalAmount*0.1+$totalAmount*0.01;$totalAmount+$totalAmount*0.1+$totalAmount*0.01."</b><br>";
			          
		?>
				
	
		
                    	<?php 
			    }else{
			        
			        
			        
			        
			        $tran_id = $_GET['trans_id'];
			        $sql3 = "SELECT * from payment a join quotation_content b on a.req_number = b.req_number where a.cus_user_id = '$account_name'  AND a.transaction_id ='$tran_id' AND a.req_number !=''";
			        $res3 = mysqli_query($conn, $sql3);
			        if($res3==TRUE){
			            
			            $rows=mysqli_fetch_assoc($res3);
			            $created_date = $rows['created_date'];
			           $req_number = $rows['req_number'];
			            $company_user_id = $rows['company_user_id'];
			            $id= $rows['quotation_id'];
			            $company_id = $rows['company_id'];
			            $company_name = $rows['company_name'];
			            $company_email = $rows['company_email'];
			            $country1= $rows['reg_country'];
			            $reg_number = $rows['reg_number'];
			            $price = $rows['price'];
			            $total = $rows['total'];
			            $item_summary = $rows['Item_summary'];
			            $valid_day = $rows['valid_day'];
			            $subject = $rows['subject'];
			            $quotation_date = $rows['quotation_date'];
			            $delivery_terms = $rows['delivery_terms'];
			            $delivery_time = $rows['delivery_time'];
			            $cus_address  = $rows['cus_address'];
			            echo "<fieldset style='width:500px;'>";
			            echo "<label>Payment Detail:</label><br>";
			            echo "<label>Price</label>:<b> $".$price."</b><br>";
			            $service_charge =$price*0.1;
			            $total = $price*0.01+$price+$service_charge;
			            echo "<label>Service charge (10%)</label>:<b> $".$service_charge."</b><br>";
			            echo "<label>Tax (1%)</label>:<b> $".$price*0.01."</b><br>";
			            echo "<label>Total Amount</label>:<b> $".$total."</b><br>";
			            echo "</fieldset> <br>";
			            
			            echo "<label>Request Number</label>:<b>". $req_number."</b><br>";
			            echo "<label>Quotation Created Date:</label>:<b>".$created_date."</b><br>";
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
			  
			    
			  
			   
			    echo "<label>Valid Date</label>:<b>".$valid_day."</b><br>";
			   
			    echo "<label>Quotation Date</label>:<b>".$quotation_date."</b><br>";
			    echo "<label>Delivery Terms:</label>:<br>";
			    echo "<textarea   id ='myTextarea'  rows='14' cols='65' readonly>";
			    echo $delivery_terms;
			    echo "</textarea><br>";
			    echo "<label>Delivery Time</label>:<b>".$delivery_time."</b><br>";
			    echo "<label>Total Price</label>:<b>$".$total."</b><br><br>";
			    echo  "<p style='text-transform:none; font-size:24px; color:Blue;'>Click to download full signoff version quotation: <a href='".USER_INTERACTION."handle_download_full_signoff.php?id=".$id."' style='background:red; color:white;'>Download PDF</a></p>";
			    echo  "<input type='hidden' value=".$req_number." name='req_number' >";
			    echo "<input type='hidden' value=".$company_user_id." name='company_user_id' >";
			    echo  "<input type='hidden' value=".$subject." name='item_name' >";
			    echo  "<input type='hidden' value=".$price." name='price' >";
			    echo  "<input type='hidden' value=".$total." name='total' >";
			    echo  "<input type='hidden' value=".$id." name='shop_id' >";
			    echo "<input type='hidden' value='0' name='quantity' >";
			        }}
			       
			       
			    }else
			    {
			       
			        }
			    
            ?>
		</div>

 </div>
		
		
    
 
<!-- -Cart Items Details -->


	<div class='small-container cart-page'>
	<h1>Cutomer Information</h1>
				<div class="checkout_form" style='padding-bottom:15px;'>
		
			
			<?php 
			$sql3 = "SELECT * from adsmart_customer a join payment b on a.user_id = b.cus_user_id where user_id = '$account_name' And transaction_id ='$tran_id'";
			$res3 = mysqli_query($conn, $sql3);			
			
			        
			       
			        $row2=mysqli_fetch_assoc($res3);
			            
			            $customer_user_id = $row2['user_id'];
			            $first_name =$row2['first_name'];
			            $last_name =$row2['last_name'];
			            $email =$row2['email'];
			            $contact_number =$row2['contact_number'];		
			            $created_date =$row2['created_day'];	
			            $id = $row2['id'];
			            
			          
			            echo "<label>First Name</label>:<b>".$first_name."</b><br>";
			            echo "<label>Last Name</label>:<b>".$last_name."</b><br>";
			            echo "<label>Email</label>:<b>".$email."</b><br>";
			            echo "<label>Contact Number</label>:<b>".$contact_number."</b><br>";
			            echo "<label>Contact Address</label>:<b>".$cus_address."</b><br>";
			            echo "<label>Transaction Time</label>:<b>".$created_date ."</b><br>";
			            ?>
			            
		
		
		
				
		</div>
		</div>
		
		<div class='small-container cart-page'>
				<?php 
if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
	?>
		<h1>Company and Order's Information</h1>
				<div class="checkout_form" style='padding-bottom:15px;'>
		
			
			<?php 
			$sql4 = "SELECT * from payment a join adsmart_business_partner b on a.company_user_id = b.user_id where transaction_id = '$tran_id'";
			$res4 = mysqli_query($conn, $sql4);			
			
			if($res4==TRUE){
			    
			    $count1 =mysqli_num_rows($res4); //function to get all the rows
			    
			
			    
			    
			    if($count1>0){
			        while($row4=mysqli_fetch_assoc($res4))
			        {
			             $tran_id1 = $row4['transaction_id'];
			            $status1 = $row4['order_status'];
			            $company_user_id1 = $row4['company_user_id'];
			            $company_name1 =$row4['company_name'];
			            $country = $row4['country'];
			            $email =$row4['email'];
			            $contact_number =$row4['contact_number'];			            
			            $item_name1 = $row4['item_name'];
			            $bp_update_time =$row4['bp_update_time'];
			            $cs_update_time =$row4['cs_update_time'];
			            
			            if($status1 != '' And $status1 != 'pending_for_cus' ){
			                echo "<br><label style='color: Green;'>Status</label>:<b>".$status1."</b><br>";
			            }elseif($status1 == 'pending_for_cus'){
			                $status2 = 'Pending For Customer to Confirm';
			                echo "<br><label style='color: Green;'>Current Status</label>:<b>".$status2."</b><br>";
			                echo "<form action='handle_update_payment_status.php' method='POST'>";
			                echo "<input type='hidden' name='trans_id' value='".$tran_id1."'>";
			                echo "<input type='hidden' value='" . htmlspecialchars($item_name1, ENT_QUOTES, 'UTF-8') . "' name='item_name1'>";
			                echo "<input type='hidden' value='".$company_user_id1."' name='company_user_id1'>";
			                echo "<label>Status:</label>";
			                echo "<select required name='status2'>";
			                echo "<option value=''>Select One</option>";
			                echo "<option value='no_receive'>Not Receive</option>";
			                echo "<option value='completed'>Completed</option>";
			                echo "</select>";
			                echo "<input style='background:#096f04; color:white; width:250px; height:50px; text-align:center; font-size:25px; border-radius: 10px;' type='submit' value='Update' name='submit'>";
			              
			                echo "</form>";
			                echo "<br>";
			            }else{
			                echo "<br><label style='color: Green;'>Status</label>:<b>Vendor is Preparing!</b><br>";
			                
			            }
			           
			            echo "<label>Company Name</label>:<b>". $company_name1."</b><br>";	
			            echo "<label>Item Name</label>:<b>". $item_name1."</b><br>";	
			            echo "<label>Email</label>:<b>".$email."</b><br>";
			            echo "<label>Contact Number</label>:<b>".$contact_number."</b><br>";
			            if(isset($country1)){ echo "<label>Address</label>:<b>".$country1."</b><br>";}else
			            {
			                }
			            echo "<label>Country</label>:<b>".$country."</b><br>";
			           
			             
			            if($status1 == 'completed' OR $status1 == 'no_receive'){
			            echo "<label>Customer Response Time</label>:<b>".$cs_update_time."</b><br>";
			        }	        
			        elseif(($status1 != 'completed' OR $status1 != 'no_receive')AND $status1 != '' ){ echo "<label>Business Partner response Action Time</label>:<b>".$bp_update_time."</b><br>";}
			        else{
			            echo "<label>Business Partner response Action Time</label>:<b>Waiting Vendor to action</b><br><br>";
			        }
			       
			        
			    }     
		
		}else{
		}
		}
		?>
		</div>
		
			</div>	

		</div>
		
		
		
		
</div>

	


     <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>