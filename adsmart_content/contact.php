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
<div class="small-container">
	 <div class="row">
		        <div class="col-6">
		          <img src="../images/contact_us.jpg" alt="contact_us" />
		        </div>
		
		        <div class="col-6">
		          <h2>Contact Us</h2>
		          <br><label>Name:</label> <br>
		          <input type="text" placeholder="Your Name" />
		          <br>
		           <br><label>Email:</label> <br>
		          <input type="email" placeholder="E-Mail" />
		          <br>
		           <br><label>Question:</label> <br>
		          <textarea
		            cols="30"
		            rows="6"
		            placeholder="Type Your Message"
		          ></textarea>
		          <br>
		         <button type="button" class="btn">Submit</button> 
		        </div>
		      </div>
	
</div>

     <!--  Footer  -->  
     

		
     <?php  include('../partials-front/footer.php');?>