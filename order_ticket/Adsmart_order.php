

<!-- -Cart Items Details -->
<div class="small-container cart-page" style ="margin-bottom:600px;">
		
		<div class="reg">
		<h1>Order History</h1>             
          
				  <table style="width:100%">
				   <?php 
           if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
    			?>
           <?php 
           $limit = 10; // 每頁顯示的記錄數
           $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1; // 获取当前页码
           $start = ($pageNum - 1) * $limit; // 计算当前页面的起始记录
            $sql= "select * from payment where cus_user_id = '$account_name' and order_status = 'completed' LIMIT $start, $limit ";
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
                    $sn = 1 + $start; 
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
            if($rows['quantity'] !='0'){
                echo  "<td>".$rows['quantity']."</td>"; }else{
                    echo "<td>N/A</td>";
                }
            if(isset($rows['order_status'])){
                echo  "<td>".$rows['order_status']."</td>"; }
                else{
                    echo  "<td>N/A</td>";
                }
			
			// Display the button after column 2
			if ($rows['transaction_id'] !== $previousTransactionId) {
			  
			    echo "<td>";
			    echo "<a href='" . ORDER_TICKET . "Adsmart_order_info.php?trans_id=" . $rows['transaction_id'] . "'>";
			    echo "<button type='button' class='btn' style='background: blue; width: 100px;'>View</button>";
			    echo "</a>";
			    echo "</td>";} else {
			    echo "<td></td>"; // Leave the columns empty without the button
			}
			
			echo "</tr>";
			
			$previousTransactionId = $rows['transaction_id']; // Update the previous transaction ID
			
                    }
                    
                    
                }else{
                    echo "<p style='font-size:30px; color:green;'>No Any Completed Order Records!</p>";
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
                // 計算總頁數
                $countQuery = "SELECT COUNT(id) AS cnt from payment where cus_user_id = '$account_name' and order_status = 'completed' "; // 替換 your_table 為您的數據表名
                $countResult = $conn->query($countQuery);
                $countRow = $countResult->fetch_assoc();
                $totalRecords = $countRow['cnt'];
                $totalPages = ceil($totalRecords / $limit);
           ?>
			</table>
			<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?page=5&pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?page=5&pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?page=5&pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>
		</div>
		
</div>


	


<!--------------------- footer -------------->
	