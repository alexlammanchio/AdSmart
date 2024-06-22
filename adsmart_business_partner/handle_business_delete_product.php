 <?php  include('../partials-front/after_company_login_menu.php');?>
<!--  header -->
<?php 

if(isset($_GET['id']) AND isset($_GET['image_name'])){
    
    //get the value and delete
    //echo "Get value and delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    
    //remove the physical image file is available
    if($image_name !="")
    {
        //image is available to remove it
        $path = "../images/business_product/".$image_name;
        //remove the image
        $remove = unlink($path);
        
        //if failed to remove image then add an error message and stop the process
        if($remove ==false){
            //set the seesion message
            $_SESSION['remove'] = "<div style='color:red; font-size:28px;'> failed to remove product image.</div>";
            
            //Redirect to manage category page
            header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=4');
            //stop the process
            die();
            
        }
        
        
        
    }
    
    //delete data from db
    //SQL query to delete data from db
    $sql = "DELETE FROM adsmart_business_product WHERE id='$id'";
    
    //execute the query
    $res = mysqli_query($conn, $sql);
    
    //check whether the data is delete from db or not
    if($res==true)
    {
        //set success message and redirect
        $_SESSION['delete'] = "<div style='color:green; font-size:28px;'> Product Deleted successfully. </div>";
        
        //Redirect to manage category
        header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=4');
        
    }
    
    
    
}else
{
    
    //redirect to manage category page
    header('location:'.ADSMART_BUSINESS.'Adsmart_partners_personal_space.php?page=4');
    
}

    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>