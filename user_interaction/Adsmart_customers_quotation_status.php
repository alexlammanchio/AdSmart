

<!-- -Cart Items Details -->
<div class='small-container cart-page' style ="padding-bottom:450px;">
	   	<div class='reg'>
			<h1>Advertisement Quotation Status </h1>
    			<br>
    		
    			<?php 
    			if(isset($_SESSION['create']))
    			{
    			    
    			    echo $_SESSION['create'];
    			    unset($_SESSION['create']); //removing seesion
    			}
    			if(isset($_SESSION['reply']))
    			{
    			    
    			    echo $_SESSION['reply'];
    			    unset($_SESSION['reply']); //removing seesion
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
    					<th>Subject / Product Name</th>
    					<th>Budget</th>
    					<th>Deadline Date</th>
    					<th>Company Name</th>
    					<th>Status</th>
    					<th>Action</th>
    				</tr>
    				
    				<?php 
    				    //select all admin
    				$session_id =$_SESSION['user1'];
    				    $sql ="SELECT 
                                a.*, 
                                c.user_id,
                                CASE a.budget 
                                    WHEN 1 THEN 'Less Than \$HK 5000'
                                    WHEN 2 THEN 'Less Than \$HK 10000'
                                    WHEN 3 THEN 'Greater Than \$HK 10000 and Less Than \$HK 50000'
                                    WHEN 4 THEN 'Greater Than \$HK 50000 and Less Than \$HK 200000'
                                    WHEN 5 THEN 'No Budget Limited'
                                END AS budget_name,  
                                a.company_name AS business_name                              
                            FROM 
                                qoutation a                                
                            INNER JOIN 
                                adsmart_customer c ON a.customer_id = c.id                            
                                Where c.user_id ='$session_id' AND a.deadline_date >= CURDATE()
                                order by a.req_number asc";
    				    
    				
    				    //execute the query
    				
    				   
    				//execute the query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    //check wether the query is executed or not
    				    if($res==TRUE){
    				        
    				        $count =mysqli_num_rows($res); //function to get all the rows 
    				     
    				        
    				        $sn=1;
    				        
    				        $previousreq_number = null;
    				        if($count>0){
    				            
    				            
    				            while($rows=mysqli_fetch_assoc($res))
    				            {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $quotation_id=$rows['id']; 
    				                $req_number=$rows['req_number'];        				                
    				                $subject=$rows['subject'];
    				                $deadline_date=$rows['deadline_date'];
    				                $company_name =$rows['business_name'];
    				                $budget=$rows['budget_name'];
    				                $customer_action = $rows['customer_action'];
    				                $company_reject_msg =$rows['company_reject_msg'];
    				                $company_id =$rows['company_id'];
    				                
    				                $product_name =$rows['product_name'];    				               
    				                $sql1 = "Select * from quotation_content";
    				                $res1 = mysqli_query($conn, $sql1);
    				                
    				                $row1=mysqli_fetch_assoc($res1);
    				                
    				                
    				                $content_req_number = $row1['req_number'];
    				                $bp_filename = $row1['bp_filename'];
    				                
    				               
    				                ?>
    				                <tr>
                    					<td><?php echo $sn++; ?></td>
                    					<?php if ($req_number === $previousreq_number) {
                                                    echo "<td></td>"; // Leave the column empty
                                                } else {
                                                    echo "<td>" . $req_number . "</td>"; // Display the transaction ID
                                                }
                                                
                                                
                                                ?>
                    					
                    					
                    					
                    					
                    					<td><?php if($subject != ''){
                                            echo $subject;

                    					}else{
                    					    echo $product_name;
                    					    
                    					}; ?></td>
                    					<td><?php echo  $budget; ?></td>
                    					<td><?php echo $deadline_date;   ?></td>
                    					<td><?php if($company_name !=""){echo $company_name;}else{echo "N/A";} ?></td>
                    					<td>
                    					<?php 
                    					$sql5 ="SELECT * from replies a join topics b on a.topic_id = b.id
                                                where b.req_number = '$req_number'
                                                order by created_dt DESC
                                                    LIMIT 1;
                                                            ";
                    					
                    					//execute the query
                    					$res5 = mysqli_query($conn, $sql5);
                    					$row5=mysqli_fetch_assoc($res5);
                    					IF(isset($row5['status'])){
                    					    $replies_status = $row5['status'];
                    					}else{
                    					    $replies_status = 'NA';
                    					}
                    					
                    					
                    					if ($req_number == $previousreq_number ) {
                    					$dt = date('Y-m-d');
                    					
                    					if($deadline_date < $dt){ 
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_expired_quotation.php?id=";
                    					    echo $quotation_id; 
                    					echo "' class='btn-backend-3' >Expired! </a>";
                    					
                    					}elseif($company_reject_msg !=""){ echo "<a class='btn-backend-3' >Rejected! </a>";}
                    					/*
                    					elseif($company_id !='0' && $customer_action == 'accept' && $req_number == $content_req_number && $bp_filename != ''){
                    					    echo "<a href='";
                    					    echo ADSMART_CUSTOMER; echo "Adsmart_customers_download_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>See the quotation</a>";
                    					    
                    					    
                    					}
                    					*/
                    					elseif($replies_status == 'reject' AND $company_name !=''){
                    					    
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-2'>Discussion completed and Reject</a>";
                    					}
                    					elseif($replies_status == 'accept' AND $company_name !=''){
                    					    
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Discussion completed and accept</a>";
                    					}
                    					elseif($company_id !='0' && $customer_action == 'accept'  ){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_full_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Accept</a>";
                    					    
                    					    
                    					}/*
                    					
                    					elseif($company_id !='0' && $customer_action == 'discuss'  && $req_number == $content_req_number && $bp_filename != ''  ){
                    					    echo "<a href='";
                    					    echo ADSMART_CUSTOMER; echo "Adsmart_customers_download_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>See the quotation</a>";
                    					    
                    					    
                    					}
                    					*/
                    					elseif($company_id !='0' && $customer_action == 'discuss' ){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_discuss_quotation.php?qoutation_id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>Discuss with Business Partner</a>";
                    					    
                    					    
                    					}
                    					
                    					elseif($company_id !='0' && $customer_action == 'deny'){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_full_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-3'>Rejected the quotation</a>"; 
                    					    
                    					    
                    					}
                    					
                    					elseif($company_id !='0' && $company_name !='' ){ echo "<a href='"; 
                    					echo USER_INTERACTION; echo "Adsmart_customers_receive_quotation.php?id="; 
                    					echo $quotation_id; echo "' class='btn-backend-2'>Received the Offer</a>"; 
                    					}elseif($company_name !='' && $product_name != '' && $company_id !='0'){
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_after_send_requirement.php?id=";
                    					    echo $quotation_id;
                    					    
                    					    echo "'class='btn-backend-1'>Waiting for Company to review </a>";
                    					    
                    					}               					
                    					
                    					else{ echo "<a href='";
                    					echo USER_INTERACTION; echo "Adsmart_customers_after_create_quotation.php?id=";
                    					echo $quotation_id; 
                    					    
                    					echo "'class='btn-backend-1'>Waiting for Company to bid </a>"; } 
                    					}else{
                    					    $dt = date('Y-m-d');
                    					   
                    					    if($deadline_date < $dt){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_expired_quotation.php?id=";
                    					        echo $quotation_id;
                    					        echo "' class='btn-backend-3' >Expired! </a>";
                    					        
                    					    }elseif($company_reject_msg !=""){ echo "<a class='btn-backend-3' >Rejected! </a>";}
                    					    /*
                    					     elseif($company_id !='0' && $customer_action == 'accept' && $req_number == $content_req_number && $bp_filename != ''){
                    					     echo "<a href='";
                    					     echo ADSMART_CUSTOMER; echo "Adsmart_customers_download_quotation.php?id=";
                    					     echo $quotation_id; echo "' class='btn-backend-1'>See the quotation</a>";
                    					     
                    					     
                    					     }
                    					     */
                    					    elseif($replies_status == 'accept' AND $company_name !='' AND $company_id != '0'){
                    					        
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_discuss_quotation.php?qoutation_id=";
                    					        echo $quotation_id; echo "' class='btn-backend-1'>Discussion completed and accept</a>";
                    					    }
                    					    elseif($company_id !='0' && $customer_action == 'accept'  ){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_full_quotation.php?id=";
                    					        echo $quotation_id; echo "' class='btn-backend-1'>Waiting for Company to review</a>";
                    					        
                    					        
                    					    }/*
                    					    
                    					    elseif($company_id !='0' && $customer_action == 'discuss'  && $req_number == $content_req_number && $bp_filename != ''  ){
                    					    echo "<a href='";
                    					    echo ADSMART_CUSTOMER; echo "Adsmart_customers_download_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-1'>See the quotation</a>";
                    					    
                    					    
                    					    }
                    					    */
                    					    elseif($company_id !='0' && $customer_action == 'discuss' ){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_discuss_quotation.php?qoutation_id=";
                    					        echo $quotation_id; echo "' class='btn-backend-1'>Discuss with Business Partner</a>";
                    					        
                    					        
                    					    }
                    					    
                    					    elseif($company_id !='0' && $customer_action == 'deny'){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_full_quotation.php?id=";
                    					        echo $quotation_id; echo "' class='btn-backend-3'>Rejected the quotation</a>";
                    					        
                    					        
                    					    }
                    					    
                    					    elseif($company_id !='0' && $company_name !='' ){ echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_receive_quotation.php?id=";
                    					    echo $quotation_id; echo "' class='btn-backend-2'>Received the Offer</a>";
                    					    }elseif($company_name !='' && $product_name != '' && $company_id !='0'){
                    					        echo "<a href='";
                    					        echo USER_INTERACTION; echo "Adsmart_customers_after_send_requirement.php?id=";
                    					        echo $quotation_id;
                    					        
                    					        echo "'class='btn-backend-1'>Waiting for Company to review And Send a contract </a>";
                    					        
                    					    }
                    					    
                    					    elseif($req_number !== $previousreq_number AND $company_id !='0' && $company_name !=''){ echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_after_create_quotation.php?id=";
                    					    echo $quotation_id;
                    					    
                    					    echo "'class='btn-backend-1'>Waiting for Company to bid </a>"; } 
                    					    else{
                    					        echo 'N/A';
                    					    }
                    					    
                    					}
                    					$previousreq_number = $req_number; // Update the previous transaction ID
                    					
                    					?>
                    					</td>
                    					
                    					
                    					
                    					<td>
                    					<?php                     					
                    					$sql2 = "Select * from quotation_content where req_number ='$req_number'";
                    					$res2 = mysqli_query($conn, $sql2);
                    					if($res2==TRUE){
                    					    $previous_req_number = null;
                    					    $count1 =mysqli_num_rows($res2);
                    					    if($count1 >0){
                    					        while($row2=mysqli_fetch_assoc($res2)){
                    					             
                    					            $dataRows[] =[
                    					                'company_id' => $row2['company_id'],
                    					                'company_name' => $row2['company_name']
                    					            ];
                    					            foreach ($dataRows as $data) {
                    					                $company_id= $data['company_id'];
                    					                $company_name = $data['company_name'];
                    					            }
                    					            
                    					            $content_req_number = $row2['req_number'];
                    					            $bp_filename = $row2['bp_filename'];
                    					            if($req_number !== $previous_req_number){
                    					            
                    					            If($content_req_number == ''){
                    					                echo 'N/A';
                    					            }                    					            
                    					            elseif($req_number != $content_req_number ){
                    					                
                    					                echo 'N/A';
                    					                
                    					            }elseif($company_name == $rows['business_name']){
                    					               
                    					                echo "<a href='";
                    					                echo USER_INTERACTION; echo "Adsmart_customers_download_quotation.php?id=";
                    					                echo $quotation_id; echo "' class='btn-backend-1'>See the detail of quotation</a>";
                    					            }else{
                    					                echo 'N/A';
                    					            }
                    					        
                    					            }else{
                    					                
                    					                echo 'N/A';
                    					            }
                    					            $previous_req_number = $req_number;
                    					        }}else{
                    					        
                    					        echo 'N/A';
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
    					<th>Company Name</th>
    					<th>Action</th>
    					
    				</tr>
    				
    				<?php 
    				    //select all admin
    				$session_id =$_SESSION['user1'];
    				    $sql3 ="SELECT 
                                a.*, 
                                c.user_id,
                                CASE a.budget 
                                    WHEN 1 THEN 'Less Than \$HK 5000'
                                    WHEN 2 THEN 'Less Than \$HK 10000'
                                    WHEN 3 THEN 'Greater Than \$HK 10000 and Less Than \$HK 50000'
                                    WHEN 4 THEN 'Greater Than \$HK 50000 and Less Than \$HK 200000'
                                    WHEN 5 THEN 'No Budget Limited'
                                END AS budget_name,  
                                a.company_name AS business_name                              
                            FROM 
                                qoutation a                                
                            INNER JOIN 
                                adsmart_customer c ON a.customer_id = c.id                            
                                Where c.user_id ='$session_id' AND a.deadline_date < CURDATE()
                                order by a.req_number asc";
    				    
    				
    				    //execute the query
    				
    				   
    				//execute the query
    				    $res3 = mysqli_query($conn, $sql3);
    				    
    				    //check wether the query is executed or not
    				    if($res3==TRUE){
    				        
    				        $count =mysqli_num_rows($res3); //function to get all the rows 
    				     
    				        
    				        $sn=1;
    				      
    				        
    				        if($count>0){
    				            
    				            
    				            while($rows1=mysqli_fetch_assoc($res3))
    				            {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				                $quotation_id=$rows1['id']; 
    				                $req_number=$rows1['req_number'];        				                
    				                $subject=$rows1['subject'];
    				                $deadline_date=$rows1['deadline_date'];
    				                $company_name =$rows1['business_name'];
    				                $budget=$rows1['budget_name'];
    				                $customer_action = $rows1['customer_action'];
    				                $company_reject_msg =$rows1['company_reject_msg'];
    				                $company_id =$rows1['company_id'];
    				                $product_name =$rows1['product_name'];  
    				                 				               
    				                $sql4 = "Select * from quotation_content";
    				                $res4 = mysqli_query($conn, $sql4);
    				                
    				                $row4=mysqli_fetch_assoc($res4);
    				                
    				                
    				                $content_req_number = $row4['req_number'];
    				                $bp_filename = $row4['bp_filename'];
    				                
    				               
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
                    					<td><?php if($company_name !=""){echo $company_name;}else{echo "N/A";} ?></td>
                    					<td>
                    					<?php                    					
                    					
                    					    echo "<a href='";
                    					    echo USER_INTERACTION; echo "Adsmart_customers_expired_quotation.php?id=";
                    					    echo $quotation_id; 
                    					echo "' class='btn-backend-3' >See the Detail! </a>";
                    					
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
