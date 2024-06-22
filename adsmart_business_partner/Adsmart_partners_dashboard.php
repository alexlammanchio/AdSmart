
<!-- -Cart Items Details -->
<div class="small-container cart-page">
		
		<h1 style="color:#333; text-align:center;">AdSmart Business Partner Dashboard </h1>
		<br>
	<div class="row">
		<div class="col-9" style="background:#FFFFFF;">	
				
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Waiting for customer's reply</p>
				<br>
				<br>
			<hr>
    				<?php 
    				$shop_code =$_SESSION['shopcode'];
    				$company_name =$_SESSION['user2'];
    				
    				//sql query
    				$sql = "SELECT * FROM qoutation where company_id = '$shop_code' AND company_reject_msg = '' And  deadline_date >=CURDATE()";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    	</div>
		<div class="col-9" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Customer Accepted </p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT * FROM qoutation where company_id = '$shop_code' AND customer_action = 'accept'";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$count = mysqli_num_rows($res);
    				
    				?>
    				
    				<h1><?php echo $count; ?></h1>
    				
    				
    	</div>
    	<div class="col-9" style="background:#FFFFFF;">	
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Revenue (Total)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT Format(sum(total), 2) as revenus FROM payment where company_user_id = '$company_name'";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$rows = mysqli_fetch_assoc($res);
    				
    				?>
    				
    				<h1><?php echo '$ '.$rows['revenus']; ?></h1>
    				
    	</div>
    </div>
    	
	
		
		
		<div class="reg">
		<h1>AdSmart Business Partner Feedback</h1>     
		<div class="reg-container">	
					          <form>
					            <table id="customer_reg">
											<tbody>
												
												<tr>
												    <td colspan="2" >
												    	
												    	<div id="name">
													    	<label>Subject</label><br>
													    	<input id="input_0" type="text" name="name" placeholder="" style="width:250px"><br>
													    </div>
													    <br>
												    	<div id="email">
													    	<label>Comment:</label><br>
													    	<input id="input_1" type="email" name="email" placeholder="" style="width:500px;height:250px;"><br>
												    	</div>		
												    	
												<tr>
												    <td colspan="2">
												    	<div id="button">
												    		<input type="submit" value="Submit"   class="sub"  >  <input type="reset" value="Clear Form"   class="clear" >
												    	</div>
												    </td>
												</tr>
											</tbody>
									</table>
					              
					           </form> 
						</div>
		</div>
</div>

	


<!--------------------- footer -------------->
