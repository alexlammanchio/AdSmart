<?php  include('../partials-front/after_company_login_menu.php');?>
 <div style="background:#1b0075">
<?php  include('../partials-front/company_left_bar.php');?>
<div class='container-fluid' style ='padding-bottom: 200px;'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>

   <div class='small-container cart-page'>
   
	   	<div class='reg'>
			<h1>Create New Products </h1>
    			<br>
    			<br>
    			<?php 
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			if(isset($_SESSION['error']))
    			{
    			    
    			    echo $_SESSION['error'];
    			    unset($_SESSION['error']); //removing seesion
    			}
    			?>
    			
    			
    			<form action="handle_business_create_product.php" method="POST" enctype="multipart/form-data">
    			
    			<table class="tbl-30">    				
    				<tr>
    					<td>Product Name: </td>
    					<td>
    						<input type="text" name="product_name" placeholder="Product name">
    					</td>
    				</tr>
    				<tr>
					<td>Select Product Image: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
    					
    					<?php 
    					//"select * From tbl_food where title like '%burger'%' or description like '%burger'%'";
    					$sql ="Select * from product_type";
    					
    					//Execute the query
    					$res = mysqli_query($conn, $sql);
    					
    					echo "<td><label>Product Category:</label><td>";
    				
    					echo "<select required name='product_display_name'  >";
    					
    					echo "<option value=''>Select One</option>";
    					while($row5 = mysqli_fetch_array($res) ) {
    					    $row5['display_name'];
    					    $category_id = $row5['id'];
    					    $product_category = $row5['product_name'];
    					    
    					    echo  "<option value='".$row5['id']."' name='product_display_name'>";
    					    echo   $row5['display_name'];
    					    echo   "</option>";
    					    
    					    
    					    
    					}
    					
    					echo "</select>";
    					
    					
    					
    					?>
    					
    				</tr>
    				<tr>
    					
    					<?php 
    					//"select * From tbl_food where title like '%burger'%' or description like '%burger'%'";
    					$sql1 ="Select * from product_category ";
    					
    					//Execute the query
    					$res1 = mysqli_query($conn, $sql1);
    					
    					echo "<td><label>Item Category:</label><td>";
    				
    					echo "<select required name='product_category_name'  >";
    					
    					echo "<option value=''>Select One</option>";
    					while($row = mysqli_fetch_array($res1) ) {
    					    $row['category_name'];
    					    echo  "<option value='". $row['category_name']."' name='product_category_name'>";
    					    echo   $row['category_name'];
    					    echo   "</option>";
    					    
    					    
    					    
    					    
    					}
    					
    					echo "</select>";
    					
    					
    					
    					?>
    					
    				</tr>
    				<tr>
    					<td>Description: </td>
    					<td>
    						<textarea  name="description" cols="30" rows="10" placeholder="input description"></textarea>
    					</td>
    				</tr>
    				<tr>
    					<td>Price:</td>
    					<td>
    						<input type="number" name="price" >
    					</td>
    				</tr>
    					<tr>
    					<td>quantity:</td>
    					<td>
    						<input type="number" name="quantity" >
    					</td>
    				</tr>
    				
    				<tr>
					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="Yes"> Yes
						<input type="radio" name="active" value="No"> No
					</td>
				</tr>
    				
    				
    				
    				
    					<tr>    					
    					<td colspan="2">
    						<input type="submit" name="submit"  value="Add Products" class="btn" style="height:50px;font-size:25px; background:#9198e5;"></td>
    					</td>
    				</tr>
    				<?php 
    				$shop_code =$_SESSION['shopcode'];
    				$sql ="Select * from adsmart_business_partner where shop_code ='$shop_code' ";
    				
    				//Execute the query
    				$res = mysqli_query($conn, $sql);
    				
    				$row = mysqli_fetch_array($res);
    				$company_name = $row['user_id'];
    				$company_id =$row['shop_code'];
    				
    				
    				echo "<input type='hidden' name='company_name' value='$company_name' >";
    				echo "<input type='hidden' name='company_id' value='$company_id' >";
    				
    				?>
    				
    				
    			</table>
    			
    		</form>		
    		
    		
    		
    		
			</div>
		</div>

</div>
</div>


<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>
