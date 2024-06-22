<?php

session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}


?>
 
 <!-- AdSmart  header  --> 


<!-- single product details -->	
<div class="small-container single-product">
	<div class="row">
		<div class="col-2">
			<img src="../images/bus-1.png" width="500px" height="350px"  id="ProductImg">
			<div class="small-img-row">
				<div class="small-img-col">
					<img src="../images/bus-1.png" width="150px" height="150px" class="small-img">
				</div>
				<div class="small-img-col">
					<img src="../images/bus-2.png" width="150px" height="150px"  class="small-img" >
				</div>
				<div class="small-img-col">
					<img src="../images/bus-3.png" width="150px" height="150px"  class="small-img">
				</div>
				<div class="small-img-col">
					<img src="../images/bus-4.png"width="150px" height="150px"  class="small-img">
				</div>
			
			</div>	
			
		</div>
		<div class="col-2">
			<p> Macao Advertisement Company - W Company <i class="fa fa-indent"></i></p>
			<h1> Bus Stop Advertisement Panel Service (Macao)</h1>
			<h4>$500.00</h4>
			<select>
				<option>Select Advertisement Location</option>
				<option> south area</option>
				<option>center area</option>
				<option>north area</option>
				<option>west area</option>
			</select>
			<input type="number" value="1">
			<a href="" class="btn"> Add To Cart</a>
			<h3> Product Details</h3>
			<br>
			<p>
				Picture 1 is South Area Bus ads.
				<br>
				Picture 2 is Center Area Bus ads.
				<br>
				Picture 3 is North Area Bus ads.
				<br>
				Picture 4 is West Area Bus ads.
				<br>
			</p>
		</div>
	</div>
</div>


<!-- ----- products -->

		
<div class="small-container">		
					<div class="row row-2">
						<h2> Related Products</h2>
						<p> View more</p>	
					
					</div>	
				
				<div class="row">	
							
						<div class="col-4">
							<img src="../images/product-w.png">
							<h4>Macao Advertisement Company - W Company</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  Macau Advertisement company. We can Provide Bus Stop Advertisement Panel Service.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						</div>
						<div class="col-4">
							<img src="../images/product-b.jpg">
							<h4>Macao Advertisement Company - B Company</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  Macau Advertisement company. We can provide full-advertisement services to our customers that it includes digital advertisement.	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						</div>						
						<div class="col-4">
							<img src="../images/mango.jpg">
							<h4>China Advertisement Company - TV Company</h4>
							<br>
							 <b>Description:	</b> <p style="color:blue;">  Chinese Advertisement Company. We can provide TV Adverisement Service in China. 	<p>				
							 <a href="product-detail.php"   target="blank"> <button type="button"class="btn" style="background:#9198e5">Detail</button> </a>
						
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
	</script>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>