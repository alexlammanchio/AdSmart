

<!-- -Cart Items Details -->
<div class='small-container cart-page' style ='padding-bottom:700px;'>
	   	<div class='reg'>
			<h1>Explore An Advertisement Service Request </h1>
    			<br>
    		
    			<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['delete'])){
    			    
    			    echo $_SESSION['delete'];
    			    unset($_SESSION['delete']);
    			}
    			if(isset($_SESSION['update'])){
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']);
    			}
    			if(isset($_SESSION['user-not-found'])){
    			    
    			    echo $_SESSION['user-not-found'];
    			    unset($_SESSION['user-not-found']);
    			}
    			if(isset($_SESSION['pwd-not-match'])){
    			    
    			    echo $_SESSION['pwd-not-match'];
    			    unset($_SESSION['pwd-not-match']);
    			}
    			if(isset($_SESSION['change-pwd'])){
    			    
    			    echo $_SESSION['change-pwd'];
    			    unset($_SESSION['change-pwd']);
    			}
    			?>
    			<br>
    			<br>    		
    			<table class="tbl-full">
    				<tr>
    					<th>NO.</th>
    					<th>Request Number</th>
    					<th>Category Name</th>
    					<th>Subject</th>
    					<th>Budget</th>
    					<th>Deadline Date</th>
    					<th>Action</th>
    				</tr>
    				
    				<?php 
    				
    				$account_name = $_SESSION['user2'];
    				    //select all business partners
    				$sql1= "select shop_code,company_name,
CASE WHEN print_ads = 1 THEN 'print_ads' ELSE print_ads END as print_ads,
CASE WHEN outdoor_ads = 1 THEN 'outdoor_ads' ELSE outdoor_ads END as outdoor_ads,
CASE WHEN broadcast_ads = 1 THEN 'broadcast_ads' ELSE broadcast_ads END as broadcast_ads,
CASE WHEN telemarketing_ads = 1 THEN 'telemarketing_ads' ELSE telemarketing_ads END as telemarketing_ads,
CASE WHEN events_ads = 1 THEN 'events_ads' ELSE events_ads END as events_ads,
CASE WHEN placement_ads = 1 THEN 'placement_ads' ELSE placement_ads END as placement_ads,
CASE WHEN display_ads = 1 THEN 'display_ads' ELSE display_ads END as display_ads,
CASE WHEN social_ads = 1 THEN 'social_ads' ELSE social_ads END as social_ads,
CASE WHEN search_ads = 1 THEN 'search_ads' ELSE search_ads END as search_ads,
CASE WHEN video_ads = 1 THEN 'video_ads' ELSE video_ads END as video_ads,
CASE WHEN native_ads = 1 THEN 'native_ads' ELSE native_ads END as native_ads,
CASE WHEN influencer_ads = 1 THEN 'influencer_ads' ELSE influencer_ads END as influencer_ads
from adsmart_business_partner
where user_id = '$account_name' 

