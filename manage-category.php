<?php  include('partials/menu.php')?>
	
	   <!-- Main content Section Starts -->
	   <div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>AdSmart Category Management </h1>
    			<br>
    			<br>
    			<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			
    			if(isset($_SESSION['remove']))
    			{
    			    
    			    echo $_SESSION['remove'];
    			    unset($_SESSION['remove']); //removing seesion
    			}
    			if(isset($_SESSION['delete']))
    			{
    			    
    			    echo $_SESSION['delete'];
    			    unset($_SESSION['delete']); //removing seesion
    			}
    			if(isset($_SESSION['no-category-found']))
    			{
    			    
    			    echo $_SESSION['no-category-found'];
    			    unset($_SESSION['no-category-found']); //removing seesion
    			}
    			if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			if(isset($_SESSION['failed-remove']))
    			{
    			    
    			    echo $_SESSION['failed-remove'];
    			    unset($_SESSION['failed-remove']); //removing seesion
    			}
    			?>
    			   		
    			
    			<table class="tbl-full">
    				<tr>
    					<th>S.N.</th>
    					<th>Category Name</th>
    					<th>Category Display Name</th>
    					<th>Image</th> 
    					<th>Advertisement Type</th>     					
    					<th>Active</th>
    					<th>Action</th>
    				</tr>
    				
    				<?php 
    				
    				    //query to get all category from db
    				    $sql ="SELECT * from adsmart_category where active ='Yes' order by advertisement_type";
    				    
    				    //Execute query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    //count rows
    				    $count =mysqli_num_rows($res);
    				
    				    
    				        $sn=1;
    				    //check whether we have data in db or not
    				    if($count>0){
    				        
    				        //we have
    				        while($rows=mysqli_fetch_assoc($res))
    				        {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				            $id=$rows['id'];
    				            $title=$rows['category_name'];  
    				            $display_name =$rows['display_name'];
    				            $image_name=$rows['image_name'];
    				            $type=$rows['advertisement_type'];
    				            $active = $rows['active'];
    				            ?>
    				            <tr>
    					<td><?php echo $sn++; ?> </td>
    					<td><?php echo $title; ?></td>
    					<td><?php echo $display_name; ?></td>
    					<td><?php //check image is existed or not
    				            if($image_name!=""){
    				             
    				                    //display image
    				                ?>
    				                <img src="<?php  echo SITEURL;?>admin/images/category/<?php echo $image_name;?>" width="150px">
    				                <?php 
    				                
    				                
    				                
    				            }else {
    				             
    				                echo "<div class='error'> image not added </div>";
    				            }
    				            
    				            ?></td>
    					<td><?php echo $type;?></td>
    					<td><?php echo $active;?></td>
    					
    					<td><a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-backend-2">update Category</a>
    						<a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-backend-3">delete Category</a>
    					</td>
    				</tr>    				
    				            
    				            <?php 
    				        }
    				    }else{
    				        
    				        //we do not have
    				        ?>
    				        <tr>
    				         <td colspan="6"><div class ="error"> No category Added.</div>
    				         
    				         
    				         </td>
    				        </tr>
    				        <?php 
    				    }
    				
    				?>
    				
    				
    				
    			</table>
    			
    			<a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn" style="background:#9198e5; width:80%; height:50px;font-size:25px;">Add Category</a>
			</div>
		</div>
		
		
	    <!-- Main content Section Ends -->
	    
	    
	    
	   <?php include('partials/footer.php')?>