<?php  include('../partials-front/after_customer_login_menu.php');?>

<!-- -Cart Items Details -->
<?php 

if(isset($_SESSION['user1']))
{
    
    echo 
    

   
        "<div class='small-container cart-page'>
		<div class='reg' >
				<h2>AdSmart Customer Login</h2>
						<br>		
						<br>
						
                        
                        <h3 style='color:black; font-size:30px;'> Welcome!! &nbsp;&nbsp; <b style='color:blue; text-transform:uppercase;'>" .$_SESSION['user1']. "</b></h3>
						<br>
						<br>
						<p style='color:black; font-size:24px;'> Login Successfully!!!!<p>
						<br>
						<br>
						<p style='color:black; font-size:24px;'> Click this Here to <a style='color:blue;' href='";
                        echo USER_MANAGEMENT;
						echo "Adsmart_customers_personal_space.php' >Customer Personal Space page!</a></p>.
		</div>
</div>";
       }
?>


	


<!--------------------- footer -------------->
	<?php  include('../partials-front/footer.php');?>