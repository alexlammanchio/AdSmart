

<!-- -Cart Items Details -->
<div class="small-container cart-page">
			<h2> Related Your Preferred Advertisement Types</h2>
			<div class="small-container">
				<div class="row">
<?php 
$limit = 3; // 每頁顯示的記錄數
$pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1; // 获取当前页码
$start = ($pageNum - 1) * $limit;
			     //create sql query to display categories from db
			     $sql = "SELECT *
                          FROM  adsmart_business_partner   LIMIT $start, $limit
                          ";
			     
			     //execute query
			     $res = mysqli_query($conn, $sql);
			     
			     //count rows to check whether category is available or not
			     $count =mysqli_num_rows($res);
			     
			     $sn=1;
			     
			     if($count >0){
			         $sn = 1 + $start; 
			         //categories available
			         while($row =mysqli_Fetch_assoc($res)){
			             
			             //Get the values like id
			            
			             $company_name=$row['company_name'];
			             $country=$row['country'];
			             $image_name=$row['image_name'];
			             $desc= $row['description'];
			             $id= $row['shop_code'];
			             $print_ads =$row['print_ads'];
			             $outdoor_ads = $row['outdoor_ads'];
			             $broadcast_ads = $row['broadcast_ads'];
			             $telemarketing_ads = $row['telemarketing_ads'];
			             $events_ads = $row['events_ads'];
			             $placement_ads = $row['placement_ads'];
			             $display_ads = $row['display_ads'];
			             $search_ads = $row['search_ads'];
			             $social_ads = $row['social_ads'];
			             $video_ads = $row['video_ads'];
			             $native_ads = $row['native_ads'];
			             $influencer_ads = $row['influencer_ads']
			             ?>
			             				
						<div class="col-4">
			             <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/images/company/<?php  echo $image_name;?>" alt="AdSmart Business Partner">
                                <?php
                                }
                            ?>
                            <br>
							<h1><?php echo $company_name;?></h1>
							<p class="p-2">Country: <b class="p-2"><?php echo $country;?></b></p>
							<p ><b class="p-2">Advertisement Type:</b></p>
							<p >
							<?php 
							if($print_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Print Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($outdoor_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Outdoor Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($broadcast_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Broadcast Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($telemarketing_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Telemarketing Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($events_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Events Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($placement_ads == 1){
							    
							    echo "<b class='btn-backend-1'>Placement Ads</b>&nbsp;";
							}
							
							?>
							
							<?php 
							if($display_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Display Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($search_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Search Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($social_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Social Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($video_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Video Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($native_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Native Ads</b>&nbsp;";
							}
							
							?>	
							<?php 
							if($influencer_ads == 1){
							    
							    echo "<b class='btn-backend-2'>Influencer Ads</b>&nbsp;";
							}
							
							?>							
							</p>
							 <b>Description:	</b> <p style="color:blue;">  <?php echo $desc;?>	<p>		
			               <a href="<?php echo USER_INTERACTION; ?>customer-explore-business.php?id=<?php echo $id; ?>"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
                            
                            </div>
                                
                       
                           
                			             
			             
			             
			             <?php 
			         }
			         
			     }else{
			         
			         //No shop are avilable
			         echo "<div class='error'> No shops are available. </div>";
			     }
			     // 計算總頁數
			     $countQuery = "SELECT COUNT(shop_code) AS cnt FROM  adsmart_business_partner  "; // 替換 your_table 為您的數據表名
			     $countResult = $conn->query($countQuery);
			     $countRow = $countResult->fetch_assoc();
			     $totalRecords = $countRow['cnt'];
			     $totalPages = ceil($totalRecords / $limit)
			?>
			    
						
						
		</div>		
		<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?page=4&pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?page=4&pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?page=4&pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>		
	</div>	
</div>


	


<!--------------------- footer -------------->
	