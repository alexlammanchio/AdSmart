

<!-- -Cart Items Details -->
<div class="small-container cart-page " style ="padding-bottom:700px;">
		
		<div class="reg">
		<h1>Order Status</h1>             
           <table style="width:100%">
           <?php 
            $sql= "select * from payment where company_user_id = '$account_name' AND order_status != 'completed'";
            $res = mysqli_query($conn, $sql);
           
            if($res==TRUE){
                
                $count =mysqli_num_rows($res); //function to get all the rows
                
                
                $sn=1;
                
                $previousTransactionId = null;
                
                if($count>0){
                    echo " <tr>
				    <th>No.</th>
				    <th>Transaction Id</th>
                    <th>Company Name</th>
				    <th>Item Name</th>
				    <th> Price</th>
                    <th> Quantity</th>
                    <th> Status</th>
				   <th> Action</th>
				  </tr>";
                    
                    while($rows=mysqli_fetch_assoc($res))
                    {
           
            echo "<tr>";
            echo "<td>".$sn++."</td>";
            if ($rows['transaction_id'] === $previousTransactionId) {
                echo "<td></td>"; // Leave the column empty
            } else {
                echo "<td>" . $rows['transaction_id'] . "</td>"; // Display the transaction ID
            }
            echo "<td>".$rows['company_user_id']."</td>";
            echo  "<td>".$rows['item_name']."</td>";
            echo  "<td>".$rows['price']."</td>";  
            if($rows['quantity'] != '0'){
                echo  "<td>".$rows['quantity']."</td>"; }
                else{
                    echo  "<td>N/A</td>";
                    
                }
            if(isset($rows['status'])){
                echo  "<td>".$rows['status']."</td>"; }
                else{
                    echo  "<td>N/A</td>";
                }
			
			// Display the button after column 2
			if ($rows['transaction_id'] !== $previousTransactionId) {
			  
			    echo "<td>";
			    echo "<a href='" . ADSMART_BUSINESS . "Adsmart_order_info.php?trans_id=" . $rows['transaction_id'] . "'>";
			    echo "<button type='button' class='btn' style='background: Green; width: 100px;'>View</button>";
			    echo "</a>";
			    echo "</td>";} else {
			    echo "<td></td>"; // Leave the columns empty without the button
			}
			
			echo "</tr>";
			
			$previousTransactionId = $rows['transaction_id']; // Update the previous transaction ID
			
                    }
                    
                    
                }else{
                    echo "<p style='font-size:30px; color:green;'>No Any Order Records!</p>";
                    echo " <tr>
				    <th>No.</th>
				    <th>Transaction Id</th>
                    <th>Company Name</th>
				    <th>Item Name</th>
				    <th> Total Amount</th>
                    <th> Status</th>
				   <th>Detail</th>
				  </tr>" ;
                    
                }}
           ?>
				 
				  
				  
			</table>
			<div class="row">
				<div class="ads-btn">
					<span>1</span>
					<span>2</span>
					<span>3</span>
					<span>4</span>
					<span>&#8594;</span>
				</div>		
				</div>
		</div>
		
</div>


	


<!--------------------- footer -------------->
	