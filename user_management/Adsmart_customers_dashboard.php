<div class="small-container cart-page"  style ="margin-bottom:250px;">

		
	
		<div class="reg">
		<h1>AdSmart Assistant</h1>     
		<div class="reg-container">	
					          <form action="<?php echo USER_INTERACTION;?>customer-space-search.php" method="POST">
					            <table id="customer_reg">
											<tbody>
												
												<tr>
												    <td colspan="2" >												    														
												    	<div id="name">
													    	<label style="padding-left:250px; font-size:28px;">What Can I do for you?</label><br><br>
													    	<input id="input_0" type="search" name="search" placeholder="Input your Idea" style="width:850px; border: 1px solid black;height:50px;"><br>
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
		</div>
			<div class="reg" >	
<h1 style="color:#333; text-align:center;">AdSmart Customer Dashboard </h1>
		<br>
		<div class="row">
		<div class="col-9" style="background:#FFFFFF;">	
				
				<br>
				<br>
				<p style="font-size:20px; font-weight:bold; ">Quotation (Created)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				$dt = date('Y-m-d');
    				
    				//sql query
    				$sql = "SELECT * FROM qoutation where customer_name = '$account_name' AND company_id ='0' AND deadline_date > '$dt'";
    				
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
				<p style="font-size:20px; font-weight:bold; ">Company Reply</p>
				<br>
				<br>
			<hr>
    				<?php 
    				$dt = date('Y-m-d');
    				
    				//sql query
    				$sql = "SELECT * FROM qoutation where customer_name = '$account_name' AND company_id !='0' AND company_reject_msg = ''  AND deadline_date > '$dt'";
    				
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
				<p style="font-size:20px; font-weight:bold; ">Spend Money (Total)</p>
				<br>
				<br>
			<hr>
    				<?php 
    				
    				
    				//sql query
    				$sql = "SELECT sum(total) as spend FROM payment where cus_user_id ='$account_name'";
    				
    				//exe query
    				$res =mysqli_query($conn, $sql);
    				
    				//count rows
    				$rows = mysqli_fetch_assoc($res);
    				
    				?>
    				
    				<h1><?php echo '$'.$rows['spend']; ?></h1>
    				
 				
    	</div>
    </div>
</div>
</div>