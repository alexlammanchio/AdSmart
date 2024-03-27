<?php  include('partials/menu.php')?>

   <div class='small-container cart-page'>
	   	<div class='reg'>
		<h1> Add AdSmart Category</h1>
		<br>
		<br>
		<?php 
    			if(isset($_SESSION['add']))
    			{
    			    
    			    echo $_SESSION['add'];
    			    unset($_SESSION['add']); //removing seesion
    			}
    			
    			if(isset($_SESSION['upload']))
    			{
    			    
    			    echo $_SESSION['upload'];
    			    unset($_SESSION['upload']); //removing seesion
    			}
    			
    			?>
    			<br>
    			<br>
		<!--  add Category form starts -->

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-full">
			<tbody>
				<tr>
					<td>Category Name: </td>
					<td>
						<input type="text" name="title" placeholder="category name">
					</td>
				</tr>
				<tr>
					<td>Category Display Name: </td>
					<td>
						<input type="text" name="display_name" placeholder="category dispaly name">
					</td>
				</tr>
				<tr>
					<td>Select Image: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Advertisement Type: </td>
					<td>
						<input type="radio" name="type" value="traditional"> Traditional
						<input type="radio" name="type" value="digital"> Digital
					</td>
				</tr>
			<tr>
					<td>Active: </td>
					<td>
						<input type="radio" name="active" value="Yes"> Yes
						<input type="radio" name="active" value="No"> No
					</td>
				</tr>
			<tr>
					
					<td colspan="2">
						
						
					<div id="button">
							<input type="submit" name="submit"  value="Add Admin" class="btn" style="height:50px;font-size:25px;" >  
					</div>
				</tr>
				</tbody>
			</table>
		
		
		
		</form>
		
	<?php 

    //check whether the submit button u=is clicked
if(isset($_POST['submit'])){
    
    //echo "button clicked";
   $title = $_POST['title'];
  
  // For Radio input, we need to check whether the button is selected or not
   if(isset($_POST['type'])){
       
       // Get the value from form
       
       $type =$_POST['type'];
   }else{
       
       //set the default value
       $type ="Undefined";
   }
   
   //echo "button clicked";
   $title = $_POST['display_name'];
   
   // For Radio input, we need to check whether the button is selected or not
   if(isset($_POST['display_name'])){
       
       // Get the value from form
       
       $display_name =$_POST['display_name'];
   }else{
       
       //set the default value
       $display_name ="Undefined";
   }
   
   
   if(isset($_POST['active'])){
       
       // Get the value from form
       
       $active =$_POST['active'];
   }else{
       
       //set the default value
       $active ="No";
   }
   //check whether the image is selected or not and set the value for image name accoridingly
  // print_r($_FILES['image']);
   //echo $_FILES['image']['tmp_name'];
  //die(); // break the code here
   if(isset($_FILES['image']['name'])){
       //upload the image
       $image_name=$_FILES['image']['name'];
       
       //Upload the image only if image is selected
       if($image_name !="")
       {
       
       
               //Auto Rename our image
               //Get the extension of our image(jpg,png) e.g "special.jpg"
               
               $ext =end(explode('.', $image_name));
               
               //Rename the Image
               $image_name ="AdSmart_Category_".rand(000,999).'.'.$ext; // food_category_834
               
               
               $source_path=$_FILES['image']['tmp_name'];
               
               $destination_path ="images/category/".$image_name;
               
               //finally upload the image
               $upload = move_uploaded_file($source_path, $destination_path);
               
               //check whether the image is uploaded or not 
               // and if the image is not uploaded then we will stop the process and redirect with error message
               if($upload==false){
                   
                   //Set message
                   $_SESSION['upload'] = "<div class='error'> Failed to Upload image. <div>";
                   header('location:'.SITEURL.'admin/add-category.php');
                   die();
               }
       
       }
   }else{
       //don't upload image and set the image_name values as blank
       $image_name="";
       
   }
   
   
   //2. create sql query to insert category into db
   $sql ="INSERT INTO adsmart_category SET category_name='$title', image_name='$image_name',display_name='$display_name',  advertisement_type ='$type', active='$active'";
   
   //3. execute the query and save in db
   $res =mysqli_query($conn, $sql);
   
   //4. check whether the query executed or not and data added or not
   if($res==true){
       
       //Query executed and category added
       $_SESSION['add'] = "<div class='success'> Category added successfully. </div>";
       
       header('location:'.SITEURL.'admin/manage-category.php');
   }else{
       $_SESSION['add'] = "<div class='error'> Failed to add category. </div>";
       
       header('location:'.SITEURL.'admin/add-category.php');
       
   }
}

?>
	
	
		<!--  add Category form ends -->
	
	</div>

</div>




  <?php include('partials/footer.php')?>