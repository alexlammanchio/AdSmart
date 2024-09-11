<?php  include('partials/menu.php')?>

<!-- -Cart Items Details -->
<div class="small-container cart-page" style ="margin-bottom:600px;">
		
		<div class="reg">
		<h1>Business Partner Transaction Page</h1>             
          
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
            $sql= "SELECT company_user_id, SUM(total) AS total
                    FROM payment
                    WHERE order_status = 'completed'
                    GROUP BY company_user_id LIMIT $start, $limit ";
            $res = mysqli_query($conn, $sql);
           
            if($res==TRUE){
                
                $count =mysqli_num_rows($res); //function to get all the rows
                
                
                $sn=1;
                
                $previousTransactionId = null;
                
                if($count>0){
                    echo " <tr>
				    <th>No.</th>				    
                    <th>Company Name</th>
				    <th> Total</th>
				   <th> AdSmart Commission</th>
                    <th> Action</th>
				  </tr>";
                    $sn = 1 + $start; 
                    while($rows=mysqli_fetch_assoc($res))
                    {
           
            echo "<tr>";
            echo "<td>".$sn++."</td>";            
            echo "<td>".$rows['company_user_id']."</td>";           
            echo  "<td> $".$rows['total']."</td>";   
            $commission = number_format(($rows['total']/1.11)*0.1, 2, '.', ',');
           
            echo  "<td> +$".$commission."</td>"; 
			// Display the button after column 2
            echo "<td><a href='";
            echo ADMIN; echo "admin/commission_detail.php?id=";
            echo $rows['company_user_id']; echo "' class='btn-backend-1'>Detail</a></td>"; 
			echo "</tr>";
			
			$previousTransactionId = $rows['company_user_id']; // Update the previous transaction ID
			
                    }
                    
                    
                }else{
                    echo "<p style='font-size:30px; color:green;'>No Any Completed Order Records!</p>";
                    echo " <tr>
				   <th>No.</th>				    
                    <th>Company Name</th>
				    <th> Total</th>
				   <th> AdSmart Commission</th>
                    <th> Action</th>
				  </tr>" ;
                    
                }}
                // 計算總頁數
                $countQuery = "SELECT COUNT(id) AS cnt from payment where  order_status = 'completed' "; // 替換 your_table 為您的數據表名
                $countResult = $conn->query($countQuery);
                $countRow = $countResult->fetch_assoc();
                $totalRecords = $countRow['cnt'];
                $totalPages = ceil($totalRecords / $limit);
           ?>
			</table>
			<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>
				
				<a href="<?php echo ADMIN; ?>admin/index.php" class="btn-backend-3" style='width:500px;'>Go back to Home Page</a>
		</div>
		
</div>


	


<!--------------------- footer -------------->
		    
	    
	   <?php include('partials/footer.php')?>