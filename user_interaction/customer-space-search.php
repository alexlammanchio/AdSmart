<?php  include('../partials-front/after_customer_login_menu.php');?>  
    <!-- fOOD MEnu Section Starts Here -->
 
 <?php 
            
                //get the serach keyword
                $search =$_POST['search'];
              
            ?>
         <div style="background:#1b0075">
                <?php  include('../partials-front/customer_left_bar.php');?>


              <div class='container-fluid'>
            	   	<div class='reg' style='width: auto; margin-top:100px;padding-bottom: 500px'>   
            	   	<div class="reg-container">	
					          <form action="<?php echo USER_INTERACTION;?>customer-space-search.php" method="POST">
					            <table id="customer_reg">
											<tbody>
												
												<tr>
												    <td colspan="2" >												    														
												    	<div id="name">
													    	<label style="padding-left:250px; font-size:28px;">What Can I do for you?</label><br><br>
													    	<input id="input_0" type="search" name="search" placeholder="Input your Idea" style="width:850px; border: 1px solid black;height:50px; margin-left:60px;"><br>
													    </div>
													  
												    	
												    	
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<input type="submit" value="Search" name="submit"   class="sub"  style="margin-left:350px;" > 
												    	</div>
												    </td>
												</tr>
											</tbody>
									</table>
					              
					           </form> 
						</div>
						<br>
						<h2>AdSmart Service Item on Your Search:  <a href="#" class="text-white"><?php echo "<b style='color:green;'>".$search."</b>"; ?></a></h2>
              <div class="small-container" style="margin-bottom:250px;">            
		
		  <div class="row">
			<?php 
			
			 //Get the Search keyword
			// to avoid input '%burger'%'
			$search = mysqli_real_escape_string($conn,$_POST['search']);
			
			//SQL query to get foods based on search keyword
			//$search = burger'
			//"select * From tbl_food where title like '%burger'%' or description like '%burger'%'";
			$sql ="Select * from product_category WHERE MATCH (category_name) AGAINST ('$search' IN NATURAL LANGUAGE MODE);";
			
			//Execute the query
			$res = mysqli_query($conn, $sql);
			
			//count rows
			$count =mysqli_num_rows($res);
			
			//check whether food available or not
			if($count >0){
			    
			    //categories available
			    while($row =mysqli_Fetch_assoc($res)){
			     $product_id =$row['product_id'];
			  
			     $image_name=$row['image_name'];
			     $category_name = $row['category_name'];
			    
			        $sql1 ="Select * from product_type where id ='$product_id'";
			        //Get the values like id
			        $res1 = mysqli_query($conn, $sql1);
			        $count = mysqli_num_rows($res1);
			        //count rows
			        if($count > 0){
			            // It's safe to fetch data
			            while($row1 = mysqli_fetch_assoc($res1)){
			                // Your code to handle each row
			                $title =$row1['display_name'];
			            }
			        } else {
			            // Handle the case where no data is returned
			            echo "No records found.";
			        }
			
			        
			       
			        ?>
			      
			           <div class="col-3" style="background:#FFFFFF; height:400px;">   
			           <br>
                          <h3><b style="color:Green;">Product Type:</b> <?php echo $category_name;?></h3>
                            <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/images/product_category/<?php  echo $image_name;?>" alt="AdSmart Business Partner Product" style="height:250px;">
                                <?php
                                }
                            ?>
                            </a>
                            
                            <br>
                            <br>
                            <hr>
                            <br>
                            
                                <h3><b style="color:Green;">Product Category:</b><?php  echo $title; ?></h3>
                                <br>
                               
                                
                        
                            </div>
                           
                			             
			             
			         
			             <?php 
			         }
			         
			         
			         
			         
			     }
			
			?>           
			
          

          
 </div>
        </div>

		 <h2>Related Companies Can Provide The Service Or Product</h2>
		  
		 <div class="row">
			<?php 
			
			 //Get the Search keyword
			// to avoid input '%burger'%'
			$search = mysqli_real_escape_string($conn,$_POST['search']);
			
			//SQL query to get foods based on search keyword
			//$search = burger'
			//"select * From tbl_food where title like '%burger'%' or description like '%burger'%'";
			$sql ="Select distinct product_category_name, company_id  from adsmart_business_product WHERE MATCH (description) AGAINST ('$search' IN NATURAL LANGUAGE MODE);";
			
			//Execute the query
			$res = mysqli_query($conn, $sql);
			
			//count rows
			$count =mysqli_num_rows($res);
			
			//check whether food available or not
			if($count >0){
			    
			    //categories available
			    while($row =mysqli_Fetch_assoc($res)){
			        $product_name = $row['product_category_name'];
			        //Get the values like id
			        $id=$row['company_id'];			
			        $sql2 ="Select * from adsmart_business_partner WHERE shop_code ='$id';";
			        $res2 = mysqli_query($conn, $sql2);
			        $row2 =mysqli_Fetch_assoc($res2);
			        
			        $image_name=$row2['image_name'];
			        
			        $title =$row2['company_name'];
			        $country =$row2['country'];
			        ?>
			      
			           <div class="col-3" style="background:#FFFFFF; height:400px;">   
			           <br>
                        
                            <?php 
                                if($image_name =="")
                                {
                                    //display message 
                                    echo "<div class='error'>image not available</div>";
                                }else{
                            
                            		//image available
                                    ?>
                                    
                                <img src="<?php echo IMAGES;?>/images/company/<?php  echo $image_name;?>" alt="AdSmart Business Partner" style="height:120px;">
                                <?php
                                }
                            ?>
                            </a>
                            
                            <br>
                            <br>
                            <hr>
                            <br>
                            
                                <h3><b style="color:Green;">Company Name:</b><?php  echo $title; ?></h3>
                                <br>
                                
                               <h3><b style="color:Green;">Product Type:</b><?php  echo $product_name; ?></h3>
                               <br>
                               <h3><b style="color:Green;">Country:</b><?php  echo $country; ?></h3>
                                 <a href="<?php echo USER_INTERACTION; ?>customer-explore-business.php?id=<?php echo $id; ?>" class="btn" style="background:#9198e5; width:120px; height:40px;font-size:16px;">Explore</a>
                        
                            </div>
                           
                			             
			             
			         
			             <?php 
			         }
			         
			         
			         
			         
			     }
			
			?>           
			
          

          

         			 </div>
            	</div>
			</div>
        </div>

 
    <!-- fOOD Menu Section Ends Here -->

	<?php  include('../partials-front/footer.php');?>
</html>