";
    				    
    				$res2 = mysqli_query($conn, $sql1);
    				
    				$row = mysqli_fetch_array($res2);
    				
    				$company_name = $row['company_name'];
    				$company_id = $row['shop_code'];
    				
    				if(isset($row['print_ads'])){
    				    $print_ads = $row['print_ads'];}else{$print_ads ='0';}
    				if(isset($row['outdoor_ads'])){
    				    $outdoor_ads = $row['outdoor_ads'];}else{$outdoor_ads ='0';}
    			  if(isset($row['broadcast_ads'])){
    			      $broadcast_ads = $row['broadcast_ads'];}else{$broadcast_ads ='0';}
    			      if(isset($row['telemarketing_ads'])){
    			          $telemarketing_ads = $row['telemarketing_ads'];}else{$telemarketing_ads ='0';}
    			          if(isset($row['events_ads'])){
    			              $events_adss = $row['events_ads'];}else{$events_ads ='0';}
    			              if(isset($row['placement_ads'])){
    			                  $placement_ads = $row['placement_ads'];}else{$placement_ads ='0';}
    			    
    			                  if(isset($row['display_ads'])){
    			                      $display_ads = $row['display_ads'];}else{$display_ads ='0';}
    			                      if(isset($row['social_ads'])){
    			                          $social_ads = $row['social_ads'];}else{$social_ads ='0';}
    			                          if(isset($row['search_ads'])){
    			                              $broadcast_adss = $row['search_ads'];}else{$search_ads ='0';}
    			                              if(isset($row['video_ads'])){
    			                                  $video_ads = $row['video_ads'];}else{$video_ads ='0';}
    			                                  if(isset($row['native_ads'])){
    			                                      $native_ads = $row['native_ads'];}else{$native_ads ='0';}
    			                                      if(isset($row['influencer_ads'])){
    			                                          $influencer_ads = $row['influencer_ads'];}else{$influencer_ads ='0';}
    			                  
    			                                          $limit = 10; // 每頁顯示的記錄數
    			                                          $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1; // 获取当前页码
    			                                          $start = ($pageNum - 1) * $limit;
    				    $sql ="SELECT a.*, b.display_name,b.category_name, 
                                case a.budget 
                                WHEN 1 Then 'Less Than \$HK 5000'
                                WHEN 2 Then 'Less Than \$HK 10000'
                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                WHEN 5 Then 'No Budget Limited'
                                End as budget_name
                                FROM qoutation a
                                INNER JOIN adsmart_category b ON a.category_id = b.id
                               
                                Where b.category_name in ('$print_ads', '$outdoor_ads','$broadcast_ads', 
                            '$telemarketing_ads','$events_adss', '$placement_ads',
                            '$display_ads', '$social_ads','$broadcast_adss', '$video_ads','$native_ads', '$influencer_ads'                                
                                    )
                                AND (a.company_id ='0' or a.company_name = '$company_name') 
                                And a.deadline_date >=CURDATE() AND 
                                a.req_number NOT IN (
                                        SELECT req_number
                                        FROM qoutation
                                        WHERE company_id = '$company_id' Or customer_action ='accept'
                                     ) 
                                GROUP BY a.req_number
                                HAVING COUNT(*) = 1
                                        LIMIT $start, $limit;
                             
                                 ";
    				    
    				  
    				    
    				//execute the query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    
    				    
    				    //check wether the query is executed or not
    				    if($res==TRUE){
    				        
    				        $count =mysqli_num_rows($res); //function to get all the rows 
    				        
    				        $sn=1;
    				        
    				        
    				        if($count>0){
    				            
    				            $sn = 1 + $start;
    				            while($rows=mysqli_fetch_assoc($res))
    				            {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $quotation_id=$rows['id'];
    				                $req_number = $rows['req_number'];
    				                $category_name=$rows['display_name'];
    				                $subject=$rows['subject'];
    				                $deadline_date=$rows['deadline_date'];
    				                $company_name = $rows['company_name'];
    				                $budget=$rows['budget_name'];
    				                $_SESSION['type'] =$category_name;
    				                $_SESSION['req_id'] = $rows['id'];
    				                ?>
    				                <tr>
                    					<td><?php echo $sn++; ?></td>
                    					<td><?php echo $req_number; ?></td>
                    					<td><?php echo $category_name; ?></td>
                    					<td><?php echo $subject; ?></td>
                    					<td><?php echo $budget; ?></td>
                    					<td><?php echo $deadline_date; ?></td>
                    					
                    					<td>
                    					<?php if($company_name != $account_name){ 
                    					    
                    					    echo "<a href='"; 
                    					    echo USER_INTERACTION; echo "Adsmart_partners_bid_detail.php?id="; 
                    					echo $quotation_id; echo "' class='btn-backend-1'>Explore</a>"; 
                    					}else
                    					{
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_bid_detail.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Explore</a> ";
                    					
                    					echo "<a href='";
                    					echo USER_INTERACTION; echo "Adsmart_partners_reject_bid_detail.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-2'>Reject</a>";
                    					
                    					} ?>
                    					</td>
                					</tr>
                				                
    				                <?php 
    				                
    				             }
    				        }
    				        else 
    				        {
    				            // we do not have data indb
    				        }
    				    }
    				    
    				    $countQuery = "SELECT COUNT(*) AS cnt 
                               FROM (
                            SELECT a.req_number
                            FROM qoutation a
                            INNER JOIN adsmart_category b ON a.category_id = b.id
                               
                                Where b.category_name in ('$print_ads', '$outdoor_ads','$broadcast_ads', 
                            '$telemarketing_ads','$events_adss', '$placement_ads',
                            '$display_ads', '$social_ads','$broadcast_adss', '$video_ads','$native_ads', '$influencer_ads'                                
                                    )
                                AND (a.company_id ='0' or a.company_name = '$company_name')
                                And a.deadline_date >=CURDATE() AND 
                                a.req_number NOT IN (
                                        SELECT req_number
                                        FROM qoutation
                                        WHERE company_id = '$company_id'
                                     )
                                GROUP BY a.req_number
                                HAVING COUNT(*) = 1)
                                AS unique_requests ;"; // 替換 your_table 為您的數據表名
    				    $countResult = $conn->query($countQuery);
    				    $countRow = $countResult->fetch_assoc();
    				    $totalRecords = $countRow['cnt'];
    				    $totalPages = ceil($totalRecords / $limit);
    				?>    				
    				
    				
    				
    			</table>
    			<br>
    			
    			<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?page=2&pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?page=2&pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?page=2&pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>
			</div>
		</div>


	


<!--------------------- footer -------------->
