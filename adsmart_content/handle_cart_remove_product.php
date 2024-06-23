 <?php  session_start();

if(isset($_SESSION['user2']) && isset($_SESSION['shopcode'])){
    include '../partials-front/after_company_login_menu.php';
}
elseif (isset($_SESSION['user1'])){
    include '../partials-front/after_customer_login_menu.php';
}else {include '../partials-front/menu.php';}

 ?>
<!--  header -->
<?php 

if(isset($_GET['id']) ){
    
    //get the value and delete
    //echo "Get value and delete";
    $id = $_GET['id'];
    $customer_name = $_GET['customer_name'];
    //delete data from db
    //SQL query to delete data from db
    $sql = "DELETE FROM shopping_cart WHERE id='$id' and customer_name = '$customer_name'";
    
    //execute the query
    $res = mysqli_query($conn, $sql);
    
    //check whether the data is delete from db or not
    if($res==true)
    {
        //set success message and redirect
        $_SESSION['delete'] = "<div style='color:green; font-size:28px;'> Item has been removed successfully. </div>";
        
        //Redirect to manage category
        header('location:'.SITEURL.'cart.php');
        
    }
    
    
    
}else
{
    
    //redirect to manage category page
    header('location:'.SITEURL.'cart.php');
    
}

    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>