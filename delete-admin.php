<?php 
    include('../config/constants.php');


    //1. get the ID of Admin to be deleted
     $id = $_GET['id'];
     $fullname = $_GET['fullname'];
    //2.Create Sql query to delete admin
    $sql ="DELETE FROM adsmart_admin WHERE id=$id";
    
    //exe the query
    $res = mysqli_query($conn, $sql);

       //check whether the query executed successfully or not 
    if($res==true){
        //Query executed successfully and admin deleted
        //echo "Admin deleted";
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
        
    }else {
        //failed to delete admin
        //echo "Failed to Deleted admin";
        $_SESSION['delete'] = "<div class='error'>failed to delete admin. try again later.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
    }
    
    //3. Redirect to Manage Admin page with message (Success/error)

?>