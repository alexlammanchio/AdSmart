

<!-- -Cart Items Details -->
<div class='small-container cart-page'style ='padding-bottom:700px;'>
	   	<div class='reg'>
			<h1>Advertisement Quotation Status </h1>
    			<br>
    		
    			<?php 
    			if(isset($_SESSION['create']))
    			{
    			    
    			    echo $_SESSION['create'];
    			    unset($_SESSION['create']); //removing seesion
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
    					<th>Subject/Product Name</th>    					
    					<th>Budget</th>
    					<th>Deadline Date</th> 
    					<th>Price</th>   					
    					<th>Status</th>
    					<th>Action</th>
    				</tr>
    				
    				<?php 
    				    //select all admin
    				$shop_code =$_SESSION['shopcode'];
    				$session_id =$_SESSION['user2'];
    				    $sql ="SELECT a.*,  
                                case a.budget 
                                WHEN 1 Then 'Less Than \$HK 5000'
                                WHEN 2 Then 'Less Than \$HK 10000'
                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                WHEN 5 Then 'No Budget Limited'
                                End as budget_name
                                FROM qoutation a
                                INNER JOIN adsmart_business_partner b ON a.company_name = b.user_id                                                               
                                Where (a.company_name ='$session_id'  or a.company_id = '$shop_code') AND a.company_id !='0' And a.deadline_date >= CURDATE() 
                                order by a.req_number asc";
    				//execute the query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    //check wether the query is executed or not
    				    if($res==TRUE){
    				        
    				        $count =mysqli_num_rows($res); //function to get all the rows 
    				        
    				        $sn=1;
    				        
    				        if($count>0){
    				            
    				     
    				            while($rows=mysqli_fetch_assoc($res))
    				            {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $quotation_id=$rows['id'];
    				                $product_name =$rows['product_name'];
    				                $price=$rows['company_price'];
    				                $deadline_date=$rows['deadline_date'];    				              
    				                $budget=$rows['budget_name'];
    				                $customer_reply =$rows['customer_reply'];
    				                $customer_action = $rows['customer_action'];
    				                $company_reject_msg = $rows['company_reject_msg'];
    				                $req_number = $rows['req_number'];
    				                $subject =$rows['subject'];    				               
    				                ?>
    				                <tr>
                    					<td><?php  echo $sn++;?></td>
                    					<td><?php echo $req_number; ?></td>
                    					<td><?php if($subject != ''){echo $subject; }else{echo $product_name;} ?></td>                    					
                    					<td><?php echo $budget; ?></td>
                    					<td><?php echo $deadline_date;   ?></td>
                    					<td><?php if($company_reject_msg ==""){echo $price;}else{echo "N/A";}  ?></td>
                    					
                    					<td>
                    					<?php 
                    					
                    					$sql2 ="SELECT *, a.req_number as quotation_content_number
                                                FROM quotation_content a join qoutation b on a.req_number = b.req_number
                                               
                                                ";
                    					$res2 = mysqli_query($conn, $sql2);
                    					
                    					$row2=mysqli_fetch_assoc($res2);
                    					$quotation_content_number = $row2['quotation_content_number'];
                    					
                    					if(isset($row2['bp_filename'])){
                    					    $bp_filename = $row2['bp_filename'];
                    					}else{
                    					    $bp_filename = 'NA';
                    					}
                    					if(isset($row2['cs_filename'])){
                    					    $cs_filename = $row2['cs_filename'];
                    					}else{
                    					    $cs_filename = 'NA';
                    					}
                    					
                    					$sql3 ="SELECT * from replies a join topics b on a.topic_id = b.id
                                                where b.req_number = '$req_number'
                                                order by created_dt DESC
                                                    LIMIT 1;
                                                            ";
                    					
                    					//execute the query
                    					$res3 = mysqli_query($conn, $sql3);
                    					$row3=mysqli_fetch_assoc($res3);
                    					IF(isset($row3['status'])){
                    					    $replies_status = $row3['status'];
                    					}else{
                    					    $replies_status = 'NA';
                    					    }
                    					    
                    					$dt = date('Y-m-d');
                    					
                    					if($deadline_date < $dt){ 
                    					echo "<a class='btn-backend-3' >Expired! </a>";
                    					
                    					}elseif($replies_status == 'reject'){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_business_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-3'>Discussion completed and rejected</a>";
                    					}elseif($replies_status == 'accept'){
                    					    
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_business_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Discussion Completed and Customer Accepted</a>";
                    					}
                    					
                    					elseif($company_reject_msg !=""){ echo "<a class='btn-backend-3' >Rejected! </a>";}
                    					elseif( $customer_action == 'accept' && $quotation_content_number == $req_number ){
                    					    
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_after_created_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>View the quotation</a>";
                    					} /*
                    					elseif( $customer_action == 'discuss' && $quotation_content_number == $req_number  ){
                    					    echo "<a href='";
                    					    echo ADSMART_BUSINESS; echo "Adsmart_partners_after_created_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>View the quotation</a>";
                    					}  */
                    					elseif($customer_action == 'accept' ){ echo "<a href='";
                    					echo USER_INTERACTION; echo "Adsmart_partners_full_quotation.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-1'>Customer Accepted</a>";
                    					} 
                    					
                    					elseif( $customer_action == 'discuss' ){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_business_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Discuss With Customer</a>";
                    					}               					
                    					elseif($customer_action == 'deny' ){ echo "<a href='";
                    					echo USER_INTERACTION; echo "Adsmart_partners_full_quotation.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-3'>Customer Rejected</a>";
                    					}elseif($customer_action == ""){ echo "<a href='";
                    					echo USER_INTERACTION; echo "Adsmart_partners_wait_quotation.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-1'>Waiting for Customer Review</a>";
                    					}
                    					
                    					
                    					
                    					else
                    					{ 
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Waiting for Cutomer review</a>";} ?>
                    					</td>
                    					
                    					<td>
                    					<?php                     					
                    					$sql1 ="SELECT *, a.req_number as quotation_content_number, b.id as q_id , b.customer_action as c_action                             
                                                FROM quotation_content a join qoutation b on a.req_number = b.req_number                                                    
                                                where     a.req_number = '$req_number'                      
                                                ";
                                
                    					//execute the query
                    					$res1 = mysqli_query($conn, $sql1);
                    					$count1 =mysqli_num_rows($res1); //function to get all the rows
                    					
                    				
                    					
                    					if($count1>0){
                    					    
                    					    
                    					    while($row1=mysqli_fetch_assoc($res1))
                    					    {
                    					$row1=mysqli_fetch_assoc($res1);
                    					
                    					
                    					
                    					if($deadline_date < $dt){ Echo "No Action";}
                    					elseif( $cs_filename != 'NA' ){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_after_created_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-2'>See the detail of Contract</a>";
                    					}
                    					elseif($bp_filename != 'NA' AND $cs_filename == 'NA' ){
                    					    echo "No Action - Waiting for customer to signoff";
                    					   
                    					}
                    					elseif( $bp_filename != 'NA' ){
                    					    
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_after_created_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-2'>Go to Dowload the Contract</a>";
                    					}
                    					
                    					elseif($company_reject_msg !=""){ echo "Reject";}
                    					
                    					
                    					else{
                    					echo "<a href='"; 
                    					echo USER_INTERACTION; echo "Adsmart_partners_quotation.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-2'>Modify</a>";
                    					
                    					echo "<a href='"; 
                    					echo USER_INTERACTION; echo "Adsmart_partners_quotation.php?id=";
                    					echo $quotation_id; echo "' class='btn-backend-3'>Cancel</a>";
                    					}
                    					    }}else{
                    					        $sql4 ="SELECT * from replies a join topics b on a.topic_id = b.id
                                                where b.req_number = '$req_number'
                                                order by created_dt DESC
                                                    LIMIT 1;
                                                            ";
                    					        $res4 = mysqli_query($conn, $sql4);
                    					        $count4 =mysqli_num_rows($res4);
                    					       
                    					        if($count4 >0){
                    					        //execute the query
                    					       
                    					       
                    					        $row4=mysqli_fetch_assoc($res4);
                    					        
                    					        if($deadline_date < $dt){ Echo "No Action";}
                    					        elseif($row4['status']=='reject'){
                    					            echo "No Action";
                    					        }
                    					        elseif($row4['status']=='accept' ){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_partners_create_quotation.php?id=";
                    					        echo $quotation_id; echo "' class='btn-backend-2'>Generate the Contract</a>";
                    					        }else{
                    					            echo "No Action";
                    					        }
                    					        }else{
                    					            echo 'No Action';
                    					        }
                    					    }
                    					?>
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
    				?>    				
    				
    				
    				
    			</table>
    			<br>
    			<h1> Status - Expired</h1>
    			<br>    		
    			<table class="tbl-full">
    				<tr>
    					<th>NO.</th>
    					<th>Request Number</th>    					
    					<th>Subject / Product Name</th>
    					<th>Budget</th>
    					<th>Deadline Date</th>
    					<th>Price</th>
    					<th>Status</th>
    					<th>Action</th>
    					
    				</tr>
    				
    				<?php 
    				    //select all admin
    				$shop_code =$_SESSION['shopcode'];
    				$session_id =$_SESSION['user2'];
    				    $sql6 ="SELECT a.*,  
                                case a.budget 
                                WHEN 1 Then 'Less Than \$HK 5000'
                                WHEN 2 Then 'Less Than \$HK 10000'
                                WHEN 3 Then 'Great Than \$HK 10000 and Less Than \$HK 50000'
                                WHEN 4 Then 'Great Than \$HK 50000 and Less Than \$HK 200000'
                                WHEN 5 Then 'No Budget Limited'
                                End as budget_name
                                FROM qoutation a
                                INNER JOIN adsmart_business_partner b ON a.company_name = b.company_name                                                               
                                Where a.company_name ='$session_id'  or a.company_id = '$shop_code' And a.deadline_date < CURDATE()
                                order by a.req_number asc";
    				    
    				
    				    //execute the query
    				
    				   
    				//execute the query
    				    $res6 = mysqli_query($conn, $sql6);
    				    
    				    //check wether the query is executed or not
    				    if($res6==TRUE){
    				        
    				        $count =mysqli_num_rows($res6); //function to get all the rows 
    				     
    				        
    				        $sn=1;
    				      
    				        
    				        if($count>0){
    				            
    				            
    				            while($rows6=mysqli_fetch_assoc($res6))
    				            {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $quotation_id=$rows6['id']; 
    				                $req_number=$rows6['req_number'];        				                
    				                $subject=$rows6['subject'];
    				                $deadline_date=$rows6['deadline_date'];
    				              
    				                $budget=$rows6['budget_name'];
    				                $customer_action = $rows6['customer_action'];
    				                $company_reject_msg =$rows6['company_reject_msg'];
    				            
    				                $product_name =$rows6['product_name'];  
    				                 $price = $rows6['company_price'];		    				                 
    				                
    				                
    				               
    				                ?>
    				                <tr>
                    					<td><?php echo $sn++; ?></td>
                    					<td><?php echo $req_number;?></td>
                    					
                    					<td><?php if($subject != ''){
                                            echo $subject;

                    					}else{
                    					    echo $product_name;
                    					    
                    					}; ?></td>
                    					<td><?php echo  $budget; ?></td>
                    					<td><?php echo $deadline_date;   ?></td>
                    					<td><?php echo $price ?></td>
                    					<td><?php echo 'Expired' ?></td>
                    					<td>
                    					<?php                    					
                    					
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_partners_full_quotation.php?id=";
                    					    echo $quotation_id; 
                    					echo "' class='btn-backend-3' >Check the detail </a>";
                    					
                    					 ?>
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
    				?>    				
    				
    				
    				
    			</table>
			</div>
		</div>


	


<!--------------------- footer -------------->
