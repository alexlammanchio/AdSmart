<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
 
 <!-- AdSmart  header  --> 

<!-- -Cart Items Details -->
<div class="small-container cart-page">
		<h1 style="text-align:center; font-size:40px; ">Shopping Cart</h1>
		<br>
		<div style="text-align:center;">
		<?php 
		if(isset($_SESSION['delete']))
		{
		    
		    echo $_SESSION['delete'];
		    unset($_SESSION['delete']); //removing seesion
		}
		?>
		</div>
		
			<?php 
			If(!isset($_SESSION['user1']) ){
			    echo"<div style='text-align:center; font-size:28px;'>";
			    echo "Please Go to Login AdSmart Customer account. Click <a href ='".SITEURL."signUp.php' style ='color:blue;'>Here</a> to login!";
			    echo "<br>";
			    echo "<p style = 'color: green;'>Shopping cart is Empty!</p>";
			    echo "<br>";
			    echo "<form action='handle_update_shopping_cart.php' method='post'>
			<table>
			<tr>
			<th>Item Number</th>
			<th>Company Name</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Price & Quantity</th>
			<th>Total Amount</th>
			</tr>
            </table>
            </form>
            ";
			    
			   echo "</div>";
			   echo "<br>";
			}else{
			    
			$sql2 = "SELECT *, a.quantity as shopp_cart_quantity, a.price*a.quantity  as total_amount, a.id as shopping_cart_id   from shopping_cart a join adsmart_business_product b on a.company_id = b.company_id and a.product_name = b.product_name where a.customer_name = '$account_name'";
			$res2 = mysqli_query($conn, $sql2);
			
			
			if($res2==TRUE){
			    
			    $count =mysqli_num_rows($res2); //function to get all the rows
			    
			    $sn=1;
			    
			    
			    if($count > 0){
			        $totalAmount = 0; 
			        $dataRows = [];
			        echo "<form action='handle_update_shopping_cart.php' method='post'>
			<table>
			<tr>
			<th>Item Number</th>
			<th>Company Name</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Price & Quantity</th>
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
			                 'id1' => $rows['shopping_cart_id']
			                ];
			            foreach ($dataRows as $data) {
			            $company_name= $data['company_name'];
			            $product_name= $data['product_name'];
			            $image_name= $data['image_name'];
			            $price= $data['price'];
			            $quantity= $data['quantity'];
			            $total_amount = $data['price']*$data['quantity'];
			            
			            $id= $data['id'];
			            $id1= $data['id1'];
			            }
			            $totalAmount += $total_amount;
			            ?>
			            
			           <tr>
			           <?php echo "<input type='hidden' value='".$id1."' name='shop_id[]' >"; ?>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $company_name; ?></td>
                            <td><?php echo $product_name; ?></td>
                            <td>
                                <div class='cart-info'>
                                    <img src='../images/business_product/<?php echo $image_name; ?>' alt='<?php echo $product_name; ?>'>
                                </div>
                            </td>
                            <td>
                                <b>Price:</b> <span id="price_<?php echo $id; ?>"><?php echo $price; ?></span>
                                <input type='number' name='quantity[]' value='<?php echo $quantity; ?>' min='0' id='qty_<?php echo $id; ?>' onchange='updateTotal(<?php echo $id; ?>)'>
                                <br><a href='<?php echo USER_INTERACTION; ?>handle_cart_remove_product.php?id=<?php echo $id; ?>&customer_name=<?php echo $account_name; ?>'>Remove</a>
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
					<td></td>
					<td >Subtotal</td>
					<td id="subtotal"><?php echo $totalAmount;?> </td>				
				
				</tr>
				<tr>
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
					<td></td>
					<td>Tax (1%)</td>
					<td id="tax"><?php echo "+".$totalAmount*0.01;?></td>				
				
				</tr>
				<tr>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td style=" border-right: none;"></td>
					<td></td>
					<td>Total</td>
					<td id="total"><?php echo $totalAmount+$totalAmount*0.1+$totalAmount*0.01;?> </td>				
				
				</tr>
			</table>
		<div id="checkout" style="text-align:center;">	
		
		  <input type="submit" name="submit" value="Checkout" class="btn"  style="font-size:16px; font-weight:bold; height:50px;width:80%; ">
		 </div>
		</form> 

                    	<?php 
			        }else{
			    
			        echo"<div style='text-align:center; font-size:28px;'>";
			        echo "<p style = 'color: green;'>Shopping cart is Empty! Please go to shopping!</p>";
			        echo "<br>";
			        echo "<form>
        
                			<table>
                			<tr>
                			<th>Item Number</th>
                			<th>Company Name</th>
                			<th>Product Name</th>
                			<th>Product Image</th>
                			<th>Price & Quantity</th>
                			<th>Total Amount</th>
                			</tr>
                            </table>
                            </form>
                            ";
			        
			        echo "</div>";
			        echo "<br>";
			    }}else
			    {
			        
			        
			        
			        
			            // we do not have data indb
			    }
			}
			
			?>
		

</div>

		
				

<script>
function updateTotal(productId) {
    var priceElement = document.getElementById("price_" + productId);
    var quantityElement = document.getElementById("qty_" + productId);
    var price = parseFloat(priceElement.textContent);
    var quantity = parseInt(quantityElement.value);
    var total = price * quantity;
    document.getElementById("total_" + productId).textContent = total.toFixed(2);

    // 更新页面底部的总计额
    updatePageTotal();
}

function updatePageTotal() {
    var totalElements = document.querySelectorAll("td[id^='total_']");
    var totalAmount = 0;
    totalElements.forEach(function(element) {
        totalAmount += parseFloat(element.textContent);
    });
    document.getElementById("subtotal").textContent = totalAmount.toFixed(2);
    document.getElementById("serviceCharge").textContent = (totalAmount * 0.1).toFixed(2);
    document.getElementById("tax").textContent = (totalAmount *0.01).toFixed(2);
    document.getElementById("total").textContent = (totalAmount + totalAmount * 0.1 + totalAmount *0.01).toFixed(2);
}
</script>

	


<!--------------------- footer -------------->
<?php  include('../partials-front/footer.php');?>