<?php  include('partials/menu.php')?>
	
	   <!-- Main content Section Starts -->
	   <div class='main-content'>
	   	<div class='wrapper'>
			<h1>Manage Food </h1>
    			<br>
    			<br>
    			<a href="<?php echo SITEURL;?>/admin/add-food.php" class="btn-primary">Add Food</a>
    			
    			<br>
    			<br>
    			<br>
    			<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['delete']))
    			{
    			    
    			    echo $_SESSION['delete'];
    			    unset($_SESSION['delete']); //removing seesion
    			}
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			if(isset($_SESSION['update']))
    			{
    			    
    			    echo $_SESSION['update'];
    			    unset($_SESSION['update']); //removing seesion
    			}
    			if(isset($_SESSION['unauthorize']))
    			{
    			    
    			    echo $_SESSION['unauthorize'];
    			    unset($_SESSION['unauthorize']); //removing seesion
    			}
    			?>
    			
    			<table class="tbl-full">
    				<tr>
    					<th>S.N.</th>
    					<th>Title</th>
    					<th>Price</th>
    					<th>Image</th>
    					<th>Featured</th>
    					<th>Active</th>
    					<th>Actions</th>
    				</tr>
    				<?php 
    				    //create a sql query to get all the food
    				    $sql ="SELECT * FROM tbl_food";
    				    
    				    //execute the query
    				    $res = mysqli_query($conn, $sql);
    				    
    				    //count rows to check whether we have foods or not
    				    $count =mysqli_num_rows($res);
            			
    				    //create sn
    				    $sn=1;
    				    
    				    
    				    if($count>0){
    				        
    				        //we have food in db
    				        while($rows=mysqli_fetch_assoc($res))
    				        {
    				            
    				            //using while loop to get all the data from db
    				            // and while loop will run as long as we have data in db
    				            // get individual data
    				            $id=$rows['id'];
    				            $title=$rows['title'];
    				            $price=$rows['price'];
    				            $image_name=$rows['image_name'];
    				            $featured=$rows['featured'];
    				            $active = $rows['active'];
    				            ?>
    				            <tr>
    						<td><?php echo $sn++; ?> </td>
    						<td><?php echo $title; ?></td>
    						<td><?php echo $price; ?></td>
    						<td><?php //check image is existed or not
    				            if($image_name!=""){
    				             
    				                    //display image
    				                ?>
    				                <img src="<?php  echo SITEURL;?>/admin/images/food/<?php echo $image_name;?>" width="100px">
    				                <?php 
    				                
    				                
    				                
    				            }else {
    				             
    				                echo "<div class='error'>food image not added. </div>";
    				            }
    				            
    				            ?></td>
    						<td><?php echo $featured; ?></td>
    						<td><?php echo $active; ?></td>
    						<td>
    							<a href="<?php echo SITEURL; ?>/admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary"> Update food</a>
    							<a href="<?php echo SITEURL; ?>/admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete food</a>
    						</td>
    						</tr>
    						<?php 
    				            }
    				            }else {
    				             
    				                echo "<tr><td clospan='7' class='error'> Food not added </td></tr>";
    				            }
    				   
    				
    				
    				?>
    				
    				
    			</table>
			</div>
		</div>
		
		
	    <!-- Main content Section Ends -->
	    
	    
	    
	   <?php include('partials/footer.php')?>