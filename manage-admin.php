<?php  include('partials/menu.php')?>
	
	   <!-- Main content Section Starts -->
	   <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>AdSmart Adminstartion Account Management </h1>
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
    					<th>Full Name</th>
    					<th>Username</th>
    					<th>Actions</th>
    				</tr>
    				
    				<?php 
    				    //select all admin
    				    $sql ="SELECT * FROM adsmart_admin";
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
    				                $id=$rows['id'];
    				                $full_name=$rows['full_name'];
    				                $username=$rows['display_name'];
    				                
    				                ?>
    				                <tr>
                    					<td><?php echo $sn++; ?></td>
                    					<td><?php echo $full_name; ?></td>
                    					<td><?php echo $username; ?></td>
                    					<td>
                    					
                    					<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-backend-1">change password</a>
                    					<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-backend-2">update Admin</a>
                    						<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-backend-3">delete Admin</a>
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
    			<a href="add-admin.php" class="btn" style="background:#9198e5; width:80%; height:50px;font-size:25px;">Add Admin</a>
			</div>
		</div>
		
		
	    <!-- Main content Section Ends -->
	    
	    
	    
	   <?php include('partials/footer.php')?>