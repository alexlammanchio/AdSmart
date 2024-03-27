<?php 
    //include constants file
include('constants.php');

    //check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    
    //get the value and delete
    //echo "Get value and delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    
    //remove the physical image file is available
    if($image_name !="")
    {
        //image is available to remove it
        $path = "images/food/".$image_name;
        //remove the image
        $remove = unlink($path);
        
        //if failed to remove image then add an error message and stop the process
        if($remove ==false){
            //set the seesion message
            $_SESSION['remove'] = "<div class='error'> failed to remove food image.</div>";
            
            //Redirect to manage category page
            header('location:'.SITEURL.'/admin/manage-food.php');
            //stop the process
            die();
            
        }
        
        
        
    }
    
    //delete data from db
    //SQL query to delete data from db
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    
    //execute the query
    $res = mysqli_query($conn, $sql);
    
    //check whether the data is delete from db or not
    if($res==true)
    {
        //set success message and redirect 
        $_SESSION['delete'] = "<div class='success'> Food Deleted successfully. </div>";
        
        //Redirect to manage category
        header('location:'.SITEURL.'/admin/manage-food.php');
        
    }else{
        
        $_SESSION['delete'] = "<div class='error'> Failed to  Delete food. </div>";
        
        //Redirect to manage category
        header('location:'.SITEURL.'/admin/manage-food.php');
        
        
    }
    
    
    
}else 
{
    
    //set success message and redirect
    $_SESSION['unauthorize'] = "<div class='error'>unauthorized access. </div>";
    
    //Redirect to manage category
    header('location:'.SITEURL.'/admin/manage-food.php');
    
}
    
   

?>