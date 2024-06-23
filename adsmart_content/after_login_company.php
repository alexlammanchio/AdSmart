<?php  include('../partials-front/after_company_login_menu.php');?>

<!-- -Cart Items Details -->
<?php 

if(isset($_SESSION['user2']))
{
    
    echo 
    

   
        "<div class='small-container cart-page'>
		<div class='reg' >
				<h2>AdSmart Business Partner Login</h2>
						<br>		
						<br>
						
                        
                        <h3 style='color:black; font-size:30px;'> Welcome!! &nbsp;&nbsp; <b style='color:blue; text-transform:uppercase;'>".$_SESSION['user2']."</b></h3>
						<br>
						<br>
						<p style='color:black; font-size:24px;'> Login Successfully!!!!<p>
						<br>
						<br>
						<p style='color:black; font-size:24px;'> Click this Here to <a style='color:blue;' href='customer_personal_space.php' >AdSmart Business Parnter Personal Space page!</a></p>.
		</div>
</div>";
       }
?>


	


<!--------------------- footer -------------->
	<?php  include('../partials-front/footer.php');?>