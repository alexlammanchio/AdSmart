<?php include('partials/menu.php'); ?>

<div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>Add Admin </h1>
			<br>
			<br>
			
			
			<form action="" method="POST">
				<table >
					<tr>
						<td> Full Name: </td>
						<td><input type="text" name="full_name" placeholder="Enter Your name"></td>
					
					</tr>
					<tr>
						<td> Username: </td>
						<td><input type="text" name="username" placeholder="Your Display name"></td>
					
					</tr>
					<tr>
						<td> Password: </td>
						<td><input type="password" name="password" placeholder="Your Password"></td>
					
					</tr>
					
					<tr>
						<td colspan="2">
						<input type="submit" name="submit"  value="Add Admin" class="btn" style="height:50px;font-size:25px; background:#9198e5;"></td>
					
					</tr>
				</table>
			
			
			</form>
		</div>
</div>





<?php 

    //Process the value from form and save it in db
    
if(isset($_POST['submit'])){
    
    //button clicked
    //1. Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //Password encryption with md5
    
    //2. SQL query to save the data into db
    $sql = "INSERT INTO adsmart_admin SET
            full_name ='$full_name',
            display_name= '$username',
            password= '$password'
             ";
					
    //echo $sql;
    
    
    //3. executing query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
    //4. check whether the(Query is executed) data is inseted or not and display appropriate message
    if($res==TRUE)
    {
        //Data inseted
        //echo "Data inseted";
        //create a session variable to dispaly message
        $_SESSION['add']= "<div class='success'>Admin Added Successfully. </div>";
        //Redirect Page
        header('location:'.SITEURL.'admin/manage-admin.php');
        
    }else {
        
       // echo "fail to insert data";
        //create a session variable to dispaly message
        $_SESSION['add']= "<div class='error'>Failed to Added Admin. </div>";
        //Redirect Page
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}



?>

<?php include('partials/footer.php'); ?>