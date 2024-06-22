<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
 
 <!-- item information  --> 
 <div class="small-container cart-page">
 
		<h1>Product Detail</h1>
		<form action='handle_checkout.php' method='post'>
		
			
			<?php 
			$sql2 = "SELECT *, a.quantity as shopp_cart_quantity, a.price*a.quantity  as total_amount, a.id as shopping_cart_id   from shopping_cart a join adsmart_business_product b on a.company_id = b.company_id and a.product_name = b.product_name where a.customer_name = '$account_name'";
			$res2 = mysqli_query($conn, $sql2);
			
			
			if($res2==TRUE){
			    
			    $count =mysqli_num_rows($res2); //function to get all the rows
			    
			    $sn=1;
			    
			    
			    if($count>0){
			        $totalAmount = 0;
			        $dataRows = [];
			        echo "<form>
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
			                'company_name' => $rows['company_name'],
			                'product_name' =>$rows['product_name'],
			                'image_name' =>$rows['image_name'],
			                'price' =>$rows['price'],
			                'quantity' =>$rows['shopp_cart_quantity'],
			                'id' => $rows['shopping_cart_id'],
			               
			            ];
			            foreach ($dataRows as $data) {
			                $company_name= $data['company_name'];
			                $company_user_id= $data['company_name'];
			                $product_name= $data['product_name'];
			                $image_name= $data['image_name'];
			                $price= $data['price'];
			                $quantity= $data['quantity'];
			                $total_amount = $price*$quantity;
			                $id= $data['id'];
			                $id1= $data['id'];
			                
			            }
			            $totalAmount += $total_amount;
			            ?>
			            
			           <tr>
			           
			          <?php  
			          echo "<input type='hidden' value='".$id1."' name='shop_id[]' >";
			          echo "<input type='hidden' value='" . htmlspecialchars($product_name, ENT_QUOTES, 'UTF-8') . "' name='item_name[]' >";
			          echo  "<input type='hidden' value=".$quantity." name='quantity[]' >";
			          echo  "<input type='hidden' value=".$price." name='price[]' >";
			          $total =$totalAmount+$totalAmount*0.1+$totalAmount*0.01;
			          echo  "<input type='hidden' value=".$total." name='total' >";
			          echo  "<input type='hidden' value=".$company_user_id." name='company_user_id[]' >";
			          
			          ?>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $company_name; ?></td>
                            <td><?php  echo $product_name?></td>
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
		
		
				
	
		
                    	<?php 
			    }
			       
			       
			    }else
			    {
			        
			    }
            ?>
		</div>

 
		
		
    
 
