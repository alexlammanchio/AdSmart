
<!-- -Cart Items Details -->
<div class="small-container cart-page" style ='padding-bottom:700px;'>
		<div class="reg">
		<h1>Product Management</h1>        
		<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['change-pwd'])){
    			    
    			    echo $_SESSION['change-pwd'];
    			    unset($_SESSION['change-pwd']);
    			    
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
           <table style="width:100%">
				 <tr>
				  <th>Number</th>
				    <th>Product Name</th>
				    <th>Product Image</th>
				    <th>Advertisement Type</th>
				    <th>Description </th>
				    <th>Price</th>
				    
				    <th>Active</th>
				   <th>Action</th>
				  
				  </tr>
				
				 <tr>
				 <?php 
				 $sql2 = "SELECT *  from adsmart_business_product where company_name = '$account_name' ";
				 $res2 = mysqli_query($conn, $sql2);
				 
				 if($res2==TRUE){
				     
				     $count =mysqli_num_rows($res2); //function to get all the rows
				     
				     $sn=1;
				     
				     
				     if($count>0){
				         
				         
				         while($rows=mysqli_fetch_assoc($res2))
				         {
				             
				             $company_name = $rows['company_name'];
				             $product_name =$rows['product_name'];
				             $image_name =$rows['image_name'];
				             $product_category_name = $rows['product_category_name'];
				             $price =$rows['price'];
				             $description = $rows['description'];
				             $product_id  =$rows['id'];
				             $active = $rows['active'];
				            
				             ?>
			            <tr>
			            <td><?php echo $sn++; ?></td>
                    					
                    					<td><?php echo $product_name; ?></td>
                    					<td><?php 
                    					echo "<div class='cart-info'>";
                    					echo "<img src='../images/business_product/".$image_name."'>"; 
                    					echo "</div>";
                    					?>
                    					
                    					
                    					</td>
                    					<td><?php echo $product_category_name; ?></td>
                    					<td><?php echo $description; ?></td>
                    					<td><?php 
                    					echo $price;
                    					?>
                               			 </td>
                               			 <td>
                    					 <?php echo $active; ?>
                    					<br>
                    					<td> <?php echo "<a href='".PRODUCT_MANAGEMENT."update_partners_products.php?product_id=" . $rows['id'] . "' class='btn' style='background:#9198e5;'>Update</a>"; ?>
				     <a href="<?php echo PRODUCT_MANAGEMENT; ?>handle_business_delete_product.php?id=<?php echo $rows['id']; ?>&image_name=<?php echo $image_name; ?>"   class="btn" style="background:red;"> Delete </a></td>
                    					</td>
                    	</tr>
                    	<?php 
			        }
			       
			       
			    }else
			    {
			        // we do not have data indb
			    }
			}
			
				 
				 ?>
				
			</table>
			<a href="<?php echo PRODUCT_MANAGEMENT; ?>add_partners_products.php" class="btn" style="background:#9198e5; width:80%; height:50px;font-size:25px;">Create New Products</a>
		</div>
		
</div>


	


<!--------------------- footer -------------->
	