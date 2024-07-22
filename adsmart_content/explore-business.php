<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
    <!-- fOOD MEnu Section Starts Here -->

       
              <div class='container-fluid'>
            	   	<div class='reg' style='width: 1000px; margin-top:100px;'>   
            	   	<div class="reg-container">	
					          <form action="<?php echo SITEURL;?>business_search.php" method="POST">
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
						
              <div class="small-container" style="margin-bottom:250px;">     


<!-- single product details -->	
<?php  
		$id = $_GET['id'];
		$id1 = $_GET['id'];
		$sql1 = "SELECT *
                 from adsmart_business_product where company_id = '$id'";
		$res1 = mysqli_query($conn, $sql1);
		$row = mysqli_fetch_array($res1);
		if ($row) {
		    $company_name = $row['company_name'];
		    if(isset($row['print_ads']) AND $row['print_ads'] ='1'){
		        $print_ads ='1';
		    }else{
		        $print_ads ='0';
		    }
		    if($row['display_ads'] ='1'){
		        $display_ads = '1';
		    }else {
		        $display_ads = '0';
		        
		    }// Safely access the 'print_ads' key
		} else {
		    echo "No data found.";
		    $company_name = '';
		  
		}
		?>
		<h1 style ="font-size:45px;"> Shop Name: <?php  echo $company_name;?></h1>
<div class="small-container single-product">
	<div class="row">
	
		<div class="col-2">
		<?php  
		$id = $_GET['id'];
		$sql1 = "SELECT *
                 from adsmart_business_product where company_id = '$id'";
		$res1 = mysqli_query($conn, $sql1);
	
		$count =mysqli_num_rows($res1);
		if($count>0){
		    ?>
		   <img src="<?php  echo IMAGES;?>/images/business_product/<?php  echo $row['image_name']?>"  width='500px' height='350px'  id='ProductImg'>
		    <?php 
		   echo "<div class='small-img-row'>";
		    while($row = mysqli_fetch_array($res1) ){
		        
		      $product_name =$row['product_category_name'];
		        
		 		
				echo "<div class='small-img-col'>";
				?>
					<img src="<?php  echo IMAGES;?>/images/business_product/<?php  echo $row['image_name']?>" width="150px" height="150px" class="small-img">
				
				
			
			   <?php 
			   echo "</div>";
			    
			   
			   ?>
		    <?php    
		    }
		    echo "</div>";
		}
		
		?>
			
			
		</div>
		<div class="col-2">
			  <form action="handle_add_shopping_cart.php" method="post">
			
			<?php 
            				          
            				          
            				          
			$sql2 = "SELECT *
                 from adsmart_business_product where company_id = '$id'";
			$res2 = mysqli_query($conn, $sql2);
			
			echo "<h1 style='font-size:40px;'><B>Product Name: </b>".$product_name."</h1>";
			
			    ?>
			<select id='product' name='product_name' onchange='updatePrice()' style='border: 1px solid black; margin-left:115px;'>
			<option value=''>Select One</option>
			<?php while($row = mysqli_fetch_array($res2)) {
			    $product_name = $row['product_name'];
			    $description = $row['description'];
			    $price = $row['price'];
			    $image_name = $row['image_name'];  // 確保這個變量包含了圖片的路徑
			    $company_name = $row['company_name'];
			    $company_id = $row['company_id'];
			    echo "<option value='".$product_name."' data-price='".$price."' data-desc='".$description."' data-img='../images/business_product/".$image_name."'>".$product_name."</option>";
			} ?>
			</select>
			<?php 
			
            				         echo  "<br>";
            				      
            				        
            				         echo "<p style='color:Green; font-size:20px;margin-left:-180px;'><b>Price:</b></p><br>";
            				         echo "<div style ='width: 150px; height:50px; margin-left:115px; border: 2px solid black; text-align:left; padding:10px 10px;'>";
            				        echo "$<span id='price' name='price' ></span>";
            				       
            				        echo "</div><br>";
            				        echo "<label style='color:Green; font-size:20px;margin-left:-40px;'><b>Quantity:</label>";            				        
            				         echo  "<input type='number' name='quantity' value='1'min='1' style='width:100px; border: 2px solid black;'>";
            				         echo "<br>";
            				         echo "<br>";
            				         echo "<p style='color:Green; font-size:20px;margin-left:-120px;'><b>Description:</b></p><br>";
            				        echo "<div style ='width: 400px; height:200px; margin-left:115px; border: 2px solid black; text-align:left; padding:10px 10px;'>";
            				         echo "<span id='desc' name='desc'>Please select Item</span>";
            				         echo "</div>";
            				         
            				         echo "<input type='hidden' name='company_name' value=".$company_name.">";
            				         echo  "<input type='hidden' name='company_id' value=".$company_id.">";
            				         if(Isset($account_name)){
            				             echo  "<input type='hidden' name='customer_name' value=".$account_name.">";}
            				             else{
            				                 
            				             }
            				         echo "<input type='hidden' id='hiddenPrice' name='price' value=''>";
            				         
            				         ?>
            				         <?php 
            				         If(!isset($_SESSION['user1']) ){
            				         echo "<a href='".SITEURL."customer_login.php' class='btn' style= 'font-size:20px;background: blue;height:80px;width:400px;margin-left:115px;'> Please login AdSmart Customer to add item to shopping cart</a>";
            				         }else{
            				           echo  "<input type='submit' value='Add to Cart'   name='submit' class='btn'  style= 'font-size:20px;background: Red; width:400px;margin-left:115px;'>";
            				           echo  "<a href='".ADSMART_CUSTOMER."Adsmart_customers_send_requirement.php?company_id=".$id."' class='btn' style= 'font-size:20px;background: blue;height:40px;width:400px;margin-left:115px;'> Send A Requiremnt</a>";
            				         }
            				         ?>
			
			</form>
		</div>
	</div>