<!-- -Cart Items Details -->
<div class="small-container cart-page">
<h1>Cutomer Information</h1>
				<div class="checkout_form" style='padding-bottom:15px;'>
		
			
			<?php 
			$sql3 = "SELECT * from adsmart_customer where user_id = '$account_name'";
			$res3 = mysqli_query($conn, $sql3);			
			
			        
			       
			        $row2=mysqli_fetch_assoc($res3);
			            
			            $customer_user_id = $row2['user_id'];
			            $first_name =$row2['first_name'];
			            $last_name =$row2['last_name'];
			            $email =$row2['email'];
			            $contact_number =$row2['contact_number'];			            
			            $id = $row2['id'];
			            
			          
			            echo "<label>First Name</label>:<b>".$first_name."</b><br>";
			            echo "<label>Last Name</label>:<b>".$last_name."</b><br>";
			            echo "<label>Email</label>:<b>".$email."</b><br>";
			            echo "<label>Contact Number</label>:<b>".$contact_number."</b><br>";
			                
			            ?>
			            
		
		
		
				
		</div>
		<h1>Online Payment</h1>
		
		
		<div class="checkout_form">
			<div>
			<div id="req_number">
												    	<label style='color:blue; font-size: 30px;'>Transaction Number: </label>
												    	
												    	<?php 
												    	$sql5 = "SELECT transaction_id FROM payment ORDER BY id DESC LIMIT 1";
												    	
												    	$res5 = mysqli_query($conn, $sql5);
												    	$row5 = mysqli_fetch_array($res5);
												    	$lastTicket = 0;
												    	if(isset($row5['transaction_id'])){$lastTicket = $row5['transaction_id'];}else{ $lastTicket == 'Tran_id_00000000';}
												    	$lastNumber = intval(substr($lastTicket, -10));
												    	$newNumber = $lastNumber + 1;
												    	$paddedNumber = str_pad($newNumber, 12, "0", STR_PAD_LEFT);
												    	$newTicket = "Tran_id_" . $paddedNumber;
												    	
												    	echo "<b  style='color:black; font-size: 30px;' >".$newTicket."</b> <br> <br>";
													    	 
													    	
													    	?>
													    	
												    	</div>
				<div class="total_amount">
				
						<p>Total Amount:$ <?php echo $totalAmount+$totalAmount*0.1+$totalAmount*0.01; ?></p>
				</div>
			<?php 	
			$sql1 = "SELECT * from customer_credit_card where customer_name = '$account_name'";
			$res1 = mysqli_query($conn, $sql1);
			if($res1==TRUE){
			    
			    $count =mysqli_num_rows($res1);
			    if($count>0){
			$row1=mysqli_fetch_assoc($res1);
			$customer_name = $row1['customer_name'];
			$customer_id = $row1['customer_id'];
			$cvv = $row1['cvv'];
			$expiration_date = $row1['expiration_date'];
			$card_number = $row1['card_number'];
			
			echo"<div id='name'>";
			echo "<label>Name On Card</label><br>";
			if(isset($customer_name)){
			echo "<input required id='input_0' type='text' name='cus_card_name' placeholder='please input your name' style='width:250px' value='".$customer_name."'><br>
				</div>
				<br>";}else{
			    
				echo "<input required id='input_0' type='text' name='cus_card_name' placeholder='please input your name' style='width:250px' ><br>
				</div>
				<br>";
			}
			echo"<div id='Card_no'>";
			echo "<label>Card Number</label><br>";
			if(isset($card_number)){
			    echo "<input required id='input_1' type='number' name='card_number' placeholder='please input your card number' style='width:250px' value='".$card_number."'><br>
				</div>
				<br>";}else{
				
				echo "<input required id='input_1' type='number' name='card_number' placeholder='please input your card number' style='width:250px' ><br>
				</div>
				<br>";
			    }
			    echo"<div id='CVV'>";
			    echo "<label>CVV</label><br>";
			    if(isset($card_number)){
			        echo "<input  required id='input_2' type='number' name='cvv' placeholder='please input CVV' style='width:250px' value='".$cvv."'><br>
				</div>
				<br>";}else{
				
				echo "<input  required id='input_2' type='number' name='cvv' placeholder='please input CVV' style='width:250px' ><br>
				</div>
				<br>";
			        }
			        echo"<div id='expiration_date'>";
			        echo "<label>Expiration Date</label><br>";
			       
			        if(isset($card_number)){
			     
			            echo "<input required id='expiry-date' type='date' name='card_expiry_date' min='2023-03' max='9999-12' style='width:250px' value='$expiration_date'><br>";
				echo	"</div>
				<br>";}else{
				
				echo "<input required id='expiry-date' type='month' name='card_expiry_date'  min='2023-03' max='9999-12' style='width:250px' ><br>
				</div>
				<br>";
			            }
					
				
					
				
					
			echo "		
			</div>
			<div>
				<img src='../images/Visa.png' width='60px' height='40px'>
				<img src='../images/mastercard.png' width='60px' height='40px' style='margin-left:30px;'>
			</div>";
			
			echo "<br>";
			echo"<div id='cus_address'>";
			echo "<p style ='color:black;'><b>*If the items are digital item that please input your email instead of address</b></p>";
			echo "<label>Customer Address</label><br>";			
			echo "<input required type='text' name='cus_address' placeholder='please input your address' style='width:450px' ><br>";
			echo "</div>";	
		
			echo "<input type='hidden' value=".$customer_user_id." name='cus_user_id' >";
			echo  "<input type='hidden' value=".$email." name='email' >";
			echo  "<input type='hidden' value=".$contact_number." name='contact_number' >";
			
			echo "<input type='hidden' value='".$newTicket."' name='transaction_id' >";
			
			
			echo "</div>"; }else{
			    echo"<div id='name'>";
			    echo "<label>Name On Card</label><br>";
			    echo "<input required id='input_0' type='text' name='cus_card_name' placeholder='please input your name' style='width:250px' ><br>
				</div>
				<br>";
			    echo"<div id='Card_no'>";
			    echo "<label>Card Number</label><br>";
			    
			    
			    echo "<input required id='input_1' type='number' name='card_number' placeholder='please input your card number' style='width:250px' ><br>
				</div>
				<br>";
			    
			    echo"<div id='CVV'>";
			    echo "<label>CVV</label><br>";
			    
			    
			    echo "<input  required id='input_2' type='number' name='cvv' placeholder='please input CVV' style='width:250px' ><br>
				</div>
				<br>";
			    
			    echo"<div id='expiration_date'>";
			    echo "<label>Expiration Date</label><br>";
			    
			    
			    echo "<input required id='expiry-date' type='month' name='card_expiry_date'  min='2023-03' max='9999-12' style='width:250px' ><br>
				</div>
				<br>";
			    
			    
			    
			    
			    
			    
			    echo "
					    
			<div>
				<img src='../images/Visa.png' width='60px' height='40px'>
				<img src='../images/mastercard.png' width='60px' height='40px' style='margin-left:30px;'>
			</div>";
			    
			    echo "<br>";
			    echo"<div id='cus_address'>";
			    echo "<p style ='color:black;'><b>*If the items are digital item that please input your email instead of address</b></p>";
			    echo "<label>Customer Address</label><br>";
			    echo "<input required type='text' name='cus_address' placeholder='please input your address' style='width:450px' ><br>";
			    echo "</div>";
			    
			    echo "<input type='hidden' value=".$customer_user_id." name='cus_user_id' >";
			    echo  "<input type='hidden' value=".$email." name='email' >";
			    echo  "<input type='hidden' value=".$contact_number." name='contact_number' >";
			    
			    echo "<input type='hidden' value='".$newTicket."' name='transaction_id' >";
			    
			    
			    
			    
			}}
		?>
		
		<div id="checkout" style="text-align:center;">	
		   <input type="submit" name="submit" value="Pay" class="btn"  style="font-size:16px; font-weight:bold; height:50px;width:80%; ">
	</div>	
		 
</div>
</form>
</div>
</div>

	


     <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>