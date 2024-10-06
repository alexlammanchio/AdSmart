

<!-- -Cart Items Details -->
<div class="small-container cart-page" style ="padding-bottom:500px;">
		
		<div class="reg">
		<h1>Checkout Items</h1>      
		       
           <table style="width:100%">
           <?php 
           $limit = 10; // 每頁顯示的記錄數
           $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1; // 获取当前页码
           $start = ($pageNum - 1) * $limit;
           $sql1 = "select a.req_number from quotation_content a join payment b on a.req_number = b.req_number where a.customer_name = '$account_name' LIMIT $start, $limit";
           $res1 = mysqli_query($conn, $sql1);
           
           $excludedReqNumbers = [];
           
           if ($res1 == TRUE) {
               while ($row = mysqli_fetch_assoc($res1)) {
                   $excludedReqNumbers[] = $row['req_number'];
               }
           }
           
           // 将排除的 req_numbers 转换为字符串，以便在 SQL 查询中使用
           $excludedReqNumbersStr = implode("','", $excludedReqNumbers);
               
           // 修改查询语句，排除在 $sql1 中已经存在的 req_number
           $sql = "select * from quotation_content where customer_name = '$account_name'";
           if (!empty($excludedReqNumbers)) {
               $sql .= " and req_number NOT IN ('$excludedReqNumbersStr')";
           }
            $res = mysqli_query($conn, $sql);
           
            if($res==TRUE){
                
                $count =mysqli_num_rows($res); //function to get all the rows
                
                $previousTransactionId = null;
                $sn=1;
                if($count>0){
                    echo " <tr>
				    <th>No.</th>
                    <th>TransactionId</th>
                    <th>Company Name</th>
				    <th>Item Name</th>                   
				    <th>Quotation Date</th>
				    <th> Valid Day</th>
                    <th> Price</th>                    
				   <th> Action</th>
				  </tr>";
                    $sn = 1 + $start; 
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                        echo "<td>".$sn++."</td>";
                        if ($rows['req_number'] === $previousTransactionId) {
                            echo "<td></td>"; // Leave the column empty
                        } else {
                            echo "<td>" . $rows['req_number'] . "</td>"; // Display the transaction ID
                        }
                        echo "<td>".$rows['company_name']."</td>";
                        echo  "<td>".$rows['subject']."</td>";
                        echo  "<td>".$rows['quotation_date']."</td>"; 
                        echo  "<td>".$rows['valid_day']."</td>"; 
                        echo  "<td>$ ".$rows['price']."</td>";
                       
                        if ($rows['req_number'] !== $previousTransactionId) {
                            
                            echo "<td>";
                            echo "<a href='" . PAYMENT . "Adsmart_checkout_item_info.php?req_number=" . $rows['req_number'] . "'>";
                            echo "<button type='button' class='btn' style='background: Green; width: 100px;'>Checkout</button>";
                            echo "</a>";
                            echo "</td>";} else {
                                echo "<td></td>"; // Leave the columns empty without the button
                                
                            }
                            
                            echo "</tr>";
                            $previousTransactionId = $rows['req_number'];
                    }
                    
				  
                }else{
                    echo "<p style='font-size:30px; color:green;'>No Any Checkout Items!</p>";
                    echo " <tr>
				    <th>No.</th>
                    <th>TransactionId</th>
                    <th>Company Name</th>
				    <th>Item Name</th>                   
				    <th>Quotation Date</th>
				    <th> Valid Day</th>
                    <th> Price</th>                    
				   <th> Action</th>
				  </tr>" ;
                    
                }
                }
                
                // 計算總頁數
                $countQuery = "SELECT COUNT(a.id) AS cnt from quotation_content a join payment b on a.req_number = b.req_number where a.customer_name = '$account_name' "; // 替換 your_table 為您的數據表名
                $countResult = $conn->query($countQuery);
                $countRow = $countResult->fetch_assoc();
                $totalRecords = $countRow['cnt'];
                $totalPages = ceil($totalRecords / $limit);
                ?>
			</table>
			<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?page=8&pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?page=8&pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?page=8&pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>
		</div>
		
</div>


	


<!--------------------- footer -------------->
	