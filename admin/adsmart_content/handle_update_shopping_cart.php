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
if (isset($_POST['submit'])) {
   
    // Get all values
    $shopIds = $_POST['shop_id']; // Assuming $_POST['shop_id'] is an array with multiple values
    
    if (isset($_POST['quantity']) && $_POST['quantity'] > 0) {
        $quantity = $_POST['quantity'];
    } else {
        $quantity = 0;
    }
    
    foreach ($shopIds as $index => $id) {
        $currentId = $id;
        $currentquantity = $quantity[$index];
        // Update the db for each shop ID
        $sql2 = "UPDATE shopping_cart SET quantity = '$currentquantity' WHERE id = '$currentId'";
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        
        // Perform further actions based on the update result
        if ($res2 == true) {
            $_SESSION['update'] = "<div style='color:green; font-size:28px;'>Item has been added successfully.</div>";
            header('location:'.SITEURL.'checkout.php');
        } else {
            $_SESSION['update'] = "<div style='color:red; font-size:28px;'>Failed to add Item to shopping cart.</div>";
            header('location:'.SITEURL.'checkout.php');
        }
    }
}

    	?>
<!--------------------- footer -------------->
 <?php  include('../partials-front/footer.php');?>