</div>


<!-- ----- products -->

		
<div class="small-container">		
					<div class="row row-2">
						<h2> Related Supplier</h2>
						<p> View more</p>	
					
					</div>	
				<?php
				$limit = 3; // 每頁顯示的記錄數
				$pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1; // 获取当前页码
				$start = ($pageNum - 1) * $limit;
				$sql2 = "SELECT *
                 from adsmart_business_partner where (print_ads = '$print_ads' or display_ads = '$display_ads') AND shop_code != '$company_id'
                LIMIT $start, $limit
                    ";
				$res2 = mysqli_query($conn, $sql2);
				$sn=1;
				$count =mysqli_num_rows($res2);
				IF($count >0){
				     $sn = 1 + $start; 
				echo "<div class='row'>";	
				while($row2 = mysqli_fetch_array($res2) ){
				    $id = $row2['shop_code'];
				    $image_name = $row2['image_name'];
				echo "<div class='col-4'>";
				echo "<img src='".IMAGES."/images/company/".$image_name."'>";
				echo	"<h4>".$row2['company_name']."</h4>";
			      echo "<br>";
					echo "<b>Description:	</b> <p style='color:blue;'>".$row2['description']."<p>";				
						echo "<a href='".SITEURL."explore-business.php?id=".$id."'   > <button type='button' class='btn' style='background:#9198e5'>Detail</button> </a>";
						echo "</div>";
				}
				}
				$countQuery = "SELECT COUNT(*) AS cnt  from adsmart_business_partner where (print_ads = '$print_ads' or display_ads = '$display_ads') AND shop_code != '$company_id' "; // 替換 your_table 為您的數據表名
				$countResult = $conn->query($countQuery);
				$countRow = $countResult->fetch_assoc();
				$totalRecords = $countRow['cnt'];
				$totalPages = ceil($totalRecords / $limit)
					?>
						
						</div>	
							<div class="row">
				<div class="ads-btn">
				
    <?php if ($pageNum > 1): ?>
        <SPAN style= 'width:65px;'><a href="?id=<?php echo $id1;?>&pageNum=<?php echo $pageNum - 1; ?>">Previous</a></SPAN>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
       <SPAN> <a href="?id=<?php echo $id1;?>&pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></SPAN>
    <?php endfor; ?>

    <?php if ($pageNum < $totalPages): ?>
       <SPAN> <a href="?id=<?php echo $id1;?>&pageNum=<?php echo $pageNum + 1; ?>">Next</a></SPAN>
    <?php endif; ?>
</div>
				</div>	
				
</div>
</div>

</div>
</div>


<!--  JS for product gallery-->	
	<script>
		var ProductImg = document.getElementById("ProductImg");
		var SmallImg = document.getElementsByClassName("small-img");
		SmallImg[0].onclick = function(){
			ProductImg.src = SmallImg[0].src;
			
		}
		SmallImg[1].onclick = function(){
			ProductImg.src = SmallImg[1].src;
		
	}
		SmallImg[2].onclick = function(){
			ProductImg.src = SmallImg[2].src;
		
	}
		SmallImg[3].onclick = function(){
			ProductImg.src = SmallImg[3].src;
		
	}

		function updatePrice() {
		    var selectElement = document.getElementById("product");
		    var selectedOption = selectElement.options[selectElement.selectedIndex];
		    var price = selectedOption.getAttribute("data-price");
		    var desc = selectedOption.getAttribute("data-desc");
		    var imgSrc = selectedOption.getAttribute("data-img");  // 獲取圖片URL

		    if (selectElement.value === "") {  // 檢查是否選擇了 "Select One"
		        // 使用默認圖片
		        document.getElementById("ProductImg").src = '../images/images/business_product/".$image_name."'; // 設置您的默認圖片路徑
		        document.getElementById("price").textContent = "N/A";
		        document.getElementById("hiddenPrice").value = "";
		        document.getElementById("desc").textContent = "Please select a product to see details.";
		    } else {
		        // 更新價格和描述
		        document.getElementById("price").textContent = price;
		        document.getElementById("hiddenPrice").value = price;
		        document.getElementById("desc").textContent = desc;

		        // 更新產品圖片
		        document.getElementById("ProductImg").src = imgSrc;
		    }
		}
	</script>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>