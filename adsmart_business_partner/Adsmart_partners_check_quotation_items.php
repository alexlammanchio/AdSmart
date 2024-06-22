

<!-- -Cart Items Details -->
<div class="small-container cart-page " style ="padding-bottom:700px;">
		
		<div class="reg">
		<h1>Check quotaiton Item Status</h1>             
           <table style="width:100%">
           <?php 
           
           $sql1 = "select a.req_number from quotation_content a join payment b on a.req_number = b.req_number where b.company_user_id = '$account_name'";
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
           $sql = "select * from quotation_content where company_name = '$account_name'";
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
                    <th> Status</th>                  
				   <th> Action</th>
				  </tr>";
                    
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
                        echo  "<td>Pending customer to Checkout</td>";
                        if ($rows['req_number'] !== $previousTransactionId) {
                            
                            echo "<td>";
                            echo "<a href='" . ADSMART_BUSINESS . "Adsmart_check_quotation_info.php?req_number=" . $rows['req_number'] . "'>";
                            echo "<button type='button' class='btn' style='background: Green; width: 100px;'>Detail</button>";
                            echo "</a>";
                            echo "</td>";} else {
                                echo "<td></td>"; // Leave the columns empty without the button
                                
                            }
                            
                            echo "</tr>";
                            $previousTransactionId = $rows['req_number'];
                    }
                    
				  
                }else{
                    echo "<p style='font-size:30px; color:green;'> No Any Checkout Items!</p>";
                    echo "<tr>
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
	