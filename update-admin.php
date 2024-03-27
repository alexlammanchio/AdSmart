<?php include('partials/menu.php'); ?>

<div class='small-container cart-page'>
	   	<div class='reg'>
			<h1>Update AdSmart Adminstration Account </h1>
			
			<br>
			<br>
			<?php 
			     //1. Get ID of select admin
			$id = $_GET['id'];
			     //2. Create SQL Query to Get the details
			     $sql = "SELECT * from adsmart_admin where id='$id'";
			     
			     // execute the query
			     $res=mysqli_query($conn, $sql);
			     
			     //check whether the query is executed or not
			     if($res==true){
			         
			         //check whether the data is available or not
			         $count = mysqli_num_rows($res);
			         //check whether we have admin data or not
			         if($count==1){
			             
			             // get the details
			            // echo "Admin Available";
			            $row =mysqli_fetch_assoc($res);
			             $full_name = $row['full_name'];
			             $username = $row['display_name'];
			         }
			         else {
			             //redirect to manage admin page
			             
			             header('location:'.SITEURL.'admin/manage-admin.php');
			             
			         }
			         
			     }
			
			?>
			
			
			<form action="" method="POST">
					<table class="">
					<tr>
						<td> Full Name: </td>
						<td><input type="text" name="full_name" value="<?php echo $full_name;?>"></td>
					
					</tr>
					<tr>
						<td> Username: </td>
						<td><input type="text" name="username" value="<?php echo $username;?>"></td>
					
					</tr>				
					
					<tr>
						<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						
					 
					</tr>
					
					</table>
			<input type="submit" name="submit"  value="Update Admin" class="btn" style="height:50px;font-size:25px;  background:#9198e5;"></td>
			</form>
			
		</div>
</div>
<?php 

    //check whether the submit button u=is clicked
if(isset($_POST['submit'])){
    
    //echo "button clicked";
   $id = $_POST['id'];
   $full_name =$_POST['full_name'];
   $username = $_POST['username'];
   //create a sql query to update admin
   
   $sql= "UPDATE adsmart_admin SET 
            full_name = '$full_name',
display_name = '$username'
WHERE id='$id'";
   
   $res = mysqli_query($conn, $sql);
   
   //check whether the query executed successfully or not
   if($res==true){
      
       //Create Session variable to display message
       $_SESSION['update'] = "<div class='success'>Admin Update Successfully.</div>";
       //Redirect to manage admin page
       header('location:'.SITEURL.'admin/manage-admin.php');
       
   }else {
       
       
       $_SESSION['update'] = "<div class='error'>failed to update admin. try again later.</div>";
       header('location:'.SITEURL.'admin/manage-admin.php');
   }
}

?>



<?php include('partials/footer.php'); ?>
