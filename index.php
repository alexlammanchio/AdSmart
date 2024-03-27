
	<?php  include('partials/menu.php')?>
	   <!-- Main content Section Starts -->
	   
			<h1>DASHBARD</h1>
			
			<br>
			<br>
			<?php 
    			if(isset($_SESSION['login']))
    			{
    			    
    			    echo $_SESSION['login'];
    			    unset($_SESSION['login']); //removing seesion
    			}
    			?>
    			<br>
    			
    			<div class="small-container">
				<div class="row">
				
    			<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Transaction (Completed)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				/*
    				
    				//sql query
    				$sql = "SELECT * FROM adsmart_catagory";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; */?></h1>
    				
    				
    			</div>
    		<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Commission (Received)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				/*
    				
    				//sql query
    				$sql = "SELECT * FROM adsmart_catagory";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; */?></h1>
    				
    				
    			</div>
    							
			<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">AdSmart Business Partner(Registed)</p>
				<br>
				<br>
			<hr>
					<?php 
    				
    				//sql query
    				$sql2 = "SELECT * FROM adsmart_business_partner";
    				
    				//exe query
    				$res2 =mysqli_query($conn, $sql2);
    				
    				//count rows
    				$count2 = mysqli_num_rows($res2);
    				
    				?>
    				
    				<h1><?php echo $count2; ?></h1>
				
				</div>
				
				
								
		<div class="col-3" style="background:#FFFFFF;">	
    		<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">AdSmart Customer(Registed)</p>
				<br>
				<br>		
				<hr>
    				<?php 
    				
    				//sql query
    				$sql3 = "SELECT * FROM adsmart_customer";
    				
    				//exe query
    				$res3 =mysqli_query($conn, $sql3);
    				
    				//count rows
    				$count3 = mysqli_num_rows($res3);
    				
    				?>
    				
    				<h1><?php echo $count3; ?></h1>
    			
    		</div>
    			
    		<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Category</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT * FROM adsmart_category";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    			</div>
    		
	<div class="col-3" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Admin Account</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT * FROM adsmart_admin";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    			</div>
    			</div>
			</div>
		
	    <!-- Main content Section Ends -->
	    
	    
	   <?php include('partials/footer.php')?>