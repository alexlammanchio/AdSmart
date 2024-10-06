<?php  include('partials/menu.php')?>
	
	   <!-- Main content Section Starts -->
	   <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>AdSmart Business Partner Account Management </h1>
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
    					<th>User Id</th>
    					<th>Company Name</th>
    					<th>Actions</th>
    				</tr>
    				
    				<?php 
    				    //select all admin
    				    $sql ="SELECT * FROM adsmart_business_partner where apply_status != 'approve'  And apply_status !='reject'";
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
    				                $id=$rows['shop_code'];
    				                $full_name=$rows['user_id'];
    				                $username=$rows['company_name'];
    				                $email=$rows['email'];
    				                ?>
    				                <tr>
                    					<td><?php echo $sn++; ?></td>
                    					<td><?php echo $full_name; ?></td>
                    					<td><?php echo $username; ?></td>
                    					<td>
                    					<form action="handle_approve_bp.php" method="POST">
                    					<?php
                    					echo  "<input type='hidden' value=".$full_name." name='user_id' >";
                    					echo  "<input type='hidden' value=".$email." name='email' >";
       										echo  "<input type='hidden' value=".$id." name='shop_code' >";
       										?>
                    					<button type="submit" name="reset-request-submit"  class="btn" style="height:50px;width:150px;font-size:25px; background:#9198e5;">Approve</button>
                    					</form>
                    					<form action="handle_reject_bp.php" method="POST">
                    					<?php
                    					echo  "<input type='hidden' value=".$full_name." name='user_id' >";
                    					echo  "<input type='hidden' value=".$email." name='email' >";
       										echo  "<input type='hidden' value=".$id." name='shop_code' >";
       										?>
                    					<button type="submit" name="reset-request-submit"   class="btn" style="height:50px;width:150px;font-size:25px; background:red;">Reject</button>
                    					</form>                    						<a href="<?php echo ADMIN; ?>admin/view-bp-detail.php?id=<?php echo $id; ?>" class="btn-backend-3" style='width:200px;'>View the Content</a>
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
		
		
	    <!-- Main content Section Ends -->
	    
	    
	    
	   <?php include('partials/footer.php')?>